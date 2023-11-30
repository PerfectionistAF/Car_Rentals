<?php
if($status){
	#show car details
	try{
		$sql = "SELECT * FROM `categories_table` WHERE id = ?";
		$stmt = $conn->prepare($sql);
		$stmt->execute([$id]);
		$row = $stmt->fetch();
		$categoryname = $row["categoryname"];
		
	}catch(PDOException $e){
		echo "Connection failed: " . $e->getMessage();
	}
}
?>