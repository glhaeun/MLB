<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Products</title>

    <!-- Custom fonts for this template-->
    
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.5.0/js/bootstrap.bundle.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.5.0/js/bootstrap.bundle.min.js"></script>
    <!-- Custom styles for this template-->
    <link href="../admin_component/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../admin_component/css/adminboots.css">
    

</head>
    <?php include '../admin_component/php/connect.php';?>
    <?php include '../admin_component/php/flash_alert.php';?>
<?php include '../admin_component/php/default.php';?>





<style>
    .btn{
        line-height: 20px;
    }
</style>

<body id="page-top">
<?php include '../admin_component/php/logout.php';?>
<?php include '../admin_component/php/rupiah.php';?>
<?php include '../admin_component/php/lib/product/delete.php';?>


    <!-- Page Wrapper -->
    <div id="wrapper">
    <?php include '../admin_component/php/sidenav.php';?>


<div id="content-wrapper" class="d-flex flex-column">

<!-- Main Content -->
<div id="content">
<?php include '../admin_component/php/top.php';?>

    
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <?php flash_alert('Message') ?>
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between" style="display: grid;">
            <h1 class="h3 mb-0 text-gray-800">Product List</h1>
        </div>


        <?php
            $query ="SELECT * FROM products";
            $show_products = $connect->prepare($query);
            $show_products -> execute();
            $count = $show_products->rowCount();
        ?>
            
        <ul class="details">
        <li>Current Items: <?= $count?></li>
            <li class="inline"> <a href="add_product.php" class="smallbutton"><i class="fa-solid fa-plus"></i> Product</a></li>
            <li class="inline"> <a href="add_category.php" class="smallbutton"><i class="fa-solid fa-plus"></i> Category</a></li>
        </ul>

        <!-- Content Row -->
        <div class="row category-row">
        <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">
                            </h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th style="display: none;">ID</th>
                                            <th>Foto Produk</th>
                                            <th>Nama</th>
                                            <th>Harga</th>
                                            <th>Kategori</th>
                                            <th>Stok</th>
                                            <th>Deskripsi</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>


<?php 

    $query ="SELECT * FROM products";
    $get_product =  $connect->prepare($query);
    $get_product -> execute();

    $index = 1;
    if($get_product->rowCount()>0){
        while ($fetch_product = $get_product ->fetch(PDO::FETCH_ASSOC)){
            ?>
                        <tr>
                            <td><?=$index?></td>
                            <td style="display: none;" class="id"><?=$fetch_product['id']?></td>
                            <td><img style="max-width: 100px;" src="../img_upload/product/<?=$fetch_product['image_a']?>" alt=""></td>
                            <td><?=$fetch_product['name']?></td>
                            <td><?=$fetch_product['price']?></td>
                            <td><?=$fetch_product['type']?></td>
                            <td><?=$fetch_product['stock']?></td>
                            <td><?=$fetch_product['details']?></td>
                            <td class="action"><a href="update_product.php?update=<?=$fetch_product['id']?>"><i class="fa-solid fa-pen-to-square"></i></a><a href="" class="delete-btn" data-toggle="modal" data-target="#deleteModal"><i class="fa-solid fa-trash"></i></a></td>

                    </tr>
            
            <?php
            $index++;
        }
    }
                                    
?>                               
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>

    </div>
    <?php include '../admin_component/php/delete_modal.php';?> 
    </div>
    <!-- /.container-fluid -->


</div>
<!-- End of Main Content -->

</div>
<!-- End of Content Wrapper -->

<?php include '../admin_component/php/footer.php';?>

</div>
    <script src="../admin_component/js/product.js"></script>

</body>




</html>