function showPassword() {
    var show = document.getElementById("loginpassword");
    if (show.type == 'password') {
        show.type='text';
    } else{
        show.type='password';
    }
}