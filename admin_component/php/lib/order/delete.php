<?php

if(isset($_GET['delete_order'])){
    $delete_id = $_GET['delete_order'];

    $query="DELETE FROM orders WHERE order_id = ?";
    $del_category = $connect->prepare($query);
    $del_category -> execute([$delete_id]);

    echo '<meta http-equiv="refresh" content="3;url=order.php">';
    flash_alert('Message', 'Order has been deleted', FLASH_SUCCESS);
}  ?>