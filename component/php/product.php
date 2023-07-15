<?php
    $num_per_page = 12;








    if (isset($_GET['page'])){
        $page = $_GET['page'];
    } else {
        $page = 1;
    }
    
    if(isset($_GET['type'])){
        $type = $_GET['type'];
    } else {
        $type = "All";
    }
    
    if ($type == "All"){
        $totalproducts = $connect->prepare("SELECT * FROM products");
        $totalproducts -> execute();
        $productnumber =  $result = $totalproducts -> rowCount();
        $page = (int)$page;
        $start_from = ($page-1)*12;
    } else {
    $totalproducts = $connect->prepare("SELECT * FROM products WHERE type = ?");
    $totalproducts -> execute([$type]);
    $productnumber = $result = $totalproducts -> rowCount();
    $page = (int)$page;
    $start_from = ($page-1)*12;
    }
    
    if(isset($_POST['search'])){
        $search = $_POST['searchingfor'];
        $type = "Search Results";
        $totalproducts = $connect->prepare("SELECT * FROM products WHERE name LIKE '%$search%'");
        $totalproducts -> execute();
        $productnumber = $result = $totalproducts -> rowCount();
    } else {
        $search = "";
    }
?>