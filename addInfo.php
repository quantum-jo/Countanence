<?php
  session_start();
  include 'connection.php';

  $uid = $_SESSION['username'];
  $uid = mysqli_real_escape_string($conn, $uid);

  $q = $_GET['q'];
  $p = $_GET['p'];
  $r = $_GET['r'];

  $sql = "UPDATE $uid SET review='$p' WHERE place='$q'";
  if(!$conn->query($sql)) {
    die("queryfailed!".mysqli_error($conn));
  }

  $sql = "UPDATE $uid SET rating='$r' WHERE place='$q'";
  if(!$conn->query($sql)) {
    die("queryfailed!".mysqli_error($conn));
  }

 ?>
