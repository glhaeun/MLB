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
