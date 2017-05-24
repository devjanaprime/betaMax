<?php
  $postdata = file_get_contents( "php://input" );
  $request = json_decode( $postdata );
  $id = $request->id;
  $newStatus = $request->status;

  require( "config.php" );
  $connect = mysqli_connect( $host_name, $user_name, $password, $database );
  if( mysqli_connect_errno() ){
    echo "Failed to connect to server: " . mysqli_connect_error();
  }
  else{
    $sql = "UPDATE user SET status=" . $newStatus . " WHERE id=" . $id;

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
