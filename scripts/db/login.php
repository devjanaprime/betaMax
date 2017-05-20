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
      $connect->close();
    } // end no connect
    else{
      $sql = "SELECT * FROM user WHERE email='" . $email . "' AND pass='" . $hashedPass . "'";
      $result = $connect->query($sql);
      $results = array();
      if( $result->num_rows != 0 ){
        $echoText = '{';
        $rowCounter = 0;
        while( $row = $result->fetch_assoc() ){
          $rowCounter++;
          $echoText = $row["status"];
        }
        echo $echoText;
      } // end connection
      else{
        echo 'nope';
      } // end not found
      $connect->close();
    } // end connected
?>
