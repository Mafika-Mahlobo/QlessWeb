<?php
session_start();
require_once('config.php');


if(isset($_POST["password"])){
	$pass = sha1($_POST["password"]);
	
	$Idnum			= $_POST['Id'];
	$name			= $_POST['name'];
	$password 		= $pass;
	$phonenumber	= $_POST['phonenumber'];

	for ($i =0; $i < count($_SESSION['userlogin']); $i++) 
      {
    $IdUpdate  = $_SESSION['userlogin'][$i]['Id_Number'];
    }

		
    $sql = "UPDATE `users` SET `Id_Number`='".$Idnum."',`username`='".$name."',`UserPassword`='".$password."',`phone`='".$phonenumber."' WHERE `Id_Number` = '".$IdUpdate."'";
	$stmtupdate = $db->prepare($sql);
	$result = $stmtupdate->execute([$name, $Idnum, $password, $phonenumber]);
			
    
			
	if($result){
		$newlogin = "SELECT * FROM `users` WHERE `Id_Number` = '".Idnum."' AND Userpassword = '".$password."'"; 
		$stmtselect = $db->prepare($newlogin);
		$result = $stmtselect->execute([$Idnum, $password]);
        $user = $stmtselect->fetchAll(PDO::FETCH_ASSOC);
        $_SESSION['user'] = $name;
        $_SESSION['userlogin'] = $user;
		echo "1";
	}else{
		echo 'There were erros while saving the data.';
	}
			
}else{
	echo 'No data';
}