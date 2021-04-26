varbtn_star6 = document.getElementById("btn_star6");
var btn_star5 = document.getElementById("btn_star5");
var btn_pentagon = document.getElementById("btn_pentagon");


var star6 = document.getElementById("star6");
var star5 = document.getElementById("star5");
var pentagon = document.getElementById("pentagon");

btn_star6.onclick = function () {
    star6.setAttribute("class", "shape_star6");
}

btn_star5.onclick = function () {
    star5.setAttribute("class", "shape_star5");
}
btn_pentagon.onclick = function () {
    pentagon.setAttribute("class", "shape_pentagon");
}

cstar6.onclick = function () {
    cstar6.setAttribute("class", "hide");
}

star5.onclick = function () {
    star5.setAttribute("class", "hide");
}

pentagon.onclick = function () {
    pentagon.setAttribute("class", "hide");
}