<?php
  session_start();
  ob_start();
  
  $passphrase_from_user = $_POST['passphrase'];
  $password_from_secret = getenv('PASS_PHRASE');
  if ($passphrase_from_user == $password_from_secret) {
    $_SESSION['loggedin'] = 1;
  }
  else {
    $_SESSION['loginFailed'] = 1;
  }
  
  header('Location: index.php');
?>
