<!-- rupiah function -->
<?php
function rupiah($angka){
	
	$hasil_rupiah = "Rp " . number_format($angka,0,',','.');
	return $hasil_rupiah;
 
}
?>

<?php
        if(!isset($_SESSION['admin_id'])){
            header("location:login.php");
        }
    ?>

<!-- logout -->
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

<!-- homepage update-->
<?php
    if (isset($_POST['submit_homepage'])){
        $editor_content = $_POST['content_editor'];
        $editor_title = $_POST['title'];
        $editor_keyword = $_POST['keyword'];
        $new_release = $_POST['new_release'];
        $changes = 0;
    
                if (!empty($editor_content)){
                    $query = "SELECT description FROM landingpage";
                    $search_description = $connect->prepare($query);
                    $search_description -> execute();
                    $result_description = $search_description -> fetch(PDO::FETCH_ASSOC);

    
                    if(trim($result_description['description']) != trim($editor_content)){
                        $insert = $connect -> query("UPDATE landingpage SET description = '".$editor_content."'");
                        $changes++;
                    }
    
                }
            
                if (!empty($editor_title)){
                    $query = "SELECT title FROM landingpage";
                    $search_title = $connect->prepare($query);
                    $search_title -> execute();
                    $result_title = $search_title -> fetch(PDO::FETCH_ASSOC);
    
                        if($result_title['title'] != $editor_title){
                            $query = "UPDATE landingpage SET title = ?";
                            $insert_title = $connect->prepare($query);
                            $insert_title -> execute([$editor_title]); 
                            $changes++;
                        }
                }
                
                if (!empty($editor_keyword)){
                    $query = "SELECT keyword FROM landingpage";
                    $search_keyword = $connect->prepare($query);
                    $search_keyword -> execute();
                    $result_keyword = $search_keyword -> fetch(PDO::FETCH_ASSOC);
    
                    if($result_keyword['keyword'] != $editor_keyword){
                    $query = "UPDATE landingpage SET keyword = ?";
                    $insert_keyword = $connect->prepare($query);
                    $insert_keyword -> execute([$editor_keyword]); 
                    $changes++;
                    }
                }
     
        $banner = $_FILES['banner']['name'];
        $banner_size= $_FILES['banner']['size'];
        $banner_tmpname= $_FILES['banner']['tmp_name'];
        $banner_folder= '../img_upload/page/home/'.$banner; 
    
    
        if(!empty($banner)) {
            
                $query="SELECT banner FROM landingpage";
                $del_image = $connect->prepare($query);
                $del_image -> execute();
                $fetch_delete_image = $del_image-> fetch(PDO::FETCH_ASSOC);
                if($fetch_delete_image['banner'] != ''){
                    unlink('../img_upload/page/home/'.$fetch_delete_image['banner']);
                }
                
                $query = "UPDATE landingpage SET banner =? ";
                $update_banner = $connect -> prepare($query);
                $update_banner -> execute ([$banner]);
                move_uploaded_file($banner_tmpname, $banner_folder);
                $changes++;
            
        }
        
        $thumbA = $_FILES['thumbnailA']['name'];
        $thumbA_size= $_FILES['thumbnailA']['size'];
        $thumbA_tmpname= $_FILES['thumbnailA']['tmp_name'];
        $thumbA_folder= '../img_upload/page/home/'.$thumbA; 
    
    
        if(!empty($thumbA)) {            
                $query="SELECT thumbA FROM landingpage";
                $del_image = $connect->prepare($query);
                $del_image -> execute();
                $fetch_delete_image = $del_image-> fetch(PDO::FETCH_ASSOC);
                if($fetch_delete_image['thumbA'] != ''){
                    unlink('../img_upload/page/home/'.$fetch_delete_image['thumbA']);
                }
                $query = "UPDATE landingpage SET thumbA =? ";
                $update_thumbA = $connect -> prepare($query);
                $update_thumbA -> execute ([$thumbA]);
                move_uploaded_file($thumbA_tmpname, $thumbA_folder);
                $changes++;
    
        }
    
        $thumbB = $_FILES['thumbnailB']['name'];
        $thumbB_size= $_FILES['thumbnailB']['size'];
        $thumbB_tmpname= $_FILES['thumbnailB']['tmp_name'];
        $thumbB_folder= '../img_upload/page/home/'.$thumbB; 
    
    
        if(!empty($thumbB)) {
           
                $query="SELECT thumbB FROM landingpage";
                $del_image = $connect->prepare($query);
                $del_image -> execute();
                $fetch_delete_image = $del_image-> fetch(PDO::FETCH_ASSOC);
                if($fetch_delete_image['thumbB'] != ''){
                    unlink('../img_upload/page/home/'.$fetch_delete_image['thumbB']);
                }
                $query = "UPDATE landingpage SET thumbB =? ";
                $update_thumbB = $connect -> prepare($query);
                $update_thumbB -> execute ([$thumbB]);
                move_uploaded_file($thumbB_tmpname, $thumbB_folder);
                $changes++;
            
        }
    
        $thumbC = $_FILES['thumbnailC']['name'];
        $thumbC_size= $_FILES['thumbnailC']['size'];
        $thumbC_tmpname= $_FILES['thumbnailC']['tmp_name'];
        $thumbC_folder= '../img_upload/page/home/'.$thumbC; 
    
    
        if(!empty($thumbC)) {
            
                $query="SELECT thumbC FROM landingpage";
                $del_image = $connect->prepare($query);
                $del_image -> execute();
                $fetch_delete_image = $del_image-> fetch(PDO::FETCH_ASSOC);
                if($fetch_delete_image['thumbC'] != ''){
                    unlink('../img_upload/page/home/'.$fetch_delete_image['thumbC']);
                }
                $query = "UPDATE landingpage SET thumbC =? ";
                $update_thumbC = $connect -> prepare($query);
                $update_thumbC -> execute ([$thumbC]);
                move_uploaded_file($thumbC_tmpname, $thumbC_folder);
                $changes++;
            
        }
    
        $sg1 = $_FILES['sg1']['name'];
        $sg1_size= $_FILES['sg1']['size'];
        $sg1_tmpname= $_FILES['sg1']['tmp_name'];
        $sg1_folder= '../img_upload/page/home/'.$sg1; 
    
    
        if(!empty($sg1)) {
            
                $query="SELECT sg1 FROM landingpage";
                $del_image = $connect->prepare($query);
                $del_image -> execute();
                $fetch_delete_image = $del_image-> fetch(PDO::FETCH_ASSOC);
                if($fetch_delete_image['sg1'] != ''){
                    
                    unlink('../img_upload/page/home/'.$fetch_delete_image['sg1']);
                }
                $query = "UPDATE landingpage SET sg1 =? ";
                $update_sg1 = $connect -> prepare($query);
                $update_sg1 -> execute ([$sg1]);
                move_uploaded_file($sg1_tmpname, $sg1_folder);
                $changes++;
            
        }
    
        $sg2 = $_FILES['sg2']['name'];
        $sg2_size= $_FILES['sg2']['size'];
        $sg2_tmpname= $_FILES['sg2']['tmp_name'];
        $sg2_folder= '../img_upload/page/home/'.$sg2; 
    
    
        if(!empty($sg2)) {
            
                $query="SELECT sg2 FROM landingpage";
                $del_image = $connect->prepare($query);
                $del_image -> execute();
                $fetch_delete_image = $del_image-> fetch(PDO::FETCH_ASSOC);
                if($fetch_delete_image['sg2'] != ''){
                    unlink('../img_upload/page/home/'.$fetch_delete_image['sg2']);
                }
                $query = "UPDATE landingpage SET sg2 =? ";
                $update_sg2 = $connect -> prepare($query);
                $update_sg2 -> execute ([$sg2]);
                move_uploaded_file($sg2_tmpname, $sg2_folder);
                $changes++;
            
        }
    
        $sg3 = $_FILES['sg3']['name'];
        $sg3_size= $_FILES['sg3']['size'];
        $sg3_tmpname= $_FILES['sg3']['tmp_name'];
        $sg3_folder= '../img_upload/page/home/'.$sg3; 
    
    
        if(!empty($sg3)) {
            
                $query="SELECT sg3 FROM landingpage";
                $del_image = $connect->prepare($query);
                $del_image -> execute();
                $fetch_delete_image = $del_image-> fetch(PDO::FETCH_ASSOC);
                if($fetch_delete_image['sg3'] != ''){
                    unlink('../img_upload/page/home/'.$fetch_delete_image['sg3']);
                }
                $query = "UPDATE landingpage SET sg3 =? ";
                $update_sg3 = $connect -> prepare($query);
                $update_sg3 -> execute ([$sg3]);
                move_uploaded_file($sg3_tmpname, $sg3_folder);
                $changes++;
            
        }
    
        $sg4 = $_FILES['sg4']['name'];
        $sg4_size= $_FILES['sg4']['size'];
        $sg4_tmpname= $_FILES['sg4']['tmp_name'];
        $sg4_folder= '../img_upload/page/home/'.$sg4; 
    
    
        if(!empty($sg4)) {
            
                $query="SELECT sg4 FROM landingpage";
                $del_image = $connect->prepare($query);
                $del_image -> execute();
                $fetch_delete_image = $del_image-> fetch(PDO::FETCH_ASSOC);
                if($fetch_delete_image['sg4'] != ''){
                    unlink('../img_upload/page/home/'.$fetch_delete_image['sg4']);
                }
                $query = "UPDATE landingpage SET sg4 =? ";
                $update_sg4 = $connect -> prepare($query);
                $update_sg4 -> execute ([$sg4]);
                move_uploaded_file($sg4_tmpname, $sg4_folder);
                $changes++;
            
        }
    
        $sg5 = $_FILES['sg5']['name'];
        $sg5_size= $_FILES['sg5']['size'];
        $sg5_tmpname= $_FILES['sg5']['tmp_name'];
        $sg5_folder= '../img_upload/page/home/'.$sg5; 
    
    
        if(!empty($sg5)) {
            
                $query="SELECT sg5 FROM landingpage";
                $del_image = $connect->prepare($query);
                $del_image -> execute();
                $fetch_delete_image = $del_image-> fetch(PDO::FETCH_ASSOC);
                if($fetch_delete_image['sg5'] != ''){
                    unlink('../img_upload/page/home/'.$fetch_delete_image['sg5']);
                }
                $query = "UPDATE landingpage SET sg5 =? ";
                $update_sg5 = $connect -> prepare($query);
                $update_sg5 -> execute ([$sg5]);
                move_uploaded_file($sg5_tmpname, $sg5_folder);
                $changes++;
            
        }
    
        $sg6 = $_FILES['sg6']['name'];
        $sg6_size= $_FILES['sg6']['size'];
        $sg6_tmpname= $_FILES['sg6']['tmp_name'];
        $sg6_folder= '../img_upload/page/home/'.$sg6; 
    
    
        if(!empty($sg6)) {
           
                $query="SELECT sg6 FROM landingpage";
                $del_image = $connect->prepare($query);
                $del_image -> execute();
                $fetch_delete_image = $del_image-> fetch(PDO::FETCH_ASSOC);
                if($fetch_delete_image['sg6'] != ''){
                    unlink('../img_upload/page/home/'.$fetch_delete_image['sg6']);
                }
                $query = "UPDATE landingpage SET sg6 =? ";
                $update_sg6 = $connect -> prepare($query);
                $update_sg6 -> execute ([$sg6]);
                move_uploaded_file($sg6_tmpname, $sg6_folder);
                $changes++;
            
        }
        
    
    
        if(!empty($new_release)){
            $query = "SELECT new_release FROM landingpage";
                    $search_new_release = $connect->prepare($query);
                    $search_new_release -> execute();
                    $result_new_release = $search_new_release -> fetch(PDO::FETCH_ASSOC);
    
                if($result_new_release['new_release'] != $new_release){
                    $query = "UPDATE landingpage SET new_release =? ";
                    $update_sg6 = $connect -> prepare($query);
                    $update_sg6 -> execute ([$new_release]);
                    $changes++;
                }
           
        }
    
        if ($changes > 0) {
            flash_popup('Message', 'Data has been successfully updated!', FLASH_SUCCESS); 
        } else {
            flash_popup('Message', 'No changes have been made!', FLASH_INFO); 
        }
    
    }
