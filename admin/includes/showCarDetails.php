<?php
if($status){
	#show car details
	try{
		$sql = "SELECT * FROM `cars_table` WHERE id = ?";
		$stmt = $conn->prepare($sql);
		$stmt->execute([$id]);
		$row = $stmt->fetch();
		$title = $row["title"];
        $content = $row["content"];
        $luggage = $row["luggage"];
        $doors = $row["doors"];
        $passengers = $row["passengers"];
        $price = $row["price"];
		$active = $row["active"];
		if($active){
		  $activeBox = "checked";
		}
		else{
			$activeBox = "";
		}
        /*$categorytype = $row["categorytype"];
        if($categorytype){
			$sedanStr = "";
			$crossoverStr = "selected";
		}
		else{
			$crossoverStr = "";
			$sedanStr = "selected";
		}*/
		$cat_name = $row["cat_name"];
        $image = $row["image"];
	}catch(PDOException $e){
		echo "Connection failed: " . $e->getMessage();
	}
}
?>