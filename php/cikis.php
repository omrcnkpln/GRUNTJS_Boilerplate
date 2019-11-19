<?php

session_start();
// $_SESSION = array();    //bu olay gereksiz sanırım destroy işi çözüyo zatte
$_SESSION["oturum"] = false;
session_destroy();
header("Location:index.php");

?>
