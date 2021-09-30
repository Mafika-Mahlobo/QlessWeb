<?php 

    session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Qless</title>
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
                        
                        <table class="table table-light">
                            <thead class="table table-dark">
                                <tr>
                                    <td>Employee Number</td>
                                    <td>Employee Name</td>
                                    <td> Employee Ocupation</td>  
                                </tr>
                            </thead>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </table>

                        <h4>Staff members will get an invite to register their details</h4>

                        <form>
                            <input class="form-control" id="Id" type="number" name="empNum" placeholder="Employee staff Number" required>

                            <input class="form-control" id="Id" type="number" name="name" placeholder="Employee Name" required>

                            <select class="form-control drop-down" required >
                                <option value="" disabled selected hidden>Seelect role</option>
                                <option value="recept">Receptionist</option>
                                <option value="recept">Client service</option>
                                <option value="Manager">Manager</option>
                                <option value="admin">System admin</option>
                            </select>

                            <input class="form-control" id="Id" type="email" name="email" placeholder="Employee Email (for invite)" required>
                            
                            <div class="form-button">
                                <button id="login" type="submit" class="ibtn">Add</button>
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
<script src="http://code.jquery.com/jquery-3.3.1.min.js"
              integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
              crossorigin="anonymous"></script>
<script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<!-- <script>
   

    $('#login').click(function(e){
             
            
            var valid = this.form.checkValidity();

            if(valid){
            e.preventDefault();

            var IdNumber = $('#Id').val();
            var password = $('#password').val();

            $.ajax({
                url:'jslogin.php',
                type:'POST',
                data:{IdNum: IdNumber, password:password},
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
</script> -->


</body>
</html>