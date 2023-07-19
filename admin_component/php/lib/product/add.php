<?php

if(isset($_POST['add_product'])){

    $name = $_POST['name'];
    $price = $_POST['price'];
    $type = $_POST['type'];
    $details = $_POST['details'];
    $stock = $_POST['stock'];



    $image_A= $_FILES['image_a']['name'];
    $image_A_size= $_FILES['image_a']['size'];
    $image_A_tmpname= $_FILES['image_a']['tmp_name'];
    $image_A_folder= '../img_upload/product/'.$image_A;

    $image_B= $_FILES['image_b']['name'];
    $image_B_size= $_FILES['image_b']['size'];
    $image_B_tmpname= $_FILES['image_b']['tmp_name'];
    $image_B_folder= '../img_upload/product/'.$image_B;

    $image_C= $_FILES['image_c']['name'];
    $image_C_size= $_FILES['image_c']['size'];
    $image_C_tmpname= $_FILES['image_c']['tmp_name'];
    $image_C_folder= '../img_upload/product/'.$image_C;

    $image_D= $_FILES['image_d']['name'];
    $image_D_size= $_FILES['image_d']['size'];
    $image_D_tmpname= $_FILES['image_d']['tmp_name'];
    $image_D_folder= '../img_upload/product/'.$image_D;

    
    $select_products = $connect->prepare("SELECT * FROM products WHERE name = ?");
    $select_products -> execute([$_POST['name']]);    
    
    if($select_products->rowCount() > 0) {
    flash_alert('Error', 'Product already exist', FLASH_DANGER);
    } 
    else {
        if($image_A_size > 2000000 || $image_B_size > 2000000 || $image_C_size>2000000 || $image_D_size>2000000) {
       flash_alert('Error', 'Image size is too big', FLASH_DANGER);
            
        } 
        else {

        move_uploaded_file($image_A_tmpname, $image_A_folder);
        move_uploaded_file($image_B_tmpname, $image_B_folder);
        move_uploaded_file($image_C_tmpname, $image_C_folder);
        move_uploaded_file($image_D_tmpname, $image_D_folder);
        $query = "INSERT INTO products (name,type,details,price, stock, image_a, image_b, image_c, image_d) VALUES (?, ?, ?, ?, ?, ?, ?, ?,?)";
        $insert_product = $connect->prepare($query);
        $insert_product -> execute([$name, $type, $details, $price, $stock, $image_A, $image_B, $image_C, $image_D]);
        
        flash_alert('Message', 'New Product has successfully been added', FLASH_SUCCESS);
        header("location:product.php");
    }

        
    }
}
?>