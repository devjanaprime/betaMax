<?php
  $postdata = file_get_contents( "php://input" );
  $request = json_decode( $postdata );
  $email = $request->email;
  $pass = $request->pass;
  $username = $request->username;
  $hashedPass = md5( $pass );

  require( "config.php" );
  $connect = mysqli_connect( $host_name, $user_name, $password, $database );
    if( mysqli_connect_errno() ){
      echo "Failed to connect to server: " . mysqli_connect_error();
    }
    else{
      $sql = "INSERT INTO user ( `email`, `username`, `status`, `pass`, date_added )
      VALUES ( '$email', '$username', '1', '$hashedPass', NOW() )";

      if ( $connect->query( $sql ) === TRUE ){
        echo 'saved';
      }
      else{
        echo "error: " . $connect->error;
      }
      $connect->close();
    }
    $connect->close();
?>
