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
    $cat_id = $result["cat_id"];  ##fetch category id of this detail car
    $id = $result["id"];
    $price = $result["price"];
    
  }catch(PDOException $e){
    echo "FAILED TO DISPLAY:" . $e->getMessage();
  }
}
?>
<?php
    if(isset($_GET["id"]) and isset($cat_id)){ #each id needs to have a cat_id
        #if(isset($_GET["cat_id"])){
        #$id = $_GET["cat_id"];  ##wrong
        try{
            $sql = "SELECT * FROM `categories` WHERE id= ?";
            /*** ALSO WORKS
             * $sql = "SELECT * FROM `categories` WHERE id= $cat_id";
             * $stmt2->execute();
            ***/
            $stmt2 = $conn->prepare($sql); #SQL statement template is created and sent to the database. Unspecified labels: parameters:?
            #Execute a prepared statement with an array of positional values
            $stmt2->execute([$cat_id]);  #parameter binding where id=? is bound to executed parameter from cars table: cat_id
            $result2 = $stmt2->fetch();
            $category = $result2["category"];
            #fetch that exact category from the executed id once the cat_id is set in the cars table
        }catch(PDOException $e){
            echo "FAILED TO INSERT CATEGORY:" . $e->getMessage();
        }
    #}
    include_once("related.php");
    ?>
    <!-- Detail Start -->
    <div class="container-fluid pt-5">
        <div class="container pt-5">
            <div class="row">
                <div class="col-lg-8 mb-5">
                    <h1 class="display-4 text-uppercase mb-5"><?php echo $title?></h1>
                    <div class="row mx-n2 mb-3">
                    <img class="img-fluid w-100" src="img/<?php echo $image?>" alt="<?php echo $title?>">
                        <!--<div class="col-md-3 col-6 px-2 pb-2">
                            
                        </div>-->
                    </div>
                    <p><?php echo $content?></p>
                    <div class="row pt-2">
                        <div class="col-md-3 col-6 mb-2">
                            <i class="fa fa-car text-primary mr-2"></i>
                            <span>
                                <?php #category name
                                echo "Product ID:" . $cat_id;
                                echo "<br>";
                                echo "Category:" . $category;
                                ?>  
                            </span>
                        </div>
                        <div class="col-md-3 col-6 mb-2">
                            <i class="fa fa-car text-primary mr-2"></i>
                            <span><?php echo $model?></span>
                        </div>
                        <div class="col-md-3 col-6 mb-2">
                            <i class="fa fa-cogs text-primary mr-2"></i>
                            <span><?php echo $autoStr?></span>
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
        echo "INVALID CAR CHOSEN: SEE OTHER CARS BELOW";
    }?>
    
    <!-- Related Car Start -->
    <?php
    if(isset($_GET["id"]) and isset($cat_id)){
    ?> 
    <div class="container-fluid pb-5">                               
        <div class="container pb-5">
            <h2 class="mb-4">Related Cars</h2>
            <div class="owl-carousel related-carousel position-relative" style="padding: 0 30px;">
                <?php
                foreach($stmt3->fetchAll() as $row2){
                    $CATID = $row2["cat_id"]; #fetch all from the cars table regardless of requested id
                    $ID = $row2["id"];

                    if($CATID == $cat_id and $ID != $id){
                        $TITLE = $row2["title"];
                        $IMAGE = $row2["image"];
                        $MODEL = $row2["model"];
                        $AUTO = $row2["auto"];
                        if($AUTO){
                            $AUTOStr = "AUTO";
                        }
                        else{
                            $AUTOStr = "MANUAL";
                        }
                        $PROPERTIES = $row2["properties"];
                        $PRICE = $row2["price"];
                        ?>
                <div class="rent-item">
                    <?php #echo "TAG:" . $ID?>
                     <img class="img-fluid mb-4" src="img/<?php echo $IMAGE?>" alt="">
                    <h4 class="text-uppercase mb-4"><?php echo $TITLE?></h4>
                    <div class="d-flex justify-content-center mb-4">
                        <div class="px-2">
                            <i class="fa fa-car text-primary mr-1"></i>
                            <span><?php echo $MODEL?></span>
                        </div>
                        <div class="px-2 border-left border-right">
                            <i class="fa fa-cogs text-primary mr-1"></i>
                            <span><?php echo $AUTOStr?></span>
                        </div>
                        <div class="px-2">
                            <i class="fa fa-road text-primary mr-1"></i>
                            <span><?php echo $PROPERTIES?></span>
                        </div>
                    </div>
                    <a class="btn btn-primary px-3" href="detail.php?id= <?php echo $ID ?>">$<?php echo $PRICE?>/Day</a>
                </div>
                <?php
            }
            else{
                continue;
            }
            }?>
            </div>
        </div>
    </div>
    <!-- Related Car End -->
        <?php
    }
    else{
        echo "<br>";
        echo "INVALID RELATED CARS";
    }?>