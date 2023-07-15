<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <!-- <link href="../admin_component/css/style.css" rel="stylesheet"> -->

    <link href="../admin_component/css/adminboots.css" rel="stylesheet">
    <link rel="stylesheet" href="../admin_component/css/custom/add_candidate.css">

</head>
<?php include '../admin_component/php/connect.php';?>
<?php include '../admin_component/php/flash_alert.php' ?>
<?php include '../admin_component/php/logout.php' ?>

<body id="page-top">
<?php include '../admin_component/php/script.php';?>

    <!-- Page Wrapper -->
    <div id="wrapper">
    <?php include '../admin_component/php/sidenav.php';?>


<div id="content-wrapper" class="d-flex flex-column">

<!-- Main Content -->
<div id="content">
<?php include '../admin_component/php/topbar.php';?>


    <!-- Begin Page Content -->
    <div class="container-fluid">
    <?php flash_alert('Message')?>



        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4" style="display: grid;">
            <h1 class="h3 mb-0 text-gray-800">Candidate List</h1>
        </div>
        <!-- Content Row -->
        
        <div class="row justify-content-center">
        <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">
                                <a href="add_candidate.php"><input type="button" value="Add Candidate" class="btn btn-primary"></a>
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
                        <td><img style="max-width: 100px;" src="../img/<?=$fetch_product['image_a']?>" alt=""></td>
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
        


    </div>
    <!-- /.container-fluid -->


</div>
<!-- End of Main Content -->


<?php include '../admin_component/php/footer.php';?>

</div>
<!-- End of Content Wrapper -->

</div>
<?php include '../admin_component/php/default.php';?>

</body>
</html>

<style>
    td img{
        max-width: 100px;
        max-height: 100px;
    }
</style>