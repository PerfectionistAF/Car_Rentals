<?php
session_start();   #MAY BE IGNORED SINCE SESSION IS ALREADY ON FROM LOGGED
$_SESSION["page"] = "testimonials.php";
#this page session is for testimonials only
include_once("includes/conn.php");
include_once("includes/logged.php");
$table = "testimonials";
  try{
    $sql = "SELECT * FROM `$table`";
		$stmt = $conn->prepare($sql);
		$stmt->execute();
  }catch(PDOException $e){
    echo "FAILED:" . $e->getMessage();
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Testimonials</title>
    <link rel="stylesheet" href="cars.css">
</head>
<body>
    <body>
        <div id="wrapper">
         <h1>Testimonials List</h1>
         
         <table id="keywords" cellspacing="0" cellpadding="0">
           <thead>
             <tr>
               <th><span>Name</span></th>
               <th><span>Position</span></th>
               <th><span>Delete</span></th>
               <th><span>Update</span></th>
             </tr>
           </thead>
           <tbody>
           <?php
            foreach($stmt->fetchAll() as $row){
              $id = $row["id"];
              $name = $row["name"];
              $position = $row["position"];
              #$content = $row["content"];
            ?>
             <tr>
               <td class="lalign"><?php echo $name;?></td>
               <td><?php echo $position;?></td>
               <td><a href="delete.php?id=<?php echo $id ?>" onclick="return confirm('Are you sure you want to delete?')"><img src="../img/delete.jpg"></td>
               <td><a href="UpdateTestimonials.php?id=<?php echo $id ?>"><img src="../img/update.jpg" alt=""></a></td>
              </tr>
             <?php
             }?>
            </tbody>
         </table>
         <hr class="my-4" />
				  <div class="form-group mb-3 row"><label for="insert10" class="col-md-5 col-form-label"></label>
					  <div class="col-md-7"><button class="btn btn-primary btn-lg" style="background-color:white;" type="submit"><a href="InsertTestimonials.php">Insert</a></button></div>
				  </div>
        </div> 
       </body>
</body>
</html>
