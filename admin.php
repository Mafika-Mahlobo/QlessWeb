<?php 

session_start();

	$name = $_SESSION['user'];

	if(!isset($_SESSION['userlogin'])){
		header("Location: index.php");

		

	}

	if(isset($_GET['logout'])){
		session_destroy();
		unset($_SESSION);
		header("Location: index.php");
	}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logged In</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/fontawesome-all.min.css">
    <link rel="stylesheet" type="text/css" href="css/iofrm-style.css">
    <link rel="stylesheet" type="text/css" href="css/iofrm-theme4.css">
</head>
<body>
    <div class="form-body">
        <div class="website-logo">
            <a href="index.html">
                <div class="logo">
                    <img class="logo-size" src="images/logo-light.png" alt="">
                </div>
            </a>
        </div>
        <div class="row">
            <div class="img-holder">
                <div class="bg"></div>
                <div class="info-holder">
                    <img src="images/graphic1.svg" alt="">
                </div>
            </div>
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <h3>Welcome <?= $name ?> </h3>
                        <p>this is the administration page!</p>

                        <form>
                        	<div class="form-button">
                                <button style="text-align: center;" id="submit" type="submit" class="ibtn" href="">Appointement</button>
                            </div>
                            <div class="form-button">
                                <button id="submit" type="submit" class="ibtn" href="">Performance</button>
                                <!-- <input type="submit" class="ibtn" href="" placeholder="Performance"> -->
                            </div>

                            <div class="form-button">
                                <a style="background-color: #c7290a;" id="submit"  type="submit" class="ibtn" href="home.php?logout=true">Logout</a>
                            </div>
                        </form>
                        <div class="other-links">
                            <span>Or login with</span><a href="#">Facebook</a><a href="#">Google</a><a href="#">Linkedin</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>
</body>
</html>