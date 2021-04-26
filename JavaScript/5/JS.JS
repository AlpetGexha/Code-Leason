var btn_circle = document.getElementById("btnCircle");
var btn_rect = document.getElementById("btnRect");
var btn_triangle = document.getElementById("btnTriangle");


var circle = document.getElementById("circle");
var rect = document.getElementById("rect");
var tirangle = document.getElementById("tirangle");

btn_circle.onclick = function () {
    circle.setAttribute("class", "shape_circle");
}

btn_rect.onclick = function () {
    rect.setAttribute("class", "shape_rect");
}

btn_triangle.onclick = function () {
    tirangle.setAttribute("class", "shape_triangle");
}

circle.onclick = function () {
    circle.setAttribute("class", "hide");
}

rect.onclick = function () {
    rect.setAttribute("class", "hide");
}

tirangle.onclick = function () {
    tirangle.setAttribute("class", "hide");
}