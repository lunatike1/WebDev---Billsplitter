<?php
session_start();

if (empty($_POST['email']) == FALSE && empty($_POST['password']) == FALSE &&
$_POST['password'] == $_POST['password2']){

  include 'Database.php';
  $db = new Database();

  $fullname = $_POST['fullname'];
  $email = $_POST['email'];
  $password = $_POST['password'];

  $stmt = $db->prepare("SELECT * FROM user WHERE email=:email");
  $stmt->bindValue(":email", $email, SQLITE3_TEXT);
  $user = $stmt->execute()->fetchArray();

  if (!isset($user["email"]))
  {
    $time = sha1(time());
    $diskpassword = sha1($time.$password);

    $stmt = $db->prepare("INSERT INTO user VALUES (NULL, :fullname, :email, :password, :salt)");
    $stmt->bindValue(":fullname", $fullname, SQLITE3_TEXT);
    $stmt->bindValue(":email", $email, SQLITE3_TEXT);
    $stmt->bindValue(":password", $diskpassword, SQLITE3_TEXT);
    $stmt->bindValue(":salt", $time, SQLITE3_TEXT);
    $stmt->execute();


    $stmt = $db->prepare("SELECT * FROM user WHERE email=:email");
    $stmt->bindValue(":email", $email, SQLITE3_TEXT);
    $user = $stmt->execute()->fetchArray();
    $_SESSION["id"]=$user["id"];

    Header( 'Location: IndexIndex.php');
  }
}

else {
  Header( 'Location: Signup.php');
}

?>
