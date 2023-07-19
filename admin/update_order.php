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
<?php include '../admin_component/php/rupiah.php';?>
    <?php include '../admin_component/php/lib/order/update.php';?>

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
        <h1 class="h3 mb-0 text-gray-800">Update Order</h1>
    </div>

    

    <!-- Content Row -->
    <div class="wrapper wrapper--w790">
        <div class="card card-5">
            <div class="card-heading">
                <h2 class="title">Update Orders Form</h2>
            </div>
            <div class="card-body">
            <?php
$update_id = $_GET['update_order'];
$query ="SELECT * FROM orders where order_id =? ";
$show_order = $connect->prepare($query);
$show_order -> execute([$update_id]);

if ($show_order->rowCount()>0) {
while($fetch_order = $show_order->fetch(PDO::FETCH_ASSOC)){
?>

                <form method="POST">
                <div class="form-row">
                <input type="hidden" name="oid" value="<?= $fetch_order['order_id'];?>">
                        <div class="form-group col-md-6">
                            <label for="id">Order ID</label>
                            <input class="input--style-5" type="text" name="order_id"  placeholder="  order id" maxlength="100" value="<?= $fetch_order['order_id']; ?> " disabled>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="price">Total Price</label>
                            <input class="input--style-5" type="text" name="price"  placeholder="  product name" maxlength="100" value="<?= $fetch_order['total_price']; ?>" disabled>
                        </div>
                </div>
                <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="method">Payment Method</label>
                            <select id="payment-method" name="payment-method" class="form-control" required>
                            <option <?php if ("OVO" == trim($fetch_order['method'])) echo "selected" ?> value="OVO">OVO</option>
                            <option <?php if ("COD" == trim($fetch_order['method'])) echo "selected" ?>  value="COD">Cash On Delivery</option>
                            <option <?php if ("Dana" == trim($fetch_order['method'])) echo "selected" ?>  value="Dana">Dana</option>
                            <option <?php if ("BCA" == trim($fetch_order['method'])) echo "selected" ?>  value="BCA">BCA Virtual Account</option>
                            </select>                            </div>
                        <div class="form-group col-md-6">
                                <label for="status">Payment Status</label>
                                    <select id="payment-status" name="payment-status" class="form-control" required>
                                    <option <?php if ("Completed" == trim($fetch_order['payment_status'])) echo "selected" ?> value="Completed">Completed</option>
                                    <option <?php if ("Pending" == trim($fetch_order['payment_status'])) echo "selected" ?>  value="Pending">Pending</option>
                                    </select>   
                         </div>
                </div>
                <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="method">Delivery Status</label>
                            <select id="delivery-status" name="delivery-status" class="form-control" required>
                            <option <?php if ("Preparing order" == trim($fetch_order['delivery_status'])) echo "selected" ?> value="Preparing order">Preparing order</option>
                            <option <?php if ("Delivering to customer" == trim($fetch_order['delivery_status'])) echo "selected" ?>  value="Delivering to customer">Delivering to customer</option>
                            <option <?php if ("Received" == trim($fetch_order['delivery_status'])) echo "selected" ?>  value="Received">Received</option>
                            </select>                            </div>
                </div>
                    <button type="submit" value="update_order" class="btn btn--radius-2 btn--blue" name="update_order">Update</button>
                    <a href="order.php" class="btn btn--radius-2 btn--blue">Cancel</a>
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