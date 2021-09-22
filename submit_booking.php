<?php
session_start();
require_once("config.php");

$name = $_SESSION["user"];

if(isset($_POST["testdata"])){
	$_SESSION["oranization"]  = $_POST["testdata"];

}

$sql = "SELECT * FROM `organization` WHERE `orgID` = '".$_SESSION["oranization"]."'";
$stmtselect = $db->prepare($sql);
$results = $stmtselect->execute([$_SESSION["oranization"]]);

if($results){
	$org = $stmtselect->fetchALL(PDO::FETCH_ASSOC);
	if($stmtselect->rowCount() > 0){
		for($i = 0; $i < count($org); $i++){
			$orgName = $org[$i]["orgNAME"];
			$profile = $org[$i]["orgProfile"];
		}
	}
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
    <link rel="stylesheet" type="text/css" href="css/qless_style.css">
</head>
<body>
    
    
      
 <div class="row" style="background-image: url(images/graphic1.svg);">

    
        <div class="form-holder">
            
                <div class="form-content">
                    <div class="form-items" id="book-holder1">
                        <h3 style="color: red;"><span style="color: blue !important;">Hi </span> <?= $name ?> </h3>
                        <p style="color: red;">Book Appointment <span style="color: blue !important;">to <?= $orgName ?></span></p>
                        <div class="main-menu-container">
                                <button style="text-align: center; font-weight: bolder !important;" id="submit" type="submit" class="menu-btns category-btns"  onclick="setBooking();"><i>Submit Booking</i></button>

                                <button id="submit" type="submit" class="menu-btns category-btns" style="text-align: center; font-weight: bolder !important;" onclick=""><i>Information</i></button>
                                
                                <button id="submit" type="submit" style="text-align: center; font-weight: bolder !important;" class="menu-btns category-btns" onclick=""><i>Help</i></button>
                        </div>

                       
                </div>

                <div class="form-items" id="book-form">
                        <p style="color: red;">Book Appointment <span style="color: blue !important;">to <?= $orgName ?></span></p>
                        <div class="main-menu-container">
                                <input type="date" name="date" style="text-align: center; " class="menu-btns category-btns booking-form" required />

                                <input type="time" name="time" style="text-align: center;" class="menu-btns category-btns booking-form" required />

                                <input type="text" name="reason" style="text-align: center; " class="menu-btns category-btns booking-form" placeholder="reason for visit"  required/>

                                <select type="text" name="Screening" style="text-align: center; background-color: white; color: black;" class="menu-btns category-btns booking-form" title="">
                                	<option value="no">Screening?</option>
                                	<option value="yes">Yes</option>
                                	<option value="no">No</option>
                                </select>

                                <button id="submit" type="submit" style="text-align: center; font-weight: bolder !important;" class="menu-btns category-btns" onclick="submit_booking();"><i>Submit</i></button>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script src="http://code.jquery.com/jquery-3.3.1.min.js"
              integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
              crossorigin="anonymous"></script>
<script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>


<script type="text/javascript">
 function setBooking(){
    var book_btns = document.getElementById('book-holder1');
    var book_form = document.getElementById('book-form');
        book_btns.style.display = "none";
        book_form.style.display = "block";

    if(book_form.style.display == "block"){
    	//submit_booking();
    }
 }

 function form_check(){
 	//alert("form check");
 	//var date = document.getElementById().value;
 	//var time = document.getElementById().va
 	//submit_booking()
 	
 }


 function submit_booking(){
 	//alert("only do bookings for tomorow");
 	Swal.fire({
 		'title':'success!',
 		'text':'Booking submited',
 		'type':'success'
 	});
 }
</script>

