<?php
session_start();
require_once('config.php');

for ($i =0; $i < count($_SESSION['userlogin']); $i++) 
{
    $name   = $_SESSION['userlogin'][$i]['username'];
    $email  = $_SESSION['userlogin'][$i]['Email'];
    $phne   = $_SESSION['userlogin'][$i]['phone'];
    $role   = $_SESSION['userlogin'][$i]['Userrole'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/fontawesome-all.min.css">
    <link rel="stylesheet" type="text/css" href="css/iofrm-style.css">
    <link rel="stylesheet" type="text/css" href="css/iofrm-theme12.css">
    <link rel="stylesheet" type="text/css" href="css/qless_style.css">
</head>
<body style="background-color: rgba(255, 255, 255, 0.5);">
    <span class="alert alert-danger" id="repass-alert">passwords dont match <i class="fas fa-cross"></i></span>
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <h3 >Edit your personal details and save changes</h3>
                        <form action="" method="post">
                            <input class="form-control" id="name" type="text" name="name" placeholder="Full Name" required>
                            <input class="form-control" id="email" type="email" name="email" placeholder="E-mail Address" required>
                            <input class="form-control" id="phonenumber" type="number" name="phonenumber" placeholder="Phone Number" required>
                            <select name="role" id="user_role" class="form-control drop-down" onchange="selected();" required>
                                <option value="">Are you registering as an employee?</option>
                                <option value="employee">Yes</option>
                                <option value="non-employee">No</option>
                            </select>
                            <select name="organization" id="org" class="form-control drop-down">
                                <option value="NA">Select organization</option>
                                <?php 
                                    
                                ?>
                            </select>
                            <input class="form-control" id="password" type="password" name="password" placeholder="new or existing password" required="">
                            <input class="form-control" id="repassword" type="password" name="repassword" placeholder="Retype Password" onkeyup="passmatch();" required="">
                            <div class="form-button">
                                <button  id="update-btn" class="ibtn">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    
    <script type="text/javascript">
        document.getElementById('name').value = <?php echo json_encode($name); ?>;
        document.getElementById('email').value = <?php echo json_encode($email); ?>;
        document.getElementById('phonenumber').value = <?php echo json_encode($phne); ?>;
        document.getElementById('user_role').value = <?php echo json_encode($role); ?>;


        function selected(){
        var selected_role = document.getElementById('user_role').value;

        if(selected_role == "employee"){
            document.getElementById('org').style.display = "block";
        }else{
            document.getElementById('org').style.display = "none";
        }
        
    }

    function passmatch(){
        var pass1 = document.getElementById('password').value;
        var pass2 = document.getElementById('repassword').value;

        if(pass1 != pass2){
            document.getElementById('update-btn').disabled = true;
            document.getElementById('repass-alert').style.display = "block";
            window.setTimeout(function(){
                document.getElementById('repass-alert').style.display = "none";
            },2000);
        }else{
            document.getElementById('update-btn').disabled = false;
            document.getElementById('repass-alert').style.display = "none";
        }
    }
    </script>

    <script type="text/javascript">
        
        document.getElementById('update-btn').addEventListener("click",function(event){
            var valid = this.form.checkValidity();

            if(valid){
            event.preventDefault();
            var email       = $('#email').val();
            var name        = $('#name').val();
            var role        = $('#user_role').val();
            var phonenumber = $('#phonenumber').val();
            var password    = $('#password').val();
            var repassword  = $('#repassword').val();

            $.ajax({
                url:'update.php',
                method:'POST',
                data:{email: email,name: name, role: role, phonenumber:phonenumber, password:password},
                success:function(data){
                    if( data == "1"){
                        Swal.fire({
                            'title': 'Success!',
                            'text': "your details where successfuly updated",
                            'type': 'success'
                        });
                        //alert("your details where successfuly updated");
                    }else{
                        Swal.fire({
                            'title':'Failure!',
                            'text':data,
                            'type':'error'
                        });
                        //alert(data);
                    }
                    

                    
                }
            });
        }

            
        });

    </script>
</body>
</html>
<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script type="text/javascript">


