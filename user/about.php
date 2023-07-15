<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MLB</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

    <style>
    </style>
    <link rel="stylesheet" href="../component/css/aboutt.css" text="text/css">

</head>

<?php
include '../component/php/connect.php';

?>

<body>
    <?php include '../component/php/nav.php';
    include '../component/php/script.php'; ?>

    <?php
                $query = "SELECT * FROM aboutpage ";
                $show_content = $connect->prepare($query);
                $show_content -> execute();
                $fetch_content = $show_content->fetch(PDO::FETCH_ASSOC);
    ?>
    <section id="page-header" class="about-header" style="background-image: url(../img_upload/page/about/<?= $fetch_content['mainbanner'] ?>);">
        <h2><?= $fetch_content['titleA'] ?></h2>
        <p id="about-p"><?= $fetch_content['contentB'] ?></p>
    </section>

    <section id="about-head" class="section-p1">
        <div class="image-wrapper">
            <img src="../img_upload/page/about/<?= $fetch_content['cover'] ?>" alt="">
        </div>
        <div>
        <p id="about-p"><?= $fetch_content['contentA'] ?></p>
        <br><br>

        <marquee bgcolor="#ccc" loop="-1" scrollamount="5" width="100%"><?= $fetch_content['contentC'] ?></marquee>
        </div>
    </section>

    <section id="about">
        <div class="about-container">
            <div class="img-gallery">
                <div class="img-box">
                    <img src="../img_upload/page/about/<?= $fetch_content['minibannerA'] ?>" alt="">
                    <h2 class="MLB">M</h2>
                </div>
                <div class="img-box">
                    <img src="../img_upload/page/about/<?= $fetch_content['minibannerB']  ?>" alt="">
                    <h2 class="MLB">L</h2>
                </div>
                <div class="img-box">
                    <img src="../img_upload/page/about/<?= $fetch_content['minibannerC']  ?>" alt="">
                    <h2 class="MLB">B</h2>
                </div>
            </div>
            <div class="info"><h5 style="color:white; text-align:justify;">
            <?= $fetch_content['contentD'] ?></h5>
        </div>
    </div>
    </section>

    <?php include '../component/php/footer_about.php'; ?>
</body>