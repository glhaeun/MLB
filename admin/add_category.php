<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Add Category</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.5.0/js/bootstrap.bundle.min.js"></script>

    <!-- Custom styles for this template-->
    <link href="../admin_component/css/adminboots.css" rel="stylesheet">
    <link href="../admin_component/css/style.css" rel="stylesheet">


</head>
<?php include '../admin_component/php/connect.php';?>
        <?php include '../admin_component/php/flash_alert.php';?>
        <?php include '../admin_component/php/logout.php';
        ?>

<body id="page-top">
<?php include '../admin_component/php/script.php';?>

    <!-- Page Wrapper -->
    <div id="wrapper">
    <?php include '../admin_component/php/sidenav.php';?>


<div id="content-wrapper" class="d-flex flex-column">

<!-- Main Content -->
<div id="content">
<?php include '../admin_component/php/top.php';?>

    <!-- Begin Page Content -->
    <div class="container-fluid">
    <?php flash_alert('Message'); ?>

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-center mb-4" style="display: grid;">
            <h1 class="h3 mb-0 text-gray-800">Add Category</h1>
        </div>

        <div class="wrapper wrapper--w790 mb-4">
            <div class="card card-5">
                <div class="card-heading">
                    <h2 class="title">Add Category Form</h2>
                </div>
                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data" class="justify-content-center">
                    <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="categoryheader">Category Name</label>
                                <input class="input--style-5" type="text" name="categoryname" required placeholder="  category name" maxlength="100">
                            </div>
                    </div>
                   <button type="submit" value="add category" name="add_category" class="btn btn--radius-2 btn--blue justify-content-center">Add</button>
                </form>
                </div>
            </div>
        </div>

        <div class="row category-row justify-content-center w-100 ">
        <div class="card shadow mb-4 w-75">
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
                                            <th>Name</th>
                                            <th># of Product</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>


<?php 

    $query ="SELECT * FROM category WHERE NOT `type` = 'All'";
    $select_category =  $connect->prepare($query);
    $select_category -> execute();

    if($select_category->rowCount()>0){
        while ($fetch_category = $select_category ->fetch(PDO::FETCH_ASSOC)){
                        $find = $fetch_category['type'];
                        $query ="SELECT * FROM products WHERE type = '$find'";
                        $get_products = $connect->prepare($query);
                        $get_products -> execute();  
                        $numberofproducts = $get_products ->rowCount();
            ?>
                        <tr>
                            <td class="id"><?=$fetch_category['id']?></td>
                            <td><?=$fetch_category['type']?></td>
                            <td><?=$numberofproducts?></td>
                            <td class="action"><a href="" class="delete-btn" data-toggle="modal" data-target="#deleteModal"><i class="fa-solid fa-trash"></i></a></td>


                    </tr>
            
            <?php
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

    <?php include '../admin_component/php/footer.php';?>

</div>
<!-- End of Main Content -->


</div>
<!-- End of Content Wrapper -->
<script src="../admin_component/js/category.js"></script>

</div>
<?php include '../admin_component/php/default.php';?>
</body>




</html>
