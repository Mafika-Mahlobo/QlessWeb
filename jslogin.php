<?php
session_start();
require_once('config.php');

$IdNum = $_POST['IdNum'];
$pass = $_POST['password'];

$password = sha1($pass);

$sql = "SELECT * FROM `users` WHERE Id_Number = '".$IdNum."' AND Userpassword = '".$password."' LIMIT 1";
$stmtselect  = $db->prepare($sql);
$result = $stmtselect->execute([$IdNum, $password]);

if($result){
	$user = $stmtselect->fetchAll(PDO::FETCH_ASSOC);
	if($stmtselect->rowCount() > 0){
		for($i = 0; $i < count($user); $i++)
		{
			$_SESSION['user'] = $user[$i]['username'];
			//$_SESSION['role'] = $user[$i]['Userrole'];
		}
		$_SESSION['userlogin'] = $user;
		echo "1";
	}else{
		echo "User not found!";		
	}
}else{
	echo "Oops, system error. try again later.";
}