<?php

session_start();
require('system.ctrl.php');

//if session uid or cookie uid is not empty redirect to gate.php
if ($_SESSION["uid"]!="" || $_COOKIE["cookieUserEmail"]!="") {
	header('Location: gate.php');
}

?>



<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Hello, world!</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <!--talker CSS -->
    <link rel="stylesheet" href="talker.css">

  </head>
  <body>
   
  <div class="container">
          

     <!-- SYSTEM-WIDE FEEDBACK -->

     <div class="row sign-in-row">
        <div class="col-lg-6"><h1>TALKER</h1></div>
        <div class="col-lg-6">
          <form name="formSignIn" action="signin.ctrl.php" method="post" novalidate>
            <div class="form-inline">
              <label class="sr-only" for="formSignInEmail">Email</label>
              <input type="email" class="form-control form-control-sm mb-2 mr-sm-2 mb-sm-0" id="formSignInEmail" name="formSignInEmail" placeholder="Email" onkeyup="jsSignInValidateEmail()">

              <label class="sr-only" for="formSignInPassword">Password</label>
              <input type="password" class="form-control form-control-sm mb-2 mr-sm-2 mb-sm-0" id="formSignInPassword" name="formSignInPassword" placeholder="Password" onkeyup="jsSignInValidatePassword()">

              <button type="submit" id="formSignInSubmit" class="btn btn-primary btn-sm">Sign In</button>
            </div>
          </form>
        </div>
      </div>

     <?php if (isset($_SESSION["msgid"]) && $_SESSION["msgid"] != "" && phpShowSystemFeedback($_SESSION["msgid"])[0]!="") { ?>
    
    <div class="row"> 
        <div class="col-12"> 
            <div class="alert alert-<?php echo (phpShowSystemFeedback($_SESSION['msgid'])[0]); ?>" role="alert"> 
                <?php echo (phpShowSystemFeedback($_SESSION['msgid'])[1]); ?>
            </div>
        </div>
    </div>
    
    <?php } ?>

    <h4>Create a new account</h4>
    <hr>

      <div class="row">
          <div class="col-lg-6">
              <form name="formSignUp" action="signup.ctrl.php" method="POST" novalidate>
                  <div class="form-group">
                      <label for="formSignUpEmail">Email address</label>
                      <input type="email" <?php echo (phpShowEmailInputValue($_SESSION['formSignUpEmail'])); ?> class="form-control <?php if ($_SESSION['msgid']!='801' && $_SESSION['msgid']!=''){ echo 'is-valid';} else { echo (phpShowInputFeedback($_SESSION['msgid'])[0]); }?>" id="formSignUpEmail" name="formSignUpEmail" placeholder="enter your email address"  onkeyup="jsSignUpValidateEmail()">
                      <?php if ($_SESSION["msgid"] == "801") { ?>
                          <div class="invalid-feedback">
                              <?php echo (phpShowInputFeedback($_SESSION["msgid"])[1]); ?>
                          </div>
                      <?php } ?>
                  </div>
                  <div class="form-group">
                      <label for="formSignUpPassword">Password</label>
                      <input type="password" class="form-control <?php echo (phpShowInputFeedback($_SESSION['msgid'])[0]); ?>" id="formSignUpPassword" name="formSignUpPassword" placeholder="Enter your password" onkeyup="jsSignUpValidatePassword()"> 
                      <?php if ($_SESSION["msgid"] == "802") { ?>
                          <div class="invalid-feedback">
                              <?php echo (phpShowInputFeedback($_SESSION["msgid"])[1]); ?>
                          </div>
                      <?php } ?>

                      <input type="password" class="form-control mt-4 <?php echo (phpShowInputFeedback($_SESSION['msgid'])[0]); ?>" id="formSignUpPasswordConf" name="formSignUpPasswordConf" placeholder="Confirm your password" onkeyup="jsSignUpValidatePassword()">
                      <?php if ($_SESSION["msgid"] == "803") { ?>
                          <div class="invalid-feedback">
                              <?php echo (phpShowInputFeedback($_SESSION["msgid"])[1]); ?>
                          </div>
                      <?php } ?>
                  </div>
                  
                  <button type="submit" id="formSignUpSubmit" class="btn btn-primary but-success">Sign Up</button>
              </form>
          </div>


          <div class="col-lg-6">
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
        
  <?php
    //empty the msgid id only if no user is signed in
    if ($_SESSION["uid"]=="" || $_COOKIE["cookieUserEmail"]=="") {
      $_SESSION["msgid"]="";
    }
    $_SESSION["formSignUpEmail"]="";
  ?>

    <!-- Optional JavaScript; choose one of the two! -->

    <script src="index.js"></script> 

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