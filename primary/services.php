<?php
$con = mysql_connect("localhost", "root", "") or die(mysql_error());
$db = mysql_select_db("schools", $con) or die(mysql_error());
//$hello = "thankyou!";

if(isset($_POST['add'])){

 

$studentname = $_POST['studentName'];
$parentname = $_POST['parentName'];
$phone = $_POST['phone'];
$location = $_POST['location'];
$dob = $_POST['dob'];
$class = $_POST['class'];
$email = $_POST['email'];
$namecurrent = $_POST['nameCurrent'];
$message = $_POST['desc'];
$imgFile = $_FILES['user_image']['name'];
$tmp_dir = $_FILES['user_image']['tmp_name'];
$imgSize = $_FILES['user_image']['size'];    

$upload_dir = 'user_images/'; // upload directory
 
   $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
  
   // valid image extensions
   $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
  
   // rename uploading image
   $userpic = rand(1000,1000000).".".$imgExt;
    
   // allow valid image file formats
   if(in_array($imgExt, $valid_extensions)){   
    // Check file size '5MB'
    if($imgSize < 5000000)    {
     move_uploaded_file($tmp_dir,$upload_dir.$userpic);
    }
    else{
     $errMSG = "Sorry, your file is too large.";
    }
   }
   else{
    $errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";  
   }
  
  
  
    
    
    
    

    
    
    


$sql = "insert into application (studentName, parentName, phone, location, dob, class, email, nameCurrent, message, upic) values('$studentname','$parentname','$phone', '$location', '$dob', '$class', '$email', '$namecurrent', '$message', '$userpic' )";

$query = mysql_query($sql,$con) or die(mysql_error());
//header("location: landing.php");
if(!$query)
{
	echo "<h3>"."Sorry, Message has not been sent try again later"."</h3>";

}
else{
	echo " <link href=\"css/bootstrap.css\" rel=\"stylesheet\">
	<div class = \"jumbotron\"><h3 align = 'center'>Thankyou, Message has been sent</h3>
	<center> <a href = \"index.html \"> Back to homepage</a> </center></div>"; 
	
	
}

}

	// header("location: quote.php");
?>