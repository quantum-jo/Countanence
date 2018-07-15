<?php
  session_start();
  include 'connection.php';

  $uid = $_SESSION['username'];
  $shelfData = array();

  $sql = "SELECT * FROM $uid";
  $result = mysqli_query($conn, $sql);

  if(mysqli_num_rows($result) !=0) {
    while($row = mysqli_fetch_assoc($result)) {
      $temp = array('place'=>$row['place'], 'address'=>$row['address'], 'rating'=>$row['rating'], 'review'=>$row['review']);
      array_push($shelfData, $temp);
    }
  }
  echo json_encode($shelfData);
 ?>
