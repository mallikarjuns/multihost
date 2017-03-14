<?php

define('DB_NAME', 'wordpress');
define('DB_USER', 'root');
define('DB_PASSWORD', 'wordpress');
define('DB_HOST', 'mysql');

$link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD);

if (!$link) {
	die('Could not Connect: ' . mysqli_error());
}

$db_selected = mysqli_select_db($link, DB_NAME);

if (!$db_selected)  {
	die('Can\'t use ' . DB_NAME . ': ' . mysqli_error());
}

#echo 'Connected Successfully';
$value = $_POST['Name'];
$value1 = $_POST['Surname'];
$value2 = $_POST['Gender'];
$value3 = $_POST['Age'];
$value4 = $_POST['Address'];
$sql = "INSERT INTO demo(Name, Surname, Gender, Age, Address) VALUES ('$value', '$value1', '$value2', '$value3', '$value4')";
if (!mysqli_query($link, $sql)) {
	die('Error: ' . mysql_error());
}
mysqli_close($link);

?>
