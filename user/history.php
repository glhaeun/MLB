<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MLB</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="stylesheet" href="../component/css/history.css" text="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" type="text/css">
    <link href="../admin_component/css/adminboots.css" rel="stylesheet">
</head>

<?php include '../component/php/connect.php'; 
    include '../component/php/user_only.php';     ?>

<body>
    <?php include '../component/php/nav.php';?>
    <?php include '../component/php/script.php'; 
    ?>
    

    <section class="content-wrapper section-p2">
    <?php include '../component/php/sidenav.php'; ?>
    <div class="history-information">
          <h3>Customer History</h3>
          <h6>Anda dapat melihat riwayat pembelian Anda di toko retail dan toko online.</h6>
          <h6>Riwayat pembelian tidak menunjukkan barang yang dikembalikan atau ditukar.</h6>
          <div class="history-information__container ">
            <div class="row">
                <?php
                $user_id = $_SESSION['user_id'];
                $query = "SELECT * FROM orders WHERE customer_id = $user_id ORDER BY orders.placed_on DESC ";
                $get_order = $connect->prepare($query);
                $get_order -> execute();
                $orders=$get_order->rowCount();

                ?>
                <h4 class="section-m2"><?=$orders?> items</h4>
                <?php 
                    
                    if($get_order->rowCount()>0){
                        
                        while ($fetch_order = $get_order ->fetch(PDO::FETCH_ASSOC)){
                            $invoice = "F-".str_pad($fetch_order['order_id'], 7, "0", STR_PAD_LEFT);
                            ?>
                                <div class="history-information history-indiv">
                                    <p style="color:black">Invoice No. <?=$invoice?></p>
                                    <p style="color:black">Date Ordered: <?=$fetch_order['placed_on']?></p>
                                    <p style="color:black">Total Price: <?=rupiah($fetch_order['total_price'])?></p>
                                    <p style="color:black">Payment Method: <?=$fetch_order['method']?></p>
                                    <p style="color:black">Payment Status: <?=$fetch_order['payment_status']?></p>
                                    

                        <?php
                            if($fetch_order['total_products'] > 0) {
                                $perpc_order =  explode (";", $fetch_order['details']); 
                                $remove = array_pop($perpc_order);
                                ?><div class="wrapper"><?php
                                foreach($perpc_order as $value) {
                                    $items =  substr($value, 0, strpos($value, ":"));
                                    $qty = $value;
                                    $qty = substr($qty, strpos($qty, "-") + 1);  
                                    

                                    $query = "SELECT * FROM products WHERE id = $items";
                                    $get_product = $connect->prepare($query);
                                    $get_product -> execute();
                                        
                                        if( $get_product -> rowCount()){
                                        while($fetch_product = $get_product -> fetch(PDO::FETCH_ASSOC)){
                                            ?>
                                            
                                        <img class="image" src="../img/<?=$fetch_product['image_a']?>">
                                        <div class="information">
                                            <p><?=$fetch_product['name']?></p>
                                            <p>Qty: <?=$qty?></p>
                                        </div>
                                        <?php
                                        }
                                    
                                    }

                                }                                  
                            }?>
                             </div></div>
                             <?php
                           
                        } 
                    }
                        else {
                            echo '<div class="wrapper" style="border-bottom: none;"><p class="empty">No Orders Made Yet!</p></div>';
                        }
                                                    
                        ?>
            </div>
                  </div>
                </div>
    </section>
</body>
</html>