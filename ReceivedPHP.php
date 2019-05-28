<?php
session_start();
include 'Security.php';
require 'LoginRequired.php';
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
  <body>
    <?php include "Header.php" ?>
    <div id="billbox">
      <?php

      include 'Database.php';
      $db = new Database();

      $stmt = $db->prepare("SELECT user.email, billuser.amount, billuser.done FROM user INNER JOIN billuser ON user.id = billuser.userid WHERE user.id = :uid AND billid=:billid;");
      $stmt->bindValue(':billid', $_GET['userid'], SQLITE3_INTEGER);
      $stmt->bindValue(':uid', $_SESSION['id'], SQLITE3_INTEGER);
      $res = $stmt->execute();

      while($row = $res->fetchArray()){
        echo "<div id='onebill'>This bill was send by:  ".$row['email']."   <br> Bill name:  ".$row['billname']." <br>    Amount:  ".$row['amount']." </div> <br>    ";
        echo '<div id="pay'.$_GET['userid'].'">';
        if($row['done']==0){
          echo "<button id='status' onclick='pay(".$_GET['userid'].",".$_SESSION['id'].");'>I have paid</button><br/>";
        } else {
          echo "<div id='status'>Paid</div><br/>";
        }
        echo '</div>';
      }
      ?>
  </div>
 </body>
</html>
