<?php
include_once("admin/includes/conn.php");
$table = "cars_table";
try{
    $sql = "SELECT * FROM `$table` WHERE published =1";##change *
	$stmt = $conn->prepare($sql);
	$stmt->execute();
  }catch(PDOException $e){
    echo "FAILED:" . $e->getMessage();
  }
?>