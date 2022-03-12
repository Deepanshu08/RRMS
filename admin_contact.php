<?php
session_start();
if(!isset($_SESSION['username'])){
    header("Location: admin_login.php ");
}
?>

<?php
$link = mysqli_connect("localhost:8111", "root", "", "website");
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
$sql="select * from contact";
$result=mysqli_query($link,$sql);
$num=mysqli_num_rows($result);
mysqli_close($link);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="uza - Model Agency HTML5 Template">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>RRMS Admin</title>
    <link rel="stylesheet" href="style.css">
    <script src="{{ asset('app.js') }}" defer></script>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link href="{{ asset('app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
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
                    <a class="nav-brand" href="admin.php"><h1>Admin</h1></a>
                    <div class="classy-navbar-toggler">
                        <span class="navbarToggler"><span></span><span></span><span></span></span>
                    </div>
                    <div class="classy-menu">
                        <div class="classycloseIcon">
                            <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                        </div>
                        <div class="classynav">
                            <ul id="nav">
                                <li><a href="viewresources.php">Resources</a></li>
                                <li><a href="approverequests.php">Requests</a></li>
                                <li><a href="admin_location.php">Location</a></li>                               
                                <li class="current-item"><a href="admin_contact.php">Contact</a></li>
                            </ul>
                            <div class="get-a-quote ml-4 mr-3">
                                <a href="admin_logout.php" class="btn uza-btn">Logout</a>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </header>
        <div class="breadcrumb-bg-curve">
            <img src="./img/core-img/curve-5.png" alt="">
        </div>
    </div>
<div>
    <table class="table table-sm">
        <tr class="table-primary">
            <th>Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone No.</th>
            <th>Address</th>
            <th>Message</th>
        </tr>
        <?php
            if($num>0){
                while($data=mysqli_fetch_assoc($result)){
                    echo " 
                        <tr >
                            <td>".$data['id']."</td>
                            <td>".$data['name']."</td>
                            <td>".$data['email']."</td>
                            <td>".$data['phone']."</td>
                            <td>".$data['address']."</td>
                            <td>".$data['message']."</td>
                        </tr>
                    ";
                }
            }
        ?>
    </table>
</div>
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/uza.bundle.js"></script>
    <script src="js/default-assets/active.js"></script>
</body>
</html>