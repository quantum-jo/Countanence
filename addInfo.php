<?php
  session_start();
  include 'connection.php';

  $uid = $_SESSION['username'];
  $uid = mysqli_real_escape_string($conn, $uid);

  $q = $_GET['q'];
  $p = $_GET['p'];

  $sql = "UPDATE $uid SET review='$q' WHERE place='$p'";
  $conn->query($sql);

 ?>
