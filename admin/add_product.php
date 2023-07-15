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
</head>
<?php include '../admin_component/php/connect.php';?>
        <?php include '../admin_component/php/flash_alert.php';?>
        <?php include '../admin_component/php/logout.php';?>


<body id="page-top">
<?php include '../admin_component/php/script.php';
?>

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
            <h1 class="h3 mb-0 text-gray-800">Add Product</h1>
        </div>

        <!-- Content Row -->
        <div class="wrapper wrapper--w790">
            <div class="card card-5">
                <div class="card-heading">
                    <h2 class="title">Add Product Form</h2>
                </div>
                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data">
                    <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="name">Name</label>
                                <input class="input--style-5" type="text" name="name" required placeholder="  product name" maxlength="100">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="price">Price</label>
                                <input class="input--style-5" type="number" name="price" required placeholder="  product price" min="0" max="9999999999" onkeypress="if(this.value.length==10) return false;">
                            </div>
                    </div>
                    
                    <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="type">Type</label>
                                <select id="type" class="form-control" name="type" required>
                                <?php 
                $query ="SELECT type FROM category WHERE NOT `type` = 'All'; ";
                $show_category = $connect->prepare($query);
                $show_category -> execute();
                if ($show_category->rowCount()>0) {
                    while($fetch_category = $show_category->fetch(PDO::FETCH_ASSOC)){
                        $fetch_category = implode($fetch_category);
                    ?>
                    <option value="<?=$fetch_category?>"><?=$fetch_category?></option>
                    <?php
                } 
                } 
            ?>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="stock">Stock</label>
                                <input class="input--style-5" type="number" name="stock" required placeholder="  product stock" min="1" max="9999999999" onkeypress="if(this.value.length==10) return false;">
                            </div>
                            
                    </div>

                    <div class="form-row m-b-55">
                        <div class="form-group col-md-6">
                                <label for="type">Image A</label>
                                <input type="file" name="image_a" class="input--style-5" required accept="image/jpg image/jpeg, image/png , image/webp" >
                        </div>
                        <div class="form-group col-md-6">
                                <label for="name">Image B</label>
                                <input type="file" name="image_b" class="input--style-5" required accept="image/jpg image/jpeg, image/png , image/webp" >
                            </div>
                        
                        </div> 
                    <div class="form-row m-b-55">
                        <div class="form-group col-md-6">
                            <label for="price">Image C</label>
                            <input type="file" name="image_c" class="input--style-5" required accept="image/jpg image/jpeg, image/png , image/webp" >
                        </div>
                        <div class="form-group col-md-6">
                                <label for="name">Image D</label>
                                <input type="file" name="image_d" class="input--style-5" required accept="image/jpg image/jpeg, image/png , image/webp" >
                        </div>
                        </div>
                        <div class="form-group">
                                <span>Product Detail</span>
                                <textarea style="width: 100%;" name="details" class="input--style-5" rows="3" placeholder="product details" required maxlength="500"></textarea>
                        </div>
                        <div>
                            <button type="submit" value="add product" name="add_product" class="btn btn--radius-2 btn--blue">Add</button>
                        </div>
                    </form>
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