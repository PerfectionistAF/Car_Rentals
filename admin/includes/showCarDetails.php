<?php
if($status){
	#show car details
	try{
		$sql = "SELECT * FROM `cars` WHERE id = ?";
		$stmt = $conn->prepare($sql);
		$stmt->execute([$id]);
		$result = $stmt->fetch();
		$title = $result["title"];
		$image = $result["image"];
		$content = $result["description"];
		$model = $result["model"];
		$auto = $result["auto"];
		if($auto){
			$autoStr = "selected";
			$manualStr = "";
		}
		else{
			$autoStr = "";
			$manualStr = "selected";
		}
		$properties = $result["properties"];
		$price = $result["price"];
		$published = $result["published"];
		if($published){
			$publishedStr = "checked";
		}
		else{
			$publishedStr = "";
		}
		
	}catch(PDOException $e){
		echo "Connection failed: " . $e->getMessage();
	}
}
?>