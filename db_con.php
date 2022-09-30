<?php


try{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "trainings";
    // Create connection
    $conn = mysqli_connect($servername, $username, $password,$database);
    if(!$conn)
    {
      $error = $conn->errno . ' ' . $conn->error;
      echo $error;
    echo "No database exist";
    }
    }
    catch(mysqli_sql_exception $e) {
      echo "Connection failed: " . $e->getMessage();
    
    }

?>