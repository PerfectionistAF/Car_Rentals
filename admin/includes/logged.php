<?php
session_start();
if(!isset($_SESSION["logged"]) or !$_SESSION["logged"]){   
  header("Location: login.php");
  die();
}
?>