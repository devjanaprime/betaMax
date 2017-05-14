<?php
  $postdata = json_decode(file_get_contents('php://input'), true);
  $email = $postdata[ "email" ];
  $pass = $postdata[ "pass" ];
  $hashedPass = md5( $pass );

  require( "config.php" );
  $connect = mysqli_connect( DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE );
    if( mysqli_connect_errno() ){
      echo "Failed to connect to server: " . mysqli_connect_error();
      $connect->close();
    } // end no connect
    else{
      $sql = "SELECT * FROM users WHERE email=" . $email . " and " . "pass=" . $hashedPass;
      $result = $connect->query($sql);
      echo 'rows: '. $result->num_rows;
      $connect->close();
    } // end connected
?>
