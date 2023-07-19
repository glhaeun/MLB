<?php
 if(isset($_GET['logout_admin'])){
    session_destroy(); 
   ?>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
    swal({
        title: "Logout Successfully!",
        text: "",
        icon: "success",
        
    }).then(function() {
        window.location = "login.php";
    });      
    </script>
    <?php
    
    } 
?>

<?php
        if(!isset($_SESSION['admin_id'])){
            header("location:login.php");
        }
    ?>