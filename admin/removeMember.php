<?php
include_once("includes/conn.php");
if(isset($_GET["id"])){
    include_once("includes/logged.php");
    $table = "team";
    $id=$_GET["id"];
    try{
      $sql = "DELETE FROM `$table` WHERE id = ?";
      $stmt = $conn->prepare($sql);
      $stmt->execute([$id]);
      echo "MEMBER REMOVED SUCCESSFULLY";
    }catch(PDOException $e){
      echo "FAILED TO DELETE:" .  $e->getMessage();
    }
}
else{
    echo "INVALID REQUEST";
}
?>