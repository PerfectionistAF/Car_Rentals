<?php
##no testimonials without 1/more cars
session_start();  ##NECESSARY WITH EVERY _SESSION GLOBAL VARIABLE
if(isset($_GET["id"])){
  include_once("includes/conn.php");
  if(isset($_SESSION["page"])){
    $page = $_SESSION["page"];  ##testimonials
    $table = "testimonials";
    $id=$_GET["id"];
    try{
      $sql = "DELETE FROM `$table` WHERE id = ?";
      $stmt = $conn->prepare($sql);
      $stmt->execute([$id]);
      echo "TESTIMONIAL DELETED SUCCESSFULLY";
    }catch(PDOException $e){
      echo "FAILED TO DELETE:" .  $e->getMessage();
    }
  }
  else{
    $page = "cars.php";  ##if session page works
    $table = "cars";
    $id=$_GET["id"];
    try{
      $sql = "DELETE FROM `$table` WHERE id = ?";
      $stmt = $conn->prepare($sql);
      $stmt->execute([$id]);
      echo "CAR DELETED SUCCESSFULLY";
    }catch(PDOException $e){
      echo "FAILED TO DELETE:" .  $e->getMessage();
    }
  }
}
else{
    echo "INVALID REQUEST";
}
?>