<?php

include_once("includes/conn.php");
$table = "categories";
$mainElement = "category";
#function getAllOne($table, $mainElement){
    try{
        global $conn;
        $sql = "SELECT * FROM `categories` WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
    }catch(PDOException $e){
		echo "FAILED TO INSERT CAR" . $e->getMessage();
	}

    $all = array();
    foreach($stmt->fetchAll() as $row){
        $oneElement = $row["category"];
        array_push($all, $oneElement); 
    }

    #return $all;
#}

#$category = getAllOne("categories", "category");

echo $all(0);
##doesn't work
#$sql2 = "SELECT `categories.category` , `cars.cat_id` FROM `categories` JOIN `cars` ON `categories.id` = `cars.cat_id`";
?>