<?php
require_once('config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/fontawesome-all.min.css">
    <link rel="stylesheet" type="text/css" href="css/iofrm-style.css">
    <link rel="stylesheet" type="text/css" href="css/iofrm-theme12.css">
    <link rel="stylesheet" type="text/css" href="css/qless_style.css">
</head>
<body>


    <div class="form-body">
        <div class="row">
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <div class="website-logo-inside">
                            <a href="index.html">
                                <div class="logo">
                                    <img class="logo-size" src="images/logo-light.svg" alt="">
                                </div>
                            </a>
                        </div>
                        <h3>Please enter your details to register for your new your account.</h3>
                        <div class="page-links">
                            <a href="index.php">Login</a><a href="#" class="active">Register</a>
                        </div>
                        <form action="register.php" method="post">
                            <input class="form-control" id="name" type="text" name="name" placeholder="Full Name" required>
                            <input class="form-control" id="email" type="email" name="email" placeholder="E-mail Address" required>
                            <input class="form-control" id="phonenumber" type="number" name="phonenumber" placeholder="Phone Number" required>
                            <select name="role" id="user_role" class="form-control drop-down" onchange="selected();" required>
                                <option value="non-employee">Are you registering as an employee?</option>
                                <option value="employee">Yes</option>
                                <option value="non-employee">No</option>
                            </select>
                            <select name="organization" id="org" class="form-control drop-down">
                                <option value="NA">Select organization</option>
                                <?php 
                                    
                                ?>
                            </select>
                            <input class="form-control" id="password" type="password" name="password" placeholder="Password" required>
                            <input class="form-control" id="repassword" type="password" name="repassword" placeholder="Retype Password" required>



                            <div class="form-button">
                                <button id="register" type="submit" class="ibtn">Register</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script type="text/javascript">


	
		$('#register').click(function(e){
            

			var valid = this.form.checkValidity();

		if(valid){
            e.preventDefault();
            var email 		= $('#email').val();
			var name 		= $('#name').val();
            var role        = $('#user_role').val();
            var org 		= $('#org').val();
			var phonenumber = $('#phonenumber').val();
			var password 	= $('#password').val();
			var repassword	= $('#repassword').val();
			

			$.ajax({
                url:'process.php',
                type:'POST',
                data:{email: email,name: name, role: role,organization:org,phonenumber:phonenumber, password:password, repassword: repassword},
                success:function(data){
                    if(data == "1"){
                        Swal.fire({
                            'title': 'Sussess!',
                            'text': 'your are successfuly registered',
                            'type': 'success'
                        });
                        //alert("your are successfuly registered");
                    }else{
                        Swal.fire({
                            'title': 'Errors',
                            'text': data,
                            'type': 'error'
                        });
                        //alert(data);
                    }
                }
            });		
				
		}else{
				
		}

		
	});



    
	
</script>
<script>
    function selected(){
        var selected_role = document.getElementById('user_role').value;

        if(selected_role == "employee"){
            document.getElementById('org').style.display = "block";
        }else{
            document.getElementById('org').style.display = "none";
        }
        
    }
</script>


</body>
</html>