<?php
$con = mysql_connect("localhost","root","") or die(mysql_error());
$db = mysql_select_db('schools') or die(mysql_error());

if(isset($_POST['delete'])) {
  $deletequery = "DELETE FROM application  WHERE id = '$_POST[hidden]'";
mysql_query($deletequery) or die(mysql_error());
//echo "duty has been completed";
};

 $selectSQL = "SELECT * FROM application;";
 if( !( $selectRes = mysql_query( $selectSQL ) ) ){
    echo 'Retrieval of data from Database Failed - #'.mysql_errno().': '.mysql_error();
  }else{

?>

<link rel="stylesheet" href="css/bootstrap.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <div class="jumbotron">
  	<h1 align="center"> Sent Applications </h1> 
  	<center> <a href = "index.html "> Back to homepage</a> </center>
  </div>
<div class="table-responsive">
<table class = "table " border = "1">
  <thead class="table-hover">
    <tr>
	   <th> Id</th>
	   <th> Student Name</th>
       <th>Parent Name</th>
       <th>Phone</th>
       <th>Location</th>
	   <th>Date of birth</th>
	   <th>Class</th>
	   <th>Email</th>
     <th>Current school</th>
     <th>Description</th>
        <th>Result scan</th>
        <th>Actions</th>
      
    </tr>
  </thead>
  <tbody>
  <?php
      if( mysql_num_rows( $selectRes )==0 ){
        echo '<tr><td colspan="4">No Rows Returned</td></tr>';
      }else{
        while( $row = mysql_fetch_array( $selectRes ) ){
echo "<tr><td>" .$row['id']."</td> <td>".$row['studentName']."</td><td>".$row['parentName']."</td><td>".$row['phone']."</td>".
"<td>".$row['location']."</td><td>".$row['dob']."</td><td>".$row['class']."</td><td>".$row['email']."</td>".
"<td>".$row['nameCurrent']."</td><td>".$row['message']."</td><td>". '<img width = '.'200px'.' '.'height = '. '200px'.' '. 'src= "user_images/' .$row['upic']. "\"/>". " </td>

<td>
 
    <form action=\"checkapplications.php\" method=\"post\">
        <input type=\"hidden\" name=\"hidden\" value = \"" . $row['id'] ."\" />".
        "<input type=\"submit\" value=\"Delete\" name=\"delete\" />
      </form>
               </td></tr>";
               
        }
    }
  
      
  
      
    ?>
  </tbody>
  </table>
  </div>

<?php 
}

 ?>