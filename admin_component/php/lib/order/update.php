<?php
    if (isset($_POST['update_order'])){

        $status = $_POST['payment-status'];
        $method = $_POST['payment-method'];
        $id = $_POST['oid'];
        $delivery_status = $_POST['delivery-status'];

        $changes=0;
 
        if (!empty($status)){
            $query = "SELECT payment_status FROM orders WHERE order_id = $id";
            $check_payment = $connect->prepare($query);
            $check_payment -> execute();
            $result_payment= $check_payment -> fetch(PDO::FETCH_ASSOC);
    
            if($result_payment['payment_status'] != $status){
                $query = "UPDATE orders SET payment_status ='".$status."' WHERE order_id = $id";
                $updatedb= $connect->prepare($query);
                $updatedb ->execute();
    
                $changes++;
        }
        }

        if (!empty($delivery_status)){
            $query = "SELECT delivery_status FROM orders WHERE order_id = $id";
            $check_delivery = $connect->prepare($query);
            $check_delivery -> execute();
            $result_delivery= $check_delivery -> fetch(PDO::FETCH_ASSOC);
    
            if($result_delivery['delivery_status'] != $delivery_status){
                $query = "UPDATE orders SET delivery_status ='".$delivery_status."' WHERE order_id = $id";
                $updatedb= $connect->prepare($query);
                $updatedb ->execute();
    
                $changes++;
        }
        }

        if (!empty($method)){
            $query = "SELECT method FROM orders WHERE order_id = $id";
            $check_method = $connect->prepare($query);
            $check_method -> execute();
            $result_method= $check_method -> fetch(PDO::FETCH_ASSOC);
    
            if($result_method['method'] != $method){
                $query = "UPDATE orders SET method ='".$method."' WHERE order_id = $id";
                $updatedb= $connect->prepare($query);
                $updatedb ->execute();
    
                $changes++;
        }
        }

    

        if ($changes > 0) {
            echo '<meta http-equiv="refresh" content="3;url=order.php">';
            flash_alert('Message', 'Order has successfully been updated', FLASH_SUCCESS);
            header('location:order.php');
        } else {
            flash_alert('Message', 'No changes were made!', FLASH_SUCCESS);
            header('location:order.php');

        }
 
 }
?>
