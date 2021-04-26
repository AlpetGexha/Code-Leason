var input = document.getElementById('input_id');
var button = document.getElementById('btn_id');
var text = document.getElementById('text_id');
var input_1 = document.querySelecter('#numri_1');
var input_2 = document.querySelecter('#numri_2');
var button_1 = document.querySelector('#btn1_id');
var text_1 = document.querySelector('#text1_id');

button.onclick = function() {
    text.innerHTML = input.value;
}

button_1.addEventListener('click',function(){
   // text_1.innerHTML = input_1.value + input_2.value;
   text_1.innerHTML = parseInt(input_1.value) + parseInt(input_2.value);
});