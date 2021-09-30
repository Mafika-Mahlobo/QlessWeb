<?php
//require_once('config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/fontawesome-all.min.css">
    <link rel="stylesheet" type="text/css" href="../css/iofrm-style.css">
    <link rel="stylesheet" type="text/css" href="../css/iofrm-theme12.css">
    <link rel="stylesheet" type="text/css" href="../css/qless_style.css">
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
                                    <img class="logo-size" src="../images/logo-light.svg" alt="">
                                </div>
                            </a>
                        </div>
                        <h3>Please enter organizations details.</h3>
                        <div class="page-links">
                            <a href="login.php">Admin Login</a><a href="#" class="active">Register Organization</a>
                        </div>
                        <form action="register.php" method="post">

                            <select class="form-control drop-down" id="select-org-type" required onchange="OtherOrg();">
                                <option value="" disabled selected hidden>Organizatio type..</option>
                                <option value="clinic">Clinic</option>
                                <option value="home_affairs">Home Affairs</option>
                                <option value="municipality">Municipality Office</option>
                                <option value="other">Other</option>
                            </select>

                            <input class="form-control" id="orgName" type="text" name="name" placeholder="Specify Organization Type" required>

                            <select class="form-control drop-down" required >
                                <option value="" disabled selected hidden>Province..</option>
                                <option>comming soon</option>
                            </select>

                            <select class="form-control drop-down"  required>
                                <option value="" disabled selected hidden>District</option>
                                <option>comming soon</option>
                            </select>

                            <select class="form-control drop-down" required >
                                <option value="" disabled selected hidden>City/Town</option>
                                <option>comming soon</option>
                            </select>

                            <input class="form-control" id="name" type="text" name="name" placeholder="orgazization Name" required>
                            <input class="form-control" id="name" type="email" name="name" placeholder="Organization Email" required>
                            <input class="form-control" id="name" type="number" name="name" placeholder="Organization contact number" required>
                            <input class="form-control" id="Id" type="number" name="email" placeholder=" Admin id/Passport number" required>
                            <input class="form-control" id="password" type="password" name="password" placeholder="Admin Password" required>
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
<!-- <script type="text/javascript">


    
        $('#register').click(function(e){
            

            var valid = this.form.checkValidity();

        if(valid){
            e.preventDefault();
            var IdNumber        = $('#Id').val();
            var name        = $('#name').val();
            var phonenumber = $('#phonenumber').val();
            var password    = $('#password').val();
            var repassword  = $('#repassword').val();
            

            $.ajax({
                url:'process.php',
                type:'POST',
                data:{Id: IdNumber,name: name,phonenumber:phonenumber, password:password, repassword: repassword},
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
 -->

 <script type="text/javascript">
     function OtherOrg(){
        if(document.getElementById('select-org-type').value == "other"){
            document.getElementById('orgName').style.display = "block";
        }else{
            document.getElementById('orgName').style.display = "none";
        }
     }
 </script>
</body>
</html>