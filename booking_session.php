<?php 
session_start();

if(isset($_POST["flag"])){
	$_SESSION["BOOKING"] = $_POST["flag"];
}else{
 	echo "not flag!";
}



?>