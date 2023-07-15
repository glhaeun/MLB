
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
    <!-- Custom styles for this template-->
    <link href="../admin_component/css/adminboots.css" rel="stylesheet">
    <link href="../admin_component/css/style.css" rel="stylesheet">

    <style>
        textarea { width: 100%; }
    </style>

</head>
<?php include '../admin_component/php/connect.php';?>
<?php include '../admin_component/php/flash_popup.php';?>
<?php include '../admin_component/php/logout.php';
$query = "SELECT * FROM others";
$show_content = $connect->prepare($query);
$show_content -> execute();
$fetch_content = $show_content->fetch(PDO::FETCH_ASSOC);
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
    <div class="d-sm-flex align-items-center justify-content-center mb-4" style="display: grid;">
        <h1 class="h3 mb-0 text-gray-800">Website Editor</h1>
    </div>

    <!-- Content Row -->
    <div class="wrapper wrapper--w790">
        <div class="card card-5">
            <div class="card-heading">
                <h2 class="title">Product, Product Detail, Login Page</h2>
            </div>
            <div class="card-body">
            <?php
    
    $keyword_initial = $fetch_content['keyword'];
    $bannerdetail_initial = $fetch_content['bannerdetail'];
    $keyworddetail_initial = $fetch_content['keyworddetail'];
    $wordsdetail_initial = $fetch_content['wordsdetail'];
    ?>
                <form method="POST" enctype="multipart/form-data">
                <div class="form-row">
                <h2  style="color:black;">Product Page</h2>
                </div>
                <div class="form-row">

                        <div class="form-group col-md-6">
                            <label for="name">Banner Picture</label>
                            <input type="file" name="bannerproduct" class="input--style-5" accept="image/jpg image/jpeg, image/png , image/webp" >
                        </div>
                        <div class="form-group col-md-6">
                            <label for="price">Keyword</label>
                            <input type="text" name="keywordproduct" class="input--style-5"  value="<?=$fetch_content['keyword']?>">
                        </div>
                </div>

                <div class="form-row mb-6">
                <h2 class="" style="color:black;">Product Detail Page</h2>
                </div>
                <div class="form-row" style="margin-bottom:0px;">
                        <div class="form-group col-md-6">
                            <label for="name">Banner Picture</label>
                            <input type="file" name="bannerdetail" class="input--style-5" accept="image/jpg image/jpeg, image/png , image/webp" >
                        </div>
                        <div class="form-group col-md-6">
                            <label for="price">Keyword</label>
                            <input type="text" name="keyworddetail" class="input--style-5"  value="<?=$fetch_content['keyworddetail']?>">
                        </div>
                </div>
                <div class="form-row">
                            <label for="title">Description</label>
                            <input type="text" name="descriptiondetail" class="input--style-5"  value="<?=$fetch_content['wordsdetail']?>">
                </div> 


                <div class="form-row mb-6">
                <h2  style="color:black;">Login Page</h2>
                </div>
                <div class="form-row">
                            <label for="title">Login Banner Picture</label>
                            <input type="file" name="bannerlogin" class="input--style-5" accept="image/jpg image/jpeg, image/png , image/webp" >
                </div>    
                <div class="mt-6 d-flex justify-content-center">           
                <button type="submit" value="SUBMIT" name="submit_others" class="btn btn--radius-2 btn--blue justify-content-center">Update</button>
                </div>
                </form>
            </div>
        </div>
</div>
<?php include '../admin_component/php/footer.php';?>

</div>
<?php flash_popup('Message');?>

<!-- /.container-fluid -->
</div>
</div>
<!-- End of Main Content -->


</div>

<!-- End of Content Wrapper -->

</div>
<?php include '../admin_component/php/default.php';?>


</body>




</html>