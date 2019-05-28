<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset=”UTF-8”>
        <link rel="stylesheet" href="css/main.css" type="text/css" charset="utf-8">
        <title> Sign Up </title>
    </head>
    <body id="body">
      <?php include "Back.php" ?>
  		<form action="SignupPHP.php" class="Signupform" method="post">
  		  <div id="box">
  		    <h2>Please fill <br> in this form <br> to create an <br> account.</h2>
   		    <input name="fullname" placeholder="Full name"> <br>
   		    <input type="email" name="email" placeholder="Email"> <br>
   		    <input type="password" name="password" placeholder="Password"> <br>
   		    <input type="password" name="password2" placeholder="Confirm password"> <br>
          <input type="submit" value="Submit" id="signup2" /><br />
  		  </div>
  		</form>
    </body>
</html>
