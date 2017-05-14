<?php
  $postdata = json_decode(file_get_contents('php://input'), true);
  $email = $postdata[ "email" ];
  $hash = md5( $email );
  $inviteUrl = 'http://thisweeksgame.com/invite/redeem?id=' . $hash;

  $subject = "thisweeksgame.com invite";
  $txt = "You've been invited to thisweeksgame.com. Follow the link below to complete registration:" . "\r\n" . $inviteUrl;
  $headers = "From: invites@thisweeksgame.com";

mail( $email,$subject,$txt,$headers);

  require( "config.php" );
  $connect = mysqli_connect( DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE );
    if( mysqli_connect_errno() ){
      echo "Failed to connect to server: " . mysqli_connect_error();
    }
    else{
      $title = $connect->real_escape_string( $title );
      $body = $connect->real_escape_string( $body );
      $sql = "INSERT INTO invites ( `email`, `creator`, `status`, `hash` )
      VALUES ( '$email', '0', '0', '$hash' )";

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
