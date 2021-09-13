 //  <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
 //  <script src="assets/js/function.js"></script>

 //Funskino per login loading (data-text Duke u kyqur)
 $(document).ready(function login_loading() {
     $('#login_submit').click(function () {
         if (($('#username').val().length !== 0) && ($('#password').val().length !== 0)) {
             $(".loader").addClass("is-active");
         }
     });
 });

 //Funskino per mesazhi loading (data-text Mesazhi duke u derguar)
 $(document).ready(function () {
     $('#btn_mesazhi').click(function () {
         if (($('#mesazhi').val().length !== 0)) {
             $(".loader").addClass("is-active");
         }
     });
 });

 //Funskino per post_delete (data-text Duke u fshire)
 $(document).ready(function () {
     $('#delete_btn').click(function () {
         $(".loader").addClass("is-active");
     });
 });

 //Funskino per register (data-text Duke u Regjistriar)
 /*
 $(document).ready(function () {
     $('#register_submit').click(function () {
         if (($('#emri').val().length !== 0) && ($('#mbiemri').val().length !== 0) && ($('#username').val().length !== 0) && ($('#password').val().length !== 0) && ($('#email').val().length !== 0)) {
             $(".loader").addClass("is-active");
         }
     });
 });
*/

 //Funskino password edit (data-text Ju lutem prisni)
 $(document).ready(function () {
     $('#btn_update').click(function () {
         if (($('#passowordi_momental').val().length !== 0) && ($('#passowordi_new').val().length !== 0)($('#rishruaj_passowordi_new').val().length !== 0)) {
             $(".loader").addClass("is-active");
         }
     });
 });

 //Funskino per uplodiomin e fotos te profilit (data-text Ju lutem prisni)
 $(document).ready(function () {
     $('#photo_upload_btn').click(function () {
         if (($('#upload').val().length !== 0)) {
             $(".loader").addClass("is-active");
         }
     });
 });

 // Funskino show password
 function show_password() {
     var show_password = document.getElementById("password");
     if (show_password.type === "password") {
         show_password.type = "text";
     } else {
         show_password.type = "password";
     }
 }

 // Loading Page
$(document).ready(function(){
 
 var limit = 4;
 var start = 0;
 var action = 'inactive';
 function load_country_data(limit, start)
 {
  $.ajax({
   url:"server.php",
   method:"POST",
   data:{limit:limit, start:start},
   cache:false,
   success:function(data)
   {
    $('#jumbotron').append(data);
    if(data == '') 

    {
     $('#jumbotron_loading').html("<p class='loagin_no_more_post'>Nuk ka m&euml; postime.Shkoni b&euml;ni postime <a style=' color:red;' href='crate_post.php'>k&euml;tu</a> </p>");
     action = 'active';
    }
    else
    {
     $('#jumbotron_loading').html("<img style='width:100%; height:20px;' src='assets/image/loading.gif'><img>");
     action = "inactive";
    }
   }
  });
 }

 if(action == 'inactive')
 {
  action = 'active';
  load_country_data(limit, start);
 }
 $(window).scroll(function(){
  if($(window).scrollTop() + $(window).height() > $("#jumbotron").height() && action == 'inactive')
  {
   action = 'active';
   start = start + limit;
   setTimeout(function(){
    load_country_data(limit, start);
   }, 600);
  }
 });
 
});