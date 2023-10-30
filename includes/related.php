<?php
include_once("admin/includes/conn.php");
try{
    $sql = "SELECT * FROM `cars`";
	$stmt3 = $conn->prepare($sql);
	$stmt3->execute(); #get all cars
  }catch(PDOException $e){
    echo "FAILED TO DISPLAY:" . $e->getMessage();
  } 
?>
