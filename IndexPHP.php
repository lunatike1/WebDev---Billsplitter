<?php
  session_start();
  include "Security.php";
  require "LoginRequired.php";

  $billname = $_POST['billname'];
  //$email = $_POST['email'];
  $amount = $_POST['amount'];
  $emailnumber = $_POST['emailnumber'];
  $emailbill = array_fill(0, $emailnumber, 0);

  for($i = 0; $i < $emailnumber; $i++){
    $emailbill[$i] = $_POST['email'.(string)$i];
  }


  if (!(empty($billname))  && !(empty($amount)) && !(empty($emailbill[0])))
  {
    include "Database.php";
    $db = new Database();

    $stmt=$db->prepare("INSERT INTO bill VALUES(NULL, :userid, :billname)");
    $stmt->bindValue(":userid", $_SESSION["id"], SQLITE3_INTEGER);
    $stmt->bindValue(":billname", $billname, SQLITE3_TEXT);

    $result = $stmt->execute();

    $stmt=$db->prepare("SELECT billid FROM bill WHERE billname =:billname");
    $stmt->bindValue(":billname", $billname, SQLITE3_TEXT);
    $result = $stmt->execute()->fetchArray();
    $billid = $result['billid'];

    for($i=0; $i < $emailnumber;$i++){
      //echo $i;
      $stmt = $db->prepare("SELECT id FROM user WHERE email=:email;");
      //$stmt->bindValue(":email", $emailbill[$i], SQLITE3_TEXT);
      $stmt->bindValue(":email", $_POST['email'.(string)$i], SQLITE3_TEXT);
      $res = $stmt->execute()->fetchArray();
      $userid = $res['id'];


      $stmt = $db->prepare("INSERT INTO billuser VALUES(NULL, :billid, :userid, :amount, 0);");
      $stmt->bindValue(":billid", $billid, SQLITE3_INTEGER);
      $stmt->bindValue(":userid", $userid, SQLITE3_INTEGER);
      $stmt->bindValue(":amount", $amount, SQLITE3_INTEGER);
      $result = $stmt->execute();


      $sub = "PENDING BILL";
      mail($_POST['email'.(string)$i], $sub, "You received a new bill.");
    }
  }

  Header ( 'Location: MyBills.php');

?>
