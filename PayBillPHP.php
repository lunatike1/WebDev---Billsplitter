<?php
  $billid = $_POST['billid'];
  $userid = $_POST['userid'];


  include_once 'Database.php';
  $db = new Database();

  $sql = "UPDATE billuser SET done=1 WHERE billid=:bid AND userid=:uid;";
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':bid', $billid, SQLITE3_INTEGER);
  $stmt->bindValue(':uid', $userid, SQLITE3_INTEGER);
  $stmt->execute();

  $sql = "SELECT email FROM user INNER JOIN bill ON user.id = bill.userid WHERE bill.billid = :bid;";
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':bid', $billid, SQLITE3_INTEGER);
  $res = $stmt->execute()->fetchArray();
  $ownerEmail = $res['email'];

  mail($ownerEmail, "A bill has been paid", "A user paid your outstanding bill.");

  die();
 ?>
