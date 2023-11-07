<?php
include_once("admin/includes/conn.php");
if(isset($_GET["id"])){
    $id = $_GET["id"];
    $table = "cars_table";
try{
    $sql = "SELECT * FROM `$table` WHERE id =?";##change *
	$stmt = $conn->prepare($sql);
	$stmt->execute([$id]);
    $row = $stmt->fetch();
    $title = $row["title"];
  }catch(PDOException $e){
    echo "FAILED:" . $e->getMessage();
  }
}

?>
<!DOCTYPE html>
<html lang="en">

  <head>
    <title>Car Rental &mdash; Detail</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700;900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="css/aos.css">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="css/style.css">

  </head>

  <body>

    
    <div class="site-wrap" id="home-section">

      <?php
        #<!--Site Wrap-->
        include_once("includes/siteWrap.php");
        #<!--Site Header-->
        include_once("includes/header.php");
      ?>

      <div class="hero inner-page" style="background-image: url('images/hero_1_a.jpg');">
        
        <div class="container">
          <div class="row align-items-end ">
            <div class="col-lg-12">

              <div class="intro">
                <h1><strong><?php echo (isset($title))? $title:"Invalid"; ?></strong></h1>
                <div class="pb-4"><strong class="text-black">Posted on May 22, 2020</strong></div>
              </div>

            </div>
          </div>
        </div>
      </div>

        <?php
          #<!--Car Details->
          include_once("includes/detail.php");
          #<!--Blog Posts->
          include_once("includes/blogposts.php");
        ?>
            <!--Car Category-->
            <div class="pt-5">
              <p>Category:  <a href="#"><?php echo $categoryStr?></a></p>
            </div>

        <?php
          #<!--Comments-->
          include_once("includes/comments.php");
           #<!--Sidebar Categories-->
           include_once("includes/sideCategories.php");
           #<!--Footer-->
           include_once("includes/footer.php");
        ?>


    </div>

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.animateNumber.min.js"></script>
    <script src="js/jquery.fancybox.min.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/bootstrap-datepicker.min.js"></script>
    <script src="js/aos.js"></script>

    <script src="js/main.js"></script>

  </body>

</html>

