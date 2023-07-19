
<?php
    
if (isset($_POST['update_user'])){

    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $number = $_POST['number'];
    $dob = $_POST['dob'];
    $id = $_POST['uid'];

    $query = "SELECT * FROM users WHERE id = ?";
    $stmt = $connect->prepare($query);
    $stmt->execute([$id]);
    $existingProduct = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($existingProduct) {
        if (($name == $existingProduct['name'] && $email == $existingProduct['email'] && $address == $existingProduct['address'] && $number == $existingProduct['number'] && $dob == $existingProduct['dob'])) {
            flash_alert('Message', 'No changes have been made!', FLASH_INFO);
            header('location:user.php');
        } else {
            $id = (int)$id;
            $query = "SELECT * FROM `users` WHERE id <> ? AND email = ?";
            $get = $connect->prepare($query);
            $get->execute([$id, $_POST['email']]);
            
            if ($get->rowCount()>0) {
                    flash_alert('Error', 'Email is already registered by other user!', FLASH_DANGER);
            } else {
                $id = (int)$id;
                $query = "SELECT * FROM `users` WHERE id <> ? AND number = ?";
                $get = $connect->prepare($query);
                $get->execute([$id, $_POST['number']]);

                if ($get->rowCount()>0) {
                    flash_alert('Error', 'Number is already registered by other user!', FLASH_DANGER);
            } else {
                $change = 0;
            if (!empty($name)){
                $query = "UPDATE users SET name ='".$name."' WHERE id = $id";
                $updatedb= $connect->prepare($query);
                $updatedb ->execute();
                $change++;     
            }

            if (!empty($email)){
                $query = "UPDATE users SET email ='".$email."' WHERE id = $id";
                $updatedb= $connect->prepare($query);
                $updatedb ->execute();
                $change++;     
            }

            if (!empty($address)){
                $query = "UPDATE users SET address ='".$address."' WHERE id = $id";
                $updatedb= $connect->prepare($query);
                $updatedb ->execute();
                $change++;     
            }

            if (isset($number)){
                $query = "UPDATE users SET number ='$number' WHERE id = $id";
                $updatedb= $connect->prepare($query);
                $updatedb ->execute();
                $change++;     
            }

            if (!empty($dob)){
            $query = "UPDATE users SET dob ='".$dob."' WHERE id = $id";
            $updatedb= $connect->prepare($query);
            $updatedb ->execute();
            $change++;     
            }

            if ($change > 0) {
                flash_alert('Message', 'User data has been successfully updated!', FLASH_SUCCESS);
                header('location:user.php');
                } else if ($change==0) {
                flash_alert('Message', 'No changes have been made!', FLASH_INFO); 
                header('location:user.php');
            }  

            
        }
    }


        }
    }
}
?>