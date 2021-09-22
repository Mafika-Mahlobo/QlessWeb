<?php
session_start();
require_once('config.php');

	$name = $_SESSION['user'];

	if(!isset($_SESSION['userlogin'])){
		header("Location: index.php");


	}

    if($_SESSION['role'] == "employee"){
        header("Location: admin.php");
        
    }

	if(isset($_GET['logout'])){
		session_destroy();
		unset($_SESSION);
		header("Location: index.php");
	}

   $query = "SELECT * FROM `organization` WHERE `category` = '".$_SESSION["BOOKING"]."'";
   $stmtselect = $db->prepare($query);
   $result = $stmtselect->execute([$_SESSION["BOOKING"]]);
   $data = $stmtselect->fetchALL(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/fontawesome-all.min.css">
    <link rel="stylesheet" type="text/css" href="css/iofrm-style.css">
    <link rel="stylesheet" type="text/css" href="css/iofrm-theme12.css">
    <link rel="stylesheet" type="text/css" href="css/qless_style.css">
</head>
<body >
    <span class="alert alert-danger" id="repass-alert">passwords dont match <i class="fas fa-cross"></i></span>
    			
    			<div class="pop-window" id="ex">
         <div class="pop-header">
             <h4 class="pop-title"><span id="pop-title-txt"></span></h4>
         </div>
         <div class="pop-content">
             <iframe  class="pop-page" id="page-frame"></iframe>
         </div>
         <div class="pop-footer">
             <button type="button" id="pop-close-btn" class="btn btn-danger" onclick="setPage('','');">close</button>
         </div>
     </div>
       
                <div class="form-content"  id="book-search-padd" style="background-image: url('images/graphic3.svg');">
                	<input type="search" name="" class="search-bx" placeholder="Search organization.." >
                	<button class="loc-btn" ><i class="fas fa-map-marker-alt"> near me</i></button>
                	<div class="cont">
                		<div class="search-list-container booking-content">
                			<?php 
                				if($stmtselect->rowCount() > 0){
                					$btnId = 1;
                					for($i = 0; $i <count($data); $i++){
                						echo '
                                           <button class="menu-btns btn btn-primary book-options" onclick="setPage(this.id);" id='.$btnId.' value='.$data[$i]["orgID"].'>'.$data[$i]["orgNAME"].'<br> '.$data[$i]["orgProfile"].'</button>
                						';
                					}
                				}else{
                					echo '
                							<p style="margin: 3em; font-size: larger; font-style: italic; text-align: center; color: black;">No organization yet!</p>
                					';
                				}
                			?>
                			
                	    </div>
                		<div class="map-container booking-content">
                			
                		</div>
                	</div>
                	<div class="c"></div>
                	
                </div>
      </body>
<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>
</html>

<script type="text/javascript">

function setPage(id){
    var pop = document.getElementById('ex');
    if(pop.style.display == "none"){
        pop.style.display = "block";
    }else{
        pop.style.display = "none";
    }
   document.getElementById('page-frame').src = "submit_booking.php";
   document.getElementById('pop-title-txt').innerHTML = "Book appointment";
   var orgID = document.getElementById(id).value;
   viewID(orgID);
}

function viewID(data){
	$.ajax({
		url:'submit_booking.php',
		method:'POST',
		data:{testdata: data},
		success:function(data){
			//alert(data);
		}
	});
}
</script>
                    