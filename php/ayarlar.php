<?php
//buraya dışardan giren olursa index e geri dönmesi lazım güvenlik açısından
// $conn = mysqli_connect($servername, $username, $password, $database);
$baglan = @mysqli_connect("localhost","root","","robert_mayer");

if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

?>