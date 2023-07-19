<?php
    if (isset($_POST['submit_about'])){
       
        $editor_titleA = $_POST['titleA'];
        $editor_contentA = $_POST['contentA'];
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
