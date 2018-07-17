<?php
  session_start();
  include 'connection.php';

  $q = $_GET['q'];
  $q = mysqli_real_escape_string($conn, $q);

  $placesData = array();

  $sql = "SELECT * FROM $q";
  $result = mysqli_query($conn, $sql);


    if(mysqli_num_rows($result) !=0) {
      while($row = mysqli_fetch_assoc($result)) {
        $temp = array('place'=>$row['place'], 'address'=>$row['address'], 'rating'=>$row['rating'], 'review'=>$row['review']);
        array_push($placesData, $temp);
      }
    }


  echo json_encode($placesData);

 ?>
