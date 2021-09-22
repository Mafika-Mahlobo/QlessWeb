<?php
require_once('config.php');
?>
<?php

if(isset($_POST)){

	
	$Idnum 			= $_POST['Id'];
	$name			= $_POST['name'];
	$password 		= $_POST['password'];
	$repassword 	= $_POST['repassword'];
	$phonenumber	= $_POST['phonenumber'];

		if($password == $repassword){
			$password = sha1($password);

			$check_sql = "SELECT * FROM `users` WHERE `Id_number` = '".$Idnum."'";
			$stmtselect = $db->prepare($check_sql);
			$check_res = $stmtselect->execute([$Idnum]);
			if($stmtselect->rowCount() > 0){
				echo "this Email address is already regitered.";
			}else{
				$sql = "INSERT INTO users (Id_Number, username, Userpassword, phone ) VALUES('".$Idnum."','".$name."','".$password."','".$phonenumber."')";
				$stmtinsert = $db->prepare($sql);
				$result = $stmtinsert->execute([$name, $Idnum,$password, $phonenumber]);
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