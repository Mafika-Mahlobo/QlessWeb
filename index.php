<?php 

    session_start();
    
    if(isset($_SESSION['userlogin'])){
        header("Location: home.php");
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iofrm</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/fontawesome-all.min.css">
    <link rel="stylesheet" type="text/css" href="css/iofrm-style.css">
    <link rel="stylesheet" type="text/css" href="css/iofrm-theme12.css">
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
                                    <img class="logo-size" src="images/logo-light.png" alt="">
                                </div>
                            </a>
                        </div>
                        <h3>Please enter your credential to loggin into your account.</h3>

                        <div class="page-links">
                            <a href="#" class="active">Login</a><a href="register.php">Register</a>
                        </div>
                        <form>
                            <input class="form-control" id="email" type="email" name="email" placeholder="E-mail Address" required>
                            <input class="form-control" id="password" type="password" name="password" placeholder="Password" required>
                            <div class="form-button">
                                <button id="login" type="submit" class="ibtn">Login</button>
                            </div>
                            <a href="forget12.html">Forget password?</a>
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
<script src="http://code.jquery.com/jquery-3.3.1.min.js"
              integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
              crossorigin="anonymous"></script>
<script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script>
   

    $('#login').click(function(e){
             
            
            var valid = this.form.checkValidity();

            if(valid){
            e.preventDefault();

            var email = $('#email').val();
            var password = $('#password').val();

            $.ajax({
                url:'jslogin.php',
                type:'POST',
                data:{email: email, password:password},
                success:function(data){
    
                    if(data == "1"){
                        window.location.href = "home.php";
                    }else{
                        Swal.fire({
                                'title': 'Errors',
                                'text': data,
                                'type': 'error'
                                });

                       // alert(data);
                    }
                }
            });
                    
            } 

        
    });
</script>


</body>
</html>