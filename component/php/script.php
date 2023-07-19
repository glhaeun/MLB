
<?php
    function rupiah($angka){
	
        $hasil_rupiah = "Rp " . number_format($angka,0,',','.');
        return $hasil_rupiah;
     
    }

    if(isset($_POST['register'])){
        
        $email = $_POST['email'];
        $name = $_POST['fname'];
        $address = $_POST['address'];
        $number = $_POST['number'];
        $dob = $_POST['date'];
        $password = $_POST['registerpass'];
        $confirmpassword = $_POST['confirmpass'];

        if (isset($_SESSION['user_id'])) {
            header('location:indexlogin.php');
        }
 
            $select_users = $connect->prepare("SELECT * FROM users WHERE email = ? ");
            $select_users -> execute([$email]);

            $select_users1 = $connect->prepare("SELECT * FROM users WHERE number = ? ");
            $select_users1 -> execute([$number]);

            if($select_users-> rowCount() > 0 && $select_users1 -> rowCount() > 0) {
                flash('error', 'Failed to register because email and number has already been registered! Please use another email & number', FLASH_ERROR);
            }else if($select_users-> rowCount() > 0) {
                flash('error', 'There is already an account with this email address. Please enter a new email.', FLASH_ERROR);
            } else if ($select_users1 -> rowCount() > 0) {
                flash('error', 'There is already an account with this phone number. Please enter a new number.', FLASH_ERROR);
            }else {
                    $query = "INSERT INTO users (name,email,password,address,number, dob) VALUES (?, ?, ?, ?, ?, ?)";
                    $insert_user = $connect->prepare($query);
                    $insert_user -> execute([$name, $email, $password, $address, $number, $dob]);
                    // flash('Registered', 'You have successfully registered', FLASH_SUCCESS);
                    ?>
                    <script src="sweetalert.min.js"></script>
        <script type="text/javascript">
       swal({
        title: "Success!",
        text: "You have register successfully!",
        icon: "success",
        }).then(function() {
            window.location = "login.php";
        });     
  </script>
        <?php
            }
    }

    
?>

<script src="sweetalert.min.js"></script>
<?php
    if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];


    $select_user =$connect->prepare("SELECT id FROM users WHERE email = ? AND password = ?");
    $select_user->execute([$email,$password]);
    $fetch_user = $select_user->fetch(PDO::FETCH_ASSOC);

    if($select_user->rowCount()>0) {
        $query = "SELECT * FROM users WHERE email = ? AND password = ?";
        $select_user_data = $connect -> prepare($query);
        $select_user_data -> execute([$email,$password]);

        $fetch_user_data= $select_user_data->fetch(PDO::FETCH_ASSOC);
        $_SESSION['user_id'] = $fetch_user['id'] ;
        $_SESSION['user_name'] = $fetch_user_data['name'];
        $_SESSION['user_email'] = $fetch_user_data['email'];
        $_SESSION['user_number'] = $fetch_user_data['number'];
    ?>
        <script type="text/javascript">
       swal({
        title: "Success!",
        text: "You have login successfully!",
        icon: "success",
        }).then(function() {
            window.location = "index.php";
        });     
  </script>
        <?php
    } else{?>
        <script>
             swal({
                title: "Failed to Login!",
                text: "Incorrect Email or Password!",
                icon: "error",
                
            });
        </script>
    <?php
    }
}
?>

<script src="sweetalert.min.js"></script>
<?php

    if (isset($_POST['forgot'])){
        $checkemail = $_POST['recheckemail'];
    
        $email_match = filter_var($checkemail, FILTER_VALIDATE_EMAIL);
    
        $query = "SELECT * FROM users WHERE email = ?";
        $getemail = $connect->prepare($query);
        $getemail -> execute([$checkemail]);
        $fetchemail = $getemail->fetch(PDO::FETCH_ASSOC);
    
        if ($getemail->rowCount()>0) {
            $reset_token =bin2hex(random_bytes(16));
            date_default_timezone_set('Asia/kolkata');
            $date = date("Y-m-d");
            $is_expired = 0;
            $query = "INSERT INTO otp_expiry (resettoken,is_expired,email,resettokenexpire) values ('$reset_token','$is_expired','$checkemail','$date')";
            $insert = $connect->prepare($query);
            $insert->execute();
            sendEmail($checkemail, $reset_token);
            $str1 = "We have successfully sent Reset Password Link to " ;
            $str1 .= $checkemail;?>
            <script>
             swal("<?=$str1?>");
        </script>
        <?php
        } else {?>
            <script>
             swal("Incorrect email! Please re-enter your email.");
            </script>
            <?php
    
        }
    
    
    }
