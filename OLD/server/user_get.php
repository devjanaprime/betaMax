<?php
  $id = $_POST[ "id" ];

  require ( "config.php" );
  $connect = mysqli_connect( DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE );
    if ( mysqli_connect_errno() )
    {
      echo "Failed to connect to server: " . mysqli_connect_error();
    }
    else
    {
      if( $id > 0 ){
        // getting a specific user
        // get all users
        $sql = "SELECT * FROM users WHERE id =" . $id;
        $result = $connect->query( $sql );
        $jsonOut = '';
        if ($result->num_rows > 0)
        {
        $jsonOut = $jsonOut . '{"users": [';
            $rowCounter = 0;
            // output data of each row
            while( $row = $result->fetch_assoc() )
            {
              $rowCounter++;
              $jsonOut = $jsonOut . '{';
              $jsonOut = $jsonOut . '"id": "' . $row["id"] . '",';
              $jsonOut = $jsonOut . '"email": "' . $row["email"] . '",';
              $jsonOut = $jsonOut . '"username": "' . $row["username"] . '",';
              $jsonOut = $jsonOut . '"status": "' . $row["status"] . '",';
              $jsonOut = $jsonOut . '"slogan": "' . $row["slogan"] . '",';
              $jsonOut = $jsonOut . '"icon": "' . $row["icon"] . '"';
              $jsonOut = $jsonOut . '}';
            }
            $jsonOut = $jsonOut . '] }';
            echo $jsonOut;
      } // get individual user
      else{
        // get all users
        $sql = "SELECT * FROM users ORDER BY id DESC";
        $result = $connect->query( $sql );
        $jsonOut = '';
        if ($result->num_rows > 0)
        {
        $jsonOut = $jsonOut . '{"users": [';
            $rowCounter = 0;
            // output data of each row
            while( $row = $result->fetch_assoc() )
            {
              $rowCounter++;
              $jsonOut = $jsonOut . '{';
              $jsonOut = $jsonOut . '"id": "' . $row["id"] . '",';
              $jsonOut = $jsonOut . '"email": "' . $row["email"] . '",';
              $jsonOut = $jsonOut . '"username": "' . $row["username"] . '",';
              $jsonOut = $jsonOut . '"status": "' . $row["status"] . '",';
              $jsonOut = $jsonOut . '"slogan": "' . $row["slogan"] . '",';
              $jsonOut = $jsonOut . '"icon": "' . $row["icon"] . '"';
              $jsonOut = $jsonOut . '}';
              if( $rowCounter < $result->num_rows )
              {
                 $jsonOut = $jsonOut . ',';
              }
            }
            $jsonOut = $jsonOut . '] }';
            echo $jsonOut;
        } // end results
      } // end get all users
    } // end no error
    $connect->close();
?>
