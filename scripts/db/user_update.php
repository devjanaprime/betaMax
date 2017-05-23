<?php
  $newStatus = $_GET[ 's' ];
  $id = $_GET[ 'i' ];

  echo "i've got i: ". $id . " & status: " . $newStatus ;

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