?>

<!-- update password -->

<?php
if (isset($_POST['update_password'])) {
    // Retrieve the old password from the database for the user
    $query = "SELECT password FROM user WHERE id = :user_id";
    $stmt = $connect->prepare($query);
    $stmt->bindParam(':user_id', $user_id); // Replace with the actual user ID
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $old_password = $row['password'];

    // Compare the old password with the newly submitted password
    $new_password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Validate the new password
    $password_pattern = '/^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{7,15}$/';
    $is_valid_password = preg_match($password_pattern, $new_password);

    if ($is_valid_password && $new_password !== $old_password && $new_password === $confirm_password) {
        // Update the password in the database
        $update_query = "UPDATE user SET password = :new_password WHERE id = :user_id";
        $update_stmt = $connect->prepare($update_query);
        $update_stmt->bindParam(':new_password', $new_password);
        $update_stmt->bindParam(':user_id', $user_id); // Replace with the actual user ID
        $update_stmt->execute();

        // Password updated successfully
        echo "Password has been updated!";
    } else {
        // Password does not meet requirements, passwords don't match, or new password is the same as the old one
        echo "Invalid password. Please make sure the new password is different from the old one, both passwords match, and it meets the required criteria.";
    }
}
?>


<?php
if (isset($_POST['reset_password'])) {

    $email = $_POST['email'];
    $query = "SELECT password FROM users WHERE email = :email";
    $stmt = $connect->prepare($query);
    $stmt->bindParam(':email', $email); // Replace with the actual user ID
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $old_password = $row['password'];

    // Compare the old password with the newly submitted password
    $new_password = $_POST['password'];
    $confirm_password = $_POST['cpassword'];

    $password_pattern = '/^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{7,15}$/';
    $is_valid_password = preg_match($password_pattern, $new_password);

    if($is_valid_password ){
        if($new_password === $confirm_password){
            if($new_password !== $old_password){
                $update_query = "UPDATE users SET password = :new_password WHERE email = :email";
        $update_stmt = $connect->prepare($update_query);
        $update_stmt->bindParam(':new_password', $new_password);
        $update_stmt->bindParam(':email', $email); // Replace with the actual user ID
        $update_stmt->execute();

        // Password updated successfully
        ?>
        <script>
        swal({
            title: "Success!",
            text: "Password has been reset successfully",
            icon: "success",
            
        }).then(function() {
            window.location = "login.php";
        });      
        </script>
        <?php
    } else {
        ?>
        <script>
        swal({
            title: "Invalid!",
            text: "New password can't be the same as the old!",
            icon: "error",
            
        }).then(function() {
            window.location = "login.php";
        });      
        </script>
        <?php
            }
        } else {
            ?>
        <script>
        swal({
            title: "Invalid!",
            text: "Passwords and confirm password don't match!",
            icon: "error",
            
        }).then(function() {
            window.location = "login.php";
        });      
        </script>
        <?php
        }
    } else {
        ?>
        <script>
        swal({
            title: "Invalid!",
            text: "Passwords should be 7-15 length, at least one digit, at least one special character !",
            icon: "error",
            
        }).then(function() {
            window.location = "login.php";
        });      
        </script>
        <?php
    }
}
?>




<script src="sweetalert.min.js"></script>
<?php 
    if(isset($_GET['logout'])){
        session_destroy(); 
       ?>
        <script>
        swal({
            title: "Logout Successfully!",
            text: "",
            icon: "success",
            
        }).then(function() {
            window.location = "index.php";
        });      
        </script>
        <?php
        
        } 
?>