?>

<!-- aboutpage update -->
<?php
    if (isset($_POST['submit_about'])){
       
        $editor_titleA = $_POST['titleA'];
        $editor_contentA = $_POST['contentA'];
        $editor_contentB = $_POST['contentB'];
        $editor_contentC = $_POST['contentC'];
        $editor_contentD = $_POST['contentD'];
        $changes = 0;
    
        if (!empty($editor_titleA)){
            $query = "SELECT titleA FROM aboutpage";
            $search_description = $connect->prepare($query);
            $search_description -> execute();
            $result_description = $search_description -> fetch(PDO::FETCH_ASSOC);
            $result_description = implode($result_description);
    
            if($result_description != $editor_titleA){
                $insert = $connect -> query("UPDATE aboutpage SET titleA = '".$editor_titleA."'");
                $changes++;
    
            }
    
        } 
        
        if (!empty($editor_contentA)){
            $query = "SELECT contentA FROM aboutpage";
            $search_description = $connect->prepare($query);
            $search_description -> execute();
            $result_description = $search_description -> fetch(PDO::FETCH_ASSOC);
            $result_description = implode($result_description);
    
            if($result_description != $editor_contentA){
                $insert = $connect -> query("UPDATE aboutpage SET contentA = '".$editor_contentA."'");
                $changes++;
    
            }
    
        }
    
        if (!empty($editor_contentB)){
            $query = "SELECT contentB FROM aboutpage";
            $search_description = $connect->prepare($query);
            $search_description -> execute();
            $result_description = $search_description -> fetch(PDO::FETCH_ASSOC);
            $result_description = implode($result_description);
    
            if($result_description != $editor_contentB){
                $insert = $connect -> query("UPDATE aboutpage SET contentB = '".$editor_contentB."'");
                $changes++;
    
            }
    
        }
    
        if (!empty($editor_contentC)){
            $query = "SELECT contentC FROM aboutpage";
            $search_description = $connect->prepare($query);
            $search_description -> execute();
            $result_description = $search_description -> fetch(PDO::FETCH_ASSOC);
            $result_description = implode($result_description);
    
            if($result_description != $editor_contentC){
                $insert = $connect -> query("UPDATE aboutpage SET contentC = '".$editor_contentC."'");
                $changes++;
    
            }
    
        }
    
        if (!empty($editor_contentD)){
            $query = "SELECT contentD FROM aboutpage";
            $search_description = $connect->prepare($query);
            $search_description -> execute();
            $result_description = $search_description -> fetch(PDO::FETCH_ASSOC);
            $result_description = implode($result_description);
    
            if($result_description != $editor_contentD){
                $insert = $connect -> query("UPDATE aboutpage SET contentD = '".$editor_contentD."'");
                $changes++;
    
            }
    
        }


     
        $topbanner = $_FILES['topbanner']['name'];
        $topbanner_size= $_FILES['topbanner']['size'];
        $topbanner_tmpname= $_FILES['topbanner']['tmp_name'];
        $topbanner_folder= '../img_upload/page/about/'.$topbanner; 
    
    
        if(!empty($topbanner)) {

            $query="SELECT mainbanner FROM aboutpage";
            $del_image = $connect->prepare($query);
            $del_image -> execute();
            $fetch_delete_image = $del_image-> fetch(PDO::FETCH_ASSOC);
            if($fetch_delete_image['mainbanner'] != ''){
                unlink('../img_upload/page/about/'.$fetch_delete_image['mainbanner']);
            }
           
                $query = "UPDATE aboutpage SET mainbanner =? ";
                $update_topbanner = $connect -> prepare($query);
                $update_topbanner -> execute ([$topbanner]);
                move_uploaded_file($topbanner_tmpname, $topbanner_folder);
                $changes++;
            
        }
        
        $smallbanner = $_FILES['smallbanner']['name'];
        $smallbanner_size= $_FILES['smallbanner']['size'];
        $smallbanner_tmpname= $_FILES['smallbanner']['tmp_name'];
        $smallbanner_folder= '../img_upload/page/about/'.$smallbanner; 
    
    
        if(!empty($smallbanner)) {

            $query="SELECT cover FROM aboutpage";
            $del_image = $connect->prepare($query);
            $del_image -> execute();
            $fetch_delete_image = $del_image-> fetch(PDO::FETCH_ASSOC);
            if($fetch_delete_image['cover'] != ''){
                unlink('../img_upload/page/about/'.$fetch_delete_image['cover']);
            }
            
                $query = "UPDATE aboutpage SET cover =? ";
                $update_smallbanner = $connect -> prepare($query);
                $update_smallbanner -> execute ([$smallbanner]);
                move_uploaded_file($smallbanner_tmpname, $smallbanner_folder);
                $changes++;
    
        
        }
    
        $minibannerA = $_FILES['minibannerA']['name'];
        $minibannerA_size= $_FILES['minibannerA']['size'];
        $minibannerA_tmpname= $_FILES['minibannerA']['tmp_name'];
        $minibannerA_folder= '../img_upload/page/about/'.$minibannerA; 
    
    
        if(!empty($minibannerA)) {
            $query="SELECT minibannerA FROM aboutpage";
            $del_image = $connect->prepare($query);
            $del_image -> execute();
            $fetch_delete_image = $del_image-> fetch(PDO::FETCH_ASSOC);
            if($fetch_delete_image['minibannerA'] != ''){
                unlink('../img_upload/page/about/'.$fetch_delete_image['minibannerA']);
            }
                $query = "UPDATE aboutpage SET minibannerA =? ";
                $update_minibannerA = $connect -> prepare($query);
                $update_minibannerA -> execute ([$minibannerA]);
                move_uploaded_file($minibannerA_tmpname, $minibannerA_folder);
                $changes++;
            
        }
    
        $minibannerB = $_FILES['minibannerB']['name'];
        $minibannerB_size= $_FILES['minibannerB']['size'];
        $minibannerB_tmpname= $_FILES['minibannerB']['tmp_name'];
        $minibannerB_folder= '../img_upload/page/about/'.$minibannerB; 
    
    
        if(!empty($minibannerB)) {
            $query="SELECT minibannerB FROM aboutpage";
            $del_image = $connect->prepare($query);
            $del_image -> execute();
            $fetch_delete_image = $del_image-> fetch(PDO::FETCH_ASSOC);
            if($fetch_delete_image['minibannerB'] != ''){
                unlink('../img_upload/page/about/'.$fetch_delete_image['minibannerB']);
            }
                $query = "UPDATE aboutpage SET minibannerB =? ";
                $update_minibannerB = $connect -> prepare($query);
                $update_minibannerB -> execute ([$minibannerB]);
                move_uploaded_file($minibannerB_tmpname, $minibannerB_folder);
                $changes++;
            
        }
    
        $minibannerC = $_FILES['minibannerC']['name'];
        $minibannerC_size= $_FILES['minibannerC']['size'];
        $minibannerC_tmpname= $_FILES['minibannerC']['tmp_name'];
        $minibannerC_folder= '../img_upload/page/about/'.$minibannerC; 
    
    
        if(!empty($minibannerC)) {
            $query="SELECT minibannerC FROM aboutpage";
            $del_image = $connect->prepare($query);
            $del_image -> execute();
            $fetch_delete_image = $del_image-> fetch(PDO::FETCH_ASSOC);
            if($fetch_delete_image['minibannerC'] != ''){
                unlink('../img_upload/page/about/'.$fetch_delete_image['minibannerC']);
            }
                $query = "UPDATE aboutpage SET minibannerC =? ";
                $update_sg1 = $connect -> prepare($query);
                $update_sg1 -> execute ([$minibannerC]);
                move_uploaded_file($minibannerC_tmpname, $minibannerC_folder);
                $changes++;
        }
    
    
       
        
        if ($changes > 0) {
            flash_popup('Message', 'Data has been successfully updated!', FLASH_SUCCESS); 

        } else {
            flash_popup('Message', 'No changes have been made!', FLASH_INFO); 
        }
    
    }
