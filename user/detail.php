<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MLB</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <script src="../component/js/detail.js"></script>

</head>

<?php include '../component/php/connect.php'; ?>
<body>
    <?php include '../component/php/nav.php';
    include '../component/php/script.php'; ?>
        <link rel="stylesheet" href="../component/css/detaill.css" text="text/css">

    
    <?php
            $query = "SELECT * FROM others ";
            $show_content = $connect->prepare($query);
            $show_content -> execute();
            $fetch_content = $show_content->fetch(PDO::FETCH_ASSOC);
    ?>

    <section id="page-header" style="background-image: url(../img_upload/page/others/<?=$bannerdetail ?>);">
            <h2><?=$fetch_content['keyworddetail']?></h2>
            <p><?=$fetch_content['wordsdetail']?></p>
    </section>

    <section id="prodetails" class="section-p1">
        <?php
            $pid = $_GET['nextpage'];
            $select_products = $connect->prepare("SELECT * FROM products WHERE id =?");
            $select_products-> execute([$pid]);
            if ($select_products->rowCount()>0) {
                while($fetch_products = $select_products->fetch(PDO::FETCH_ASSOC)){
                    ?>       
            <div class="single-pro-image">
            <div class="big-img">
                <img src="../img/<?=$fetch_products['image_a']?>" width="100%" id="MainImg" alt="">
            </div>
            <div class="small-img-group">
                <div class="small-img-col">
                    <img src="../img/<?=$fetch_products['image_b']?>" width="100%" class="small-img" alt="">
                </div>
                <div class="small-img-col">
                    <img src="../img/<?=$fetch_products['image_c']?>" width="100%" class="small-img" alt="">
                </div>
                <div class="small-img-col">
                    <img src="../img/<?=$fetch_products['image_d']?>" width="100%" class="small-img" alt="">
                </div>
                <div class="small-img-col">
                    <img src="../img/<?=$fetch_products['image_a']?>" width="100%" class="small-img" alt="">
                </div>
            </div>
        </div>
        
       
        <div class="single-pro-details">
            <?php 
                $select_products = $connect->prepare("SELECT * FROM products WHERE id =?");
                $select_products-> execute([$pid]);
                $fetch_products = $select_products ->fetch(PDO::FETCH_ASSOC);
                if ($fetch_products['stock'] > 0) {

            ?>
        <form action="" id="add-to-cart-form" method="post">
            <h2 id="productname"><?=$fetch_products['name']?></h2>
            <h3 style="margin-bottom: 10px;"><?=rupiah($fetch_products['price'])?></h3>
            <div id="quantity-container">
                <input id="qty" type="number" value="1" name="qty" max="<?=$currentStock?>" min="1">
                <p id="stock-error" style="color: red; margin: 10px;"></p>
            </div>
            <input type="submit" value="Add to Cart" id="addtocart" name = "addtocart">
            <h4>Product Details</h4>
            <p style="color: black; text-align: justify;"><?=$fetch_products['details']?></p>
            </form>
        </div>
        <?php
                } else {
                    ?>
            <form action="" method="post">
            <h2 id="productname"><?=$fetch_products['name']?></h2>
            <h3 style="margin-bottom: 10px;"><?=rupiah($fetch_products['price'])?></h3>
            <h3 style="color:red;">Sold Out</h3>
            <h4 style=" padding:10px 0px;">Product Details</h4>
            <p style="color: black; text-align: justify;"><?=$fetch_products['details']?></p>
            </form>
        </div>
                    <?php
                }
                ?>
        
        
    </section>
    <?php 
                } 
            
}?>
    <?php include '../component/php/recommended.php'; ?>
    <?php include '../component/php/footer.php';  ?>


<!-- ... -->

<script>
document.getElementById('add-to-cart-form').addEventListener('submit', function(event) {
  event.preventDefault(); // Prevent the default form submission behavior

  var selectedQty = parseInt(document.getElementById('qty').value);
  var productId = <?=$pid?>; // Use the PHP variable directly

  var xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function() {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        var response = JSON.parse(xhr.responseText);
        var stockError = document.getElementById('stock-error');
        if (selectedQty > response.stock) {
          stockError.textContent = 'Error: The selected quantity exceeds the available stock.';
        } else {
          stockError.textContent = ''; // Clear the error message
          addToCart(productId, selectedQty); // Add the product to the cart
        }
      } else {
        console.error('Error: ' + xhr.status);
      }
    }
  };
  xhr.open('POST', '../component/php/check_stock.php', true);
  xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
  xhr.send('pid=' + productId + '&qty=' + selectedQty);
});



function addToCart(productId, quantity) {
  var xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function() {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        var response = JSON.parse(xhr.responseText);
        if (response.success) {
          updateCartCount(); // Update the cart count
        } else {
          var stockError = document.getElementById('stock-error');
          stockError.textContent = response.error;
        }
      } else {
        console.error('Error: ' + xhr.status);
      }
    }
  };
  xhr.open('POST', '../component/php/add_to_cart.php', true);
  xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
  xhr.send('pid=' + productId + '&qty=' + quantity);
}


function updateCartCount() {
  var xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function() {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        var count = parseInt(xhr.responseText);
        document.getElementById('cart-count').textContent = count || '0'; // Update the cart count element
      } else {
        console.error('Error: ' + xhr.status);
      }
    }
  };
  xhr.open('GET', '../component/php/get_cart_count.php', true);
  xhr.send();
}




</script>

<!-- ... -->



</body>