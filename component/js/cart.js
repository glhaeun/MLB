var paymentmethod = document.getElementById("payment-method");

    function display() {
        var paymentmethod = document.getElementById("payment-method").value;

        if (paymentmethod == "OVO") {
            document.getElementById("receiver").innerText = "OVO 0812345678 a/n MLB Global";
            document.getElementById("receiver").style.color = "black";
            document.getElementById("receiver").style.display="block";
        } else if (paymentmethod == "COD") {
            document.getElementById("receiver").innerText = "*COD for correct payment!";
            document.getElementById("receiver").style.color = "black";
            document.getElementById("receiver").style.display="block";
            
        } else if (paymentmethod == "Dana") {
            //
            document.getElementById("receiver").innerText = "Dana 0812122121898 a/n MLB Global";
            document.getElementById("receiver").style.color = "black";
            document.getElementById("receiver").style.display="block";
        } else if (paymentmethod == "BCA") {
            document.getElementById("receiver").innerText = "BCA 1079287654 a/n MLB Global";
            document.getElementById("receiver").style.color = "black";
            document.getElementById("receiver").style.display="block";
        } else {
            document.getElementById("receiver").style.display="none";
        }
    }

    function checkInput() {
        var paymentmethod = document.getElementById("payment-method").value;

        if (paymentmethod == "default"){
            document.getElementById("receiver").innerText = "Please choose payment method";
            document.getElementById("receiver").style.display="block";
            document.getElementById("receiver").style.color = "red";
            return false;
        } else return true;
    }