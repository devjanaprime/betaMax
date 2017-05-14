<?php
  $id = $_GET[ "id" ];

  require ( "../server/config.php" );
  $connect = mysqli_connect( DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE );
    if ( mysqli_connect_errno() ){
      echo "Failed to connect to server: " . mysqli_connect_error();
    } // end error
    else{
      if( $id != '' ){
        // getting a specific invite
        // get all users
        $sql = "SELECT * FROM invites WHERE hash ='" . $id . "'";
        $result = $connect->query( $sql );
        if ($result->num_rows > 0)
        {
            // output data of each row
            while( $row = $result->fetch_assoc() )
            {
              if( $row["status"] == 0 ){
                // set invite t0 "1" for redeemed
                $sql1 = "UPDATE invites SET status=1 WHERE hash ='" . $id . "'";
                $result1 = $connect->query( $sql1 );
                // create user with this email
                $sql2 = "INSERT into users (`email`) VALUES ('" . $row["email"] . "')";
                $result2 = $connect->query( $sql2 );
                echo 'valid invite redeemed. redirectiong...';
                header( 'Location: http://www.thisweeksgame.com/registration?email=' . $row["email"] ) ;
              }else{
                // not a valid id
                echo 'not a valid invite';
              }
            } //end while
        } // get individual user
        else{
          // not a valid id
          echo 'invite not found, id: ' . $id;
        }
      } // end looking for an invite
      else{
        // no such thing
        echo 'no such invite, id: ' . $id;
      } // end results
    } // end no error
    $connect->close();
?>
