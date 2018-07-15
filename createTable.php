<?php

include 'connection.php';

$username = $_SESSION['username'];

$table = "CREATE TABLE $username (
        id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
        place VARCHAR(500),
        address VARCHAR(500),
        rating VARCHAR(500),
        review VARCHAR(500)
      ); ";

mysqli_query($conn, $table);
