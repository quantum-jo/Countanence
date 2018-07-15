<?php
  session_start();
  include 'connection.php';

  $uid = $_SESSION['username'];
  $uid = mysqli_real_escape_string($conn, $uid);

  $q = $_GET['q'];
  $p = $_GET['p'];
  $r = $_GET['r'];
  $s = 'nothing';

  $sql = "INSERT INTO $uid (place, address, rating, review) VALUES ('$q', '$p', '$r', '$s')";
  if(!$conn->query($sql)) {
    die("queryfailed!".mysqli_error($conn));
  }

 ?>
