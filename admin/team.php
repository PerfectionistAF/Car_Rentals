<?php
#session_start();   #MAY BE IGNORED SINCE SESSION IS ALREADY ON FROM LOGGED
$_SESSION["page"] = "team.php";
include_once("includes/conn.php");
include_once("includes/logged.php");
$table = "team";
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
         <h1>Members List</h1>
         
         <table id="keywords" cellspacing="0" cellpadding="0">
           <thead>
             <tr>
               <th><span>Member Name</span></th>
               <th><span>Position</span></th>
               <th><span>Delete</span></th>
             </tr>
           </thead>
           <tbody>
            <?php
            foreach($stmt->fetchAll() as $row){
              #$primary = $row["id"];
              $name = $row["name"];
              $position = $row["position"];
              $id = $row["id"];
            ?>
             <tr>
               <td class="lalign"><?php echo $name;?></td>
               <td><?php echo $position;?></td>
               <td><a href="removeMember.php?id=<?php echo $id ?>" onclick="return confirm('Are you sure you want to remove?')">
               <img src="../img/delete.jpg" alt=""></a>
               </td>
             </tr>
            <?php
            }?>
           </tbody>
         </table>
         <hr class="my-4" />
				  <div class="form-group mb-3 row"><label for="insert10" class="col-md-5 col-form-label"></label>
					  <div class="col-md-7"><button class="btn btn-primary btn-lg" style="background-color:white;" type="submit"><a href="InsertTeam.php">Insert</a></button></div>
				  </div>
        </div> 
       </body>
</body>
</html>
