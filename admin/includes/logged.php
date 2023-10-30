<?php
session_start();#NEVER COMMENTED
if(!isset($_SESSION["logged"]) or !$_SESSION["logged"]){   ##if not logged in  ##session is either not set or set to be false
  header("Location: login.php");
  die();
}
#session_destroy();
?>