<!DOCTYPE html>
<html lang="ID">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Epm Foundation</title>

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400%7CSource+Sans+Pro:700" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="<?php echo $set['url_website']; ?>css/bootstrap.min.css" />
    <link type="text/css" rel="stylesheet" href="<?php echo $set['url_website']; ?>css/owl.carousel.css" />
    <link type="text/css" rel="stylesheet" href="<?php echo $set['url_website']; ?>css/owl.theme.default.css" />
    <link rel="stylesheet" href="<?php echo $set['url_website']; ?>css/font-awesome.min.css">
    <link type="text/css" rel="stylesheet" href="<?php echo $set['url_website']; ?>css/style.css" />
    <link type="text/css" rel="stylesheet" href="<?php echo $set['url_website']; ?>css/datatables.min.css" />

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

</head>

<body>
    <header>
        <nav id="main-navbar">
            <div class="container">
                <div class="navbar-header">
                    <div class="navbar-brand">
                        <a class="logo" href="<?php echo $set['url_website']; ?>"><img src="" alt="logo"></a>
                    </div>

                    <button class="navbar-toggle-btn">
                        <i class="fa fa-bars"></i>
                    </button>

                    <button class="user-toggle-btn">
                        <i class="fa fa-user"></i>
                    </button>

                    <!-- <button class="search-toggle-btn">
                        <i class="fa fa-search"></i>
                    </button> -->
                </div>

                <div class="navbar-user">
                    <button class="user-btn"><i class="fa fa-user"></i></button>
                    <?php
                    if (empty($_SESSION['email']) or empty($_SESSION['password']) or $_SESSION['log'] == 0) {
                        ?>
                        <div class="user-form">
                            <h4>Login Sukarelawan.</h4>
                            <p>Isi email dan password Anda untuk login.</p>
                            <form action="<?php echo $set['url_website']; ?>auth" method="post">
                                <input type="hidden" name="oauth" value="login">
                                <input class="input" type="email" name="email" placeholder="email" required>
                                <br>
                                <input class="input" type="password" name="password" placeholder="password" required>
                                <button type="submit" class="primary-button">Login</button>

                            </form>
                            <p>Lupa password? <a href="<?php echo $set['url_website']; ?>auth?lupa-password">Klik Disini</a></p>
                            <p>Belum punya akun? <a href="<?php echo $set['url_website']; ?>auth?daftar">Daftar Disini</a></p>
                        </div>
                    <?php
                    } else {
                        ?>
                        <div class="user-form">
                            <h4>Selamat datang <?php echo $_SESSION['nama_lengkap']; ?></h4>
                            <ul>
                                <li><a href="<?php echo $set['url_website']; ?>sukarelawan/dashboard">Dashboard Sukarelawan</a></li>
                                <li><a href="<?php echo $set['url_website']; ?>logout">Logout</a></li>
                            </ul>
                        </div>
                    <?php
                    }
                    ?>
                </div>
                <!-- <div class="navbar-search">
                    <button class="search-btn"><i class="fa fa-search"></i></button>
                    <div class="search-form">
                        <form>
                            <input class="input" type="text" name="search" placeholder="Search">
                        </form>
                    </div>
                </div> -->

                <ul class="navbar-menu nav navbar-nav navbar-right">
                    <li><a href="<?php echo $set['url_website']; ?>">Home</a></li>
                    <li><a href="<?php echo $set['url_website']; ?>tentang-kami">Tentang Kami</a></li>
                    <li class="has-dropdown"><a href="">Program</a>
                        <ul class="dropdown">
                            <li><a href="<?php echo $set['url_website']; ?>program">Program Pilihan</a></li>
                        </ul>
                    </li>
                    <li class="has-dropdown"><a href="#">Acara</a>
                        <ul class="dropdown">
                            <li><a href="<?php echo $set['url_website']; ?>acara">Acara Mendatang</a></li>
                        </ul>
                    </li>
                    <li class="has-dropdown"><a href="#">Blog</a>
                        <ul class="dropdown">
                            <li><a href="<?php echo $set['url_website']; ?>blog">Our Blog</a></li>
                        </ul>
                    </li>
                    <!-- <li><a href="#">Contact</a></li> -->
                </ul>
            </div>
        </nav>