
function scrollToTop() {
    window.scrollTo(0, 0);
}

function togglePopup() {
scrollToTop();
document.getElementById("popup-1").classList.add("active");
formbox.style.height = (formbox.offsetHeight - 400) + 'px' ;
loginhero.style.height = 100 + 'vh';

}

function closePopup() {
        document.getElementById("popup-1").classList.remove("active");
        document.getElementById("popup-1").classList.add("close");
        formbox.style.height = (formbox.offsetHeight + 400) + 'px' ;
        loginhero.style.height = 180 + 'vh';
}
var loginform = document.getElementById("login");
var registerform = document.getElementById("register");
var forgotpassform = document.getElementById("forgot");
var indicatorbutton = document.getElementById("btn");
var formbox = document.getElementById("formbox");
var loginhero = document.getElementById("hero");



function register() {
    registerform.style.transform = "translateX(405px)";
    loginform.style.transform = "translateX(380px)";
    forgotpassform.style.transform = "translateX(380px)"
    indicatorbutton.style.transform = "translateX(110px)" ;
    let random = formbox.offsetHeight;
    let random2 = loginhero.offsetHeight;

    if ( random == 400 || random2 == 100 ) {
        formbox.style.height = (formbox.offsetHeight + 425) + 'px' ;
        formbox.style.top = 7 + '%';
        loginhero.style.height = 150 + 'vh';
    }
}

function login() {
    registerform.style.transform = "translateX(0px)";
    loginform.style.transform = "translateX(0px)";
    forgotpassform.style.transform = "translateX(0px)";
    indicatorbutton.style.transform = "translateX(0px)" ;
    let random = formbox.offsetHeight;
   let random2 = loginhero.offsetHeight;
    if ( random == 825 ) {
        formbox.style.height = (formbox.offsetHeight - 425) + 'px' ;
        formbox.style.top = 10 + '%';
        loginhero.style.height = 88.7 + 'vh';
    } else if (random == 350) {
        formbox.style.height = (formbox.offsetHeight + 50) + 'px' ;
    }
    showHideFormSwitchButton("Show");
    setTitle("");

}

function agreeTermsandCondition() {
    closePopup();

    var checkbox = document.getElementById("tnc");
    checkbox.checked = true;

}

window.addEventListener('DOMContentLoaded', (event) => {
document.getElementById("date").valueAsDate = new Date();
});

function showPassword() {
    var show = document.getElementById("loginpassword");
    if (show.type == 'password') {
        show.type='text';
    } else{
        show.type='password';
    }
}

function setTitle (title) {
    var heading = document.getElementById("heading");
    heading.innerHTML = title;
}

function forgotpass() {
    registerform.style.transform = "translateX(-405px)";
    loginform.style.transform = "translateX(-380px)";
    forgotpassform.style.transform = "translateX(-350px)" ;
    let random = formbox.offsetHeight;

    

    if ( random == 400 ) {
        formbox.style.height = (formbox.offsetHeight - 50) + 'px' ;
    } 
    showHideFormSwitchButton("hide");
    setTitle("Forgot Password");
}

function showHideFormSwitchButton (ShowOrHide) 
{
    var formSwitchButton = document.getElementById("formSwitchButton");

    if (ShowOrHide == "Show") {
        formSwitchButton.style.display = "block";
    } else {
        formSwitchButton.style.display = "none";
    }
}



const email_l = document.getElementById("loginemail");
const password_l = document.getElementById("loginpassword");

const email_r = document.getElementById("registeremail");
const name_r = document.getElementById("registername");
const add_r = document.getElementById("registeraddress");
const number_r = document.getElementById("registernumber");
const password_r = document.getElementById("registerpassword");
const confirmpass_r = document.getElementById("confirmpassword");
const bdate_r = document.getElementById("date");

function checkEmail(input) {
const email_r2 = input;
if(email_r2.length == 0 || isEmail(email_r2)==false) {
const xmlhttp = new XMLHttpRequest();
xmlhttp.onload = function() {
    const tes =document.getElementById("error1");
    console.log(tes);
    document.getElementById("error1").innerText = "invalid email";
    const formcontrol = document.getElementById("fc1");

small.innerText = message;
formControl.className = 'form-control error';
}

xmlhttp.open("GET","user_login.php?q="+email_r2);
xmlhttp.send();
}
console.log("hi");
}

function setErrorFor(input, message) {
const formControl = input.parentElement;
console.log(formControl);
const small = formControl.querySelector("small");

small.innerText = message;

formControl.className = 'form-control error';
}

function setNormalFor(input, message) {
const formControl = input.parentElement;
console.log(formControl);
const small = formControl.querySelector("small");

small.innerText = message;

formControl.className = 'form-control normal';
}

function setSuccessFor(input) {
const formControl = input.parentElement;
formControl.className = 'form-control success';

}

function isNumbers(phone) {
return /^08[1-9][0-9]{7,10}$/.test(phone);
}

function isEmail (email) {
return /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|.(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email);
}

function isName(name) {
return /^[a-zA-Z-' ]*$/.test(name);

}

function isPassword (password) {
return /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{7,15}$/.test(password);
}


function normalisasiNomorHP(phone) {
phone = String(phone).trim();
if (phone.startsWith('+62')) {
phone = '0' + phone.slice(3);
} else if (phone.startsWith('62')) {
phone = '0' + phone.slice(2);
}
return phone.replace(/[- .]/g, '');
}

function tesNomorHP(phone) {
if (!phone || !/^08[1-9][0-9]{7,10}$/.test(phone)) {
return false;
}
return true;
}