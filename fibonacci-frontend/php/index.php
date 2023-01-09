<?php
  session_start();
  if(isset($_SESSION['loggedin'])){
    header('Location: fibonacci.php');
}?>

<html>
<title>Fibonacci Application</title>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body> 
<?php
  if(isset($_SESSION['loginFailed'])){
    echo '❌ Login failed!<br />';
    unset($_SESSION['loginFailed']);
}?>
  <form action="login.php" method="post">
    <p>
      <label for="passphrase">Enter Pass Phrase</label>
      <input type="text" name="passphrase" id="passphrase" />
    </p>
	<input type="submit" value="Login">
	</form>
</body>
</html>
