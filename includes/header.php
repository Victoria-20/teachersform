<?php include "db.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">
    <link href="images/favicon.png" rel="icon" />

    <title>Teachers --App</title>
    <meta name="description" content="Agric">
    <meta name="author" content="agfarm">

    <!-- Web Fonts
============================================= -->
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900'
        type='text/css'>

    <!-- Stylesheet
============================================= -->
    <link rel="stylesheet" type="text/css" href="frontend/vendor/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="frontend/vendor/font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="frontend/vendor/owl.carousel/assets/owl.carousel.min.css" />
    <link rel="stylesheet" type="text/css" href="frontend/vendor/owl.carousel/assets/owl.theme.default.min.css" />
    <link rel="stylesheet" type="text/css" href="frontend/css/stylesheet.css" />
    <link rel="stylesheet" type="text/css" href="frontend/css/teacherform.css" />
    <link rel="stylesheet" type="text/css" href="frontend/css/editor.css" />
    <link rel="stylesheet" type="text/css" href="frontend/vendor/DT/jquery.dataTables.css" />

</head>

<!-- window.location.replace("app/template/index.html"); -->

<body>
    <!-- Preloader -->
    <div id="preloader">
        <div data-loader="dual-ring"></div>
    </div><!-- Preloader End -->

    <header>
        <!-- Collapse Button
        ============================================= -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#header-nav">
            <span></span> <span></span> <span></span> </button>

    </header><!-- Header end -->


    <div id="content" style="padding-top:0px">

        <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
            <!-- Brand/logo -->
            <a class="navbar-brand" href="index.php"><strong>Pic-Ed</strong>
                <!-- <img src="bird.jpg" alt="logo" style="width:40px;"> -->
            </a>

            <!-- Links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#">Resouces</a>
                </li>
                <!-- <li class="nav-item">
                <a class="nav-link" href="#">Resouces-2</a>
            </li> -->
                <li class="nav-item">
                    <a class="nav-link " href="teachers.php">Add Teacher</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="classes.php">Add Class</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="chapters.php">Add Chapter</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="index3.php"> <i class="fa fa-user"></i> Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="submitteddata.php">Click if Logged In</a>
                </li>

                <li class="nav-item pull-right">
                    <a class="btn btn-sm btn-danger" href="c_logout.php">Logout Here</a>
                </li>

            </ul>
        </nav>