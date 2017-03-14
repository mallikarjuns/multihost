<?php
//Get values passe from form in login.php file
 $username = $_POST['user'];
 $password = $_POST['pass'];
 
 //to prevent mysql injection
 $username = stripcslashes($username);
$password = stripcslashes($password);
#$username = mysql_real_escape_string($username);
#$password = mysql_real_escape_string($password);


$con = mysqli_connect("mysql","root","wordpress");

if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

// ...some PHP code for database "my_db"...

// Change database to "test"
mysqli_select_db($con,"wordpress");


//Query the database for user
$result = mysqli_query($con,"select * from users where username = '$username' and password = '$password'")
or die("failed to query database ".mysqli_error());
$row = mysqli_fetch_array($result);
if ($row['username'] == $username && $row['password'] == $password ){
	echo "Login Sucess!! Welcome".$row['username'];
} else {
	echo "Failed to login";
		}
?>
