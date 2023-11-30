<?php
#session_start(); ###NEVER START A NEW SESSION HERE SINCE THEN ALL PRIORITIES OF GLOBAL VARIABLES WILL CHANGE
if(isset($_GET["id"])){
  include_once("includes/conn.php");
  #if(isset($_SESSION["page"])){
    #$page = "categories.php";  ##if session page works
    $table = "categories_table";
    $id=$_GET["id"];
    try{
      $sql = "DELETE FROM `$table` WHERE id = ?";
      $stmt = $conn->prepare($sql);
      $stmt->execute([$id]);
      #echo "CATEGORY DELETED SUCCESSFULLY";
      header("Location: ./categories.php");
      die();
    }catch(PDOException $e){
      echo "FAILED TO DELETE:" .  $e->getMessage();
    }
  #}
}
else{
  include_once("includes/404.php");
}
?>