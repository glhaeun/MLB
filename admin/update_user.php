<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Update Products</title>

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
    <link href="../admin_component/css/style.css" rel="stylesheet">

    </head>
    <?php include '../admin_component/php/connect.php';?>
    <?php include '../admin_component/php/flash_alert.php';?>

    

<body id="page-top">
<?php include '../admin_component/php/logout.php';?>
<?php include '../admin_component/php/lib/user/update.php';?>


    <!-- Page Wrapper -->
    <div id="wrapper">
    <?php include '../admin_component/php/sidenav.php';?>


<div id="content-wrapper" class="d-flex flex-column">

<!-- Main Content -->
<div id="content">
<?php include '../admin_component/php/top.php';?>

    
    <!-- Begin Page Content -->
    <div class="container-fluid">
    <?php flash_alert('Error')?>

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-center mb-4" style="display: grid;">
            <h1 class="h3 mb-0 text-gray-800">Update Product</h1>
        </div>

        

        <!-- Content Row -->
        <div class="wrapper wrapper--w790">
            <div class="card card-5">
                <div class="card-heading">
                    <h2 class="title">Update Users Form</h2>
                </div>
                <div class="card-body">
                <?php
    $update_id = $_GET['update'];
    $query ="SELECT * FROM users where id =? ";
    $show_user = $connect->prepare($query);
    $show_user -> execute([$update_id]);
            
    if ($show_user->rowCount()>0) {
    while($fetch_user = $show_user->fetch(PDO::FETCH_ASSOC)){
?>

                    <form method="POST">
                    <div class="form-row">
                    <input type="hidden" name="uid" value="<?= $fetch_user['id'];?>">
                            <div class="form-group col-md-6">
                                <label for="name">Update Name</label>
                                <input class="input--style-5" type="text" name="name"  placeholder="  product name" maxlength="100" value="<?= $fetch_user['name']; ?>">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="email">Update Email</label>
                                <input disabled class="input--style-5" type="text" name="email"  placeholder="  product name" maxlength="100" value="<?= $fetch_user['email']; ?>">
                            </div>
                    </div>
                    <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="number">Update Phone No.</label>
                                <input disabled  class="input--style-5" type="text" name="number"  placeholder="  product name" maxlength="100" value="<?= $fetch_user['number']; ?>">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="dob">Update DOB</label>
                                <input class="input--style-5" type="date" name="dob"  placeholder="  product name" maxlength="100" value="<?= $fetch_user['dob']; ?>">
                            </div>
                    </div>
                    <div class="form-row">
                                <label for="address">Update Address</label>
                                <input class="input--style-5" type="text" name="address"  placeholder="  product name" maxlength="100" value="<?= $fetch_user['address']; ?>">
                    </div>
                    
                        <button type="submit" value="update_product" class="btn btn--radius-2 btn--blue" name="update_user">Update</button>
                        <a href="user.php" class="btn btn--radius-2 btn--blue">Cancel</a>
                    </form>
                    <?php
    } 
    } else {
        echo '<p class="empty">No Products To Be Updated</p>
                ';
    }
    ?>
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