<?php
require_once('config.php');
?>
<?php

if(isset($_POST)){

	
	$email 			= $_POST['email'];
	$name			= $_POST['name'];
	$role 			= $_POST['role'];
	$org 			= $_POST['organization'];
	$password 		= $_POST['password'];
	$repassword 	= $_POST['repassword'];
	$phonenumber	= $_POST['phonenumber'];

		if($password == $repassword){
			$password = sha1($password);

			$check_sql = "SELECT * FROM `users` WHERE `Email` = '".$email."'";
			$stmtselect = $db->prepare($check_sql);
			$check_res = $stmtselect->execute([$email]);
			if($stmtselect->rowCount() > 0){
				echo "this Email address is already regitered.";
			}else{
				$sql = "INSERT INTO users (Email, username, Userrole, organization, Userpassword, phone ) VALUES('".$email."','".$name."','".$role."','".$org."','".$password."','".$phonenumber."')";
				$stmtinsert = $db->prepare($sql);
				$result = $stmtinsert->execute([$name, $email, $role, $org, $password, $phonenumber]);
				if($result){
					echo "1";
				}else{
					echo 'There were erros while saving the data.';
				}
			}

		}else{
				echo 'password inputs does not match';
			}


		
}else{
	echo 'No data';
}