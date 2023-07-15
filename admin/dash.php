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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>

    <!-- Custom styles for this template-->
    <link href="../admin_component/css/adminboots.css" rel="stylesheet">


</head>
<?php include '../admin_component/php/connect.php';?>
<?php include '../admin_component/php/flash_popup.php';?>
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


        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4" style="display: grid;">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        </div>
        <!-- <?php
            $query ="SELECT name2 FROM admins WHERE id = ?";
            $show_admin = $connect->prepare($query);
            $show_admin -> execute([$admin_id]);
            $fetch_admin = $show_admin->fetch(PDO::FETCH_ASSOC);
            ?>
            <?= $fetch_admin['name2']; ?>
         -->

        <div class="d-sm-flex align-items-center justify-content-center mb-4" style="display: grid;">
            <h1 class="h5 mb-0 text-gray-800">Hello, <?=$admin_name?>! <i class="fas fa-smile-wink"></i></h1>
        </div>

        <!-- Content Row -->
        <div class="row">

            
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                <?php
                                    $total_category = 0;
                                    $select_category = $connect->prepare("SELECT * FROM category ");
                                    $select_category -> execute();
                                    $number_of_category = $select_category -> rowCount();
                                ?>
                                    Product Types</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $number_of_category ?></div>
                            </div>
                            <div class="col-auto">
                            <i class="fas fa-th-list fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                <?php
                                    $select_products = 0;
                                    $select_products = $connect->prepare("SELECT * FROM products ");
                                    $select_products -> execute();
                                    $number_of_products = $select_products -> rowCount();
                                ?>
                                    Total Products</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$number_of_products;?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-shopping-cart fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Customer Accounts
                                <?php
                                    $select_users = $connect->prepare("SELECT * FROM users ");
                                    $select_users -> execute();
                                    $number_of_users = $select_users -> rowCount();
                                ?>
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$number_of_users;?>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-user fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>            

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                            <?php
                                    $select_admins = $connect->prepare("SELECT * FROM admins ");
                                    $select_admins -> execute();
                                    $number_of_admins = $select_admins -> rowCount();
                                ?>
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Admins Accounts</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$number_of_admins;?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-users fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                            <?php
                                    $select_orders = $connect->prepare("SELECT * FROM orders ");
                                    $select_orders -> execute();
                                    $number_of_orders = $select_orders -> rowCount();
                                ?>
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Total Orders</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$number_of_orders;?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-shopping-bag fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                            <?php
                                    $select_orders = $connect->prepare("SELECT * FROM orders WHERE payment_status ='pending'");
                                    $select_orders -> execute();
                                    $number_of_orders = $select_orders -> rowCount();
                                ?>
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Pending Orders</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$number_of_orders;?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-clock fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                            <?php
                                    $select_orders = $connect->prepare("SELECT * FROM orders WHERE payment_status ='completed'");
                                    $select_orders -> execute();
                                    $number_of_orders = $select_orders -> rowCount();
                                ?>
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Completed Orders</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$number_of_orders;?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-money-bill-trend-up fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                            <?php
                                    $select_orders = $connect->prepare("SELECT * FROM orders WHERE payment_status ='completed'");
                                    $select_orders -> execute();
                                    $total_income = 0;
                                    if($select_orders->rowCount()>0){
                                        while($fetch_orders = $select_orders->fetch(PDO::FETCH_ASSOC)){
                                            $total_income += $fetch_orders['total_price'];
                                        }
                                    }
                                ?>
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Total Income (Completed)</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?=rupiah($total_income);?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-money-bill fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php flash_popup('Message');?>

    </div>
    <!-- /.container-fluid -->



</div>

<!-- End of Main Content -->


<?php include '../admin_component/php/footer.php';?>

</div>
<!-- End of Content Wrapper -->

</div>

<?php include '../admin_component/php/default.php';        ?>
</body>






</html>