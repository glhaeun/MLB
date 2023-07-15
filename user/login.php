<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MLB</title>
    <link rel="stylesheet" href="../component/css/loginn.css" text="text/css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">



    
</head>
<?php
    include '../component/php/connect.php';
    include '../component/php/sendEmail.php';


?>

<body>
    <?php include '../component/php/nav.php'; ?>
    <?php include '../component/php/message.php'; ?>
    <?php include '../component/php/flash.php'; ?>

<?php
    $query = "SELECT * FROM others ";
    $show_content = $connect->prepare($query);
    $show_content -> execute();
    $fetch_content = $show_content->fetch(PDO::FETCH_ASSOC);       
    
    include '../component/php/script.php';


?>
<section id="container">

<?php echo flash('success'); ?>
<?php echo flash('error'); ?>
        <div class="hero" id="hero" style="background-image: url(../img_upload/page/others/<?=$fetch_content['bannerlogin'] ?>); min-height:150vh;">
            <div class="form-box" id="formbox">
                <div id="heading"></div>
                <div class="button-box" id="formSwitchButton">
                    <div id="btn"></div> 
                    <button type="button" class="toggle-btn" onclick="login()">Login</button>
                    <button type="button" class="toggle-btn" onclick="register()">Register</button>
                </div>

                <form id="register" class="input-groups" method="POST" action="<?=$_SERVER['PHP_SELF'];?>">
                    <div class="form-control" id="fc1">
                        <label for="">Email</label>
                        <input onkeydown="setNormalFor(this)" id="registeremail" type="text" name="email" class="input-field" placeholder="Enter Email" required>  
                        <i class="fa-solid fa-circle-check" style="color: green;"></i>
                        <i class="fa-solid fa-circle-exclamation" style="color: #ff0000;"></i>      
                        <small>Error Message</small>                
                    </div>
                    <div class="form-control">
                        <label for="">Name</label>
                        <input onkeydown="setNormalFor(this)" id="registername" type="text" name="fname" class="input-field" placeholder="Enter Name" required>
                        <i class="fa-solid fa-circle-check" style="color: green;"></i>
                        <i class="fa-solid fa-circle-exclamation" style="color: #ff0000;"></i>      
                        <small>Error Message</small>             </div>
                    <div class="form-control">
                        <label for="">Address</label>
                        <input onkeydown="setNormalFor(this)" id="registeraddress" type="text" name="address"  class="input-field" placeholder="Enter Address" required>
                        <i class="fa-solid fa-circle-check" style="color: green;"></i>
                        <i class="fa-solid fa-circle-exclamation" style="color: #ff0000;"></i>      
                        <small>Error Message</small>             
                    </div>
                    <div class="form-control">
                        <label for="">Phone Number</label>
                    <input onkeydown="setNormalFor(this)" id="registernumber" type="text" name="number"  class="input-field" placeholder="Enter Phone Number" required>
                    <i class="fa-solid fa-circle-check" style="color: green;"></i>
                        <i class="fa-solid fa-circle-exclamation" style="color: #ff0000;"></i>      
                        <small>Error Message</small>             </div>
                    <div class="form-control">
                        <label for="">Date of Birth</label>
                        <input type="date" name="date"  class="input-field" id="date" min='1903-01-01' max='2005-12-12' required>
                        <small>Error Message</small>          
                    </div>
                    <div class="form-control ">
                        <label for="">Password</label>
                        <input onkeydown="setNormalFor(this)" id="registerpassword" type="password" name="registerpass" class="input-field" placeholder="Enter Password" required>
                        <i class="fa-solid fa-circle-check" style="color: green;"></i>
                        <i class="fa-solid fa-circle-exclamation" style="color: #ff0000;"></i>      
                        <small>Error Message</small>             
                    </div>
                    <div class="form-control ">
                        <label for="">Confirm Password</label>
                        <input onkeydown="setNormalFor(this)" id="confirmpassword" type="password" name="confirmpass" class="input-field" placeholder="Enter Password" required>
                        <i class="fa-solid fa-circle-check" style="color: green;"></i>
                        <i class="fa-solid fa-circle-exclamation" style="color: #ff0000;"></i>      
                        <small>Error Message</small>             
                    </div>
                    <div class="checkbox">
                        <div class="innercheckbox">
                            <input id="tnc" type="checkbox" class="check-box" name="termcondition"><span>I agree to the <div class="click" onclick="togglePopup()" style="display: inline; cursor:pointer;">Terms and Conditions</div></span>     
                        </div>
                    </div>       
                    <button type="submit" id="form-register" class="submit-btn" name="register" onclick="return clickRegister()" >Register</button>
                </form>

                <form action="<?=$_SERVER['PHP_SELF'];?>" id="login" class="input-groups" method="POST">
                    <div class="form-control">
                        <label for="">Email</label>
                        <input type="text" id="loginemail"  class="input-field" placeholder="Enter Email" name="email" required>
                        <i class="fa-solid fa-circle-check" style="color: green;"></i>
                        <i class="fa-solid fa-circle-exclamation" style="color: #ff0000;"></i>      
                        <small>Error Message</small>             
                    </div>
                    <div class="form-control ">
                    <label for="">Password</label>
                    <input type="password" id="loginpassword" class="input-field" placeholder="Enter Password" name="password" required>
                    <i class="fa-solid fa-circle-check" style="color: green;"></i>
                        <i class="fa-solid fa-circle-exclamation" style="color: #ff0000;"></i>      
                        <small>Error Message</small>             
                    </div>
                    <div class="checkbox" style="justify-content:center; text-align: center;">
                        <div class="innercheckbox" style="display:flex; flex-direction: row;">
                            <input id="showpass" type="checkbox" class="check-box" onclick="showPassword()" style="width:100px;" ><span style="font-size: 14px; color: black; margin: 10px 0;">Show Password</span>     
                        </div>
                        <div class="innertext" style="justify-content: center; justify-items:center; text-align: center;">
                            <label for="" onclick="forgotpass()">Forgot Password?</label> 
                        </div>
                    </div>                  <button type="submit" class="submit-btn" name="login" style="margin-top: 10px;">Login</button>
                </form>

                <form action="<?=$_SERVER['PHP_SELF'];?>" id="forgot" class="input-groups" method="POST" style="left: 380px;">
                <p style="font-size: 12px; margin-bottom: 15px;">Please enter the email address you'd like your password information sent to</p>    
                <div class="form-control">
                        <label for="">Email</label>
                        <input type="text" id="recheckemail"  class="input-field" placeholder="Enter Email" name="recheckemail" required>
                        <i class="fa-solid fa-circle-check" style="color: green;"></i>
                        <i class="fa-solid fa-circle-exclamation" style="color: #ff0000;"></i>      
                        <small>Error Message</small>             
                    </div>
                    <div class="checkbox" style="height: 30px">
                        <div class="innertext">
                            <label for="" onclick="login()">Back To Login</label> 
                        </div>
                    </div>                  <button type="submit" class="submit-btn" name="forgot">Request reset link</button>
                </form>
            </div>
        </div>
    </section>

    <?php include '../component/php/terms.php'; ?>
    <?php include '../component/php/footer.php'; ?>

    <script src="../component/js/login.js"></script>

    <script>
        