<!-- add to cart -->
<script src="sweetalert.min.js"></script>
<?php
if (isset($_GET['pid'])) {
    $pid = $_GET['pid'];
    $_SESSION['pid'] = $pid;

    $query = "SELECT * FROM products WHERE id = ?";
    $get_product = $connect->prepare($query);
    $get_product->execute([$pid]);
    $fetch_product = $get_product->fetch(PDO::FETCH_ASSOC);

    if ($fetch_product['stock'] > 0) {
        $name = $fetch_product['name'];
        $price = $fetch_product['price'];
        $img = $fetch_product['image_a'];

        $price = (int)$price;
        $qty = 1;
        $subtotal = $price * $qty;

        $query = "SELECT * FROM cart WHERE pid = ?";
        $check_cart = $connect->prepare($query);
        $check_cart->execute([$pid]);
        $fetch_cart = $check_cart->fetch(PDO::FETCH_ASSOC);
        $fetch_result = $check_cart->rowCount();

        if ($fetch_result == 0) {
            $query = "INSERT INTO cart (pid, name, price, quantity, image, subtotal) VALUES (?, ?, ?, ?, ?, ?)";
            $insert_cart = $connect->prepare($query);
            $insert_cart->execute([$pid, $name, $price, $qty, $img, $subtotal]);
        } else {
            $previousQty = $fetch_cart['quantity'];
            $previousSubtotal = $fetch_cart['subtotal'];

            $previousQty = (int)$previousQty;
            $previousSubtotal = (int)$previousSubtotal;

            $newQty = $previousQty + $qty;
            $newSubtotal = $previousSubtotal + $subtotal;

            // Check if the updated quantity exceeds the available stock
            if ($newQty <= $fetch_product['stock']) {
                $query = "UPDATE cart SET quantity = ?, subtotal = ? WHERE pid = ?";
                $update_cart = $connect->prepare($query);
                $update_cart->execute([$newQty, $newSubtotal, $pid]);
            } else {
                ?>
                <script>
                swal({
                    title: "Error",
                    text: "The selected quantity exceeds the available stock.",
                    icon: "error",
                    });  
                </script>
                <?php
                // Display an error message or perform appropriate actions
            }
        }
    } else {
        // Display an error message or perform appropriate actions
        echo "Error: The product is out of stock.";
    }
}
?>

<!-- detail -->
<?php
// if (isset($_POST['addtocart'])) {
//   $pid = $_GET['nextpage'];

//   // Retrieve the selected quantity from the form submission
//   $selectedQty = $_POST['qty'];

//   // Retrieve the stock for the specified product
//   $select_stock = $connect->prepare("SELECT stock FROM products WHERE id = ?");
//   $select_stock->execute([$pid]);
//   $product = $select_stock->fetch(PDO::FETCH_ASSOC);

//   if ($selectedQty > $product['stock']) {
//     echo '<script>alert("The selected quantity exceeds the available stock.");</script>';
//   } else {
//     $query = "SELECT * FROM cart WHERE pid = ?";
//     $check_cart = $connect->prepare($query);
//     $check_cart->execute([$pid]);
//     $fetch_cart = $check_cart->fetch(PDO::FETCH_ASSOC);
//     $fetch_result = $check_cart->rowCount();

//     $query = "SELECT * FROM products WHERE id = ?";
//     $get_product = $connect->prepare($query);
//     $get_product->execute([$pid]);
//     $fetch_product = $get_product->fetch(PDO::FETCH_ASSOC);

//     $name = $fetch_product['name'];
//     $price = $fetch_product['price'];
//     $img = $fetch_product['image_a'];
//     $price = (int) $price;

//     $subtotal = $price * $selectedQty;

//     if ($fetch_result == 0) {
//       $query = "INSERT INTO cart (pid, name, price, quantity, image, subtotal) VALUES (?, ?, ?, ?, ?, ?)";
//       $insert_cart = $connect->prepare($query);
//       $insert_cart->execute([$pid, $name, $price, $selectedQty, $img, $subtotal]);
//     } else {
//       $previousQty = $fetch_cart['quantity'];
//       $previousSubtotal = $fetch_cart['subtotal'];

//       $previousQty = (int) $previousQty;
//       $previousSubtotal = (int) $previousSubtotal;

//       $newQty = $previousQty + $selectedQty;
//       $newSubtotal = $previousSubtotal + $subtotal;

