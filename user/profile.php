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
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js" defer></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" type="text/css">
    <link href="../admin_component/css/adminboots.css" rel="stylesheet">
</head>
    <?php include '../component/php/connect.php'; 
    include '../component/php/flash.php'; 
    include '../component/php/user_only.php'; 
    $status_edit = "no";
    if(isset($_GET['update'])) {
        $status_edit = "yes";
      }
    
    ?>
<body>
    <?php include '../component/php/nav.php';?>
    <?php include '../component/php/script.php'; ?>

    <?php echo flash('Sucess'); ?>
    <?php echo flash('Error');  ?>

    
    <section class="content-wrapper section-p2">
    <?php include '../component/php/sidenav.php'?>
    <div class="user-information">
          <h3>Customer Data</h3>
          <div id="mssg"></div>
          <?php 
        $get_profile = $connect->prepare("SELECT * from users WHERE id = ?");
        $get_profile -> execute([$_SESSION['user_id']]);
        if($get_profile->rowCount()>0) {
            while ($fetch_profile = $get_profile->fetch(PDO::FETCH_ASSOC)){
        ?>
                <div class="card-body">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                        <label for="email">EMAIL</label>
                        <input disabled   name="email" type="text" class="form-control" id="email" placeholder="" value="<?=$fetch_profile['email']?>" <?php if ($status_edit == "yes"); else echo 'disabled'?> onkeyup="checkemail()" required>
                    <span class="error" id="err_email"></span>
                        </div>
                        <div class="form-group col-md-6">
                        <label for="nama">NAMA</label>
                        <input   name="nama" type="text" class="form-control" id="nama" placeholder="" value="<?=$fetch_profile['name']?>"  <?php if ($status_edit == "yes"); else echo 'disabled'?> onkeyup="checkuser()" required>
                    <span class="error" id="err_name"></span>
                        </div>
                    </div>
                    <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="address">ADDRESS</label>
                        <input class="form-control" type="text" name="address" id="address"  maxlength="100" value="<?= $fetch_profile['address']; ?>"  <?php if ($status_edit == "yes"); else echo 'disabled'?> onkeyup="checkaddress()" required>
                    <span class="error" id="err_address"></span>

                    </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                        <label for="dob">TANGGAL LAHIR</label>
                        <input   name="dob" type="text" class="form-control" id="dob" placeholder="" value="<?=$fetch_profile['dob']?>"  <?php if ($status_edit == "yes"); else echo 'disabled'?> onkeyup="checkdob()" required>
                        <span class="error" id="err_dob"></span>

                        </div>
                        <div class="form-group col-md-6">
                        <label for="nomor">NOMOR HP</label>
                        <input disabled name="nomor" type="text" class="form-control" id="number" placeholder="" value="<?=$fetch_profile['number']?>"  <?php if ($status_edit == "yes"); else echo 'disabled'?>  onkeyup="checknomor()" required>
                        <span class="error" id="err_nomor" ></span>
                        </div>
                    </div>
                    
                    <?php if ($status_edit == "yes"){
                      ?>
                    
                    <input type="submit" class="btn btn-primary" value="SUBMIT" name="submit" id="submit" onclick="return checkData()" required>
                    
                      <?php
                    }
                    else {
                      ?>
              
                      <a href="profile.php?update=yes" type="submit" class="btn btn-primary" name="edit_user">EDIT</a>
                  
                      <?php
                    }?>
                    </form>
            </div>


        <?php }}?>
        </div> 
    </section>
    <?php include '../component/php/footer.php' ?>
    <script src="../component/js/profile.js"></script>
</body>

</html>