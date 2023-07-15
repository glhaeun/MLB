<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MLB</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="stylesheet" href="../component/css/cart.css" text="text/css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
</head>

<?php include '../component/php/connect.php';

?>

<body>
    <?php include '../component/php/nav.php';
    include '../component/php/script.php'; ?>


    <!-- <div class="circle" id="circle1"> -->
    <div class="circle" id="circle2">

    <?php include '../component/php/cart_table.php'; ?>

    <?php
        if(isset($_SESSION['user_id'])){
            ?>
    <?php include '../component/php/cart_total.php'; ?>
            <?php
        }
    ?>

    <?php include '../component/php/footer.php'; ?>
    <script src="../component/js/cart.js"></script>
</body>
</html>