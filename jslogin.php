<?php
session_start();
require_once('config.php');

$email = $_POST['email'];
$pass = $_POST['password'];

$password = sha1($pass);

$sql = "SELECT * FROM `users` WHERE email = '".$email."' AND Userpassword = '".$password."' LIMIT 1";
$stmtselect  = $db->prepare($sql);
$result = $stmtselect->execute([$email, $password]);

if($result){
	$user = $stmtselect->fetchAll(PDO::FETCH_ASSOC);
	if($stmtselect->rowCount() > 0){
		for($i = 0; $i < count($user); $i++)
		{
			$_SESSION['user'] = $user[$i]['username'];
			$_SESSION['role'] = $user[$i]['Userrole'];
		}
		$_SESSION['userlogin'] = $user;
		echo "1";
	}else{
		echo "There no user for that combo";		
	}
}else{
	echo "Oops, system error. try again later.";
}