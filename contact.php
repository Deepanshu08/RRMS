<?php
session_start();
if(!isset($_SESSION['username'])){
    header("Location: index.php ");
}
?>

<?php
$link = mysqli_connect("localhost:8111", "root", "", "website");
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 if(isset($_POST["submit"])){
 $name=$_POST["name"];
 $email=$_POST["email"];
 $phone=$_POST["phone"];
 $address=$_POST["address"];
 $message=$_POST["message"];
 if($name==NULL || $email==NULL||$phone==NULL||$address==NULL||$message==NULL){
    $message="Please enter your details !";
    echo "<script type='text/javascript'>alert('$message');</script>";
 }
 else if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
    $message="Enter Valid Email !";
    echo "<script type='text/javascript'>alert('$message');</script>";
}
 else{
    $query="SELECT * FROM contact";
    $result=mysqli_query($link,$query);
    $count=0; 
    while($row=mysqli_fetch_array($result)){
        if($row["email"]==$email && $row["name"]==$name){
            $count=$count+1;
            $message="Already Taken !";
            echo "<script type='text/javascript'>alert('$message');</script>";
            break;
        }
    }
    if($count==0){
        $insert="INSERT INTO contact (name,email,phone,address,message) VALUES ('$name','$email','$phone','$address','$message')";
        if(mysqli_query($link,$insert)){
            header("Location: home.php ");
        }
    }
 }
}
mysqli_close($link);
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
                <nav class="classy-navbar justify-content-between" id="uzaNav">
                    <a class="nav-brand" href="home.php"><h1>RRMS</h1></a>
                    <div class="classy-navbar-toggler">
                        <span class="navbarToggler"><span></span><span></span><span></span></span>
                    </div>
                    <div class="classy-menu">
                        <div class="classycloseIcon">
                            <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                        </div>
                        <div class="classynav">
                            <ul id="nav">
                                <li><a href="home.php">Home</a></li>
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
                                <li class="current-item"><a href="contact.php">Contact</a></li>

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
                        <h2 class="title">Contact</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="home.php"><i class="fa fa-home"></i> Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Contact</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="breadcrumb-bg-curve">
            <img src="./img/core-img/curve-5.png" alt="">
        </div>
    </div>
    <section class="uza-contact-area section-padding-80">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-12 col-lg-8">
                    <div class="uza-contact-form mb-80">
                        <div class="contact-heading mb-50">
                            <h4>Thank you for your interest. <br>Please fill out the form below to enquire about our work in Digital.</h4>
                        </div>
                        <form method="post" action="contact.php">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control mb-30" name="name" placeholder="Name" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input type="email" class="form-control mb-30" name="email" placeholder="Email" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control mb-30" name="phone" placeholder="Phone" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control mb-30" name="address" placeholder="Address" required>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <textarea class="form-control mb-30" name="message" rows="8" cols="80" placeholder="Message" required></textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn uza-btn btn-3 mt-15" type="submit" name="submit">Contact Us</button>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-12 col-lg-3">
                    <div class="contact-sidebar-area mb-80">
                        <div class="single-contact-card mb-50">
                            <h4>Contact Us</h4>
                            <h3>(+91) 9988776655</h3>
                            <p>Vellore Institute of Technology,<br>Tamilnadu, India</p>
                            <h6>rrms@gmail.com</h6>
                        </div>
                        <div class="single-contact-card mb-50">
                            <h4>New Delhi</h4>
                            <h3>(+91) 9988776656</h3>
                            <h6> Ferozshah Road, New Delhi, India <br>rrms01@gmail.com</h6>
                        </div>
                        <div class="single-contact-card mb-50">
                            <h4>Mumbai</h4>
                            <h3>(+91) 9988776657</h3>
                            <h6>M.V. Road, Mumbai, India <br>rrms02@gmail.com</h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="google-maps">
                        <iframe src="https://maps.google.com/maps?width=600&amp;height=400&amp;hl=en&amp;q=vellore institute of technology&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed" allowfullscreen></iframe>
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