<?php
  $email = $_POST[ "email" ];
  $username = $_POST[ "username" ];
  $icon = $_POST[ "icon" ];
  $slogan = $_POST[ "slogan" ];

  require( "config.php" );
  $connect = mysqli_connect( DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE );
    if( mysqli_connect_errno() ){
      echo "Failed to connect to server: " . mysqli_connect_error();
    }
    else{
      $title = $connect->real_escape_string( $title );
      $body = $connect->real_escape_string( $body );
      $sql = "INSERT INTO users ( `email`, `username`, `status`, `icon`, `slogan` )
      VALUES ( '$email', '$username', '1', '$icon', '$slogan' )";

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