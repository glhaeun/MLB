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
    <link rel="stylesheet" href="../admin_component/css/update_product.css">
</head>
        <?php include '../admin_component/php/connect.php';?>
        <?php include '../admin_component/php/flash_alert.php';?>
        <?php include '../admin_component/php/logout.php';
        $query = "SELECT type FROM products WHERE id = ?";
        $get_type = $connect->prepare($query);
        $get_type -> execute([$_GET['update']]);
        $type = $get_type->fetch(PDO::FETCH_ASSOC);
        $type = implode($type);?>

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
<?php flash_alert('Error') ?>

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-center mb-4" style="display: grid;">
        <h1 class="h3 mb-0 text-gray-800">Update Product</h1>
    </div>

    

    <!-- Content Row -->
    <div class="wrapper wrapper--w790">
        <div class="card card-5">
            <div class="card-heading">
                <h2 class="title">Update Product Form</h2>
            </div>
            <div class="card-body">
            <?php
                $update_id = $_GET['update'];
                $query ="SELECT * FROM products where id =? ";
                $show_products = $connect->prepare($query);
                $show_products -> execute([$update_id]);
               
                if ($show_products->rowCount()>0) {
                    
                while($fetch_products = $show_products->fetch(PDO::FETCH_ASSOC)){
                ?>

                <form method="POST" enctype="multipart/form-data">
                <input type="hidden" name="pid" value="<?= $fetch_products['id'];?>">
                <input type="hidden" name="old_imgA" value="<?= $fetch_products['image_a'];?>">
                <input type="hidden" name="old_imgB" value="<?= $fetch_products['image_b']; ?>">
                <input type="hidden" name="old_imgC" value="<?= $fetch_products['image_c']; ?>">
                <input type="hidden" name="old_imgD" value="<?= $fetch_products['image_d']; ?>">

                <div class="img-container">
                <div class="main-img">
                    <img src="../img/<?= $fetch_products['image_a']; ?>" alt="" srcset="" id="MainImg">
                </div>
                <div class="sub-img">
                    <img src="../img/<?= $fetch_products['image_a']; ?>" alt="" srcset="" class="small-img">
                    <img src="../img/<?= $fetch_products['image_b']; ?>" alt="" srcset="" class="small-img">
                    <img src="../img/<?= $fetch_products['image_c']; ?>" alt="" srcset="" class="small-img">
                    <img src="../img/<?= $fetch_products['image_d']; ?>" alt="" srcset="" class="small-img">
                </div>
            </div>
                <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="name">Update Name</label>
                            <input class="input--style-5" type="text" name="name"  placeholder="  product name" maxlength="100" value="<?= $fetch_products['name']; ?>">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="price">Update Price</label>
                            <input class="input--style-5" type="number" name="price"  placeholder="  product price" min="0" max="9999999999" onkeypress="if(this.value.length==10) return false;" value="<?= $fetch_products['price']; ?>">
                        </div>
                </div>
                
                <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="type">Update Type</label>
                            <select id="type" class="form-control" name="type" >
                            <?php 
            $query ="SELECT type FROM category WHERE NOT `type` = 'All'; ";
            $show_category = $connect->prepare($query);
            $show_category -> execute();
            if ($show_category->rowCount()>0) {
                while($fetch_category = $show_category->fetch(PDO::FETCH_ASSOC)){
                    $fetch_category = implode($fetch_category);
                ?>
                <option <?php if ($type == "$fetch_category") echo "selected" ?> value="<?=$fetch_category?>"><?=$fetch_category?></option>
                <?php
            } 
            } 
        ?>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                        <label for="stock">Update Stock</label>
                            <input class="input--style-5" type="number" name="stock"  placeholder="  product stock" min="0" max="9999999999" onkeypress="if(this.value.length==10) return false;" value="<?= $fetch_products['stock']; ?>">
                        </div>
                        
                </div>

                <div class="form-row m-b-55">
                    <div class="form-group col-md-6">
                            <label for="type">Update Image A</label>
                            <input type="file" name="image_a" class="input--style-5"  accept="image/jpg image/jpeg, image/png , image/webp">
                    </div>
                    <div class="form-group col-md-6">
                            <label for="name">Update Image B</label>
                            <input type="file" name="image_b" class="input--style-5"  accept="image/jpg image/jpeg, image/png , image/webp" >
                        </div>
                    </div>
                <div class="form-row m-b-55"> 
                    <div class="form-group col-md-6">
                            <label for="price">Update Image C</label>
                        <input type="file" name="image_c" class="input--style-5"  accept="image/jpg image/jpeg, image/png , image/webp" >
                        </div>
                        <div class="form-group col-md-6">
                            <label for="name">Update Image D</label>
                            <input type="file" name="image_d" class="input--style-5"  accept="image/jpg image/jpeg, image/png , image/webp" >
                    </div>
                    </div>
                    <div class="form-group">
                            <!-- <label for="name">Product Detail</label> -->
                            <span>Update Product Detail</span>
                            <textarea name="details" class="input--style-5" rows="3" placeholder="product details"  maxlength="500"><?= $fetch_products['details']; ?></textarea>
                    </div>
                    <div>
                    <button type="submit" value="update_product" class="btn btn--radius-2 btn--blue" name="update_product">Update</button>
                    <a href="product.php" class="btn btn--radius-2 btn--blue">Cancel</a>
                    </div>
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
    <script src="../admin_component/js/update_product.js"></script>
    <?php include '../admin_component/php/default.php';?>

</body>




</html>