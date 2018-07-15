<?php

include 'connection.php';

$username = $_SESSION['username'];

$table = "CREATE TABLE $username (
        id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
        place VARCHAR(500) NOT NULL,
        address VARCHAR(500) NOT NULL,
        rating INT(11),
        review VARCHAR(500)
      ); ";

mysqli_query($conn, $table);
