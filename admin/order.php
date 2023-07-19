<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Orders</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.5.0/js/bootstrap.bundle.min.js"></script>


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
    <?php include '../admin_component/php/lib/order/delete.php';?>

<!-- Page Wrapper -->
<div id="wrapper">
<?php include '../admin_component/php/sidenav.php';?>

<div id="content-wrapper" class="d-flex flex-column">

<!-- Main Content -->
<div id="content">
<?php include '../admin_component/php/top.php';?>

<!-- Begin Page Content -->
<div class="container-fluid justify-content-between">
<?php flash_alert('Message') ?>
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4" style="display: grid;">
        <h1 class="h3 mb-0 text-gray-800">Order List</h1>
    </div>

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
                                        <th>Placed On</th>
                                        <th>Customer Name</th>
                                        <th>Phone #</th>
                                        <th>Address</th>
                                        <th>Qty</th>
                                        <th>Orders</th>
                                        <th>Total</th>
                                        <th>Payment Method</th>
                                        <th>Payment Status</th>
                                        <th>Delivery</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>

<?php

            $query ="SELECT * FROM orders ";
            $select_orders =  $connect->prepare($query);
            $select_orders -> execute();
           
            $index = 1;
            if($select_orders->rowCount()>0){
                while ($fetch_orders = $select_orders ->fetch(PDO::FETCH_ASSOC)){
                    ?>
                    <tr>
                        <td><?=$index?></td>
                        <td class="id" style="display: none;"><?=$fetch_orders['order_id']?></th>
                        <td><?=$fetch_orders['placed_on']?></td>
                        <td><?=$fetch_orders['customer_name']?></td>
                        <td><?=$fetch_orders['number']?></td>
                        <td><?=$fetch_orders['address']?></td>
                        <td><?=$fetch_orders['total_products']?></td>
                        <td><?=$fetch_orders['details']?></td>
                        <td><?=rupiah($fetch_orders['total_price'])?></td>
                        <td><?=$fetch_orders['method']?></td>
                        <td><?=$fetch_orders['payment_status']?></td>
                        <td><?=$fetch_orders['delivery_status']?></td>   
                        <td><a href="update_order.php?update_order=<?=$fetch_orders['order_id']?>"><i class="fa-solid fa-pen-to-square"></i></a><a href="" class="delete-btn" data-toggle="modal" data-target="#deleteModal"><i class="fa-solid fa-trash"></i></a></td>
                </tr>
                    <?php
                    $index++;
                }
            } else {
                echo '<p class="empty">No orders yet!';
            }
        ?>

                                
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>



</div>
<!-- /.container-fluid -->

<!-- Delete Modal -->
<?php include '../admin_component/php/delete_modal.php';?>


<!-- /.container-fluid -->


</div>
<!-- End of Main Content -->

<?php include '../admin_component/php/footer.php';?>

</div>
<!-- End of Content Wrapper -->

</div>


<script>
// Retrieve admin ID when delete button is clicked
$('.delete-btn').click(function() {
    var orderId = $(this).closest('tr').find('.id').text();
    $('#confirmDelete').attr('data-orderid', orderId);
});

// Handle delete confirmation
$('#confirmDelete').click(function() {
    var orderId = $(this).attr('data-orderid');
    window.location.href = 'order.php?delete_order=' + orderId;
    // Close the modal
    $('#deleteModal').modal('hide');
});
</script>
<?php include '../admin_component/php/default.php';?>

</body>




</html> 