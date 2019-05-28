<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset=”UTF-8”>
        <link rel="stylesheet" href="css/main.css" type="text/css" charset="utf-8">
        <title> Log In </title>
    </head>
    <body id="body">
      <?php include "Back.php" ?>
      <div id="box">
        <h2>
          Please  log in
        </h2>
        <form action="LoginPHP.php" method="post">
           <input type="email" name="email" placeholder="Email"> <br>
           <input type="password" name="password" placeholder="Password"> <br>
           <input type="submit" value="Login" id="login2"/>
        </form>
      </div>
    </body>
</html>
