<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MLB</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="stylesheet" href="../component/css/shopp.css" text="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    
</head>

<?php include '../component/php/connect.php'; ?>
<body>
    <?php include '../component/php/nav.php';
    include '../component/php/product.php';
    include '../component/php/script.php'; 
?>
    
    <?php
            $num_per_page = 12;
            $query = "SELECT * FROM others ";
            $show_content = $connect->prepare($query);
            $show_content -> execute();
            $fetch_content = $show_content->fetch(PDO::FETCH_ASSOC);            
        ?>

    <section id="page-header" style="background-image: url(../img_upload/page/others/<?= $fetch_content['bannerproduct'] ?>);">
        <h2 style="text-shadow: 0 0 5px #000123;"><?=$fetch_content['keyword']?></h2>
    </section>


    <section id="product" class="section-p1">
        <h2><?= $type?> (<?=$productnumber?>)</h2>
        <p></p>
        <div class="wrapper">
            <div id="search-container">
                <form action="" method="post">
                <input type="search" placeholder="Search product here..." id="searchbox" name="searchingfor">
                <input type="submit" value="search" id="searchbtn" name="search">
                </form>
            </div>
        </div>
        <div id="buttons">
            <a href="shop.php?type="></a>
            <?php 
                $query ="SELECT type FROM category";
                $show_products = $connect->prepare($query);
                $show_products -> execute();
                if ($show_products->rowCount()>0) {
                    while($fetch_products = $show_products->fetch(PDO::FETCH_ASSOC)){
                    ?>
                    <a  class="buttons" href="shop.php?type=<?=implode($fetch_products)?>"><?=implode($fetch_products)?></a>
                    <?php
                } 
                } else {
                    echo '<p class="empty">No Category Added Yet!</p>
                    ';
                }
            ?>
        </div>

        <div class="pro-container">
        <?php
            if ($type == "All"){
                $query ="SELECT * FROM products limit $start_from,$num_per_page";
                $show_products = $connect->prepare($query);
                $show_products -> execute();
            }
            else{
                $query ="SELECT * FROM products WHERE type = ? limit $start_from,$num_per_page";
                $show_products = $connect->prepare($query);
                $show_products -> execute([$type]);
            }

            if (!empty($search)){
                $query ="SELECT * FROM products WHERE name LIKE '%$search%' limit $start_from,$num_per_page";
                $show_products = $connect->prepare($query);
                $show_products -> execute();
            }

            if ($show_products->rowCount()>0) {
                while($fetch_products = $show_products->fetch(PDO::FETCH_ASSOC)){
                ?>
                 
                 <div class="pro">
                 <a class="nextpage-a" href="detail.php?nextpage=<?=$fetch_products['id']?>">
                     <div class="img__container">
                         <img src="../img_upload/product/<?= $fetch_products['image_a'];?>" alt="product">
                     </div>
                     <div class="des">
                         <h5><?= $fetch_products['name'];?></h5>
                         <h4><?=rupiah($fetch_products['price'])?></h4>
                        
                         <?php if ($fetch_products['stock'] == 0){

                          ?>
                            <div class="sold-out-banner">Sold Out</div>
                        <?php } else{ ?>
                            <a class="add-cart cart" href="shop.php?pid=<?= $fetch_products['id'] ?>"><i class="fas fa-shopping-cart" style="margin-top: 10px; margin-left: 10px;"></i></a>
                        <?php } ?>                     
                    </div>
                    </a>
                </div>
             <?php
                } 
            } else {
                echo '<p class="empty">No Products Added Yet!</p>
                ';
            }
            ?>
        </div>
    </section>

    <?php include '../component/php/pagination.php'; ?>


    <?php include '../component/php/footer.php'; ?>


    
</body>
</html>