<?php
  $id =  $_POST[ "id" ];
  $email = $_POST[ "email" ];
  $pass = $_POST[ "pass" ];
  $hashedPass = md5( $pass );
  $username = $_POST[ "username" ];
  $icon = $_POST[ "icon" ];
  $slogan = $_POST[ "slogan" ];

  require( "config.php" );
  $connect = mysqli_connect( DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE );
    if( mysqli_connect_errno() ){
      echo "Failed to connect to server: " . mysqli_connect_error();
    }
    else{
      $slogan = $connect->real_escape_string( $slogan );
      $sql = "UPDATE users email=" . $email . ", username=" . $username . ", passHash=" . $hashedPass . ", icon=" .$icon . ", slogan=" . $slogan . " WHERE id=" . $id;

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
