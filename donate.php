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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="donate.js"></script>
</head>
<body onload="pageinit()">
    <nav class="navbar navbar-dark bg-primary">
        <div class="container-fluid">
            <div class="navbar-brand">
                <?php
                    echo "<h4>Welcome {$_SESSION['username']}</h4>";
                ?>
            </div>
            <div class="container-fluid">
                <div class="navbar-nav container-fluid">
                    <table>
                    <tr>
                        <td><a href="home.php" class="nav-link">HOME</a></td>
                        <td><a href="#" class="nav-link active">DONATE</a></td>
                        <td><a href="viewdonated.php" class="nav-link">VIEW DONATED</a></td>
                        <td><a href="request.php" class="nav-link">REQUEST</a></td>
                        <td><a href="viewrequested.php" class="nav-link">VIEW REQUESTED</a></td>
                </tr>
                </table>
                </div>
            </div>
        </div>
    </nav>
    <form action="donate1.php" method="post">
        <table class="table table-info table-striped table-hover">
            <thead>
                <tr class="table-active">
                    <th>ITEM</th>
                    <th>TYPE</th>
                    <th>QUANTITY &sol; AMOUNT</th>
                    <th>UNIT</th>
                    <th>REMARKS</th>
                    <th><input type="button" class="btn btn-outline-primary btn-lg" onclick="addRow()" value="+"></th>
                </tr>
            </thead>
            <tbody id="dtable"></tbody>
            <thead>
                <tr class="table-active">
                    <td colspan=6><input type="submit" class="btn btn-outline-primary btn-lg" value="DONATE"></td>
                </tr>
            </thead>
        </table>
    </form>
</body>
</html>