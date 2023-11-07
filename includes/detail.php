<?php
include_once("admin/includes/conn.php");
if(isset($_GET["id"])){
    $id = $_GET["id"];
    $table = "cars_table";
try{
    $sql = "SELECT * FROM `$table` WHERE id =?";##change *
	$stmt = $conn->prepare($sql);
	$stmt->execute([$id]);
    $result = $stmt->fetch();
    $id = $result["id"];
    $title = $result["title"];
    $content = $result["content"];
    $luggage = $result["luggage"];
    $doors = $result["doors"];
    $passengers = $result["passengers"];
    $price = $result["price"];
    $categorytype = $result["categorytype"];
    if($categorytype){
        $categoryStr = "Crossover";
            }
    else{
        $categoryStr = "Sedan";
            }

    $image = $result["image"];
    
  }catch(PDOException $e){
    include_once("./404.php");
  }
}
?>

<div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-8 blog-content">
            <img src="images/<?php echo $image?>" alt="" class="img-fluid p-3 mb-5 bg-white rounded">
            
            <div class="grey-bg container-fluid">
              <section id="minimal-statistics">
                <div class="row">
                  <div class="col-12 mt-3 mb-1">
                    <h4 class="text-uppercase">Properties</h4>
                    <p><?php echo $title?></p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-xl-3 col-sm-6 col-12"> 
                    <div class="card">
                      <div class="card-content">
                        <div class="card-body">
                          <div class="media d-flex">
                            <div class="align-self-center">
                              <i class="icon-pencil primary font-large-2 float-left"></i>
                            </div>
                            <div class="media-body text-right">
                              <h3><?php echo $doors?></h3>
                              <span>Doors</span>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card">
                      <div class="card-content">
                        <div class="card-body">
                          <div class="media d-flex">
                            <div class="align-self-center">
                              <i class="icon-speech warning font-large-2 float-left"></i>
                            </div>
                            <div class="media-body text-right">
                              <h3><?php echo $luggage?></h3>
                              <span>Laggage</span>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card">
                      <div class="card-content">
                        <div class="card-body">
                          <div class="media d-flex">
                            <div class="align-self-center">
                              <i class="icon-graph success font-large-2 float-left"></i>
                            </div>
                            <div class="media-body text-right">
                              <h3><?php echo $price?> $</h3>
                              <span>Price</span>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </section>              
            </div>