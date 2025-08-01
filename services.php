<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gymdb";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if (!isset($_SESSION['user_activities'])) {
    $_SESSION['user_activities'] = [];
}


$username = isset($_SESSION['username']) ? $_SESSION['username'] : null;

if ($username !== null) {
    $fetch_price_sql = $conn->prepare("SELECT full_price FROM client_info WHERE name = ?");
    $fetch_price_sql->bind_param("s", $username);
    $fetch_price_sql->execute();
    $fetch_price_sql->bind_result($full_price);


    if ($fetch_price_sql->fetch()) {

        $fullPrice = $full_price;
    } else {
        
        $fullPrice = 0;
    }


    $fetch_price_sql->close();
} else {
    
    $fullPrice = 0;
}
?>

<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title> POWER GYM </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/logo/lo.png">

	<!-- CSS here -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/owl.carousel.min.css">
	<link rel="stylesheet" href="assets/css/slicknav.css">
    <link rel="stylesheet" href="assets/css/flaticon.css">
    <link rel="stylesheet" href="assets/css/gijgo.css">
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/animated-headline.css">
	<link rel="stylesheet" href="assets/css/magnific-popup.css">
	<link rel="stylesheet" href="assets/css/themify-icons.css">
	<link rel="stylesheet" href="assets/css/slick.css">
	<link rel="stylesheet" href="assets/css/nice-select.css">
	<link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <style> 
    .activity-form {
    display: inline-block;
    margin-right: 10px; /* Adjust the margin as needed */
}
    </style>
</head>
<body>

  
    <!-- ? Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="assets/img/logo/load.png" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Preloader Start -->
    <header>
        <!--? Header Start -->
        <div class="header-area header-transparent">
            <div class="main-header header-sticky">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <!-- Logo -->
                        <div class="col-xl-2 col-lg-2 col-md-1">
                            <div class="logo">
                                <a href="index.php"><img src="assets/img/logo/lo.png" alt=""></a>
                            </div>
                        </div>
                        <div class="col-xl-10 col-lg-10 col-md-10">
                            <div class="menu-main d-flex align-items-center justify-content-end">
                                <!-- Main-menu -->
                                <div class="main-menu f-right d-none d-lg-block">
                                    <nav>
                                        <ul id="navigation">
                                            <li><a href="index.php">Home</a></li>
                                            <li><a href="services.php">Classes</a></li>
                                            <?php if (isset($_SESSION['username'])): ?>
                                                <li><a href="schedule.php">Schedule</a></li> 
                                                <?php if (isset($_SESSION['username']) && 
                                                ($_SESSION['username'] == 'mohamed' || $_SESSION['username'] == 'jebali')): ?>
                                                <li><a href="Clients.php">Clients</a></li> 
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        </ul>
                                    </nav>
                                </div>
                                <?php if (isset($_SESSION['username'])): ?>
                                    <!-- User is logged in -->
                                    <div class="header-right-btn f-right d-none d-lg-block ml-30">
                                        <a href="logout.php" class="btn header-btn">Log Out</a>
                                    </div>
                                <?php else: ?>
                                    <!-- User is not logged in -->
                                    <div class="header-right-btn f-right d-none d-lg-block ml-30">
                                        <a href="form.php" class="btn header-btn">Become a Member</a>
                                    </div>
                                    <div class="header-right-btn f-right d-none d-lg-block ml-30">
                                        <a href="login.php" class="btn header-btn">Log in Monster</a>
                                    </div>
                                <?php endif; ?>
                        </div>   
                        <!-- Mobile Menu -->
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header End -->
    </header>
    <main>
        <!--? Hero Start -->
        <div class="slider-area2">
            <div class="slider-height2 d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="hero-cap hero-cap2 text-center pt-70">
                                <h2>our Classes</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hero End -->
        <!--? Services Area Start -->
        <section class="services-area pt-100 pb-150">
            <!--? Want To work -->
            <section class="wantToWork-area w-padding">
                <div class="container">
                    <div class="row align-items-end justify-content-between">
                        <div class="col-lg-6 col-md-10 col-sm-10">
                            <div class="section-tittle">
                                <span>oUR Classes FOR YOU</span>
                                <h2>PUSH YOUR LIMITS FORWARD</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Want To work End -->
            <div class="container">
                <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-6">
    <div class="single-cat single-cat2 text-center mb-50">
        <div class="cat-icon">
            <i class="fas fa-dumbbell"></i>
        </div>
        <div class="cat-cap">
            <h5><a href="#">Lifting</a></h5>
            <p>20DT/Month</p> <!-- Display the price -->
        </div>
        <div class="img-cap">
            <?php if (isset($_SESSION['username'])): ?>
                <?php $activity = "Lifting"; ?>
                <?php if (is_array($_SESSION['user_activities']) && in_array($activity, $_SESSION['user_activities'])): ?>
                    <form method="POST" action="remove_activity.php" class="activity-form">
                        <input type="hidden" name="activity" value="<?php echo $activity; ?>">
                        <button type="submit" class="btn header-btn">Remove<i class="ti-arrow-right"></i></button>
                    </form>
                <?php else: ?>
                    <form method="POST" action="add_activity.php" class="activity-form">
                        <input type="hidden" name="activity" value="<?php echo $activity; ?>">
                        <input type="hidden" name="price" value="20"> <!-- Include the price in the form -->
                        <button type="submit" class="btn header-btn">Add<i class="ti-arrow-right"></i></button>
                    </form>
                <?php endif; ?>
            <?php else: ?>
                <a href="login.php">Log in to Add<i class="ti-arrow-right"></i></a>
            <?php endif; ?>
        </div>
    </div>
