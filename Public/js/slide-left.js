document.querySelector(".plus-btn").addEventListener("click", function() {
    valueCount = document.getElementById("quantity").value;
    valueCount++
    document.getElementById("quantity").value = valueCount;
    if (valueCount > 1) {
        document.querySelector(".minus-btn").removeAttribute("disabled", "disabled")
        document.querySelector(".minus-btn").classList.remove("disabled", "disabled")
    }
});
document.querySelector(".minus-btn").addEventListener("click", function() {
    valueCount = document.getElementById("quantity").value;
    valueCount--
    document.getElementById("quantity").value = valueCount;
    if (valueCount == 1) {
        document.querySelector(".minus-btn").setAttribute("disabled", "disabled")
    }
});

function openSlideMenu() {
    var openMenu = document.getElementById("menu");
    var content = document.getElementById("content");
    openMenu.style.transform = 'translateX(0rem)';
    openMenu.style.transition = 'all .4s';
    content.style.transform = 'translateX(-5rem)';
    content.style.transition = 'all .4s';


}

function closeSlideMenu() {
    var closeMenu = document.getElementById("menu");
    var content = document.getElementById("content");
    closeMenu.style.transform = 'translateX(-50rem)';
    closeMenu.style.transition = 'all .4s';
    content.style.transform = 'none';
}


var ProductImg = document.getElementById("ProductImg");
var SmallImg = document.getElementsByClassName("small-img");

SmallImg[0].onclick = function() {
    ProductImg.src = SmallImg[0].src;
}
SmallImg[1].onclick = function() {
    ProductImg.src = SmallImg[1].src;
}
SmallImg[2].onclick = function() {
    ProductImg.src = SmallImg[2].src;
}
SmallImg[3].onclick = function() {
    ProductImg.src = SmallImg[3].src;
}