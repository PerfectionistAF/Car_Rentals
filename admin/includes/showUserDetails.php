<?php
if($status){
	#show car details
	try{
		$sql = "SELECT * FROM `users_table` WHERE id = ?";
		$stmt = $conn->prepare($sql);
		$stmt->execute([$id]);
		$row = $stmt->fetch();
		$fullname = $row["fullname"];
		$username = $row["username"];
		$email = $row["email"];
		$active = $row["active"];
		if($active){
		  $activeBox = "checked";
		}
		else{
			$activeBox = "";
		}
		##de-encrypt password
		$pass = $row["password"];
	}catch(PDOException $e){
		echo "Connection failed: " . $e->getMessage();
	}
}
?>