const form2 = document.querySelector("#register");

function clickRegister() {

const email_r2 = form2.email.value
const name_r2 = form2.fname.value
const add_r2 = form2.address.value
const number_r2 = form2.number.value
const password_r2 = form2.registerpass.value
const confirmpass2 = form2.confirmpassword.value
document.cookie = "email="+email_r2;

console.log(email_r2);
console.log(document.cookie);
let error = 0;



if (isEmail(email_r2)){
setSuccessFor(email_r);
} else {
setErrorFor(email_r, 'Invalid email!');
error++;
}


if (isName(name_r2)){
setSuccessFor(name_r);
} else {
setErrorFor(name_r, 'Invalid name!');
error++;
}

if (isNumbers(number_r2)){
setSuccessFor(number_r);
} else {
setErrorFor(number_r, 'Phone number should start with 08xx!');
error++;
}

if(add_r2.length > 10) {
setSuccessFor(add_r);
} else {
setErrorFor(add_r, 'Address is too short!');
error++;
}

if(isPassword(password_r2)){
if(confirmpass2 == password_r2) {
    setSuccessFor(password_r);
    setSuccessFor(confirmpass_r);
} else {
    setErrorFor(password_r, "Mismatch Password");
    setErrorFor(confirmpass_r, "");
    error++;
}
} else {
setErrorFor(password_r, "Invalid password");
error++;

}



if (error>0) {
return false;
} else {
if(!form2.tnc.checked) {
swal("Please check terms & condition checkbox");
return false;
} return true;
} 

return false;

}
    </script>

</body>

