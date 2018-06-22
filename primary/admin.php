<?php

if (isset($_POST['login'])) {
	echo "hello";
      
	    if($_POST['user'] == "admin"  && $_POST['pass'] == "admin"){

	    	header("Location: checkapplications.php");
	    }
}






?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
</head>
<body>
<div class="container">
<div class="jumbotron">
<h2 align = "center">Admin Only</h2>
<div>
<form action="#" method="post">
    <div class="well">

        <table>

            <tr><td>

                <label>Username &nbsp;&nbsp;&nbsp;</label></td><td>
                    <input type="text" name="user"></td></tr><tr>
                        <tr><td>..</td></tr>
                            <td>
                                <label>Password&nbsp;&nbsp;&nbsp;</label></td><td>
                                    <input type="password" name="pass"></td></tr><tr><td>..</td></tr>
                                           <tr><td>
                                              <center>   <input type="submit" name="login" value="login"></center></td></tr>
        </table>
     
</form>
     </div>
</div>
</div>
</body>
</html>