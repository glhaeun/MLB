<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MLB</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="stylesheet" href="../component/css/profile.css" text="text/css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <script src="addtocart1.js" defer></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" type="text/css">
    <link href="../admin_component/css/adminboots.css" rel="stylesheet">

<!-- #region -->
</head>

<style>
     @media screen and (max-width: 768px) {
        section.content-wrapper.section-p2{
        padding: 0;
    }    
  
}
</style>

<?php include '../component/php/connect.php'; 
    include '../component/php/flash.php'; // Include flash.php before script.php    
    ?>

<body>
    <?php include '../component/php/nav.php';?>
    <?php include '../component/php/script.php'; ?>

    <?php echo flash('Error');  ?>
    <section class="content-wrapper section-p2">
        <?php include '../component/php/sidenav.php';?>

        <div class="user-information">
          <h3>Change Password</h3>
          <?php
                if(isset($mssg)){
                    foreach($mssg as $mssg){
                        echo' 
                        <div class="alert alert-warning" role="alert" style="display:flex; justify-content:space-between;align-items:center;">
                            <span>'.$mssg.'</span>
                            <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
                        </div>
                ';
                    }
                }
                ?>
                <div class="card-body">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                        <label for="current">Current Password</label>
                        <input   name="current" type="password" class="form-control" id="current" placeholder="" required>
                        </div>                        
                    </div>
                    <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="password">New Password</label>
                        <input   name="password" type="password" class="form-control" id="password" placeholder="" required>
                        </div>
                    </div>
                    <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="cpassword">Confirm Password</label>
                        <input   name="cpassword" type="password" class="form-control" id="cpassword" placeholder="" required>
                        </div>
                    </div>
                    
                    <input type="submit" class="btn btn-primary" value="Change Password" name="changepass">
                    </form>
            </div>


        <?php ?>
        </div>
      </section>

    <?php include '../component/php/footer.php';?>
    <script src="../component/js/changepass.js"></script>

    
</body>
</html>