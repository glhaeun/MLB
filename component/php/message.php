<?php

if(isset($message)){
    foreach($message as $message){
        echo' 
        <div class="errormssg">
            <span>'.$message.'</span>
            <p onclick="this.parentElement.remove();">X</p>
        </div>
';
    }
}
?>

<?php

if(isset($error)){
    foreach($error as $error){
        echo' 
        <div class="errormssg">
            <span>'.$error.'</span>
            <p onclick="this.parentElement.remove();">X</p>
        </div>
';
    }
}
?>