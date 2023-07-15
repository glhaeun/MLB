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

</head>
<?php include '../admin_component/php/connect.php';?>
<?php include '../admin_component/php/flash_popup.php';?>
<?php include '../admin_component/php/logout.php';
 $query = "SELECT * FROM landingpage";
 $show_content = $connect->prepare($query);
 $show_content -> execute();
 $fetch_content = $show_content->fetch(PDO::FETCH_ASSOC);
 ?>

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
                    <h2 class="title">Home Page</h2>
                </div>
                <div class="card-body">

                    <form method="POST" enctype="multipart/form-data">
                    
                    <div class="form-row">
                    <h2 style="color:black;">Banner</h2>
                    </div>
                    <div class="form-row" style="margin-bottom:0;" >
                        <div class="form-group col-md-6">
                                    <label for="title">Title</label>
                                    <input type="text" name="title" class="input--style-5"  value="<?=$fetch_content['title']?>" >
                        </div> 
                        <div class="form-group col-md-6">
                                    <label for="keyword">Keyword</label>
                                    <input type="text" name="keyword" class="input--style-5"  value="<?=$fetch_content['keyword']?>">
                        </div> 
                    </div>
                    <div class="form-group md-6">
                            <label for="banner">Banner Picture</label>
                            <input type="file" name="banner" class="input--style-5" accept="image/jpg image/jpeg, image/png , image/webp" >
                    </div> 
                    <div class="form-group mb-6" style="margin-bottom:40px;" >
                    <label for="">Content</label>
                        <textarea style="width:100%;" name="content_editor" id="content_editor" cols="30" rows="5">
                        <?=$fetch_content['description'];?></textarea>
                    </div>
                     
                    <div class="form-row mb-6">
                    <h2 class="mb-6" style="color:black;">Thumbnail Pictures</h2>
                    </div>                    
                    
                    <div class="form-group">
                            <label for="thumbnailA">Update Thumbnail 1</label>
                            <input type="file" name="thumbnailA" class="input--style-5"  accept="image/jpg image/jpeg, image/png , image/webp" >
                    </div> 
                    <div class="form-group">
                            <label for="thumbnailB">Update Thumbnail 2</label>
                            <input type="file" name="thumbnailB" class="input--style-5"  accept="image/jpg image/jpeg, image/png , image/webp" >
                    </div> 
                    <div class="form-group mb-8">
                            <label for="thumbnailC">Update Thumbnail 3</label>
                            <input type="file" name="thumbnailC" class="input--style-5"  accept="image/jpg image/jpeg, image/png , image/webp" >
                    </div> 
                    

                    <div class="form-row mb-6 mt-6">
                    <h2 class="mb-6" style="color:black; margin-top:40px;">New Release Section</h2>
                    </div>
                    <div class="form-group">
                                    <select id="new_release" name="new_release" class="form-control">
                                        <option <?php if ("show" == trim($fetch_content['new_release'])) echo "selected" ?> value="show">Show</option>
                                        <option <?php if ("hide" == trim($fetch_content['new_release'])) echo "selected" ?> value="hide">Hide</option>
                                    </select>   
                    </div>  


                    <div class="form-row mb-6 mt-6">
                    <h2 class="mb-6" style="color:black; margin-top:40px;">Styling Guide</h2>
                    </div>
                    <div class="form-row">
                    <div class="form-group col-md-6">
                            <label for="sg1">Update Styling Guide 1</label>
                            <input type="file" name="sg1" class="input--style-5"  accept="image/jpg image/jpeg, image/png , image/webp" >
                    </div> 
                    <div class="form-group col-md-6">
                            <label for="sg2">Update Styling Guide 2</label>
                            <input type="file" name="sg2" class="input--style-5"  accept="image/jpg image/jpeg, image/png , image/webp" >
                    </div> 
                    </div>
                    <div class="form-row">
                    <div class="form-group col-md-6">
                            <label for="sg3">Update Styling Guide 3</label>
                            <input type="file" name="sg3" class="input--style-5"  accept="image/jpg image/jpeg, image/png , image/webp" >
                    </div> 
                    <div class="form-group col-md-6">
                            <label for="sg4">Update Styling Guide 4</label>
                            <input type="file" name="sg4" class="input--style-5"  accept="image/jpg image/jpeg, image/png , image/webp" >
                    </div> 
                    </div>
                    <div class="form-row">
                    <div class="form-group col-md-6">
                            <label for="sg5">Update Styling Guide 5</label>
                            <input type="file" name="sg5" class="input--style-5"  accept="image/jpg image/jpeg, image/png , image/webp" >
                    </div> 
                    <div class="form-group col-md-6">
                            <label for="sg6">Update Styling Guide 6</label>
                            <input type="file" name="sg6" class="input--style-5"  accept="image/jpg image/jpeg, image/png , image/webp" >
                    </div> 
                    </div>
    
                    <div class="mt-6 d-flex justify-content-center">           
                    <button type="submit" value="SUBMIT" name="submit_homepage" class="btn btn--radius-2 btn--blue justify-content-center">Update</button>
                        </div>
                    </form>
                </div>
            </div>
    </div>
    <?php include '../admin_component/php/footer.php';?>
    
    </div>
    <?php flash_popup('Message');?>

    <!-- /.container-fluid -->
</div>
</div>
<!-- End of Main Content -->

</div>
<!-- End of Content Wrapper -->

</div>
<?php include '../admin_component/php/default.php';?>

<script src="../ckeditor/ckeditor/ckeditor.js"></script>

<script>
        CKEDITOR.replace('content_editor');
</script>

</body>
</html>
