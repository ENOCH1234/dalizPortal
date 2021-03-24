<?php
$connect=mysqli_connect("localhost", "root", "", "daliz");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>