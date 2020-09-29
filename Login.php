<?php
require 'config/config.php';
require 'includes/form_handlers/register_handler.php';
require 'includes/form_handlers/login_handler.php'


?>




<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
 
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>
  <link href="https://fonts.googleapis.com/css2?family=Nosifer&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/nav-bar.css">
  <link rel="stylesheet" type="text/css" href="css/login.css">
  <link rel="shortcut icon" type="image/x-icon" href="img/icon.jpg"/>
  <title>L O G I N</title>
</head>
<body>

  <nav class="zone backgroundnav sticky">
      <ul class="main-nav">
          <li><a href="index.html"><img class="logo" src="img/logo3.png" alt="#"></a></li>
          <li id ="name">T A O R M I N A </li>
      </ul>
</nav>
  

<div class="container">
  <div class="frame">
    <div class="nav">
      <ul class="links">
        <li class="signin-active"><a class="btn">Sign in</a></li>
        <li class="signup-inactive"><a class="btn">Sign up </a></li>
      </ul>
    </div>
    <div ng-app ng-init="checked = false">


    <!--Sign in form -->
        <form class="form-signin" action="Login.php" method="post" name="form">
          <label for="username">Email</label>
          <input class="form-styling" type="email" name="log_email" placeholder=""/>
          <label for="password">Password</label>
          <input class="form-styling" type="password" name="log_password" placeholder=""/>
          <input type="checkbox" id="checkbox"/>
          <label for="checkbox" ><span class="ui"></span>Keep me signed in</label>
          <div class="btn-animate ">
           <a> <input  type="submit" name="login_button" class="btn-signin" value="Login" > </a>
          </div>
        </form>


    <!--Sign up form-->      
        
       <form class="form-signup" action="Login.php" method="POST" >

          <!--Full name -->
          <label for="fullname">Full name</label>
          <input class="form-styling" type="text" name="fullname" placeholder="" value="<?php 
		      if(isset($_SESSION['fullname'])) {
			         echo $_SESSION['fullname'];
		       } 
	      	?>" required >
          <?php
             if(in_array("this name  is too short or too long <br>",$error_array)) echo "this name  is too short or too long <br>";
          ?>


          <!--Email-->
          <label for="email">Email</label>
          <input class="form-styling" type="text" name="email" placeholder="" value="<?php 
		       if(isset($_SESSION['email'])) {
		     	 echo $_SESSION['email'];
		       } 
		      ?>" required> 
           <?php
            if(in_array("Email already in use<br> ", $error_array)) echo " <p style='color:red;'> *Email already in use</p>  ";
            else if(in_array("invalid format <br>",$error_array)) echo"<p style='color:red;'> *invalid format </p> ";

          ?>
          
        
          <!--password-->
          <label for="password">Password</label>
          <input class="form-styling" type="password" name="password" placeholder="" required >

          <!--confirm password-->
          <label for="confirmpassword">Confirm password</label>
          <input class="form-styling" type="password" name="confirmpassword" placeholder="" required>

          <?php
               if(in_array("your password do not match <br>",$error_array)) echo "<p style='color:red;'> *your password do not match </p>";
               else if(in_array(" your password can only conatin english characters or number <br>",$error_array)) echo " <p style='color:red;'> *your password can only conatin english characters or number </p>";
               else if(in_array("your password is too short or too long <br>",$error_array)) echo "<p style='color:red;'> *your password is too short or too long </p>";
          ?>

          
         <input type="submit"    name="register_button" class="btn-signup" value="sign up">
         <?php
           if(in_array("sing up successfully <br>",$error_array)) echo "<p style='color:green;'> sing up successfully </p>";
         ?>
      </form>
      
            <div  class="success">
              <svg width="270" height="270" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
       viewBox="0 0 60 60" id="check" ng-class="checked ? 'checked' : ''">
                 <path fill="#ffffff" d="M40.61,23.03L26.67,36.97L13.495,23.788c-1.146-1.147-1.359-2.936-0.504-4.314
                  c3.894-6.28,11.169-10.243,19.283-9.348c9.258,1.021,16.694,8.542,17.622,17.81c1.232,12.295-8.683,22.607-20.849,22.042
                  c-9.9-0.46-18.128-8.344-18.972-18.218c-0.292-3.416,0.276-6.673,1.51-9.578" />
               
                  <div class="successtext">
                   
                   <p>you sing up successfully  </p>
                   
                   <a class="btn-goback" value="Refresh" onClick="history.go()">Go back</a>
                </div>
             </div>
      </div>
      
      <div class="forgot">
        <a href="#">Forgot your password?</a>
      </div>
      
      <div>
        <div class="cover-photo"></div>
        <div class="profile-photo"></div>
        
        <h1 class="welcome">Welcome, Abdelheqmokhtari </h1>
        <a class="btn-goback" href ="home.php">Go Home</a>
      </div>
  </div>
    
  <a id="refresh" value="Refresh" onClick="history.go()">
    <svg class="refreshicon"   version="1.1" id="Capa_1"  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
         width="25px" height="25px" viewBox="0 0 322.447 322.447" style="enable-background:new 0 0 322.447 322.447;"
         xml:space="preserve">
         <path  d="M321.832,230.327c-2.133-6.565-9.184-10.154-15.75-8.025l-16.254,5.281C299.785,206.991,305,184.347,305,161.224
                c0-84.089-68.41-152.5-152.5-152.5C68.411,8.724,0,77.135,0,161.224s68.411,152.5,152.5,152.5c6.903,0,12.5-5.597,12.5-12.5
                c0-6.902-5.597-12.5-12.5-12.5c-70.304,0-127.5-57.195-127.5-127.5c0-70.304,57.196-127.5,127.5-127.5
                c70.305,0,127.5,57.196,127.5,127.5c0,19.372-4.371,38.337-12.723,55.568l-5.553-17.096c-2.133-6.564-9.186-10.156-15.75-8.025
                c-6.566,2.134-10.16,9.186-8.027,15.751l14.74,45.368c1.715,5.283,6.615,8.642,11.885,8.642c1.279,0,2.582-0.198,3.865-0.614
                l45.369-14.738C320.371,243.946,323.965,236.895,321.832,230.327z"/>
    </svg>
  </a>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.3.14/angular.min.js"></script>
<script type="text/javascript" src="js/login.js"></script>

</body>
</html>