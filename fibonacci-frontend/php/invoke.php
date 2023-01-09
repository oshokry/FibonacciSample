<?php
  session_start();
  if(isset($_SESSION['loggedin'])){
    $n = $_GET['n'];
    $url = "http://fibonacci-backend-cs:5000/fibonacci?n=";
    $url .= $n;
    $data = array();
    
    $options = array(
        'http' => array(
            'header'  => "Content-type: application/x-www-form-urlencoded",
            'method'  => 'GET',
            'content' => http_build_query($data)
        )
    );
    $context  = stream_context_create($options);
    $resp = file_get_contents($url, false, $context);
    echo $resp;
  }
  // do nothing if not logged in
?>
