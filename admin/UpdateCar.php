<?php
	include_once("includes/logged.php");
	include_once("includes/conn.php");
	
	$status = false;
	if(isset($_GET["id"])){
		$id = $_GET["id"];
		$status = true;
		}

	if($_SERVER["REQUEST_METHOD"]=="POST"){
			$category = $_POST["category"];
			$title = $_POST["title"];
			$content = $_POST["content"];
			$model = $_POST["model"];
			$auto = $_POST["auto"];
			$properties = $_POST["properties"];
			$price = $_POST["price"];

			if(isset($_POST["publish"])){
				$published = 1;
			}
			else{
				$published = 0;
			}
			$oldImage = $_POST["oldImage"];
			
			include_once("includes/updateImage.php");
			try{
				#$sql = "SELECT * FROM `cars` WHERE id = ?";
				$sql = "UPDATE `cars` SET `title`=?, `description`=?, `model`=?, `auto`=?, `properties`=?, `price`=?, `image`=?, `published`=? WHERE id = ?";
				$stmt = $conn->prepare($sql);
				$stmt->execute([$title,$content,$model,$auto,$properties,$price,$image_name,$published,$id]);
				#echo "CAR UPDATED SUCCESSFULLY";
				/*$title = $result["title"];
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
				*/
			}catch(PDOException $e){
				echo "Connection failed: " . $e->getMessage();
			}
	}
	
	//show details
	include_once("includes/showCarDetails.php");
?>

<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>Edit / Update Car</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
	</head>

	<body>
		<?php 
		if($status){?>
		<div class="container">
			<form method="POST" action="" class="m-auto" style="max-width:600px" enctype="multipart/form-data">
				<h3 class="my-4">Edit / Update Car</h3>
				<hr class="my-4" />
				<div class="form-group mb-3 row"><label for="title2" class="col-md-5 col-form-label">Car Title</label>
					<div class="col-md-7">
						<input type="text" class="form-control form-control-lg" id="title2" value="<?php echo $title ?>" name="title" required></div>
				</div>
				<hr class="bg-transparent border-0 py-1" />
				<div class="form-group mb-3 row"><label for="content4" class="col-md-5 col-form-label">Content</label>
					<div class="col-md-7">
						<textarea class="form-control form-control-lg" id="content4" name="content" required><?php echo $content ?></textarea></div>
				</div>
				<hr class="bg-transparent border-0 py-1" />
				<div class="form-group mb-3 row"><label for="price6" class="col-md-5 col-form-label">Price</label>
					<div class="col-md-7">
						<input type="text" class="form-control form-control-lg" id="price6" value="<?php echo $price ?>" name="price"></div>
				</div>
				<hr class="bg-transparent border-0 py-1" />
				<div class="form-group mb-3 row"><label for="model6" class="col-md-5 col-form-label">Model</label>
					<div class="col-md-7">
						<input type="text" class="form-control form-control-lg" id="model6" value="<?php echo $model ?>" name="model"></div>
				</div>
				<hr class="bg-transparent border-0 py-1" />
				<div class="form-group mb-3 row"><label for="select-option1" class="col-md-5 col-form-label">Auto / Manual</label>
					<div class="col-md-7">
						<select class="form-select custom-select custom-select-lg" id="select-option1" name="auto">
							<option value = "1" <?php echo $autoStr ?>>Auto</option>
							<option value = "0"<?php echo $manualStr ?>>Manual</option>
						</select>
					</div>
				</div>
				<hr class="bg-transparent border-0 py-1" />
				<div class="form-group mb-3 row"><label for="properties6" class="col-md-5 col-form-label">Properties</label>
					<div class="col-md-7">
						<input type="text" class="form-control form-control-lg" id="properties6" value="<?php echo $properties ?>" name="properties"></div>
				</div>
				<hr class="bg-transparent border-0 py-1" />
				<div class="form-group mb-3 row">
					<label for="select-option1" class="col-md-5 col-form-label">Category</label>
					<div class="col-md-7">
                        <select class="form-select custom-select custom-select-lg" name="category" id="select-option1">
						<?php
							foreach($stmt2->fetchAll() as $row){
								$_cat = $row["category"];
								$_catid = $row["id"];
								if($catid == $_catid){	
									$selected = "selected";
								}else{
									$selected="";
								}	
							?>
							<option value="<?php echo $_catid?>" <?php echo $selected?>><?php echo $_cat?></option>
						
							<?php 
								}
							?>
						</select>
					</div>
				</div>
				<hr class="my-4" />
				<div>
					<label for="image" class="col-md-5 col-form-label">Select Image</label>
					<input type="file" id="image" name="image" accept="image/*">
					<img src="../img/<?php echo $image;?>" alt="<?php echo $title;?>" style="width: 300px;">
				</div>

				<hr class="bg-transparent border-0 py-1" />
				<div class="form-group mb-3 row">
					<label for="publish" class="col-md-5 col-form-label">Published</label>
					<div class="col-md-7">
						<input type="checkbox" id="publish" name="publish" <?php echo $publishedStr?>></div>
				</div>

				<input type="hidden" value="<?php echo $image?>" name="oldImage">

				<hr class="my-4" />
				<div class="form-group mb-3 row"><label for="insert10" class="col-md-5 col-form-label"></label>
					<div class="col-md-7"><button class="btn btn-primary btn-lg" onclick="return confirm('CAR UPDATED SUCCESSFULLY')"  type="submit">Update</button></div>
					<div class="col-md-7"><button class="btn btn-primary btn-lg" style="background-color:white;" type="submit"><a href="cars.php">BACK</a></button></div>
				</div>

			</form>
		</div>
		<?php
			}
			else{
				echo "INVALID REQUEST";
			}
		?>
	</body>
</html>