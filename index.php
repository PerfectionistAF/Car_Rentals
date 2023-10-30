<?php
include_once("admin/includes/conn.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>ROYAL CARS - Car Rental HTML Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;500;600;700&family=Rubik&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <?php
    #<!-- Topbar --> 
        include_once("includes/topBar.php");
    #<!-- Navbar -->
        include_once("includes/navBar.php");
    #<!-- Search -->
        include_once("includes/search.php");
    #<!-- Carousel -->
        include_once("includes/carousel.php");
    #<!-- About -->
        include_once("includes/about.php");
    #<!-- Services -->
        include_once("includes/services.php");
    #<!-- Banner -->
        $_GLOBAL["ad"] = false;
        include_once("includes/banner.php");
    #<!-- Rent A Car -->
        include_once("includes/rentCar.php");
    #<!-- Team  -->
        include_once("includes/team.php");
    #<!-- Banner Ad -->
        $_GLOBAL["ad"] = true;
        include_once("includes/ad.php");
    #<!-- Testimonial -->
        include_once("includes/testimonial.php");
    #<!-- Contact -->    
        include_once("includes/contact.php");
    #<!-- Vendor --> 
        include_once("includes/vendor.php");
    #<!-- Footer --> 
        include_once("includes/footer.php");
    ?>
    

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>