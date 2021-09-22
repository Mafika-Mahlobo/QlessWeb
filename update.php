<?php
session_start();
require_once('config.php');


if(isset($_POST["password"])){
	$pass = sha1($_POST["password"]);
	
	$email 			= $_POST['email'];
	$name			= $_POST['name'];
	$role 			= $_POST['role'];
	$password 		= $pass;
	$phonenumber	= $_POST['phonenumber'];

	for ($i =0; $i < count($_SESSION['userlogin']); $i++) 
      {
    $emailudate  = $_SESSION['userlogin'][$i]['Email'];
    }

		
    $sql = "UPDATE `users` SET `Email`='".$email."',`username`='".$name."',`Userrole`='".$role."',`UserPassword`='".$password."',`phone`='".$phonenumber."' WHERE `Email` = '".$emailudate."'";
	$stmtupdate = $db->prepare($sql);
	$result = $stmtupdate->execute([$name, $email, $role, $password, $phonenumber]);
			
    
			
	if($result){
		$newlogin = "SELECT * FROM `users` WHERE `email` = '".$email."' AND Userpassword = '".$password."'"; 
		$stmtselect = $db->prepare($newlogin);
		$result = $stmtselect->execute([$email, $password]);
        $user = $stmtselect->fetchAll(PDO::FETCH_ASSOC);
        $_SESSION['user'] = $name;
        $_SESSION['role'] = $role;
        $_SESSION['userlogin'] = $user;
		echo "1";
	}else{
		echo 'There were erros while saving the data.';
	}
			
}else{
	echo 'No data';
}