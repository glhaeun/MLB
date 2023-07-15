<style>
@import url('https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Merriweather:ital@1&family=Space+Mono&family=Work+Sans&display=swap');

@import url('https://fonts.googleapis.com/css2?family=Nunito:wght@600&display=swap');

* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Nunito", "Merriweather", sans-serif;
}

html {
  scroll-behavior: smooth;
  position: relative;
}

/* Global Styles */

h1 {
  font-size: 50px;
  line-height: 64px;
  color: #222;
}

h2 {
  font-size: 46px;
  line-height: 54px;
  color: #222;
}

h4 {
  font-size: 20px;
  color: #222;
}

h6 {
  font-weight: 700;
  font-size: 12px;
}



.section-p1 {
  padding: 40px 80px;
}

.section-p2 {
    padding: 40px 80px;
  }

.section-m1 {
  margin: 40px 0;
}

.section-m2 {
    margin: 20px 0;
}
  
body {
  width: 100%;
}
    
.logo {
    width: 75px;
    cursor: pointer;
    margin-top: 5px ;
}

#header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 10px 80px;
    box-shadow: 0 .6rem 1.1rem rgba(0,0,0,0.1);
    height: 80px;
    z-index: 999;
    position: sticky;
    top: 0;
    left: 0;
    background-color: white;
    width: 100%;
}

#navbar {
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0;
}

#navbar li {
    list-style: none;
    padding: 10px;
    color: black;
    position: relative;
}

#navbar li a {
    color: black;
    text-decoration: none;
    font-size:  16px;
    font-weight: 500;
    transition: 0.3s ease;
}

#navbar li a:hover, 
#navbar li a.active {
    color: darkgray;

}

#navbar li a.active::after,
#navbar li a:hover::after {
    content: "";
    width: 20%;
    height: 2px;
    background: beige;
    position: absolute;
    bottom: 10px;
    left: 20px;

}



.drop-menu {
    display: none;
    position: absolute;
    left: -20px;
    background-color: #fff;
    min-width: 100px;
    box-shadow: 0 2px 5px 0 rgba(0,0,0,.16), 0 2px 10px 0 rgba(0,0,0,.12);
    transition-delay: 5s;
}

.drop-menu-item {
    width: 100%;
}

.drop-menu-item:hover {
    background-color: #eee;
}

.drop-menu-item a {
    color: #555;
}

.menu-item {
    transition: all 0.25s ease;
}
.menu-item:hover .drop-menu {
    
    display: block;
}

#navbar span {
    color: black;
     font-size: 12px;
}



@media screen and (max-width:  490px) {
    #header{
        padding:0px 0px;
        justify-content: space-around;
    }
    #navbar li {
        padding: 5px;
        padding-bottom: 10px;
        font-size: 10px;
    }
}

@media screen and (max-width: 375px) {
    #page-header h2 {
        font-size:20px
    }

    #product h2 {
        font-size:20px
    }
    #page-header p {
        font-size:12px
    }
}

@media screen and (min-width: 375px) and (max-width: 425px) {
    #page-header h2 {
        font-size:25px
    }

    #product h2 {
        font-size:25px
    }
    #page-header p {
        font-size:14px
    }
}

@media screen and (min-width:425px) and (max-width: 645px) {
    #page-header h2 {
        font-size:30px
    }

    #product h2 {
        font-size:30px
    }

    
}

@media screen and (max-width: 645px) {
    #product {
        padding: 10px 10px;
    }

    #page-header{
        height:20vh;
    }
}
</style>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

    <section id="header">
  <?php
  // Get the current page filename
  $currentPage = basename($_SERVER['PHP_SELF']);

  $in_cart = 0;
  $select_cart = $connect->prepare("SELECT quantity FROM cart ");
  $select_cart->execute();

  while ($fetch_incart = $select_cart->fetch(PDO::FETCH_ASSOC)) {
    $in_cart += $fetch_incart['quantity'];
  }
  if ($in_cart == 0) {
    $in_cart = "";
  }
  ?>
  <a href="#"><img src="../img/logosmall.png" class="logo" alt=""></a>

  <div>
    <ul id="navbar">
      <li><a class="<?= ($currentPage == 'index.php') ? 'active' : ''; ?>" href="../user/index.php">Home</a></li>
      <li><a class="<?= ($currentPage == 'shop.php') ? 'active' : ''; ?>" href="../user/shop.php">Shop</a></li>
      <li><a class="<?= ($currentPage == 'about.php') ? 'active' : ''; ?>" href="../user/about.php">About</a></li>
      <li><a href="../user/cart.php" class="<?= ($currentPage == 'cart.php') ? 'active' : ''; ?> cart cart-count-container"><i class="fa fa-shopping-cart" aria-hidden="true"><span id="cart-count"><?= $in_cart; ?></span></i></a></li>
      <?php
      if (isset($_SESSION['user_id'])) {
        $user_name = $_SESSION['user_name'];
        $user_name = strtok($user_name, " ");
        ?><li class="menu-item "><a class="profilename <?= ($currentPage == 'profile.php' || $currentPage == 'history.php' || $currentPage == 'changepass.php')? 'active' : ''; ?>" href=""><i class="fa-solid fa-user dropdown"> <span><?= $user_name; ?></span></i></a>
          <ul class="drop-menu">
            <li class="drop-menu-item">
              <a href="../user/profile.php">Profile</a>
            </li>
            <li class="drop-menu-item">
              <a href="index.php?logout=<?= $_SESSION['user_id'] ?>">Logout</a>
            </li>
          </ul>
        </li><?php } else {
          ?>
        <li><a href="../user/login.php"><i class="fa-solid fa-user"></i></a></li>
      <?php
      } ?>
    </ul>
  </div>
</section>

<script>
    function updateCartCount() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("cart-count").innerHTML = this.responseText;
        }
    };
    xhttp.open("GET", "../component/php/get_cart.php", true);
    xhttp.send();
}

</script>

<script>
    window.addEventListener("DOMContentLoaded", function() {
        updateCartCount();
    });
</script>