//       $query = "UPDATE cart SET quantity = ?, subtotal = ? WHERE pid = ?";
//       $update_cart = $connect->prepare($query);
//       $update_cart->execute([$newQty, $newSubtotal, $pid]);
//     }

//     echo '<script>updateCartCount();</script>';
//   }
// }

if (isset($_POST['addtocart'])) {
    $pid = $_GET['nextpage'];
    $select_products = $connect->prepare("SELECT * FROM products WHERE id = ?");
    $select_products->execute([$pid]);
    if ($select_products->rowCount() > 0) {
        $fetch_products = $select_products->fetch(PDO::FETCH_ASSOC);

        $name = $fetch_products['name'];
        $price = $fetch_products['price'];
        $img = $fetch_products['image_a'];
        $price = (int)$price;

        $qty = $_POST['qty'];
        $subtotal = $price * $qty;

        if ($qty > $fetch_products['stock']) {
            echo '<script>alert("Error: The selected quantity exceeds the available stock.");</script>';
        } else {
            $query = "INSERT INTO cart (pid, name, price, quantity, image, subtotal) VALUES (?, ?, ?, ?, ?, ?)";
            $insert_cart = $connect->prepare($query);
            $insert_cart->execute([$pid, $name, $price, $qty, $img, $subtotal]);

            echo '<script>updateCartCount();</script>';
        }
    }
}

?>

<!-- delete-cart -->
<?php 
if(isset($_GET['delete'])){
    $delete_id = $_GET['delete'];
    $query="DELETE FROM cart WHERE id = ?";
    $del_p = $connect->prepare($query);
    $del_p -> execute([$delete_id]);
}
?>


<script src="sweetalert.min.js"></script>
<?php 
    if(isset($_POST['checkout'])){

        function append_string ($str1, $str2){
            
            $str = $str1 . $str2;
            
            // Returning the result 
            return $str;
        }

        $query = "SELECT * FROM cart";
        $checkcart = $connect->prepare($query);
        $checkcart -> execute();
        $total_order = 0;
        $total_numberoforder =0;
        $detail ='';

        while($fetchcheckcart = $checkcart->fetch(PDO::FETCH_ASSOC)){
            $total_order += $fetchcheckcart['subtotal'];
            $total_numberoforder += $fetchcheckcart['quantity'];
            $detail = append_string($detail,$fetchcheckcart['pid']);
            $detail = append_string($detail,":");
            $detail = append_string($detail,$fetchcheckcart['name']);
            $detail = append_string($detail," - ");
            $detail = append_string($detail,$fetchcheckcart['quantity']);
            $detail = append_string($detail,"pc");
            $detail = append_string($detail,";");
        }        

        if ($checkcart->rowCount() > 0) {
            
            $customer_id =  $_SESSION['user_id'];
            $query = "SELECT * FROM users WHERE id = ?";
            $select_user_data = $connect -> prepare($query);
            $select_user_data -> execute([$customer_id]);

            $fetch_user_data = $select_user_data->fetch(PDO::FETCH_ASSOC);
            $date = date('Y-m-d'); 
            $name = $fetch_user_data['name'];
            $address = $fetch_user_data['address'];
            $number = $fetch_user_data['number'];
            
            $method = $_POST['payment-method']; 

            if($method == "COD"){
                $status = "Pending";
            } else {
                $status = "Completed";
            }

            $query = "INSERT INTO orders (placed_on, customer_id, customer_name, number, address, total_products, total_price, details, method, payment_status,delivery_status) VALUES (?,?,?,?,?,?,?,?,?,?,?)";
            $insert_order = $connect->prepare($query);
            $insert_order -> execute([$date, $customer_id, $name, $number, $address, $total_numberoforder, $total_order, $detail, $method, $status, "Preparing order"]);            
            
            ?>
            <script>
            swal({
                title: "Successfully Purchased!",
                text: "Thank you for ordering, have a nice day!",
                icon: "success",
                }).then(function() {
                window.location = "index.php";
            });     
            </script>
            
            <?php
                // Update the stock of products in the 'products' table based on cart items
                $cart_items_query = "SELECT * FROM cart";
                $cart_items_result = $connect->prepare($cart_items_query);
                $cart_items_result->execute();

                while ($cart_item = $cart_items_result->fetch(PDO::FETCH_ASSOC)) {
                    $product_id = $cart_item['pid'];
                    $quantity = $cart_item['quantity'];

                    // Get the current stock of the product
                    $get_stock_query = "SELECT stock FROM products WHERE id = ?";
                    $get_stock_result = $connect->prepare($get_stock_query);
                    $get_stock_result->execute([$product_id]);
                    $current_stock = $get_stock_result->fetchColumn();

                    // Calculate the new stock after deducting the purchased quantity
                    $new_stock = $current_stock - $quantity;

                    // Update the stock of the product in the 'products' table
                    $update_stock_query = "UPDATE products SET stock = ? WHERE id = ?";
                    $update_stock_result = $connect->prepare($update_stock_query);
                    $update_stock_result->execute([$new_stock, $product_id]);
                }

            
            $query = "DELETE FROM cart";
            $del_cart = $connect->prepare($query);
            $del_cart -> execute();
        } else {
            ?>
            <script>
            swal({
                title: "Failed to checkout!",
                text: "Cart is empty!",
                icon: "error",
                });  
            </script>
            <?php
        }
        
        
    }
