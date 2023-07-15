function imgSlider(anything){
    let add = "../img/" + anything;
    document.querySelector(".caps").src = add;
}
let popup = document.getElementById("popup");

function openPopup(){
    popup.classList.add("open-popup");
    console.log("open");
}

function closePopup(){
    popup.classList.remove("open-popup");
}