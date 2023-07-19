
<!-- delete -->
<?php
    if(isset($_GET['delete_user'])){
        $delete_id = $_GET['delete_user'];
    
        $query="DELETE FROM users WHERE id = ?";
        $del_category = $connect->prepare($query);
        $del_category -> execute([$delete_id]);

        echo '<meta http-equiv="refresh" content="2;url=user.php">';
        flash_alert('Message', 'User has been successfully deleted!', FLASH_SUCCESS);
    }    
?>
