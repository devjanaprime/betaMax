<?php
  require( "config.php" );
  $connect = mysqli_connect( $host_name, $user_name, $password, $database );
    if( mysqli_connect_errno() ){
      echo "Failed to connect to server: " . mysqli_connect_error();
    } // end error
    else{
      $sql = "SELECT * FROM user";
      $result = $connect->query($sql);
      $results = array();
      if( $result->num_rows != 0 ){
      $rowCounter = 0;
      $users = array();
      while( $row = $result->fetch_assoc() ){
          $profile->id = $row[ "id" ];
          $profile->email = $row[ "email" ];
          $profile->username = $row[ "username" ];
          $profile->status = $row[ "status" ];
          array_push( $users, $profile );
        } // end while
        echo json_encode( $users );
      } // end if rows
    } // end no error
    $connect->close();
?>
