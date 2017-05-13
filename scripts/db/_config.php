<?php
    $host_name  = "HOST";
    $database   = "DATABASE";
    $user_name  = "USER";
    $password   = "PASS";
    $connect = mysqli_connect( $host_name, $user_name, $password, $database );
    if( mysqli_connect_errno() ){
      echo '<p>Failed to connect to MySQL: '.mysqli_connect_error().'</p>';
    }
    else{
      echo '<p>Connection to MySQL server successfully established.</p>';
    }
?>
