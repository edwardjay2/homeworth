<?php
    require_once('connection.php');
    session_start();
    if(isset($_SESSION['id'])){
        $id = $_SESSION['id'];
        $sql = "SELECT * FROM designers WHERE id = '$id'";
        $res = mysqli_query($con, $sql);
        $rows = mysqli_fetch_assoc($res);
        $name = $rows['name'];
        $phone = $rows['phone'];
        $email = $rows['email'];
        $specification = $rows['specification'];
        $facebook = $rows['facebook'];
        $twitter = $rows['twitter'];
        $instagram = $rows['instagram'];
        $img = $rows['img'];
    }else{
        header('location: login.php?error=unauthorised access');
        return false;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <!-- Woodworth Icon CSS -->
    <link rel="icon" href="images/icon/home.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- OwlCarousel CSS -->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <!-- Boxicon CSS -->
    <link rel="stylesheet" href="Asset/boxicons-2.1.4/css/boxicons.min.css">
    <!-- css file -->
    <link rel="stylesheet" href="css/style.css">
    <title>Homeworth</title>
</head>
<body>
    <!-- BOTTOM NAV -->
    <nav class="navbar navbar-expand-lg navbar-light bg-dark fixed-top p-md-3">
        <div class="container">
            <a class="navbar-brand" style="color: whitesmoke;" href="#">Homeworth<span class="dot">.</span></a>
            <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarNav2"
            aria-expanded="false"
            aria-label="Toggle navigation"
            >
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav2">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a href="Dashboard.php" class="nav-link">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a href="profile.php" class="nav-link">Profile</a>
                </li>
                <li class="nav-item">
                    <a href="Messages.php" class="nav-link">Messages</a>
                </li>
                <li class="nav-item">
                    <a href="includes/logout.php" class="nav-link">Logout</a>
                </li>
           </ul>
        </div>
        </div>
    </nav>