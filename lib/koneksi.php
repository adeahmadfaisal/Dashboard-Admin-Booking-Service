<?php 
$host		= "localhost";
$user		= "root";
$pass		= "";
$database	= "honda";
	
	$conn	= mysqli_connect($server, $user, $pass, $database);

	if(mysqli_connect_errno()) {
		echo "Gagal terhubung ke Database :" . mysqli_connect_errno();
	}
	
?>