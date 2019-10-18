<!DOCTYPE html>
<html lang="ID">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Epm Foundation</title>

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400%7CSource+Sans+Pro:700" rel="stylesheet">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />

    <!-- Owl Carousel -->
    <link type="text/css" rel="stylesheet" href="css/owl.carousel.css" />
    <link type="text/css" rel="stylesheet" href="css/owl.theme.default.css" />

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="css/font-awesome.min.css">

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="css/style.css" />

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

</head>

<body>
    <!-- HEADER -->
    <header >
        <!-- NAVGATION -->
        <nav id="main-navbar">
            <div class="container">
                <div class="navbar-header">
                    <!-- Logo -->
                    <div class="navbar-brand">
                        <a class="logo" href="<?php echo $set['url_website'];?>"><img src="" alt="logo"></a>
                    </div>
                    <!-- Logo -->

                    <!-- Mobile toggle -->
                    <button class="navbar-toggle-btn">
                        <i class="fa fa-bars"></i>
                    </button>
                    <!-- Mobile toggle -->

                    <!-- Mobile Search toggle -->
                    <button class="user-toggle-btn">
                        <i class="fa fa-user"></i>
                    </button>
                    <!-- Mobile Search toggle -->
                    <!-- Mobile Search toggle -->
                    <button class="search-toggle-btn">
                        <i class="fa fa-search"></i>
                    </button>
                    <!-- Mobile Search toggle -->
                </div>

                <!-- user -->
                <div class="navbar-user">
                    <button class="user-btn"><i class="fa fa-user"></i></button>
                    <div class="user-form">
                        <h4>Login Sukarelawan.</h4>
                        <p>Isi email dan password Anda untuk login.</p>
                        <form>
                            <input class="input" type="text" name="email" placeholder="email">
                            <br>
                            <input class="input" type="password" name="password" placeholder="password">
                            <button type="submit" class="primary-button">Login</button>

                        </form>
                        <p>Lupa password? <a href="#">Klik Disini</a></p>
                        <p>Belum punya akun? <a href="#">Daftar Disini</a></p>
                    </div>
                </div>
                <div class="navbar-search">
                    <button class="search-btn"><i class="fa fa-search"></i></button>
                    <div class="search-form">
                        <form>
                            <input class="input" type="text" name="search" placeholder="Search">
                        </form>
                    </div>
                </div>
                <!-- Search -->

                <!-- Nav menu -->
                <ul class="navbar-menu nav navbar-nav navbar-right">
                    <li><a href="<?php echo $set['url_website'];?>">Home</a></li>
                    <li><a href="tentang-kami">Tentang Kami</a></li>
                    <li class="has-dropdown"><a href="#">Program</a>
                        <ul class="dropdown">
                            <li><a href="single-cause.html">Sub Program</a></li>
                        </ul>
                    </li>
                    <li class="has-dropdown"><a href="#">Acara</a>
                        <ul class="dropdown">
                            <li><a href="single-event.html">Sub Acara</a></li>
                        </ul>
                    </li>
                    <li class="has-dropdown"><a href="#">Blog</a>
                        <ul class="dropdown">
                            <li><a href="blog.html">Blog Page</a></li>
                            <li><a href="single-blog.html">Single Blog</a></li>
                            <li><a href="#">Galeri</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Contact</a></li>
                </ul>
                <!-- Nav menu -->
            </div>
        </nav>
        <!-- /NAVGATION -->