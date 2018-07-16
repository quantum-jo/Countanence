<?php

 session_start();
 include 'connection.php';

 $uid = $_SESSION['username'];
 $shelfData = array();

 $sql = "SELECT * FROM users";
 $result = mysqli_query($conn, $sql);

 if(mysqli_num_rows($result) !=0) {
   while($row = mysqli_fetch_assoc($result)) {
     if(strcmp($row['username'], $uid) != 0) {
       array_push($shelfData, $row['username']);
     }
   }
 }

echo json_encode($shelfData);
?>
