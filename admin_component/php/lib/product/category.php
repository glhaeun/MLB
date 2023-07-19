<?php

if(isset($_GET['delete_category'])){
    $delete_id = $_GET['delete_category'];

    $query="SELECT type FROM category WHERE id = ?";
    $get_type = $connect->prepare($query);
    $get_type -> execute([$delete_id]);
    $fetch_type = $get_type -> fetch(PDO::FETCH_ASSOC);
    $type = implode($fetch_type);



    $query="DELETE FROM category WHERE id = ?";
    $del_c = $connect->prepare($query);
    $del_c -> execute([$delete_id]);

    $query="DELETE FROM products WHERE type = ?";
    $del_products = $connect->prepare($query);
    $del_products -> execute([$type]);


    echo '<meta http-equiv="refresh" content="1;url=add_category.php">';
    flash_alert('Message', 'Category has successfully been deleted', FLASH_SUCCESS);

}else if(isset($_POST['add_category'])){

    $category = $_POST['categoryname'];
  
    $select_category = $connect->prepare("SELECT * FROM category WHERE type = ? ");
    $select_category -> execute([$category]);

    if($select_category->rowCount() > 0) {
        $message_error[] = 'Category already exist!';
    } else {
        $query = "INSERT INTO category (type) VALUES (?)";
        $insert_category = $connect->prepare($query);
        $insert_category -> execute([$category]);
        flash_alert('Message', 'New category has successfully been added', FLASH_SUCCESS);
        
    }

}
?>




