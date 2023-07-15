<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MLB</title>

    <link rel="stylesheet" href="../component/css/loginn.css" text="text/css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    
</head>
<body>
    <?php include '../component/php/connect.php';
    
    if(isset($_GET['email'])&&isset($_GET['reset_token']))
    {
        date_default_timezone_set('Asia/kolkata');
        $date=date("Y-m-d");
        $query ="SELECT * from otp_expiry WHERE email ='$_GET[email]' AND resettoken = '$_GET[reset_token]' AND resettokenexpire = '$date' AND is_expired=0";
        $get = $connect->prepare($query);
        $get->execute();

            if($get->rowCount()==1){
                $query = "UPDATE otp_expiry SET is_expired=1 WHERE email = '$_GET[email]'";
                $get = $connect->prepare($query);
                $get->execute();  

                $query = "SELECT * FROM others ";
                $show_content = $connect->prepare($query);
                $show_content -> execute();
                $fetch_content = $show_content->fetch(PDO::FETCH_ASSOC);   
               ?>
    <?php include '../component/php/nav.php'; 
    ?>

                <section id="container">
                <div class="hero" id="hero" style="background-image: url(../img/<?= $fetch_content["bannerlogin"] ?>); min-height:150vh;">
                    <div class="form-box" id="formbox">
                    <div id="heading">
                        <h4 style="font-size: 20px;">Reset New Password</h4>
                    </div>
                    <form action="login.php" id="reset" class="input-groups" method="POST">
                    <div class="form-control">
                        <input type="hidden" id="email" name="email" class="input-field" value="<?=$_GET['email']?>">
                        <label for="">New Password</label>
                        <input type="password" id="password"  class="input-field" placeholder="Enter Password" name="password" required>
                        <i class="fa-solid fa-circle-check" style="color: green;"></i>
                        <i class="fa-solid fa-circle-exclamation" style="color: #ff0000;"></i>      
                        <small>Error Message</small>             
                    </div>
                    <div class="form-control ">
                    <label for="">Confirm Password</label>
                    <input type="password" id="cpassword" class="input-field" placeholder="Enter Confirm Password" name="cpassword" required>
                    <i class="fa-solid fa-circle-check" style="color: green;"></i>
                        <i class="fa-solid fa-circle-exclamation" style="color: #ff0000;"></i>      
                        <small>Error Message</small>             
                    </div>               
                    <input type="submit"  name="reset_password" style="margin-top: 10px; height: 35px; font-size: 15px; padding: 0px; background-color:black; color:white;" >
                </form>
            </div>
        </div>
    </section>
                <?php
            }
                
        else {
            ?>
            <script src="sweetalert.min.js"></script>
            <script>
            console.log("Email: <?php echo $_GET['email']; ?>");
            console.log("Reset Token: <?php echo $_GET['reset_token']; ?>");
            console.log("Date: <?php echo $date; ?>");
            swal({
                title: "Failed to verify!",
                text: "Invalid or Expired Link!",
                icon: "error",
            }).then(function() {
                window.location = "login.php";
            });
        </script>
            <?php
        }
    } else {
        // Redirect to login page if email and reset_token are not set
        header("Location: login.php");
        exit;
    }

?>
</body>
</html>