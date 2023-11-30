<?php
include_once("admin/includes/conn.php");
$table = "cars_table";
try{
    $sql = "SELECT * FROM `$table` WHERE active =1";##change *
	$stmt = $conn->prepare($sql);
	$stmt->execute();
  }catch(PDOException $e){
    include_once("./404.php");
  }
?>
    <div class="site-section bg-light">
      <div class="container">
            <div class="row">
                <div class="col-lg-7">
                        <h2 class="section-heading"><strong>Car Listings</strong></h2>
                        <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>    
                </div>
            </div>

            <div class="row">
                    <?php
                    foreach($stmt->fetchAll() as $row){
                        $id = $row["id"];
                        $title = $row["title"];
                        $content = $row["content"];
                        $luggage = $row["luggage"];
                        $doors = $row["doors"];
                        $passengers = $row["passengers"];
                        $price = $row["price"];
                        $categorytype = $row["categorytype"];
                        $image = $row["image"];
                    ?>
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="listing d-block  align-items-stretch">
                            <div class="listing-img h-100 mr-4">
                                <img src="images/<?php echo $image?>" alt="Image" class="img-fluid">
                            </div>
                            <div class="listing-contents h-100">
                                <h3><?php echo $title?></h3>
                                <div class="rent-price">
                                <strong>$<?php echo $price?></strong><span class="mx-1">/</span>day
                                </div>
                                <div class="d-block d-md-flex mb-3 border-bottom pb-3">
                                <div class="listing-feature pr-4">
                                    <span class="caption">Luggage:</span>
                                    <span class="number"><?php echo $luggage?></span>
                                </div>
                                <div class="listing-feature pr-4">
                                    <span class="caption">Doors:</span>
                                    <span class="number"><?php echo $doors?></span>
                                </div>
                                <div class="listing-feature pr-4">
                                    <span class="caption">Passenger:</span>
                                    <span class="number"><?php echo $passengers?></span>
                                </div>
                                </div>
                                <div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos eos at eum, voluptatem quibusdam.</p>
                                <p><a href="./single.php?id=<?php echo $id ?>" class="btn btn-primary btn-sm">Rent Now</a></p>
                                </div>
                            </div>

                        </div>
                    </div>

                <!--<div class="col-md-6 col-lg-4 mb-4">

                    <div class="listing d-block  align-items-stretch">
                    <div class="listing-img h-100 mr-4">
                        <img src="images/car_5.jpg" alt="Image" class="img-fluid">
                    </div>
                    <div class="listing-contents h-100">
                        <h3>Nissan Moco</h3>
                        <div class="rent-price">
                        <strong>$389.00</strong><span class="mx-1">/</span>day
                        </div>
                        <div class="d-block d-md-flex mb-3 border-bottom pb-3">
                        <div class="listing-feature pr-4">
                            <span class="caption">Luggage:</span>
                            <span class="number">8</span>
                        </div>
                        <div class="listing-feature pr-4">
                            <span class="caption">Doors:</span>
                            <span class="number">4</span>
                        </div>
                        <div class="listing-feature pr-4">
                            <span class="caption">Passenger:</span>
                            <span class="number">4</span>
                        </div>
                        </div>
                        <div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos eos at eum, voluptatem quibusdam.</p>
                        <p><a href="#" class="btn btn-primary btn-sm">Rent Now</a></p>
                        </div>
                    </div>

                    </div>
                </div>
                

                <div class="col-md-6 col-lg-4 mb-4">

                    <div class="listing d-block  align-items-stretch">
                    <div class="listing-img h-100 mr-4">
                        <img src="images/car_4.jpg" alt="Image" class="img-fluid">
                    </div>
                    <div class="listing-contents h-100">
                        <h3>Honda Fitta</h3>
                        <div class="rent-price">
                        <strong>$389.00</strong><span class="mx-1">/</span>day
                        </div>
                        <div class="d-block d-md-flex mb-3 border-bottom pb-3">
                        <div class="listing-feature pr-4">
                            <span class="caption">Luggage:</span>
                            <span class="number">8</span>
                        </div>
                        <div class="listing-feature pr-4">
                            <span class="caption">Doors:</span>
                            <span class="number">4</span>
                        </div>
                        <div class="listing-feature pr-4">
                            <span class="caption">Passenger:</span>
                            <span class="number">4</span>
                        </div>
                        </div>
                        <div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos eos at eum, voluptatem quibusdam.</p>
                        <p><a href="#" class="btn btn-primary btn-sm">Rent Now</a></p>
                        </div>
                    </div>

                    </div>
                </div>

                <div class="col-md-6 col-lg-4 mb-4">

                    <div class="listing d-block  align-items-stretch">
                    <div class="listing-img h-100 mr-4">
                        <img src="images/car_3.jpg" alt="Image" class="img-fluid">
                    </div>
                    <div class="listing-contents h-100">
                        <h3>Skoda Laura</h3>
                        <div class="rent-price">
                        <strong>$389.00</strong><span class="mx-1">/</span>day
                        </div>
                        <div class="d-block d-md-flex mb-3 border-bottom pb-3">
                        <div class="listing-feature pr-4">
                            <span class="caption">Luggage:</span>
                            <span class="number">8</span>
                        </div>
                        <div class="listing-feature pr-4">
                            <span class="caption">Doors:</span>
                            <span class="number">4</span>
                        </div>
                        <div class="listing-feature pr-4">
                            <span class="caption">Passenger:</span>
                            <span class="number">4</span>
                        </div>
                        </div>
                        <div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos eos at eum, voluptatem quibusdam.</p>
                        <p><a href="#" class="btn btn-primary btn-sm">Rent Now</a></p>
                        </div>
                    </div>

                    </div>
                </div>

                <div class="col-md-6 col-lg-4 mb-4">

                    <div class="listing d-block  align-items-stretch">
                    <div class="listing-img h-100 mr-4">
                        <img src="images/car_2.jpg" alt="Image" class="img-fluid">
                    </div>
                    <div class="listing-contents h-100">
                        <h3>Mazda LaPuta</h3>
                        <div class="rent-price">
                        <strong>$389.00</strong><span class="mx-1">/</span>day
                        </div>
                        <div class="d-block d-md-flex mb-3 border-bottom pb-3">
                        <div class="listing-feature pr-4">
                            <span class="caption">Luggage:</span>
                            <span class="number">8</span>
                        </div>
                        <div class="listing-feature pr-4">
                            <span class="caption">Doors:</span>
                            <span class="number">4</span>
                        </div>
                        <div class="listing-feature pr-4">
                            <span class="caption">Passenger:</span>
                            <span class="number">4</span>
                        </div>
                        </div>
                        <div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos eos at eum, voluptatem quibusdam.</p>
                        <p><a href="#" class="btn btn-primary btn-sm">Rent Now</a></p>
                        </div>
                    </div>

                    </div>
                </div>
                

                <div class="col-md-6 col-lg-4 mb-4">

                    <div class="listing d-block  align-items-stretch">
                    <div class="listing-img h-100 mr-4">
                        <img src="images/car_1.jpg" alt="Image" class="img-fluid">
                    </div>
                    <div class="listing-contents h-100">
                        <h3>Buick LaCrosse</h3>
                        <div class="rent-price">
                        <strong>$389.00</strong><span class="mx-1">/</span>day
                        </div>
                        <div class="d-block d-md-flex mb-3 border-bottom pb-3">
                        <div class="listing-feature pr-4">
                            <span class="caption">Luggage:</span>
                            <span class="number">8</span>
                        </div>
                        <div class="listing-feature pr-4">
                            <span class="caption">Doors:</span>
                            <span class="number">4</span>
                        </div>
                        <div class="listing-feature pr-4">
                            <span class="caption">Passenger:</span>
                            <span class="number">4</span>
                        </div>
                        </div>
                        <div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos eos at eum, voluptatem quibusdam.</p>
                        <p><a href="#" class="btn btn-primary btn-sm">Rent Now</a></p>
                        </div>
                    </div>

                    </div>
                </div>
                    -->
                <?php
                }?>
            </div>
      </div>
    </div>