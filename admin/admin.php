<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
    <!-- Custom styles for this template-->
    <link href="../admin_component/css/adminboots.css" rel="stylesheet">

</head>
        <?php include '../admin_component/php/connect.php';?>
        <?php include '../admin_component/php/flash_alert.php';?>

<body id="page-top">
    <?php include '../admin_component/php/logout.php';?>
    <?php include '../admin_component/php/lib/admin.php';?>


        <!-- Page Wrapper -->
        <div id="wrapper">
        <?php include '../admin_component/php/sidenav.php';?>


        <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">
        <?php include '../admin_component/php/top.php';?>

        <!-- Begin Page Content -->
        <div class="container-fluid">
        <?php flash_alert('Message') ?>

        <!-- Page Heading -->
        <div class="d-flex align-items-center justify-content-start mb-4" style="display: grid;">
        <h1 class="h3 mb-0 text-gray-800">Admin Profile</h1>
        <h6 class="m-0 ml-2 font-weight-bold text-primary">
        <button onclick="hideShow_update()" class="btn btn-primary">Update Profile</button>
        </h6>
        <?php 
            if($_SESSION['admin_level']=='master_admin'){
                ?>
            <h6 class="m-0 ml-2 font-weight-bold text-primary">
            <button onclick="hideShow_add()" class="btn btn-primary">Add New</button>
            </h6>
                <?php
            }
            ?>
        </div>

        <!-- Content Row -->
        <div class="row category-row justify-content-center">
        <div class="card shadow mb-4" id="update-admin" style="display:none;">
                    <div class="card-header py-3">
                    <h1 class="h3 mb-0 text-gray-800 ">Update Admin</h1>
                    </div>
                    <div class="card-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="admin_nama">Nama Admin</label>
                            <input   name="admin_nama" type="text" class="form-control" id="admin_nama" placeholder="" value="<?=$_SESSION['admin_name']?>">
                            </div>
                            <div class="form-group col-md-6">
                            <label for="admin_username">Username Admin</label>
                            <input   name="admin_username" type="text" class="form-control" id="admin_username" value="<?=$_SESSION['admin_username']?>" >
                            </div>
                        </div>
                        <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="admin_currentpassword">Current Password Admin</label>
                            <input   name="admin_currentpassword" type="password" class="form-control" id="admin_currentpassword" placeholder="" >
                            </div>
                        </div>
                        <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="admin_password">Password Admin</label>
                            <input   name="admin_password" type="password" class="form-control" id="admin_password" placeholder="" >
                            </div>
                            <div class="form-group col-md-6">
                            <label for="admin_cpassword">Reconfirm Password</label>
                            <input   name="admin_cpassword" type="password" class="form-control" id="admin_cpassword" placeholder="" >
                            </div>
                        </div>
                        
                        <input type="submit" class="btn btn-primary" value="Update" name="update-admin">
                        <input onclick="hideShow_update()" type="button" class="btn btn-primary" value="Cancel" name="cancel">

                        </form>
                    </div>
                </div><?php 
            if($_SESSION['admin_level']=='master_admin'){
                ?>
        <div class="card shadow mb-4" id="add-admin" style="display:none;">
                        <div class="card-header py-3">
                        <h1 class="h3 mb-0 text-gray-800 ">Add Admin</h1>
                        </div>
                        <div class="card-body">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                <label for="admin_nama">Nama Admin</label>
                                <input   name="admin_nama" type="text" class="form-control" id="admin_nama" placeholder="" required>
                                </div>
                                <div class="form-group col-md-6">
                                <label for="admin_username">Username Admin</label>
                                <input   name="admin_username" type="text" class="form-control" id="admin_username" placeholder="" required>
                                </div>
                            </div>
                            <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="admin_password">Password Admin</label>
                                <input   name="admin_password" type="password" class="form-control" id="admin_password" placeholder="" required>
                                </div>
                                <div class="form-group col-md-6">
                                <label for="admin_cpassword">Reconfirm Password</label>
                                <input   name="admin_cpassword" type="password" class="form-control" id="admin_cpassword" placeholder="" required>
                                </div>
                            </div>
                            
                            <input type="submit" class="btn btn-primary" value="Add" name="add-admin">
                            <input type="button" class="btn btn-primary" value="Cancel" name="cancel" onclick="hideShow_add()">

                            </form>
                        </div>
                    </div>
                    <?php
            }
            ?>
        <div class="card shadow mb-4 w-75">
                    
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th style="display: none;">No.</th>
                                        <th>Nama Admin</th>
                                        <th>Username</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>


        <?php 
        $query ="SELECT * FROM admins";
        $select_admin =  $connect->prepare($query);
        $select_admin -> execute();

        $index = 1;
        if($select_admin->rowCount()>0){
        while ($fetch_admin = $select_admin ->fetch(PDO::FETCH_ASSOC)){
        ?>
                    <tr>
                        <td><?=$index?></td>
                        <td style="display: none;" class="admin_id"><?=$fetch_admin['id']?></td>
                        <td><?=$fetch_admin['name2']?></td>
                        <td><?=$fetch_admin['name']?></td>
                        <?php if($fetch_admin['level']=='master_admin'){
                        ?>
                            <td>MASTER ADMIN</td>
                        <?php
                    } else {
                        if($_SESSION['admin_level']=='master_admin'){
                        ?>
                            <td><a href="" class="delete-btn" data-toggle="modal" data-target="#deleteModal"><i class="fa-solid fa-trash"></i></a></td>
                        <?php
                    } else {
                        ?><td>NORMAL ADMIN</td>
                        <?php
                        }
                    }?> </tr>       
                    <?php
                    $index ++;

        }
    }
                                    
?>
                            </table>
                        </div>
                    </div>
                </div>
        <?php include '../admin_component/php/delete_modal.php';?>
        </div>
        <!-- /.container-fluid -->
        </div>
        <!-- End of Main Content -->
        <?php include '../admin_component/php/footer.php';?>
        </div>
        <!-- End of Content Wrapper -->

</div>

        <?php if($_SESSION['admin_level']=="master_admin"){
            echo '<script src="../admin_component/js/admin.js"></script>';
        } else {
            echo '<script src="../admin_component/js/admin_normal.js"></script>';
        }
        
        ?>

        <?php include '../admin_component/php/default.php';?>
</body>


</html>
