<?php
session_start();
if(!isset($_SESSION['username'])){
    header("Location: index.php ");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="uza - Model Agency HTML5 Template">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>RRMS</title>
    <link rel="stylesheet" href="style.css">
    <script src="{{ asset('app.js') }}" defer></script>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link href="{{ asset('app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="preloader">
        <div class="wrapper">
            <div class="cssload-loader"></div>
        </div>
    </div>
    <header class="header-area" >
        <div class="main-header-area">
            <div class="classy-nav-container breakpoint-off">
                <!-- Classy Menu -->
                <nav class="classy-navbar justify-content-between" id="uzaNav">
                    <a class="nav-brand" href="home.php"><h1>RRMS</h1></a>
                    <div class="classy-navbar-toggler">
                        <span class="navbarToggler"><span></span><span></span><span></span></span>
                    </div>
                    <div class="classy-menu">
                        <!-- Menu Close Button -->
                        <div class="classycloseIcon">
                            <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                        </div>
                        <div class="classynav">
                            <ul id="nav">
                                <li class="current-item"><a href="home.php">Home</a></li>
                                <li><a href="#">Dashboard</a>
                                    <ul class="dropdown">
                                        <li><a href="updateprofile.php">- Update Profile</a></li>
                                        <li><a href="viewdonated.php">- View Donated</a></li>
                                        <li><a href="viewrequested.php">- View Requested</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Resources</a>
                                    <ul class="dropdown">
                                        <li><a href="donate.php">- Donate</a></li>
                                        <li><a href="request.php">- Request</a></li>
                                    </ul>
                                </li>
                                <li><a href="contact.php">Contact</a></li>
                            </ul>
                            <div class="get-a-quote ml-4 mr-3">
                                <a href="logout.php" class="btn uza-btn">Logout</a>
                            </div>
                        </div>

                    </div>
                </nav>
            </div>
        </div>
    </header>
    <div class="breadcrumb-area">
        <div class="container h-100">
            <div class="row h-100 align-items-end">
                <div class="col-12">
                    <div class="breadcumb--con">
                        <h2 class="title">Resources and Relief Management System</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="breadcrumb-bg-curve">
            <img src="./img/core-img/curve-5.png" alt="">
        </div>
    </div>
    <section class="uza-about-us-area section-padding-80">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-lg-6">
                    <div class="about-us-thumbnail mb-80">
                        <img src="./img/our_mission.jpg" alt="">
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="section-heading mb-5">
                        <h2>Our Mission</h2>
                    </div>
                    <div class="about-us-content mb-80">
                        <div class="about-tab-area">
                            <ul class="nav nav-tabs mb-50" id="mona_modelTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="tab1" data-toggle="tab" href="#tab-1" role="tab" aria-controls="tab-1" aria-selected="true">CREATION</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tab2" data-toggle="tab" href="#tab-2" role="tab" aria-controls="tab-2" aria-selected="false"> ANALYSIS</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tab3" data-toggle="tab" href="#tab-3" role="tab" aria-controls="tab-3" aria-selected="false">STRATEGY</a>
                                </li>
                            </ul>
                        </div>
                        <div class="about-tab-content">
                            <div class="tab-content" id="mona_modelTabContent">
                                <div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="tab1">
                                    <!-- Tab Content Text -->
                                    <div class="tab-content-text">
                                        <p>Disaster Management as a subject essentially deals with the management of resources and relief as far as a disastrous event is concerned and how effectively and seamlessly one coordinates these resources.Our application Resources and Relief Management system maintain a database that consists of various tables storing the records.
                                        </p>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tab-2" role="tabpanel" aria-labelledby="tab2">
                                    <div class="tab-content-text">
                                        <p>At present, online systems are very successful. A large number of people use the online system regularly. They prefer to operate from their house and not wander outside. An online application that is simple and easy to use is an instant hit with millions of online users. The motive of our application is to get donations and relief for disaster suffered people from millions of users. </p>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tab-3" role="tabpanel" aria-labelledby="tab3">
                                    <div class="tab-content-text">
                                        <p>This project aims to develop an application of the Resource and Relief Management System which provides efficient resource allocation, donation management, and resource prioritization.Relief goods accountability, delivery, allocation, and prioritization of high-risk areas can fulfill through our application.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="about-bg-pattern">
            <img src="./img/core-img/curve-2.png" alt="">
        </div>
    </section>
    <section class="uza-why-choose-us-area">
        <div class="container">
            <div class="row align-items-center">
                <!-- Choose Us Content -->
                <div class="col-12 col-lg-6">
                    <div class="choose-us-content mb-80">
                        <div class="section-heading mb-4">
                            <h2>Why Choose Us?</h2>
                        </div>
                        <ul>
                            <li><i class="fa fa-check" aria-hidden="true"></i>Make the Relief management process more efficient and faster.</li>
                            <li><i class="fa fa-check" aria-hidden="true"></i>Admin maintains all the resources allocation, donations and has authority to provide sanction relief requests.</li>
                            <li><i class="fa fa-check" aria-hidden="true"></i>Aims at standardizing data, consolidating data ensuring data integrity and reducing inconsistencies in Resource and Relief management system.
                            </li>
                            <li><i class="fa fa-check" aria-hidden="true"></i>Users can register with their Email-Id and edit their profile as required.</li>
                            <li><i class="fa fa-check" aria-hidden="true"></i>Users can donate and also request relief from available resources.</li>
                        </ul>
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="choose-us-thumbnail mb-80">
                        <img class="w-100" src="img/why_choose_us.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer class="footer-area section-padding-80-0">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="single-footer-widget mb-80">
                        <h4 class="widget-title">Contact Us</h4>
                        <div class="footer-content mb-15">
                            <h3>(+91) 9988776655</h3>
                            <p>Vellore Institute of Technology,<br>Tamilnadu, India<br>rrms@gmail.com</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="single-footer-widget mb-80">
                        <!-- Widget Title -->
                        <h4 class="widget-title">References</h4>
                        <nav>
                            <ul class="our-link">
                                <li><a href="https://www.indiatoday.in/">India Today</a></li>
                                <li><a href="https://news.google.com/?hl=en-IN&gl=IN&ceid=IN:en">Google News</a></li>
                                <li><a href="https://timesofindia.indiatimes.com/">Times Of India</a></li>
                                <li><a href="https://www.ndtv.com">NDTV</a></li>
                            </ul>
                        </nav>
                    </div>   
                </div>
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="single-footer-widget mb-80">
                        <h4 class="widget-title">About Us</h4>
                        <p></p>
                        <div class="copywrite-text mb-30">
                            <p>&copy; Copyright 2022 <a href="#">RRMS</a>.</p>
                        </div>
                        <div class="footer-social-info">
                            <a href="https://www.facebook.com/" class="facebook" data-toggle="tooltip" data-placement="top" title="Facebook"><i class="fa fa-facebook" target="blank"></i></a>
                            <a href="https://twitter.com/login" class="twitter" data-toggle="tooltip" data-placement="top" title="Twitter"><i class="fa fa-twitter" target="blank"></i></a>
                            <a href="https://www.instagram.com/?hl=en" class="instagram" data-toggle="tooltip" data-placement="top" title="Instagram"><i class="fa fa-instagram" target="blank"></i></a>
                            <a href="https://www.youtube.com/" class="youtube" data-toggle="tooltip" data-placement="top" title="YouTube"><i class="fa fa-youtube-play" target="blank"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                Copyright &copy; 2022 All rights reserved | RRMS
            </div>
        </div>
    </footer>
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/uza.bundle.js"></script>
    <script src="js/default-assets/active.js"></script>
</body>
</html>