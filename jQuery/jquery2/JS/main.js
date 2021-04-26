/*
var h1 = document.getElementById('titulli').innerHMTL
console.log('h1');

jQuery(window).ready(
	function() {
	var h1 = jQuery '(#titulli)'.html()
	console.log(h1);
	var linku = jquery('a.linku-jon');
	console.log(linku);
});

var h1 = document.getElementById('titulli').innerHMTL
console.log('h1');

$(window).ready(
	function() {
	var h1 = $ '(#titulli)'.html()
	console.log(h1);
	var linku = $('a.linku-jon');
	console.log(linku);
	});

	$(document).ready(function(){
  $("p").click(function(){
    $(this).hide();
  });
});
	*/
/*  1
$(window).ready(function(){
	$("input").keydown(function(){
		$("input").css("background-color", "orange");
	});
});
*/
/* 2
i=0
$(document).ready(function(){
	$("input").css("background-color", "red").keypress(function(){
		$("span").text(i += 1);
	});
});
*/
/* 3
$(document).ready(function(){
	$("p").mouseover(function(){
		$("p").css("background-color", "orange");
	});
	$("p").mouseout(function(){
		$("p").css("background-color", "red");
	});
});
*/
/* 4
$(document).ready(function(){
	$("p").mouseover(function(){
		$("p").css("background-color", "green");
	});
	$("p").mouseout(function(){
		$("p").css("background-color", "red");
	});
});
*/
/* 5
$(document).ready(function(){
	$("#hide").click(function(){
		$("p").hide();
	});
	$("#show").click(function(){
		$("p").show();
	});
});
*/
$(window).ready(function(){
			$(".btn1").click(function () {
				$("p").fadeOut();
			});
			$(window).ready(function () {
						$(".btn2").click(function () {
							$("p").fadeIn();
						});