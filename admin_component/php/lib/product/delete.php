<?php

    if(isset($_GET['delete_product'])){
        $delete_id = $_GET['delete_product'];
    
        $query="SELECT * FROM products WHERE id = ?";
        $del_product_image = $connect->prepare($query);
        $del_product_image -> execute([$delete_id]);
        $fetch_delete_image = $del_product_image-> fetch(PDO::FETCH_ASSOC);

    
        unlink('../img_upload/product/'.$fetch_delete_image['image_a']);
        unlink('../img_upload/product/'.$fetch_delete_image['image_b']);
        unlink('../img_upload/product/'.$fetch_delete_image['image_c']);
        unlink('../img_upload/product/'.$fetch_delete_image['image_d']);
    
        $query="DELETE FROM products WHERE id = ?";
        $del_p = $connect->prepare($query);
        $del_p -> execute([$delete_id]);

        flash_alert('Message', 'Product has been successfully deleted!', FLASH_SUCCESS);
    } ?>