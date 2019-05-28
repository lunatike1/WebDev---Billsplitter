<?php
session_start();
require "LoginRequired.php";
include "Security.php";
 ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset=”UTF-8”>
        <link rel="stylesheet" href="css/main.css" type="text/css" charset="utf-8">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="js/Newuser.js"></script>
        <script src='js/todo.js'></script>
    </head>
    <body id="body2">
      <?php include "Header.php" ?>
      <form action="IndexPHP.php" class="IndexPHP" method="post">
        <div id="box">
          <h1> New Shared Bill </h1>
          <h3>Please fill in this form
            <br> to share a bill with others.
            <br> Put in the amount that your friend/s owe you. </h3>
          <input type="type" name="billname" placeholder="Name of the bill" id="form"> <br>
          <div id="emails">
            <div class="email"> <input type="email" name="email0" id='email0' placeholder="Friend's email"> <br> </div>
          </div>
          <button id="newuser" > Add another friend </button> <br/>
          <button id="Deleteuser">Delete last added friend</button><br/>
          <input type="type" name="amount" placeholder="£ Amount" id="form"> <br>
          <input type="submit" value="Send" id="send"/> <br>
          <input type='hidden' id='emailnumber' name='emailnumber' value='1'/>
        </div>
      </form>
    </body>
</html>
