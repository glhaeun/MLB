<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN LOGIN</title>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@600&display=swap" rel="stylesheet">

    <link href="../admin_component/css/adminboots.css" rel="stylesheet">
    <link rel="stylesheet" href="../admin_component/css/custom/login.css" type="text/css">



</head>
<?php include '../admin_component/php/connect.php';?>
<?php include '../admin_component/php/flash_popup.php';?>

<?php
    if(isset($_SESSION['admin_id'] )){
        header("location:dash.php");
    }
?>

<body>
<?php include '../admin_component/php/login_verification.php';?>

<?php flash_popup('Error');?>
    <section>

        <div class="form-container">
        <form action="" method="POST">
        <h3>MLB ADMIN LOGIN</h3>
        <p>default username = <span>glhaeun123</span><br> default password = <span>hello</span></p>
        <input type="text" name="name" required placeholder="enter your username" maxlength="20"  class="box" oninput="this.value = this.value.replace(/\s/g, '')">
            <input type="password" name="password" required placeholder="enter your password" maxlength="20"  class="box" oninput="this.value = this.value.replace(/\s/g, '')">
            <input type="submit" value="login now" class="btn_login" name="submit_login">
            </form>
        </div>
    

    
    </section>

    <!-- <?php
   if($yes==1) {
    ?>
    <div class="modal-box active">
        <i class="fa-regular fa-circle-check"></i>
        <h2>Successfully Login!</h2>
        <h3>You have sucessfully login!</h3>
        <div class="buttons">
          <button class="close-btn" onclick="">Ok, Close</button>
        </div>
</div>
   <?php
    
   }
?> -->

   <script>
    function closeModal() {
            $("#myModal").modal("hide");
        }
    document.addEventListener('DOMContentLoaded', function() {
  var modalBox = document.querySelector('.modal-box');
  var closeBtn = document.querySelector('.close-btn');
  closeBtn.addEventListener('click', function() {
    window.location.href = 'dash.php';

  });
});
   </script>
</body>

</html>

