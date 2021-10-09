<?php
function compressImage($source, $destination, $quality) { 
    // Get image info 
    $imgInfo = getimagesize($source); 
    $mime = $imgInfo['mime']; 
     
    // Create a new image from file 
    switch($mime){ 
        case 'image/jpeg': 
            $image = imagecreatefromjpeg($source); 
            break; 
        case 'image/png': 
            $image = imagecreatefrompng($source); 
            break; 
        case 'image/gif': 
            $image = imagecreatefromgif($source); 
            break; 
        default: 
            $image = imagecreatefromjpeg($source); 
    } 
     
    // Save image 
    imagejpeg($image, $destination, $quality); 
     
    // Return compressed image 
    return $destination; 
}

	function generateNewString($len = 15) {
    $big = "QWERTYUIOPASDFGHJKLZXCVBNM";
    $small = "qwertyuiopasdfghjklzxcvbnm";
    $number = "1234567890";
    $symbol = "!@#$%^&*?*";
		$token = $big.$small.$number.$symbol;
		$token = str_shuffle($token);
		$token = substr($token, 0, $len);
    

		return $token;
	}

	function redirectToLoginPage() {
		header('Location: login.php');
		exit();
	}



 function data_time($timestamp)  
 {  
      $time_ago = strtotime($timestamp);  
      $current_time = time();  
      $time_difference = $current_time - $time_ago;  
      $seconds = $time_difference;  
      $minutes      = round($seconds / 60 );           // value 60 is seconds  
      $hours           = round($seconds / 3600);           //value 3600 is 60 minutes * 60 sec  
      $days          = round($seconds / 86400);          //86400 = 24 * 60 * 60;  
      $weeks          = round($seconds / 604800);          // 7*24*60*60;  
      $months          = round($seconds / 2629440);     //((365+365+365+365+366)/5/12)*24*60*60  
      $years          = round($seconds / 31553280);     //(365+365+365+365+366)/5 * 24 * 60 * 60  
      if($seconds <= 60)  
      {  
     return "Just Now";  
   }  
      else if($minutes <=60)  
      {  
     if($minutes==1)  
           {  
       return "one minute ago";  
     }  
     else  
           {  
       return "$minutes minutes ago";  
     }  
   }  
      else if($hours <=24)  
      {  
     if($hours==1)  
           {  
       return "an hour ago";  
     }  
           else  
           {  
       return "$hours hrs ago";  
     }  
   }  
      else if($days <= 7)  
      {  
     if($days==1)  
           {  
       return "yesterday";  
     }  
           else  
           {  
       return "$days days ago";  
     }  
   }  
      else if($weeks <= 4.3) //4.3 == 52/12  
      {  
     if($weeks==1)  
           {  
       return "a week ago";  
     }  
           else  
           {  
       return "$weeks weeks ago";  
     }  
   }  
       else if($months <=12)  
      {  
     if($months==1)  
           {  
       return "a month ago";  
     }  
           else  
           {  
       return "$months months ago";  
     }  
   }  
      else  
      {  
     if($years==1)  
           {  
       return "one year ago";  
     }  
           else  
           {  
       return "$years years ago";  
     }  
   }  
 }  

 function cleanItUp($cmt,$wordlist=null,$character="*",$returnCount=false)
{           
    if($wordlist==null)
    {
        $wordlist="nigga|nigger|niggers|sandnigger|sandniggers|sandniggas|sandnigga|honky|honkies|chink|chinks|gook|gooks|wetback|wetbacks|spick|spik|spicks|spiks|bitch|bitches|bitchy|bitching|cunt|cunts|twat|twats|fag|fags|faggot|faggots|faggit|faggits|ass|asses|asshole|assholes|shit|shits|shitty|shity|dick|dicks|pussy|pussies|pussys|fuck|fucks|fucker|fucka|fuckers|fuckas|fucking|fuckin|fucked|motherfucker|motherfuckers|motherfucking|motherfuckin|mothafucker|mothafucka|motherfucka";
    }
    $replace = 'preg_replace("/./","' .$character .'","\\1")';
    $comment = preg_replace("/\b($wordlist)\b/ie", $replace,$cmt,-1,$count);

    if($returnCount!=false)
    {
        return $count;
    }
    elseif($returnCount!=true)
    {
        return $comment;
    }
}
 
?>