</div>
<div class="col-lg-4 col-md-4 col-sm-6">
    <div class="single-cat single-cat2 text-center mb-50">
        <div class="cat-icon">
            <i class="fas fa-running"></i> <!-- Use an appropriate icon for Cardio -->
        </div>
        <div class="cat-cap">
            <h5><a href="#">Cardio</a></h5>
            <p>10DT/Month</p> <!-- Display the price for Cardio -->
        </div>
        <div class="img-cap">
            <?php if (isset($_SESSION['username'])): ?>
                <?php $activity = "Cardio"; ?>
                <?php if (is_array($_SESSION['user_activities']) && in_array($activity, $_SESSION['user_activities'])): ?>
                    <form method="POST" action="remove_activity.php" class="activity-form">
                        <input type="hidden" name="activity" value="<?php echo $activity; ?>">
                        <button type="submit" class="btn header-btn">Remove<i class="ti-arrow-right"></i></button>
                    </form>
                <?php else: ?>
                    <form method="POST" action="add_activity.php" class="activity-form">
                        <input type="hidden" name="activity" value="<?php echo $activity; ?>">
                        <input type="hidden" name="price" value="10"> <!-- Include the price in the form -->
                        <button type="submit" class="btn header-btn">Add<i class="ti-arrow-right"></i></button>
                    </form>
                <?php endif; ?>
            <?php else: ?>
                <a href="login.php">Log in to Add<i class="ti-arrow-right"></i></a>
            <?php endif; ?>
        </div>
    </div>
</div>

                   <div class="col-lg-4 col-md-4 col-sm-6">
    <div class="single-cat single-cat2 text-center mb-50">
        <div class="cat-icon">
            <i class="fas fa-medal"></i> <!-- Use an appropriate icon for Boxing -->
        </div>
        <div class="cat-cap">
            <h5><a href="#">Boxing</a></h5>
            <p>25DT/Month</p> <!-- Display the price for Boxing -->
        </div>
        <div class="img-cap">
            <?php if (isset($_SESSION['username'])): ?>
                <?php $activity = "Boxing"; ?>
                <?php if (is_array($_SESSION['user_activities']) && in_array($activity, $_SESSION['user_activities'])): ?>
                    <form method="POST" action="remove_activity.php" class="activity-form">
                        <input type="hidden" name="activity" value="<?php echo $activity; ?>">
                        <button type="submit" class="btn header-btn">Remove<i class="ti-arrow-right"></i></button>
                    </form>
                <?php else: ?>
                    <form method="POST" action="add_activity.php" class="activity-form">
                        <input type="hidden" name="activity" value="<?php echo $activity; ?>">
                        <input type="hidden" name="price" value="25"> <!-- Include the price in the form -->
                        <button type="submit" class="btn header-btn">Add<i class="ti-arrow-right"></i></button>
                    </form>
                <?php endif; ?>
            <?php else: ?>
                <a href="login.php">Log in to Add<i class="ti-arrow-right"></i></a>
            <?php endif; ?>
        </div>
    </div>
</div>

                <?php if (isset($_SESSION['username'])): ?>
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="single-cat single-cat2 text-center mb-50">
                            <div class="cat-icon">
                            <i class="fas fa-trash"></i>
                            </div>
                            <div class="cat-cap">
                                <h5><a href="#">Quit</a></h5>
                            </div>
                            <div class="img-cap">
            <form method="POST" action="quit.php" class="activity-form">
                <input type="hidden" name="activity" value="<?php echo $activity; ?>">
                <button type="submit" class="btn header-btn">Quit<i class="ti-arrow-right"></i></button>
            </form>
    <?php endif; ?>
    
