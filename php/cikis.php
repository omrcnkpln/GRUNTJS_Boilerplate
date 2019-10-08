<?php

session_start();
$_SESSION = array();
$_SESSION["oturum"] = false;
session_destroy();
header("Location:index.php");

?>
