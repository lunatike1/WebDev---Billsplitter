<?php
session_start();
require "LoginRequired.php";
 ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset=”UTF-8”>
        <link rel="stylesheet" href="css/main.css" type="text/css" charset="utf-8">
    </head>
    <body id="body1">
      <?php include "Header.php" ?>
      <div id="box">
        <h1> My Bills </h1>
        <?php
        include 'Security.php';
        $userid = $_SESSION["id"];
        include 'Database.php';
        $db = new Database();

        $stmt = $db->prepare("SELECT * FROM bill WHERE userid=:userid");
        $stmt->bindValue(':userid', $userid, SQLITE3_INTEGER);
        $results = $stmt->execute();
        while ($row = $results->fetchArray())
        {
            echo "<a href='OneBill.php?userid=".$row["billid"]."' id='bills' >".h($row["billname"])."<br></a>";
        }
        ?>

      </div>
    </body>
</html>
