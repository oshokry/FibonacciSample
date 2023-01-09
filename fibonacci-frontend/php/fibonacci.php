<?php
  session_start();
  if(!isset($_SESSION['loggedin'])){
    header('Location: index.php');
  }
?>

<html>
<title>Fibonacci Application</title>
<head>
  <script src="js/submit_data.js"></script>
  <script src="js/jquery-3.4.1.js"></script>
  <style>
    div {
      color: blue;
    }
  </style>
</head>
<body>
  <h3>Hello Fibonacci!</h3>
  [<a href="logout.php">Logout</a>]

  <form id="InputNumber" method="post">
    <p>
      <label for="inputNumber">Enter input number</label>
      <input type="text" name="inputNumber" id="inputNumber" />
      <input type="button" id="Go" onclick="computeFibonacci();" value="Go" class="button"/>
    </p>
  </form>
  <div id="resultWidget"/>
</body>
</html>
