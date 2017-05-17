<?php
  $postdata = json_decode( file_get_contents( 'php://input' ), true );
  $email = $request->email;
  $pass = $request->pass;
  $hashedPass = md5( $pass );

  require( "config.php" );
  $connect = mysqli_connect( $host_name, $user_name, $password, $database );
    if( mysqli_connect_errno() ){
      echo "Failed to connect to server: " . mysqli_connect_error();
      $connect->close();
    } // end no connect
    else{
      $sql = "SELECT * FROM user WHERE email='" . $email . "' AND " . "pass='" . $hashedPass . "'";
      $result = $connect->query($sql);
      echo json_encode( $postdata . ' ' . $result->num_rows );
      $connect->close();
    } // end connected
?>
