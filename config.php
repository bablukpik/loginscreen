<?php
$servername = "localhost";
$username = "root";
$password = "";

$conn = mysqli_connect($servername, $username, $password);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$result = mysqli_select_db($conn,"dbregistration");
if(!$result){
	echo "Success";
}
?>