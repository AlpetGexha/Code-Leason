var v_button = document.getElementById("btn1");
var v_button2 = document.getElementById("btn2");
var v_button3 = document.getElementById("btn3");
var v_text = document.getElementById("text1");

v_button.onclick = function() {
    v_text.style.cssText = "color:red; background-color: black; text-align  center; font-size: 100px ;padding:20px;"
}

v_button2.onclick = function() {
    v_text.style.cssText = "color:yellow; background-color: lightblue; text-align  center; font-size: 100px ;padding:20px;"
}

v_button3.onclick = function() {
    v_text.style.cssText = "color:Black; background-color: Blue; text-align  center; font-size: 100px ;padding:20px;"
}