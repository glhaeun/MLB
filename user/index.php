

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MLB</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="stylesheet" href="../component/css/index.css" text="text/css">
    <link rel="stylesheet" href="login.css" text="text/css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

    <style>
        .viewdetails {
    color: white;
    margin-top: 125px;
    margin-left: 90px;
    border: solid 1px white;
    
        }
        a.nextpage-a{
            text-decoration: none;
        }
</style>
</head>

<?php
include '../component/php/connect.php';

?>

<body>
    <?php include '../component/php/nav.php';
    include '../component/php/script.php'; ?>
    
    <?php
            $query = "SELECT * FROM landingpage WHERE id = 1";
            $show_content = $connect->prepare($query);
            $show_content -> execute();
            $fetch_content = $show_content->fetch(PDO::FETCH_ASSOC);         
        ?>

        <section id="bannertop" style="background-image: url(../img/<?= $fetch_content['banner'] ?>);">

    <div class="content">
        <div class="textBox">
            <h2><?= $fetch_content['title']; ?></h2>
            <?= $fetch_content['description'];; ?>
            <a href="shop.php"><?= $fetch_content['keyword'];; ?></a>
        </div>

        <div class="imgBox">
            <img src="../img_upload/page/home/<?=$fetch_content['thumbA'];?>" class="caps">
        </div>
    </div>

    <ul class="thumb">
        <li><img src="../img_upload/page/home/<?= $fetch_content['thumbA']; ?>" alt="" srcset=""
 onclick="imgSlider('<?=$fetch_content['thumbA'];?>')"></li>
        <li><img src="../img_upload/page/home/<?= $fetch_content['thumbB']; ?>" alt="" srcset=""
        onclick="imgSlider('<?=$fetch_content['thumbB'];?>')"></li>
        <li><img src="../img_upload/page/home/<?= $fetch_content['thumbC']; ?>" alt="" srcset=""
        onclick="imgSlider('<?=$fetch_content['thumbC'];?>')"></li>
    </ul>
    
    </section>


    <?php
        if($fetch_content['new_release'] == 'show'){
            ?>
                <section class="section-p1"></section>
            <section class="section-m1" id="product-home">
    <h2>New Release</h2>
        <div class="product-container">
        <?php
            $query ="SELECT * FROM (SELECT * FROM products ORDER BY id DESC LIMIT 10 )VAR1 ORDER BY id ASC;";
            $show_new_items = $connect->prepare($query);
            $show_new_items -> execute();

            if ($show_new_items->rowCount()>0) {
                while($fetch_new_items = $show_new_items->fetch(PDO::FETCH_ASSOC)){
                ?>
                 <a class="nextpage-a" href="detail.php?nextpage=<?=$fetch_new_items['id']?>">
                 <div class="slipper-wrapper slipper">
                    <img src="../img_upload/product/<?=$fetch_new_items['image_a']?>" alt="img">
                    <div class="slipper-info">
                        <p style="color:black; " class="slippername"><?=$fetch_new_items['name']?></p>
                        <p class="price"><?=rupiah($fetch_new_items['price'])?></p>
                    </div>
                </div>
                </a>
             <?php
                } 
            } else {
                echo '<p class="empty">No New Items Yet!</p>
                ';
            }
            ?>
                    </div>
                </div>
        </div>
    </section>
            <?php
        }
    ?>

<section class="section-p1"></section>

<section id="stylingbanner" class="section-p1">
    <h2>MLB STYLING</h2>
    <div class="styling-container">
        <div class="item" id="style1" style="background-image: url(../img_upload/page/home/<?= $fetch_content['sg1'] ?>);">
            <div class="styleoverlay" style="height: 100%; width:100%; background: black; opacity: .5;top:0;left: 0;">
                <button type="button" class="viewdetails">View Details</button>
            </div>
        </div>
        <div class="item" id="style2" style="background-image: url(../img_upload/page/home/<?= $fetch_content['sg2'] ?>);">
            <div class="styleoverlay" style="height: 100%; width:100%; background: black; opacity: .5;top:0;left: 0;">
                <button type="button" class="viewdetails">View Details</button>
            </div>
        </div>
        <div class="item" id="style3" style="background-image: url(../img_upload/page/home/<?= $fetch_content['sg3'] ?>);">
            <div class="styleoverlay" style="height: 100%; width:100%; background: black; opacity: .5;top:0;left: 0;">
                <button type="button" class="viewdetails">View Details</button>
            </div>
        </div>
        <div class="item" id="style4" style="background-image: url(../img_upload/page/home/<?= $fetch_content['sg4'] ?>);">
            <div class="styleoverlay" style="height: 100%; width:100%; background: black; opacity: .5;top:0;left: 0;">
                <button type="button" class="viewdetails">View Details</button>
            </div>
        </div>
        <div class="item" id="style5" style="background-image: url(../img_upload/page/home/<?= $fetch_content['sg5'] ?>);">
            <div class="styleoverlay" style="height: 100%; width:100%; background: black; opacity: .5;top:0;left: 0;">
                <button type="button" class="viewdetails">View Details</button>
            </div>
        </div>
        <div class="item" id="style6" style="background-image: url(../img_upload/page/home/<?= $fetch_content['sg6'] ?>);">
            <div class="styleoverlay" style="height: 100%; width:100%; background: black; opacity: .5;top:0;left: 0;">
                <button type="button" class="viewdetails">View Details</button>
            </div>
        </div>
    </div>
    <div class="bottom">
        <h2>2023SS NEW ITEM</h2>
        <button id="btndesc" class="section-m1"><a href="../user/shop.php">View More</a></button>    
    </div>
   
</section>

    <!-- <section id="gridbanner" class="section-p1">
        <div class="grid-banner-container">
            <div class="box card1"><a href="shop.php">CAP</a></div>
            <div class="box card2"><a href="#">BAG</a></div>
            <div class="box card3"><a href="#">SHOES</a></div>
            <div class="box card4"><a href="#">KIDS</a></div>
          </div>
    </section> -->

    <?php include'../component/php/footer.php'; ?>

    <script src="../component/js/index.js"></script>

</body>
</html>