?>

<!-- others -->

<?php
    if (isset($_POST['submit_others'])){
       
        $editor_keywordproduct = $_POST['keywordproduct'];
        $editor_keyworddetail = $_POST['keyworddetail'];
        $editor_descriptiondetail = $_POST['descriptiondetail'];
        
        $changes = 0;
    
        if (!empty($editor_keywordproduct)){
            $query = "SELECT keyword FROM others";
            $search_keyword = $connect->prepare($query);
            $search_keyword -> execute();
            $result_keyword = $search_keyword -> fetch(PDO::FETCH_ASSOC);
            $result_keyword = implode($result_keyword);
    
            if($result_keyword != $editor_keywordproduct){
                $insert = $connect -> query("UPDATE others SET keyword = '".$editor_keywordproduct."'");
                $changes++;
    
            }
    
        } 
        
        if (!empty($editor_keyworddetail)){
            $query = "SELECT keyworddetail FROM others";
            $search_keyworddetail = $connect->prepare($query);
            $search_keyworddetail -> execute();
            $result_keyworddetail = $search_keyworddetail -> fetch(PDO::FETCH_ASSOC);
            $result_keyworddetail = implode($result_keyworddetail);
    
            if($result_keyworddetail != $editor_keyworddetail){
                $insert = $connect -> query("UPDATE others SET keyworddetail = '".$editor_keyworddetail."'");
                $changes++;
    
            }
    
        }
    
        if (!empty($editor_descriptiondetail)){
            $query = "SELECT wordsdetail FROM others";
            $search_descriptiondetail = $connect->prepare($query);
            $search_descriptiondetail -> execute();
            $result_descriptiondetail = $search_descriptiondetail -> fetch(PDO::FETCH_ASSOC);
            $result_descriptiondetail = implode($result_descriptiondetail);
    
            if($result_descriptiondetail != $editor_descriptiondetail){
                $insert = $connect -> query("UPDATE others SET wordsdetail = '".$editor_descriptiondetail."'");
                $changes++;
    
            }
    
        }
    
        if (!empty($editor_contentC)){
            $query = "SELECT contentC FROM aboutpage";
            $search_description = $connect->prepare($query);
            $search_description -> execute();
            $result_description = $search_description -> fetch(PDO::FETCH_ASSOC);
            $result_description = implode($result_description);
    
            if($result_description != $editor_contentC){
                $insert = $connect -> query("UPDATE aboutpage SET contentC = '".$editor_contentC."'");
                $changes++;
    
            }
    
        }
    
        if (!empty($editor_contentD)){
            $query = "SELECT contentD FROM aboutpage";
            $search_description = $connect->prepare($query);
            $search_description -> execute();
            $result_description = $search_description -> fetch(PDO::FETCH_ASSOC);
            $result_description = implode($result_description);
    
            if($result_description != $editor_contentD){
                $insert = $connect -> query("UPDATE aboutpage SET contentD = '".$editor_contentD."'");
                $changes++;
    
            }
    
        }
    
     
        $bannerproduct = $_FILES['bannerproduct']['name'];
        $bannerproduct_size= $_FILES['bannerproduct']['size'];
        $bannerproduct_tmpname= $_FILES['bannerproduct']['tmp_name'];
        $bannerproduct_folder= '../img_upload/page/others/'.$bannerproduct; 
    
    
        if(!empty($bannerproduct)) {

            $query="SELECT bannerproduct FROM others";
            $del_image = $connect->prepare($query);
            $del_image -> execute();
            $fetch_delete_image = $del_image-> fetch(PDO::FETCH_ASSOC);
            if($fetch_delete_image['bannerproduct'] != ''){
                unlink('../img_upload/page/others/'.$fetch_delete_image['bannerproduct']);
            }
            
                $query = "UPDATE others SET bannerproduct =? ";
                $update_bannerproduct = $connect -> prepare($query);
                $update_bannerproduct -> execute ([$bannerproduct]);
                move_uploaded_file($bannerproduct_tmpname, $bannerproduct_folder);
                $changes++;
            
        }
        
        $bannerdetail = $_FILES['bannerdetail']['name'];
        $bannerdetail_size= $_FILES['bannerdetail']['size'];
        $bannerdetail_tmpname= $_FILES['bannerdetail']['tmp_name'];
        $bannerdetail_folder= '../img_upload/page/others/'.$bannerdetail; 
    
    
        if(!empty($bannerdetail)) {

            $query="SELECT bannerdetail FROM others";
            $del_image = $connect->prepare($query);
            $del_image -> execute();
            $fetch_delete_image = $del_image-> fetch(PDO::FETCH_ASSOC);
            if($fetch_delete_image['bannerdetail'] != ''){
                unlink('../img_upload/page/others/'.$fetch_delete_image['bannerdetail']);
            }
      
                $query = "UPDATE others SET bannerdetail =? ";
                $update_bannerdetail = $connect -> prepare($query);
                $update_bannerdetail -> execute ([$bannerdetail]);
                move_uploaded_file($bannerdetail_tmpname, $bannerdetail_folder);
                $changes++;
            
        }
    
        $bannerlogin = $_FILES['bannerlogin']['name'];
        $bannerlogin_size= $_FILES['bannerlogin']['size'];
        $bannerlogin_tmpname= $_FILES['bannerlogin']['tmp_name'];
        $bannerlogin_folder= '../img_upload/page/others/'.$bannerlogin; 
    
    
        if(!empty($bannerlogin)) {

            $query="SELECT bannerlogin FROM others";
            $del_image = $connect->prepare($query);
            $del_image -> execute();
            $fetch_delete_image = $del_image-> fetch(PDO::FETCH_ASSOC);
            if($fetch_delete_image['bannerlogin'] != ''){
                unlink('../img_upload/page/others/'.$fetch_delete_image['bannerlogin']);
            }
           
                $query = "UPDATE others SET bannerlogin =? ";
                $update_bannerlogin = $connect -> prepare($query);
                $update_bannerlogin -> execute ([$bannerlogin]);
                move_uploaded_file($bannerlogin_tmpname, $bannerlogin_folder);
                $changes++;
            
        }
    
        if ($changes > 0) {
            flash_popup('Message', 'Data has been successfully updated!', FLASH_SUCCESS); 

        } else {
            flash_popup('Message', 'No changes have been made!', FLASH_INFO); 
        }
    
    }
