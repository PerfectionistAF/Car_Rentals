<?php
#can only insert testimonial when logged in
include_once("includes/logged.php");
#start connection and session such that only 1 testimonial can be inserted at a time
#session_start();
if($_SERVER["REQUEST_METHOD"]=="POST"){  #no need for session, #when reloaded
	include_once("includes/conn.php"); #connect
	$name= $_POST["tesName"]; #start receiving data
	$position= $_POST["position"];
	$content= $_POST["content"];
	
	include_once("includes/addimage.php");
	
	try{
		$sql = "INSERT INTO `testimonials`(`name`, `position`, `content`, `image`) VALUES (?,?,?,?)";
		$stmt = $conn->prepare($sql);
		$stmt->execute([$name, $position, $content, $image_name]);
		header("Location:InsertTestimonials.php");
		die();#terminate the current script, this is useful because it speeds up the process since the rest of the script isn't executed
		##if die() is commented, no difference in working
	}catch(PDOException $e){
		echo "FAILED TO INSERT TESTIMONIAL" . $e->getMessage();
	}
}
/** 
else{
	echo "REPEATED REQUEST";
}*/
?>

<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>Insert Testimonials</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
	</head>

	<body>
		<div class="container">
			<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="m-auto" style="max-width:600px" enctype="multipart/form-data">
				<h3 class="my-4">Insert Testimonials</h3>
				<hr class="my-4" />
				<div class="form-group mb-3 row"><label for="title2" class="col-md-5 col-form-label">Name</label>
					<div class="col-md-7"><input type="text" class="form-control form-control-lg" id="title2" name="tesName" required></div>
				</div>
				<hr class="bg-transparent border-0 py-1" />
				<div class="form-group mb-3 row"><label for="price6" class="col-md-5 col-form-label">Position</label>
					<div class="col-md-7"><input type="text" class="form-control form-control-lg" id="price6" name="position"></div>
				</div>
				<hr class="bg-transparent border-0 py-1" />
				<div class="form-group mb-3 row"><label for="content4" class="col-md-5 col-form-label">Content</label>
					<div class="col-md-7"><textarea class="form-control form-control-lg" id="content4" name="content" required></textarea></div>
				</div>
				<hr class="my-4" />
				<div>
					<label for="image" class="col-md-5 col-form-label">Select Image</label>
					<input type="file" id="image" name="image" accept="image/*">
				</div>
				<hr class="my-4" />
				<div class="form-group mb-3 row"><label for="insert10" class="col-md-5 col-form-label"></label>
					<div class="col-md-7"><button class="btn btn-primary btn-lg" onclick="return confirm('TESTIMONIAL INSERTED SUCCESSFULLY')" type="submit">Insert</button></div>
					<div class="col-md-7"><button class="btn btn-primary btn-lg" style="background-color:white;" type="submit"><a href="testimonials.php">BACK</a></button></div>
				</div>
			</form>
		</div>
	</body>

</html>