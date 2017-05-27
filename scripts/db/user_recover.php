<?php
  $postdata = file_get_contents( "php://input" );
  $request = json_decode( $postdata );
  $email = $request->email;
  $pass = $request->pass;
  $hashedPass = md5( $pass );

  require( "config.php" );
  $connect = mysqli_connect( $host_name, $user_name, $password, $database );
    if( mysqli_connect_errno() ){
      echo "Failed to connect to server: " . mysqli_connect_error();
    }
    else{

      $sql = "SELECT * FROM user WHERE email='" . $email . "'";
      $result = $connect->query($sql);
      $results = array();
      if( $result->num_rows != 0 ){
        // the subject
        $subject = "BetaZap password recovery";
        // the message
        $bodyText = "This is a test message\nstill the test message";
        // send email
        mail( $email, $subject ,$msg);
        echo "yep";
      } // end connection
      else{
        echo 'nope';
      } // end not found
      $connect->close();
    }
    $connect->close();
?>