?>

<!-- admin -->

<?php
    
if(isset($_GET['delete_admin'])){
    $delete_id = $_GET['delete_admin'];

    $query="DELETE FROM admins WHERE id = ?";
    $del_category = $connect->prepare($query);
    $del_category -> execute([$delete_id]);

    flash_alert('Message', 'successfully deleted admin', FLASH_SUCCESS);

}

if(isset($_POST['add-admin'])){
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
}

?>
<!-- update admin -->

<?php
    if (isset($_POST['update-admin'])) {
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


<!-- product -->

<?php

    if(isset($_GET['delete_product'])){
        $delete_id = $_GET['delete_product'];
    
        $query="SELECT * FROM products WHERE id = ?";
        $del_product_image = $connect->prepare($query);
        $del_product_image -> execute([$delete_id]);
        $fetch_delete_image = $del_product_image-> fetch(PDO::FETCH_ASSOC);

    
        unlink('../img_upload/product/'.$fetch_delete_image['image_a']);
        unlink('../img_upload/product/'.$fetch_delete_image['image_b']);
        unlink('../img_upload/product/'.$fetch_delete_image['image_c']);
        unlink('../img_upload/product/'.$fetch_delete_image['image_d']);
    
        $query="DELETE FROM products WHERE id = ?";
        $del_p = $connect->prepare($query);
        $del_p -> execute([$delete_id]);

        flash_alert('Message', 'Product has been successfully deleted!', FLASH_SUCCESS);
    }


    
if (isset($_POST['update_product'])){

    $name = $_POST['name'];
    $pid = $_POST['pid'];
    $price = $_POST['price'];
    $type = $_POST['type'];
    $details = $_POST['details'];
    $stock = $_POST['stock'];

    $old_imageA = $_POST['old_imgA'];
    $image_A= $_FILES['image_a']['name'];
    $image_A_size= $_FILES['image_a']['size'];
    $image_A_tmpname= $_FILES['image_a']['tmp_name'];
    $image_A_folder= '../img_upload/product/'.$image_A;

    $old_imageB = $_POST['old_imgB'];
    $image_B= $_FILES['image_b']['name'];
    $image_B_size= $_FILES['image_b']['size'];
    $image_B_tmpname= $_FILES['image_b']['tmp_name'];
    $image_B_folder= '../img_upload/product/'.$image_B;

    $old_imageC= $_POST['old_imgC'];
    $image_C= $_FILES['image_c']['name'];
    $image_C_size= $_FILES['image_c']['size'];
    $image_C_tmpname= $_FILES['image_c']['tmp_name'];
    $image_C_folder= '../img_upload/product/'.$image_C;

    $old_imageD= $_POST['old_imgD'];
    $image_D= $_FILES['image_d']['name'];
    $image_D_size= $_FILES['image_d']['size'];
    $image_D_tmpname= $_FILES['image_d']['tmp_name'];
    $image_D_folder= '../img_upload/product/'.$image_D;


    $query = "SELECT * FROM products WHERE id = ?";
    $stmt = $connect->prepare($query);
    $stmt->execute([$pid]);
    $existingProduct = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($existingProduct) {
        if (($name == $existingProduct['name'] && $price == $existingProduct['price'] && $type == $existingProduct['type'] && $details == $existingProduct['details'] && $stock == $existingProduct['stock'] && $image_A == $existingProduct['image_a'] && $image_B == $existingProduct['image_b'] && $image_C == $existingProduct['image_c'] && $image_D == $existingProduct['image_d']) || ($name == $existingProduct['name'] && $price == $existingProduct['price'] && $type == $existingProduct['type'] && $details == $existingProduct['details'] && $stock == $existingProduct['stock'] && empty($image_A) && empty($image_B)  && empty($image_C)  && empty($image_D))) {
            flash_alert('Message', 'No changes have been made!', FLASH_INFO);
            header('location:product.php');
        } else {
            $pid = (int)$pid;
            $query = "SELECT * FROM `products` WHERE id <> ? AND name = ?";
            $get = $connect->prepare($query);
            $get->execute([$pid, $_POST['name']]);
            
            if ($get->rowCount()>0) {
                    flash_alert('Error', 'Product name is already taken by another product!', FLASH_DANGER);
            } else {
            $change = 0;
            if (!empty($name)){
                $query = "UPDATE products SET name ='".$name."' WHERE id = $pid";
                $updatedb= $connect->prepare($query);
                $updatedb ->execute();
                $change++;     
            }

            if (!empty($price)){
                $query = "UPDATE products SET price ='".$price."' WHERE id = $pid";
                $updatedb= $connect->prepare($query);
                $updatedb ->execute();
                $change++;     
            }

            if (!empty($type)){
                $query = "UPDATE products SET type ='".$type."' WHERE id = $pid";
                $updatedb= $connect->prepare($query);
                $updatedb ->execute();
                $change++;     
            }

            if (isset($stock) && $stock !== ''){
                $query = "UPDATE products SET stock ='$stock' WHERE id = $pid";
                $updatedb= $connect->prepare($query);
                $updatedb ->execute();
                $change++;     
            }

            if (!empty($details)){
            $query = "UPDATE products SET details ='".$details."' WHERE id = $pid";
            $updatedb= $connect->prepare($query);
            $updatedb ->execute();
            $change++;     
            }

            if(!empty($image_A)) {
                $query = "UPDATE products SET image_a =? WHERE id = ?";
                $update_image_A = $connect -> prepare($query);
                $update_image_A -> execute ([$image_A, $pid]);
                move_uploaded_file($image_A_tmpname, $image_A_folder);
                unlink('../img_upload/product/'.$old_imageA);        
                $change++;     
            }

            if(!empty($image_B)) {
                $query = "UPDATE products SET image_b =? WHERE id = ?";
                $update_image_B = $connect -> prepare($query);
                $update_image_B -> execute ([$image_B, $pid]);
                move_uploaded_file($image_B_tmpname, $image_B_folder);
                unlink('../img_upload/product/'.$old_imageB);        
                $change++;     
            }

            if(!empty($image_C)) {
                $query = "UPDATE products SET image_c =? WHERE id = ?";
                $update_image_C = $connect -> prepare($query);
                $update_image_C -> execute ([$image_C, $pid]);
                move_uploaded_file($image_C_tmpname, $image_C_folder);
                unlink('../img_upload/product/'.$old_imageC); 
                $change++;     
            }

            if(!empty($image_D)) {
                $query = "UPDATE products SET image_d =? WHERE id = ?";
                $update_image_D = $connect -> prepare($query);
                $update_image_D -> execute ([$image_D, $pid]);
                move_uploaded_file($image_D_tmpname, $image_D_folder);
                unlink('../img_upload/product/'.$old_imageD);   
                $change++;     
            }

            if ($change > 0) {
                flash_alert('Message', 'Product data has been successfully updated!', FLASH_SUCCESS);
                header('location:product.php');
                } else if ($change==0) {
                flash_alert('Message', 'No changes have been made!', FLASH_INFO); 
                header('location:product.php');
            } 

            
        }
    }
} 
}

if(isset($_POST['add_product'])){

    $name = $_POST['name'];
    $price = $_POST['price'];
    $type = $_POST['type'];
    $details = $_POST['details'];
    $stock = $_POST['stock'];



    $image_A= $_FILES['image_a']['name'];
    $image_A_size= $_FILES['image_a']['size'];
    $image_A_tmpname= $_FILES['image_a']['tmp_name'];
    $image_A_folder= '../img_upload/product/'.$image_A;

    $image_B= $_FILES['image_b']['name'];
    $image_B_size= $_FILES['image_b']['size'];
    $image_B_tmpname= $_FILES['image_b']['tmp_name'];
    $image_B_folder= '../img_upload/product/'.$image_B;

    $image_C= $_FILES['image_c']['name'];
    $image_C_size= $_FILES['image_c']['size'];
    $image_C_tmpname= $_FILES['image_c']['tmp_name'];
    $image_C_folder= '../img_upload/product/'.$image_C;

    $image_D= $_FILES['image_d']['name'];
    $image_D_size= $_FILES['image_d']['size'];
    $image_D_tmpname= $_FILES['image_d']['tmp_name'];
    $image_D_folder= '../img_upload/product/'.$image_D;

    
    $select_products = $connect->prepare("SELECT * FROM products WHERE name = ?");
    $select_products -> execute([$_POST['name']]);    
    
    if($select_products->rowCount() > 0) {
    flash_alert('Error', 'Product already exist', FLASH_DANGER);
    } 
    else {
        if($image_A_size > 2000000 || $image_B_size > 2000000 || $image_C_size>2000000 || $image_D_size>2000000) {
       flash_alert('Error', 'Image size is too big', FLASH_DANGER);
            
        } 
        else {

        move_uploaded_file($image_A_tmpname, $image_A_folder);
        move_uploaded_file($image_B_tmpname, $image_B_folder);
        move_uploaded_file($image_C_tmpname, $image_C_folder);
        move_uploaded_file($image_D_tmpname, $image_D_folder);
        $query = "INSERT INTO products (name,type,details,price, stock, image_a, image_b, image_c, image_d) VALUES (?, ?, ?, ?, ?, ?, ?, ?,?)";
        $insert_product = $connect->prepare($query);
        $insert_product -> execute([$name, $type, $details, $price, $stock, $image_A, $image_B, $image_C, $image_D]);
        
        flash_alert('Message', 'New Product has successfully been added', FLASH_SUCCESS);
        header("location:product.php");
    }

        
    }
}

?>

<!-- orders -->
<?php
    if(isset($_GET['delete_order'])){
        $delete_id = $_GET['delete_order'];
    
        $query="DELETE FROM orders WHERE order_id = ?";
        $del_category = $connect->prepare($query);
        $del_category -> execute([$delete_id]);

        echo '<meta http-equiv="refresh" content="3;url=order.php">';
        flash_alert('Message', 'Order has been deleted', FLASH_SUCCESS);
    }    

    if (isset($_POST['update_order'])){

        $status = $_POST['payment-status'];
        $method = $_POST['payment-method'];
        $id = $_POST['oid'];

        $changes=0;
 
        if (!empty($status)){
            $query = "SELECT payment_status FROM orders WHERE order_id = $id";
            $check_payment = $connect->prepare($query);
            $check_payment -> execute();
            $result_payment= $check_payment -> fetch(PDO::FETCH_ASSOC);
    
            if($result_payment['payment_status'] != $status){
                $query = "UPDATE orders SET payment_status ='".$status."' WHERE order_id = $id";
                $updatedb= $connect->prepare($query);
                $updatedb ->execute();
    
                $changes++;
        }
        }

        if (!empty($method)){
            $query = "SELECT method FROM orders WHERE order_id = $id";
            $check_method = $connect->prepare($query);
            $check_method -> execute();
            $result_method= $check_method -> fetch(PDO::FETCH_ASSOC);
    
            if($result_method['method'] != $method){
                $query = "UPDATE orders SET method ='".$method."' WHERE order_id = $id";
                $updatedb= $connect->prepare($query);
                $updatedb ->execute();
    
                $changes++;
        }
        }

        if ($changes > 0) {
            echo '<meta http-equiv="refresh" content="3;url=order.php">';
            flash_alert('Message', 'Order has successfully been updated', FLASH_SUCCESS);
            header('location:order.php');
        } else {
            flash_alert('Message', 'No changes were made!', FLASH_SUCCESS);
            header('location:order.php');

        }
 
 }
?>

<!-- user -->
<!-- delete -->
<?php
    if(isset($_GET['delete_user'])){
        $delete_id = $_GET['delete_user'];
    
        $query="DELETE FROM users WHERE id = ?";
        $del_category = $connect->prepare($query);
        $del_category -> execute([$delete_id]);

        echo '<meta http-equiv="refresh" content="2;url=user.php">';
        flash_alert('Message', 'User has been successfully deleted!', FLASH_SUCCESS);
    }    
?>
<!-- add -->


<?php
    
if (isset($_POST['update_user'])){

    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $number = $_POST['number'];
    $dob = $_POST['dob'];
    $id = $_POST['uid'];

    $query = "SELECT * FROM users WHERE id = ?";
    $stmt = $connect->prepare($query);
    $stmt->execute([$id]);
    $existingProduct = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($existingProduct) {
        if (($name == $existingProduct['name'] && $email == $existingProduct['email'] && $address == $existingProduct['address'] && $number == $existingProduct['number'] && $dob == $existingProduct['dob'])) {
            flash_alert('Message', 'No changes have been made!', FLASH_INFO);
            header('location:user.php');
        } else {
            $id = (int)$id;
            $query = "SELECT * FROM `users` WHERE id <> ? AND email = ?";
            $get = $connect->prepare($query);
            $get->execute([$id, $_POST['email']]);
            
            if ($get->rowCount()>0) {
                    flash_alert('Error', 'Email is already registered by other user!', FLASH_DANGER);
            } else {
                $id = (int)$id;
                $query = "SELECT * FROM `users` WHERE id <> ? AND number = ?";
                $get = $connect->prepare($query);
                $get->execute([$id, $_POST['number']]);

                if ($get->rowCount()>0) {
                    flash_alert('Error', 'Number is already registered by other user!', FLASH_DANGER);
            } else {
                $change = 0;
            if (!empty($name)){
                $query = "UPDATE users SET name ='".$name."' WHERE id = $id";
                $updatedb= $connect->prepare($query);
                $updatedb ->execute();
                $change++;     
            }

            if (!empty($email)){
                $query = "UPDATE users SET email ='".$email."' WHERE id = $id";
                $updatedb= $connect->prepare($query);
                $updatedb ->execute();
                $change++;     
            }

            if (!empty($address)){
                $query = "UPDATE users SET address ='".$address."' WHERE id = $id";
                $updatedb= $connect->prepare($query);
                $updatedb ->execute();
                $change++;     
            }

            if (isset($number)){
                $query = "UPDATE users SET number ='$number' WHERE id = $id";
                $updatedb= $connect->prepare($query);
                $updatedb ->execute();
                $change++;     
            }

            if (!empty($dob)){
            $query = "UPDATE users SET dob ='".$dob."' WHERE id = $id";
            $updatedb= $connect->prepare($query);
            $updatedb ->execute();
            $change++;     
            }

            if ($change > 0) {
                flash_alert('Message', 'User data has been successfully updated!', FLASH_SUCCESS);
                header('location:user.php');
                } else if ($change==0) {
                flash_alert('Message', 'No changes have been made!', FLASH_INFO); 
                header('location:user.php');
            }  

            
        }
    }


        }
    }
}
?>

<?php

if(isset($_GET['delete_category'])){
    $delete_id = $_GET['delete_category'];

    $query="SELECT type FROM category WHERE id = ?";
    $get_type = $connect->prepare($query);
    $get_type -> execute([$delete_id]);
    $fetch_type = $get_type -> fetch(PDO::FETCH_ASSOC);
    $type = implode($fetch_type);



    $query="DELETE FROM category WHERE id = ?";
    $del_c = $connect->prepare($query);
    $del_c -> execute([$delete_id]);

    $query="DELETE FROM products WHERE type = ?";
    $del_products = $connect->prepare($query);
    $del_products -> execute([$type]);


    echo '<meta http-equiv="refresh" content="1;url=add_category.php">';
    flash_alert('Message', 'Category has successfully been deleted', FLASH_SUCCESS);

}

if(isset($_POST['add_category'])){

    $category = $_POST['categoryname'];
  
    $select_category = $connect->prepare("SELECT * FROM category WHERE type = ? ");
    $select_category -> execute([$category]);

    if($select_category->rowCount() > 0) {
        $message_error[] = 'Category already exist!';
    } else {
        $query = "INSERT INTO category (type) VALUES (?)";
        $insert_category = $connect->prepare($query);
        $insert_category -> execute([$category]);
        flash_alert('Message', 'New category has successfully been added', FLASH_SUCCESS);
        
    }

}
?>




