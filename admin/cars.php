<?php
include_once("includes/conn.php");
include_once("includes/logged.php");
$table = "cars";
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
    <title>Table V01</title>
    <link rel="stylesheet" href="cars.css">
</head>
<body>
    <body>
        <div id="wrapper">
         <h1>Cars List</h1>
         
         <table id="keywords" cellspacing="0" cellpadding="0">
           <thead>
             <tr>
               <th><span>Car Title</span></th>
               <th><span>Price</span></th>
               <th><span>Model</span></th>
               <th><span>Delete</span></th>
               <th><span>Update</span></th>
             </tr>
           </thead>
           <tbody>
            <?php
            foreach($stmt->fetchAll() as $row){
              #$primary = $row["id"];
              $title = $row["title"];
              $price = $row["price"];
              $model = $row["model"];
              $id = $row["id"];
            ?>
             <tr>
               <td class="lalign"><?php echo $title;?></td>
               <td><?php echo $price;?></td>
               <td><?php echo $model;?></td><!--a href="delete.php?id=<?php #echo $primary ?>"-->
               <td><a href="delete.php?id=<?php echo $id ?>" onclick="return confirm('Are you sure you want to delete?')">
               <img src="../img/delete.jpg" alt=""></a>
               </td>
               <td><a href="UpdateCar.php?id=<?php echo $id ?>"><img src="../img/update.jpg" alt=""></a></td>
             </tr>
            <?php
            }?> 
           </tbody>
         </table>
         <hr class="my-4" />
				  <div class="form-group mb-3 row"><label for="insert10" class="col-md-5 col-form-label"></label>
					  <div class="col-md-7"><button class="btn btn-primary btn-lg" style="background-color:white;" type="submit"><a href="InsertCar.php">Insert</a></button></div>
				  </div>
        </div> 
       </body>
</body>
</html>
