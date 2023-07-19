<?php
if (isset($_POST['update_product'])){

    $name = $_POST['name'];
    $pid = $_POST['pid'];
    $price = $_POST['price'];
    $type = $_POST['type'];
    $details = $_POST['details'];
    $stock = $_POST['stock'];

    $old_imageA = $_POST['old_imgA'];
    $image_A= $_FILES['image_a']['name'];
    $image_A_size= $_FILES['image_a']['size'];
    $image_A_tmpname= $_FILES['image_a']['tmp_name'];
    $image_A_folder= '../img_upload/product/'.$image_A;

    $old_imageB = $_POST['old_imgB'];
    $image_B= $_FILES['image_b']['name'];
    $image_B_size= $_FILES['image_b']['size'];
    $image_B_tmpname= $_FILES['image_b']['tmp_name'];
    $image_B_folder= '../img_upload/product/'.$image_B;

    $old_imageC= $_POST['old_imgC'];
    $image_C= $_FILES['image_c']['name'];
    $image_C_size= $_FILES['image_c']['size'];
    $image_C_tmpname= $_FILES['image_c']['tmp_name'];
    $image_C_folder= '../img_upload/product/'.$image_C;

    $old_imageD= $_POST['old_imgD'];
    $image_D= $_FILES['image_d']['name'];
    $image_D_size= $_FILES['image_d']['size'];
    $image_D_tmpname= $_FILES['image_d']['tmp_name'];
    $image_D_folder= '../img_upload/product/'.$image_D;


    $query = "SELECT * FROM products WHERE id = ?";
    $stmt = $connect->prepare($query);
    $stmt->execute([$pid]);
    $existingProduct = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($existingProduct) {
        if (($name == $existingProduct['name'] && $price == $existingProduct['price'] && $type == $existingProduct['type'] && $details == $existingProduct['details'] && $stock == $existingProduct['stock'] && $image_A == $existingProduct['image_a'] && $image_B == $existingProduct['image_b'] && $image_C == $existingProduct['image_c'] && $image_D == $existingProduct['image_d']) || ($name == $existingProduct['name'] && $price == $existingProduct['price'] && $type == $existingProduct['type'] && $details == $existingProduct['details'] && $stock == $existingProduct['stock'] && empty($image_A) && empty($image_B)  && empty($image_C)  && empty($image_D))) {
            flash_alert('Message', 'No changes have been made!', FLASH_INFO);
            header('location:product.php');
        } else {
            $pid = (int)$pid;
            $query = "SELECT * FROM `products` WHERE id <> ? AND name = ?";
            $get = $connect->prepare($query);
            $get->execute([$pid, $_POST['name']]);
            
            if ($get->rowCount()>0) {
                    flash_alert('Error', 'Product name is already taken by another product!', FLASH_DANGER);
            } else {
            $change = 0;
            if (!empty($name)){
                $query = "UPDATE products SET name ='".$name."' WHERE id = $pid";
                $updatedb= $connect->prepare($query);
                $updatedb ->execute();
                $change++;     
            }

            if (!empty($price)){
                $query = "UPDATE products SET price ='".$price."' WHERE id = $pid";
                $updatedb= $connect->prepare($query);
                $updatedb ->execute();
                $change++;     
            }

            if (!empty($type)){
                $query = "UPDATE products SET type ='".$type."' WHERE id = $pid";
                $updatedb= $connect->prepare($query);
                $updatedb ->execute();
                $change++;     
            }

            if (isset($stock) && $stock !== ''){
                $query = "UPDATE products SET stock ='$stock' WHERE id = $pid";
                $updatedb= $connect->prepare($query);
                $updatedb ->execute();
                $change++;     
            }

            if (!empty($details)){
            $query = "UPDATE products SET details ='".$details."' WHERE id = $pid";
            $updatedb= $connect->prepare($query);
            $updatedb ->execute();
            $change++;     
            }

            if(!empty($image_A)) {
                $query = "UPDATE products SET image_a =? WHERE id = ?";
                $update_image_A = $connect -> prepare($query);
                $update_image_A -> execute ([$image_A, $pid]);
                move_uploaded_file($image_A_tmpname, $image_A_folder);
                unlink('../img_upload/product/'.$old_imageA);        
                $change++;     
            }

            if(!empty($image_B)) {
                $query = "UPDATE products SET image_b =? WHERE id = ?";
                $update_image_B = $connect -> prepare($query);
                $update_image_B -> execute ([$image_B, $pid]);
                move_uploaded_file($image_B_tmpname, $image_B_folder);
                unlink('../img_upload/product/'.$old_imageB);        
                $change++;     
            }

            if(!empty($image_C)) {
                $query = "UPDATE products SET image_c =? WHERE id = ?";
                $update_image_C = $connect -> prepare($query);
                $update_image_C -> execute ([$image_C, $pid]);
                move_uploaded_file($image_C_tmpname, $image_C_folder);
                unlink('../img_upload/product/'.$old_imageC); 
                $change++;     
            }

            if(!empty($image_D)) {
                $query = "UPDATE products SET image_d =? WHERE id = ?";
                $update_image_D = $connect -> prepare($query);
                $update_image_D -> execute ([$image_D, $pid]);
                move_uploaded_file($image_D_tmpname, $image_D_folder);
                unlink('../img_upload/product/'.$old_imageD);   
                $change++;     
            }

            if ($change > 0) {
                flash_alert('Message', 'Product data has been successfully updated!', FLASH_SUCCESS);
                header('location:product.php');
                } else if ($change==0) {
                flash_alert('Message', 'No changes have been made!', FLASH_INFO); 
                header('location:product.php');
            } 

            
        }
    }
} 
} 

?>