?>

<!-- edit profile -->
<script src="sweetalert.min.js"></script>
<?php
    if(isset($_POST['submit'])) {

        $nama = $_POST['nama'];
        $address = $_POST['address'];
        $dob = $_POST['dob'];
        $user_id = $_SESSION['user_id'];
        $changes = 0;

                if (!empty($nama)){
                    $query = "UPDATE users SET name ='".$nama."' WHERE id = $user_id";
                    $updatedb= $connect->prepare($query);
                    $updatedb ->execute();
                    $_SESSION['user_name']  = $nama;
                    
                    $changes++;
                } 

                  if (!empty($dob)){
                        $query = "UPDATE users SET dob ='".$dob."' WHERE id = $user_id";
                        $updatedb= $connect->prepare($query);
                        $updatedb ->execute();
                        $changes++;
                    }

                    if (!empty($email) && ($email != $_SESSION['user_email'])){
                        $query = "UPDATE users SET email ='".$email."'WHERE id = $user_id ";
                      $updatedb= $connect->prepare($query);
                      $updatedb ->execute();
                      $_SESSION['$user_email'] = $email;
                      $changes++;

                    }

                    if (!empty($nomor) && ($nomor != $_SESSION['user_number'])){
                        $query = "UPDATE users SET email ='".$nomor."'WHERE id = $user_id ";
                        $updatedb= $connect->prepare($query);
                        $updatedb ->execute();
                        $_SESSION['$user_number'] = $nomor;
                        $changes++;
                    }

                    if ($changes>0){
                        ?>
                        <script type="text/javascript">
                        swal({
                            title: "Successful!",
                            text: "You have successfully updated your data!",
                            icon: "success",
                            });
                        </script>
                        <?php                    
                    }


         $status_edit = "no";
        echo '<meta http-equiv="refresh" content="1;url=profile.php" />';
    }
?>


<?php
    if(isset($_POST['changepass'])) {
        $current = $_POST['current'];
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];
        $user_id = $_SESSION['user_id'];
        $query = "SELECT password FROM users WHERE id = $user_id";
        $check_password = $connect->prepare($query);
        $check_password -> execute();
        $fetch_password = $check_password -> fetch(PDO::FETCH_ASSOC);
    
        if($check_password->rowCount()>0) {
            if ($current != $fetch_password['password'] ){
            flash('Error', 'Incorrect current password!', FLASH_ERROR);
            } else {
                if ($password != $cpassword ){
                flash('Error', 'Password not match', FLASH_ERROR);
                } else {         
                if ($current == $password) {
                flash('Error', 'New password should differ from old password', FLASH_ERROR);
                } else {
                    $query = "UPDATE users SET password ='".$password."'WHERE id = $user_id ";
                    $updatedb= $connect->prepare($query);
                    $updatedb ->execute();
                    ?>
                    <script type="text/javascript">
                    swal({
                        title: "Successful!",
                        text: "You have successfully changed your password!",
                        icon: "success",
                        });
                    </script>
                    <?php
                }
                 
                }
            }
    
        }
     
        
      }
    
    ?>
