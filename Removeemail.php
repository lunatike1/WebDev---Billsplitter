<?php
  session_start();

  $userid = $_SESSION["id"];
  include 'Security.php';
  include 'Database.php';
  $db = new Database();

  $userid=$_POST['userid'];
  $stmt=$db->prepare("SELECT * FROM user WHERE id=:userid");
  $stmt->bindValue(":userid", $userid, SQLITE3_INTEGER);
  $results = $stmt->execute();
  $row = $results->fetchArray();
  echo $row['email'];
  ?>
