<?php 

session_start();

	/*$name = $_SESSION['user'];

	if(!isset($_SESSION['userlogin'])){
		header("Location: index.php");


	}

	if(isset($_GET['logout'])){
		session_destroy();
		unset($_SESSION);
		header("Location: index.php");
	}*/
    

    $currentTime = time();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logged In</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/fontawesome-all.min.css">
    <link rel="stylesheet" type="text/css" href="../css/iofrm-style.css">
    <link rel="stylesheet" type="text/css" href="../css/iofrm-theme4.css">
    <link rel="stylesheet" type="text/css" href="../css/qless_style.css">
</head>
<body>
    
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
    <!-- <div class="modal pop-window" tabindex="-1" role="dialog" id="ex">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-ltitle"><span id="pop-title">modal title</span></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="clase">
                        <span aria-hidden="false">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>content here!</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">save</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">close</button>
                </div>
            </div>
        </div>
    </div> -->
      
 <div class="row" style="background-image: url(../images/graphic1.svg);">

    <button class="navbar-toggler" type="button" id="toggle-btn" onclick="toggleNav();">
                    <i class="fas fa-bars fa-3x"></i>
    </button>
            
        <div id="side-nav" class="form-items">
                    <div id="user-info"><img src="../images/login_img.png" class="user_logo"></div>
                <button class="menu-btns btn btn-primary" id="pic-btn" >Add profile picture</button>
                <div class="side-options">
                    <button class="menu-btns btn btn-primary" onclick="setPage('update your details here','details_update.php')">Update personal details</button>
                    <button class="menu-btns btn btn-primary" onclick="setPage('your appointments','appointments.php');">Messages</button>
                    <button class="menu-btns btn btn-primary" onclick="setPage('rate your experience','ratings.php');">Perfamance report and ratings</button>
                    <a href="home.php?logout=true"><button class="btn menu-btns" id="logout" >sign out</button></a>
                </div>
        </div>

        <div class="form-holder">
                <div class="website-logo">
                    <div class="logo">
                        <img class="logo-size" src="images/logo-light.png" alt="">
                    </div>
                </div>
            
                <div class="bookView-holder">
                    <div class="form-items">
                        <h3 style="color: red;"><span style="color: blue !important;">Appointments</span> <?php echo date("d/m/Y",$currentTime); ?> </h3>
                        <div class="main-menu-container">
                                <span class="bookings-view"></span>
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
<script type="text/javascript">
 function toggleNav(){
    var side = document.getElementById('side-nav');
        if(side.style.display == "none"){
            side.style.display = "block";
        }else{
            side.style.display = "none";
        }
 }


 function setPage(title, page){
    document.getElementById('page-frame').src = page;
    var pop = document.getElementById('ex');
    if(pop.style.display == "none"){
        pop.style.display = "block";
    }else{
        pop.style.display = "none";
    }
   document.getElementById('pop-title-txt').innerHTML = title;
   

}


function bookingView(){
     
   
}

document.getElementById('pop-close-btn').addEventListener("click",function(e){
    window.location.reload();
});

    
</script>