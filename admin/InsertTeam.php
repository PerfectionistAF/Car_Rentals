<?php
	include_once("includes/conn.php");
  	include_once("includes/logged.php");
	
    if($_SERVER["REQUEST_METHOD"] === "POST"){
        $name = $_POST["name"];
		$position = $_POST["position"];
		$facebook = $_POST["facebook"];
        $linkedin = $_POST["linkedin"];
        $x = $_POST["x"];
		include_once("includes/addimage.php");
        try{
            $sql = "INSERT INTO `team`(`name`, `position`, `image`, `facebook`, `linkedin`, `x`) VALUES (?, ?, ?, ?, ?, ?)";
			$stmt = $conn->prepare($sql);
            $stmt->execute([$name, $position, $image_name, $facebook, $linkedin, $x]);
			header("Location:team.php");
			die();
			#echo "data inserted.";
        }catch(PDOException $e){
            echo "Connection failed:  ".$e->getMessage();
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>Insert Team Member</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
	</head>

	<body>
		<div class="container">
			<form action="" method="POST" class="m-auto" style="max-width:600px" enctype="multipart/form-data">
				<h3 class="my-4">Insert Team Member</h3>
				<hr class="my-4" />
				<div class="form-group mb-3 row"><label for="title2" class="col-md-5 col-form-label">Name</label>
					<div class="col-md-7"><input type="text" class="form-control form-control-lg" id="title2" name="name" required></div>
				</div>
				<hr class="bg-transparent border-0 py-1" />
				<div class="form-group mb-3 row"><label for="price6" class="col-md-5 col-form-label">Position</label>
					<div class="col-md-7"><input type="text" class="form-control form-control-lg" id="price6" name="position"></div>
				</div>
                <hr class="bg-transparent border-0 py-1" />
				<div class="form-group mb-3 row"><label for="facebook" class="col-md-5 col-form-label">Facebook</label>
					<div class="col-md-7"><input type="text" class="form-control form-control-lg" id="facebook" name="facebook"></div>
				</div>
                <hr class="bg-transparent border-0 py-1" />
				<div class="form-group mb-3 row"><label for="linkedin" class="col-md-5 col-form-label">Linkedin</label>
					<div class="col-md-7"><input type="text" class="form-control form-control-lg" id="linkedin" name="linkedin"></div>
				</div>
                <hr class="bg-transparent border-0 py-1" />
				<div class="form-group mb-3 row"><label for="twitter" class="col-md-5 col-form-label">Twitter</label>
					<div class="col-md-7"><input type="text" class="form-control form-control-lg" id="twitter" name="x"></div>
				</div>
				<hr class="my-4" />
				<div>
					<label for="image" class="col-md-5 col-form-label">Select Image</label>
					<input type="file" id="image" name="image" accept="image/*">
				</div>
				<hr class="my-4" />
				<div class="form-group mb-3 row"><label for="insert10" class="col-md-5 col-form-label"></label>
				<div class="col-md-7"><button class="btn btn-primary btn-lg" onclick="return confirm('MEMBER INSERTED SUCCESSFULLY')" type="submit">Insert</button></div>
					<div class="col-md-7"><button class="btn btn-primary btn-lg" style="background-color:white;" type="submit"><a href="team.php">BACK</a></button></div>
				</div>
			</form>
		</div>
	</body>

</html>