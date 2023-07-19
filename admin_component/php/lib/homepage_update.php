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
