<?php
#check admin login
include_once("includes/logged.php");
#$image = "img/car-rent-1.png"; #set image variable
include_once("includes/conn.php"); #connect
$consumption = "0";
#$published = "1";
#start connection and session such that only 1 car can be inserted at a time
#enterred only 1 at a time: title/model
#session_start();
if($_SERVER["REQUEST_METHOD"]=="POST"){  #no need for session, #when reloaded
	$category = $_POST["category"];
	if($category>0){
		$title= $_POST["title"]; #start receiving data
	
		#$_SESSION["title"]=$title;
		#$_SESSION["model"]=$model;
	
		$description= $_POST["description"];
		$model= $_POST["model"];
		$auto= $_POST["auto"];
		$properties= $_POST["properties"];
		$price= $_POST["price"];
		include_once("includes/addimage.php");
	}
	try{
		#automatically set to published and consumption to 0
		$sql = "INSERT INTO `cars`(`title`, `image`, `description`, `model`, `auto`, `consumption`, `properties`,`cat_id`, `price`) VALUES (?,?,?,?,?,?,?,?,?)";
		$stmt = $conn->prepare($sql);
		$stmt->execute([$title, $image_name, $description, $model, $auto, $consumption, $properties, $category, $price]);
		#echo "CAR INSERTED SUCCESSFULLY";
		#back to nav page
		header("Location:InsertCar.php");#Insert again
		die();#terminate the current script, this is useful because it speeds up the process since the rest of the script isn't executed
		##if die() is commented, no difference in working
	}catch(PDOException $e){
		echo "FAILED TO INSERT CAR" . $e->getMessage();
	}
}
try{
	$sql = "SELECT * FROM `categories`";
	$stmt2 = $conn->prepare($sql);
	$stmt2->execute();
}catch(PDOException $e){
	echo "FAILED TO INSERT CAR" . $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>Insert Car</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
	</head>

	<body>
		<div class="container">
			<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="m-auto" style="max-width:600px" enctype="multipart/form-data"><!--enctype is for file upload--> 
				<h3 class="my-4">Insert Car</h3>
				<hr class="my-4" />
				<div class="form-group mb-3 row"><label for="title2" class="col-md-5 col-form-label">Car Title</label>
					<div class="col-md-7"><input type="text" class="form-control form-control-lg" id="title2" name="title" required></div>
				</div>
				<hr class="bg-transparent border-0 py-1" />
				<div class="form-group mb-3 row"><label for="content4" class="col-md-5 col-form-label">Content</label>
					<div class="col-md-7"><textarea class="form-control form-control-lg" id="content4" name="description" required></textarea></div>
				</div>
				<hr class="bg-transparent border-0 py-1" />
				<div class="form-group mb-3 row"><label for="price6" class="col-md-5 col-form-label">Price</label>
					<div class="col-md-7"><input type="text" class="form-control form-control-lg" id="price6" name="price"></div>
				</div>
				<hr class="bg-transparent border-0 py-1" />
				<div class="form-group mb-3 row"><label for="model6" class="col-md-5 col-form-label">Model</label>
					<div class="col-md-7"><input type="text" class="form-control form-control-lg" id="model6" name="model"></div>
				</div>
				<hr class="bg-transparent border-0 py-1" />
				<div class="form-group mb-3 row"><label for="select-option1" class="col-md-5 col-form-label">Auto / Manual</label>
					<div class="col-md-7"><select class="form-select custom-select custom-select-lg" id="select-option1" name="auto">
							<option value="1">Auto</option>
							<option value="0">Manual</option>
							<!---<option>Hypered</option>--->
						</select></div>
				</div>
				<hr class="bg-transparent border-0 py-1" />
				<div class="form-group mb-3 row"><label for="properties6" class="col-md-5 col-form-label">Properties</label>
					<div class="col-md-7"><input type="text" class="form-control form-control-lg" id="properties6" name="properties"></div>
				</div>
				
				<hr class="bg-transparent border-0 py-1" />
				<div class="form-group mb-3 row">
					<label for="select-option1" class="col-md-5 col-form-label">Category</label>
					<div class="col-md-7">
                        <select class="form-select custom-select custom-select-lg" name="category" id="select-option1">
							<option value="0">Select Category</option>
							<?php
							foreach($stmt2->fetchAll() as $row){
								$cat = $row["category"];
								$catid = $row["id"];		
							?>
							<option value="<?php echo $catid?>"><?php echo $cat?></option>
							
							<?php }?>
						</select>
					</div>
				</div>
				<hr class="my-4" />
				<div>
					<label for="image" class="col-md-5 col-form-label">Select Image</label>
					<input type="file" id="image" name="image" accept="image/*"><?php  #echo $image_name;  
																				##can't be added since it is returned from function?>
				</div>
				<hr class="my-4" />
				<div class="form-group mb-3 row"><label for="insert10" class="col-md-5 col-form-label"></label>
					<div class="col-md-7"><button class="btn btn-primary btn-lg" onclick="return confirm('CAR INSERTED SUCCESSFULLY')" type="submit">Insert</button></div>
					<div class="col-md-7"><button class="btn btn-primary btn-lg" style="background-color:white;" type="submit"><a href="cars.php">BACK</a></button></div>
				</div>
			</form>
		</div>
	</body>

</html>