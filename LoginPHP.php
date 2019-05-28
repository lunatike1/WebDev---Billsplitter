<?php
session_start();
include 'Database.php';
$db = new Database();

$email = $_POST['email'];
$password = $_POST['password'];

$stmt = $db->prepare("SELECT * FROM user WHERE email=:email");
$stmt->bindValue(":email", $email, SQLITE3_TEXT);
$user = $stmt->execute()->fetchArray();
// while($row = $res->fetchArray()){
// $user = $stmt->execute()->fetchArray();

if (isset($user["email"]))
{
  if($user["password"] == sha1($user["salt"].$password))
  {
    $_SESSION["id"]=$user["id"];
    header( 'Location: IndexIndex.php');
  }
  else
  {
    header( 'Location: Login.php');
  }
} else
  {
    header('Location: Login.php');
  }

?>
