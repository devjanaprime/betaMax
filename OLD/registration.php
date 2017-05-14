<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>This Week's Game reistration</title>
  </head>
  <body>
    <h2>Complete Regiestration</h2>
    <p>Email: <input type='text' ng-mode="emailIn" value='<?php
      $hash = $_GET[ "id" ];
      require ( "server/config.php" );
      $connect = mysqli_connect( DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE );
        if ( mysqli_connect_errno() ){
          echo "Failed to connect to server: " . mysqli_connect_error();
        } // end error
        else{
          $sql = "SELECT * FROM invites WHERE hash ='" . $id . "'";
          $result = $connect->query( $sql );
          if ($result->num_rows > 0)
          {
            // output data of each row
            while( $row = $result->fetch_assoc() )
            {
              echo $row[ "email" ];
            }
          }
        }
    ?>'/></p>
    <p>
      Username: <input type='text' ng-model='usernameIn' placeholder="username"/>
    </p>
    <p>
      Password: <input type='password' ng-model='passwordIn'/>
    </p>
    <p>
      PicUrl: <input type='text' ng-model='picUrlIn'/>
    </p>
    <button>Complete Registration</button>
  </body>
</html>
