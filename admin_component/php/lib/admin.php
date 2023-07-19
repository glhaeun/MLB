<?php
    
if(isset($_GET['delete_admin'])){
    $delete_id = $_GET['delete_admin'];

    $query="DELETE FROM admins WHERE id = ?";
    $del_category = $connect->prepare($query);
    $del_category -> execute([$delete_id]);

    flash_alert('Message', 'successfully deleted admin', FLASH_SUCCESS);

} else if(isset($_POST['add-admin'])){
    $nama_admin = $_POST['admin_nama'];
    $username_admin = $_POST['admin_username'];
    $password_admin = $_POST['admin_password'];
    $cpassword_admin = $_POST['admin_cpassword'];

    $error=0;

    $check_user = $connect->prepare("SELECT * FROM admins WHERE name = ?");
    $check_user -> execute([$username_admin]);

    if($check_user->rowCount() > 0) {
        flash_alert('Message', 'Username is taken by other admin', FLASH_DANGER);
        $error++;
    } else if ($password_admin != $cpassword_admin) {
        flash_alert('Message', 'Password not match', FLASH_DANGER);
        $error++;
    } else if($error==0) {
        $query = "INSERT INTO admins (name2, name, password) VALUES (?, ?, ?)";
        $insert_user = $connect->prepare($query);
        $insert_user -> execute([$nama_admin, $username_admin, $password_admin]);
        flash_alert('Message', 'Successfully registered admin!', FLASH_SUCCESS);
        
    }
} else if (isset($_POST['update-admin'])) {
        $id = $_SESSION['admin_id'];
    
        $changes = 0;
    
        // Update nama_admin if provided
        if (!empty($_POST['admin_nama']) && ($_POST['admin_nama'] != $_SESSION['admin_name'])) {
            $nama_admin = $_POST['admin_nama'];
            $query = "UPDATE admins SET name2 = ? WHERE id = ?";
            $updatedb = $connect->prepare($query);
            $updatedb->execute([$nama_admin, $id]);
    
            $_SESSION['admin_name'] = $nama_admin;
            $admin_name = $nama_admin;
            $changes++;
        }
    
        // Update username_admin if provided and not taken
        if (!empty($_POST['admin_username']) && ($_POST['admin_username'] != $_SESSION['admin_username'])) {
            $username_admin = $_POST['admin_username'];
    
            $check_user = $connect->prepare("SELECT * FROM admins WHERE name = ?");
            $check_user->execute([$username_admin]);
    
            if ($check_user->rowCount() > 0) {
                flash_alert('Message', 'Username ini sudah terdaftar!', FLASH_DANGER);
                $changes = 0;
            } else {
                $query = "UPDATE admins SET name = ? WHERE id = ?";
                $updatedb = $connect->prepare($query);
                $updatedb->execute([$username_admin, $id]);
    
                $_SESSION['admin_username'] = $admin_username = $username_admin;
                $changes++;
            }
        }
    
        // Update password if provided
        $currentpassword_admin = $_POST['admin_currentpassword'];
        $password_admin = $_POST['admin_password'];
        $cpassword_admin = $_POST['admin_cpassword'];
    
        if (!empty($currentpassword_admin) && !empty($password_admin) && !empty($cpassword_admin)) {
            if ($password_admin != $cpassword_admin) {
                flash_alert('Message', 'Konfirmasi kata sandi tidak cocok.', FLASH_DANGER);
                $changes = 0;
            } else {
                $check_pw = $connect->prepare("SELECT password FROM admins WHERE id = ?");
                $check_pw->execute([$id]);
                $fetch_pw = $check_pw->fetch(PDO::FETCH_ASSOC);
    
                if ($currentpassword_admin != implode($fetch_pw)) {
                    flash_alert('Message', 'Kata sandi saat ini yang Anda masukkan salah!', FLASH_DANGER);
                $changes = 0;
                } else {
                    $query = "UPDATE admins SET password = ? WHERE id = ?";
                    $updatedb = $connect->prepare($query);
                    $updatedb->execute([$password_admin, $id]);
                    $changes++;
                }
            }
        } elseif (!empty($currentpassword_admin) || !empty($password_admin) || !empty($cpassword_admin)) {
            flash_alert('Message', 'Harap masukkan semua bidang kata sandi untuk mengubah kata sandi Anda!', FLASH_DANGER);
            $changes = 0;

        }
    
            if ($changes > 0) {
                flash_alert('Message', 'Anda berhasil mengubah data.', FLASH_SUCCESS);

            }
    }
    
?>  


