<!-- login -->
<?php
    if(isset($_POST['submit_login'])){
        $name = $_POST['name'];
        $name = htmlspecialchars($name);
        $pw = $_POST['password'];
      
      
        $select_admin =$connect->prepare("SELECT id, name2, name, level FROM admins WHERE name = ? AND password = ?");
        $select_admin->execute([$name,$pw]);
        $fetch_admin = $select_admin->fetch(PDO::FETCH_ASSOC);
      
        if($select_admin->rowCount()>0) {
      
            $_SESSION['admin_id'] = $fetch_admin['id'];
            $_SESSION['admin_name'] = $fetch_admin['name2'];
            $_SESSION['admin_username'] = $fetch_admin['name'];
            $_SESSION['admin_level'] = $fetch_admin['level'];
      
        
            flash_popup('Message', 'Successfully Login', FLASH_SUCCESS); 
            header("location:dash.php");           
        } else{
            flash_popup('Error', 'Failed to login', FLASH_DANGER);
        }
      
      
      }
?>