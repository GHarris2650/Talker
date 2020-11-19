<?php session_start(); require('system.ctrl.php'); ?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
   
  <div class="container">
          <div class="row justify-content-md-center">
            <div class="col-12 col-md-auto"><h1>TALKER | SIGN UP</h1>
            </div>
          </div>

      <hr><br>

      <?php 
      if (isset($_SESSION["msgid"]) && $_SESSION["msgid"]!="") {
        echo (phpShowFeedback($_SESSION["msgid"]));
        $_SESSION["msgid"]="";
      }  
      ?>

      <div class="row">
          <div class="col-6">
              <form name="formSignUp" action="signup.ctrl.php" method="POST" novalidate>
                  <div class="form-group">
                      <label for="formSignUpEmail">Email address</label>
                      <input type="email" class="form-control" id="formSignUpEmail" name="formSignUpEmail" placeholder="enter your email address" required pattern="^[\w]{1,}[\w.+-]{0,}@[\w-]{2,}([.][a-zA-Z]{2,}|[.][\w-]{2,}[.][a-zA-Z]{2,})$">
                  </div>
                  <div class="form-group">
                      <label for="formSignUpPassword">Password</label>
                      <input type="password" class="form-control" id="formSignUpPassword" name="formSignUpPassword" placeholder="Enter your password" required pattern="(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@*$#]).{8,16}" onkeyup="jsSignUpValidatePassword()">

                      <input type="password" class="form-control mt-4" id="formSignUpPasswordConf" name="formSignUpPasswordConf" placeholder="Confirm your password" required pattern="(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@*$#]).{8,16}" onkeyup="jsSignUpValidatePassword()">
                  </div>
                  <p id="password_comparison"></p>
                  <button type="submit" class="btn btn-primary">submit</button>
              </form>
          </div>


          <div class="col-6">
              <p>
                Hello and welcome to Talker! We are very happy that you want to join our great community!
              </p>
              <p>
                Please, enter your email and password.  You must have access to your email because we will send a confiration code to that address.  Your password must be between 8 and 16 characters long, with at least one uppercase ad one lowercase character, one nmber and one special character (@,*,$ or #).
              </p>
              <p>We hope you'll enjoy Talker!</p>
          </div>
      </div>
  </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <script>
        var jsSignUpPassword = document.getElementById("formSignUpPassword");
        var jsSignUpPasswordConf = document.getElementById("formSignUpPasswordConf");

        function jsSignUpValidatePassword(){
          if (jsSignUpPassword.value != jsSignUpPasswordConf.value) {
            jsSignUpPasswordConf.setCustomValidity("Passwords don't match");
            document.getElementById("password_comparison").innerHTML = "<div class='alert alert-danger' role='alert'>Passwords don't match!</div>"; 
          }else {
            jsSignUpPasswordConf.setCustomValidity('');
            document.getElementById("password_comparison").innerHTML = "";
          }
        }
    </script> 

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
  </body>
</html>