<?php
include_once("admin/includes/conn.php");
if(isset($_GET["id"])){
    $id = $_GET["id"];
    $table = "cars";
try{
    $sql = "SELECT * FROM `$table` WHERE id =?";##change *
	$stmt = $conn->prepare($sql);
	$stmt->execute([$id]);
    $result = $stmt->fetch();
    $title = $result["title"];
    $image = $result["image"];
    $content = $result["description"];
    $model = $result["model"];
    $auto = $result["auto"];
        if($auto){
            $autoStr = "AUTO";
                }
        else{
            $autoStr = "MANUAL";
                }
    $properties = $result["properties"];
    $price = $result["price"];
  }catch(PDOException $e){
    echo "FAILED:" . $e->getMessage();
  }
}
?>
<?php
    if(isset($_GET["id"])){
    ?>
    <!-- Detail Start -->
    <div class="container-fluid pt-5">
        <div class="container pt-5">
            <div class="row">
                <div class="col-lg-8 mb-5">
                    <h1 class="display-4 text-uppercase mb-5"><?php echo $title?></h1>
                    <div class="row mx-n2 mb-3">
                    <img class="img-fluid w-100" src="img/<?php echo $image?>" alt="">
                        <!--<div class="col-md-3 col-6 px-2 pb-2">
                            
                        </div>-->
                    </div>
                    <p><?php echo $content?></p>
                    <div class="row pt-2">
                        <div class="col-md-3 col-6 mb-2">
                            <i class="fa fa-car text-primary mr-2"></i>
                            <span><?php echo $model?></span>
                        </div>
                        <div class="col-md-3 col-6 mb-2">
                            <i class="fa fa-cogs text-primary mr-2"></i>
                            <span><?php echo $auto?></span>
                        </div>
                        <div class="col-md-3 col-6 mb-2">
                            <i class="fa fa-road text-primary mr-2"></i>
                            <span><?php echo $properties ?></span>
                        </div>
                        
                    </div>
               </div>
                <div class="col-lg-4 mb-5">
                    <div class="bg-secondary p-5">
                        <h3 class="text-primary text-center mb-4">Check Availability</h3>
                        <div class="form-group">
                            <select class="custom-select px-4" style="height: 50px;">
                                <option selected>Pickup Location</option>
                                <option value="1">Location 1</option>
                                <option value="2">Location 2</option>
                                <option value="3">Location 3</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <select class="custom-select px-4" style="height: 50px;">
                                <option selected>Drop Location</option>
                                <option value="1">Location 1</option>
                                <option value="2">Location 2</option>
                                <option value="3">Location 3</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <div class="date" id="date1" data-target-input="nearest">
                                <input type="text" class="form-control p-4 datetimepicker-input" placeholder="Pickup Date"
                                    data-target="#date1" data-toggle="datetimepicker" />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="time" id="time1" data-target-input="nearest">
                                <input type="text" class="form-control p-4 datetimepicker-input" placeholder="Pickup Time"
                                    data-target="#time1" data-toggle="datetimepicker" />
                            </div>
                        </div>
                        <div class="form-group">
                            <select class="custom-select px-4" style="height: 50px;">
                                <option selected>Select Person</option>
                                <option value="1">Person 1</option>
                                <option value="2">Person 2</option>
                                <option value="3">Person 3</option>
                            </select>
                        </div>
                        <div class="form-group mb-0">
                            <button class="btn btn-primary btn-block" type="submit" style="height: 50px;">Check Now</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Detail End -->
        
    <?php
    }
    else{
        echo "INVALID REQUEST";
    }?>