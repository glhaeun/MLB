
<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Products</title>

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
    <link href="../admin_component/css/style.css" rel="stylesheet">
    <link href="../component/sidebar_style.css" rel="stylesheet">
    <script src="../ckeditor/ckeditor/ckeditor.js"></script>

</head>
<?php include '../admin_component/php/connect.php';?>
<?php include '../admin_component/php/flash_popup.php';?>
<?php include '../admin_component/php/logout.php';
$query = "SELECT * FROM aboutpage";
$show_content = $connect->prepare($query);
$show_content -> execute();
$fetch_content = $show_content->fetch(PDO::FETCH_ASSOC);?>

<body id="page-top">
<?php include '../admin_component/php/script.php';?>


    <!-- Page Wrapper -->
    <div id="wrapper">
    <?php include '../admin_component/php/sidenav.php';?>


<div id="content-wrapper" class="d-flex flex-column">

<!-- Main Content -->
<div id="content">
<?php include '../admin_component/php/top.php';?>

    
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-center mb-4" style="display: grid;">
            <h1 class="h3 mb-0 text-gray-800">Website Editor</h1>
        </div>

        <!-- Content Row -->
        <div class="wrapper wrapper--w790">
            <div class="card card-5">
                <div class="card-heading">
                    <h2 class="title">About Page</h2>
                </div>
                <div class="card-body">
                <?php
            

            $initial_titleA = $fetch_content['titleA'];
            $initial_contentA = $fetch_content['contentA'];
            $initial_contentB = $fetch_content['contentB'];
            $initial_contentC = $fetch_content['contentC'];
            $initial_contentD = $fetch_content['contentD'];
            ?>
                    <form method="POST" enctype="multipart/form-data">
                    <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="name">Top Banner Picture</label>
                                <input type="file" name="topbanner" class="input--style-5 fileinput" accept="image/jpg image/jpeg, image/png , image/webp" >
                            </div>
                            <div class="form-group col-md-6">
                                <label for="price">Small Banner Picture</label>
                                <input type="file" name="smallbanner" class="input--style-5 fileinput" accept="image/jpg image/jpeg, image/png , image/webp" >
                            </div>
                    </div>
                    <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="name">Title</label>
                                <input type="text" name="titleA" class="input--style-5"  value="<?=$fetch_content['titleA'];?>" >
                            </div>
                            <div class="form-group col-md-6">
                                <label for="price">Content 1 - Introduction</label>
                                <input type="text" name="contentA" class="input--style-5"  value="<?=$fetch_content['contentA']?>">
                            </div>
                    </div>
                    <div class="form-group">
                                <label for="title">Content 2 - Short Greetings</label>
                                <input type="text" name="contentB" class="input--style-5"  value="<?=$fetch_content['contentB']?>">
                    </div> 
                    <div class="form-group">
                                <label for="title">Content 3 - Catchy Phrase</label>
                                <input type="text" name="contentC" class="input--style-5"  value="<?=$fetch_content['contentC']?>">
                    </div> 
                    <div class="form-group mb-8">
                    <label for="">Content 4 - About Brand</label>
                        <textarea name="contentD" style="width:100%;" id="contenteditor" cols="30" rows="5">
                        <?=$fetch_content['contentD']?></textarea>
                        </div>
                     

                    <div class="form-group">
                            <label for="title">Update Minibanner 1</label>
                            <input type="file" name="minibannerA" class="input--style-5"  accept="image/jpg image/jpeg, image/png , image/webp" >
                    </div> 
                    <div class="form-group">
                            <label for="title">Update Minibanner 2</label>
                            <input type="file" name="minibannerB" class="input--style-5"  accept="image/jpg image/jpeg, image/png , image/webp" >
                    </div> 
                    <div class="form-group mb-6">
                            <label for="title">Update Minibanner 3</label>
                            <input type="file" name="minibannerC" class="input--style-5"  accept="image/jpg image/jpeg, image/png , image/webp" >
                    </div> 


                    <div class="mt-6 d-flex justify-content-center">           
                    <button type="submit" value="SUBMIT" name="submit_about" class="btn btn--radius-2 btn--blue justify-content-center">Update</button>
                        </div>
                    </form>
                </div>
            </div>
    </div>
    <?php include '../admin_component/php/footer.php';?>

    </div>
    <!-- /.container-fluid -->
    <?php flash_popup('Message');?>




</div>

    </div>

<!-- End of Main Content -->

</div>

<!-- End of Content Wrapper -->

</div>
<?php include '../admin_component/php/default.php';?>
<script>
        CKEDITOR.replace('contenteditor');
</script>

</body>




</html>