</div>

                        </div>
                        <?php if (isset($_SESSION['username'])): ?>
    <section class="subscription-card section-padding20">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="subscription-box">
                        <h3>Your Subscription</h3>
                        <p>Hello, <?php echo $_SESSION['username']; ?>!</p>
                        <p>Your subscribed classes:</p>

                        <?php foreach ($_SESSION['user_activities'] as $activity): ?>
                            <p><?php echo $activity; ?></p>
                        <?php endforeach; ?>

                        <?php echo "<p> Full Price: $fullPrice DT</p>"; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
                    </div>
                </div>
            </div>
        </section>
        <!-- Services Area End -->
    </main>
    <footer>
        <!--? Footer Start-->
        <div class="footer-area section-bg" data-background="assets/img/gallery/section_bg03.png">
            <div class="container">
                <div class="footer-top footer-padding">
                    <!-- Footer Menu -->
                    <div class="row d-flex justify-content-between">
                       
                        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                            <div class="single-footer-caption mb-50">
                                <div class="footer-tittle">
                                    <h4>Open hour</h4>
                                    <ul>
                                        <li><a href="#">Monday 11am-7pm</a></li>
                                        <li><a href="#"> Tuesday-Friday 11am-8pm</a></li>
                                        <li><a href="#"> Saturday 10am-6pm</a></li>
                                        <li><a href="#"> Sunday 11am-6pm</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-xl-3 col-lg-4 col-md-5 col-sm-6">
                            <div class="single-footer-caption mb-50">
                                <!-- logo -->
                                <div class="footer-logo">
                                    <a href="index.html"><img src="assets/img/logo/logo2_footer.png" alt=""></a>
                                </div>
                                <div class="footer-tittle">
                                    <div class="footer-pera">
                                        <p class="info1">GThe trade war currently ensuing between te US anfd several natxions around thdhe globe, most fiercely with.</p>
                                    </div>
                                </div>
                                <!-- Footer Social -->
                                <div class="footer-social ">
                                    <a href=""><i class="fab fa-facebook-f"></i></a>
                                    <a href=""><i class="fab fa-twitter"></i></a>
                                    <a href=""><i class="fas fa-globe"></i></a>
                                    <a href=""><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Footer Bottom -->
                <div class="footer-bottom">
                    <div class="row d-flex align-items-center">
                        <div class="col-lg-12">
                            <div class="footer-copy-right text-center">
                                <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Med Aziz Turki</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End-->
    </footer>
    <!-- Scroll Up -->
    <div id="back-top" >
        <a title="Go to Top" href="#"> <i class="fas fa-level-up-alt"></i></a>
    </div>

    <!-- JS here -->

    <script src="./assets/js/vendor/modernizr-3.5.0.min.js"></script>
    <!-- Jquery, Popper, Bootstrap -->
    <script src="./assets/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="./assets/js/popper.min.js"></script>
    <script src="./assets/js/bootstrap.min.js"></script>
    <!-- Jquery Mobile Menu -->
    <script src="./assets/js/jquery.slicknav.min.js"></script>

    <!-- Jquery Slick , Owl-Carousel Plugins -->
    <script src="./assets/js/owl.carousel.min.js"></script>
    <script src="./assets/js/slick.min.js"></script>
    <!-- One Page, Animated-HeadLin -->
    <script src="./assets/js/wow.min.js"></script>
    <script src="./assets/js/animated.headline.js"></script>
    <script src="./assets/js/jquery.magnific-popup.js"></script>

    <!-- Date Picker -->
    <script src="./assets/js/gijgo.min.js"></script>
    <!-- Nice-select, sticky -->
    <script src="./assets/js/jquery.nice-select.min.js"></script>
    <script src="./assets/js/jquery.sticky.js"></script>
    
    <!-- counter , waypoint -->
    <script src="./assets/js/jquery.counterup.min.js"></script>
    <script src="./assets/js/waypoints.min.js"></script>
    <script src="./assets/js/jquery.countdown.min.js"></script>
    <script src="./assets/js/hover-direction-snake.min.js"></script>

    <!-- contact js -->
    <script src="./assets/js/contact.js"></script>
    <script src="./assets/js/jquery.form.js"></script>
    <script src="./assets/js/jquery.validate.min.js"></script>
    <script src="./assets/js/mail-script.js"></script>
    <script src="./assets/js/jquery.ajaxchimp.min.js"></script>
    
    <!-- Jquery Plugins, main Jquery -->	
    <script src="./assets/js/plugins.js"></script>
    <script src="./assets/js/main.js"></script>
    
    </body>
</html>