<?php
session_start();
include "admin/config.php";
include "website/header.php";
echo "</header>";
?>
<?php
if (isset($_GET['donasi'])) {
    $jumlah = str_replace(".", "", $_GET['donasi']);
    $program = $_GET['program'];
    if ($jumlah < 10000) {
        echo '
        <script>
        alert("Mohon maaf, jumlah donasi minimal Rp 10.000");
        window.location = "' . $set['url_website'] . '";
        </script>
        ';
    } else { ?>
        <div id="page-header">
            <div class="section-bg" style="background-image: url(./img/background-2.jpg);"></div>

            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="header-content">
                            <h1>Konfirmasi Donasi</h1>
                            <ul class="breadcrumb">
                                <li><a href="<?php echo $set['url_website']; ?>">Home</a></li>
                                <li><a href="#">Konfirmasi Donasi</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="section">
            <div class="container">
                <div class="row">
                    <form action="<?php echo $set['url_website']; ?>terimakasih" method="post">
                        <input type="hidden" name="jumlah" value="<?php echo $jumlah; ?>">
                        <input type="hidden" name="program" value="<?php echo $program; ?>">
                        <?php
                                if (isset($_SESSION['log']) == 1) {
                                    echo '
                                <input type="hidden" name="sukarelawan" value="' . $_SESSION['id'] . '">
                                ';
                                }
                                ?>
                        <div class="col-md-6">
                            <div class="card-auth" style="margin-top: 0">
                                <?php
                                        if (isset($_SESSION['log']) == 1) {
                                            echo '
                                            <h3>Data diri:</h3>
                                            <hr>
                                            ';
                                        } else {
                                            echo '
                                            <div class="text-center">
                                            <p>
                                                    <a href="' . $set['url_website'] . 'auth?login" style="color:blue">Masuk</a> atau lengkapi data diri dibawah ini.
                                                </p>
                                            </div>
                                            <hr>
                                            ';
                                        }
                                        ?>

                                <div class="form-group">
                                    <label for="nama">Nama Lengkap<span style="color:red">*</span></label>
                                    <input type="text" id="nama" placeholder="Nama" name="nama" value="<?php if (isset($_SESSION['log']) == 1) {
                                                                                                                    echo $_SESSION['nama_lengkap'];
                                                                                                                } ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email<span style="color:red">*</span></label>
                                    <input type="email" id="email" placeholder="Email" name="email" value="<?php if (isset($_SESSION['log']) == 1) {
                                                                                                                        echo $_SESSION['email'];
                                                                                                                    } ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="hp">Nomor Handphone(Wa)<span style="color:red">*</span></label>
                                    <input type="tel" id="hp" placeholder="Contoh: 0821xxxxxxxx" name="hp" value="<?php if (isset($_SESSION['log']) == 1) {
                                                                                                                                echo $_SESSION['no_hp'];
                                                                                                                            } ?>" required>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card-auth" style="margin-top: 0; margin-bottom: 10px">
                                <div class="text-center">
                                    <h3 style="text-transform: uppercase;">Pembayaran</h3>
                                </div>
                                <hr>
                                <p>Pilih metode pembayaran: <span style="color:red">*</span></p>
                                <div class="row">
                                    <?php
                                            $query = $mysqli->query("SELECT * FROM rekening_bank ORDER BY id DESC");
                                            while ($data = $query->fetch_array()) {
                                                $nama_bank = $data['nama_bank'];
                                                $logo_bank = $data['logo_bank'];

                                                echo '
                                                <div class="col-md-6">
                                                    <div class="cc-selector">
                                                        <input id="' . $nama_bank . '" type="radio" name="bank" value="' . $nama_bank . '" required />

                                                        <label class="drinkcard-cc" for="' . $nama_bank . '" style="background-image:url(' . $set['url_website'] . 'img/source/' . $logo_bank . ');"></label>
                                                    </div>
                                                </div>
                                                ';
                                            }
                                            ?>
                                </div>
                                <hr>


                            </div>

                            <div class="card-tambahan">
                                <h3 style="text-transform: uppercase; margin-top: 0px !important;">Tambahan</h3>
                                <label>
                                    <input type="checkbox" name="alias" value="Hamba Allah">
                                    Samarkan identitas menggunakan nama <strong>Hamba Allah</strong>?
                                </label>
                                <br>
                                <textarea name="doa" placeholder="Titip doa terbaik Anda" rows="3" class="form-control"></textarea>
                            </div>

                        </div>
                        <div class="col-md-12 text-center" style="margin-top:20px">
                            <button class="primary-button" type="submit">Lanjut</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    <?php
    } 
    ?>
<?php
} elseif (isset($_GET['nominal']) and isset($_GET['jumlah-lain'])) {
        $nominal = str_replace(".", "", $_GET['nominal']);
        $jumlah_lain = str_replace(".", "", $_GET['jumlah-lain']);
        if ($jumlah_lain == "") { ?>
        <div id="page-header">
            <div class="section-bg" style="background-image: url(./img/background-2.jpg);"></div>

            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="header-content">
                            <h1>Konfirmasi Donasi</h1>
                            <ul class="breadcrumb">
                                <li><a href="<?php echo $set['url_website']; ?>">Home</a></li>
                                <li><a href="#">Konfirmasi Donasi</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="section">
            <div class="container">
                <div class="row">
                    <form action="<?php echo $set['url_website']; ?>terimakasih" method="post">
                        <input type="hidden" name="jumlah" value="<?php echo $nominal; ?>">
                        <?php
                                if (isset($_SESSION['log']) == 1) {
                                    echo '
                                <input type="hidden" name="sukarelawan" value="' . $_SESSION['id'] . '">
                                ';
                                }
                                ?>
                        <div class="col-md-6">
                            <div class="card-auth" style="margin-top: 0">
                                <?php
                                        if (isset($_SESSION['log']) == 1) {
                                            echo '
                                            <h3>Data diri:</h3>
                                            <hr>
                                            ';
                                        } else {
                                            echo '
                                            <div class="text-center">
                                            <p>
                                                    <a href="' . $set['url_website'] . 'auth?login" style="color:blue">Masuk</a> atau lengkapi data diri dibawah ini.
                                                </p>
                                            </div>
                                            <hr>
                                            ';
                                        }
                                        ?>

                                <div class="form-group">
                                    <label for="nama">Nama Lengkap<span style="color:red">*</span></label>
                                    <input type="text" id="nama" placeholder="Nama" name="nama" value="<?php if (isset($_SESSION['log']) == 1) {
                                                                                                                    echo $_SESSION['nama_lengkap'];
                                                                                                                } ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email<span style="color:red">*</span></label>
                                    <input type="email" id="email" placeholder="Email" name="email" value="<?php if (isset($_SESSION['log']) == 1) {
                                                                                                                        echo $_SESSION['email'];
                                                                                                                    } ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="hp">Nomor Handphone(Wa)<span style="color:red">*</span></label>
                                    <input type="tel" id="hp" placeholder="Contoh: 0821xxxxxxxx" name="hp" value="<?php if (isset($_SESSION['log']) == 1) {
                                                                                                                                echo $_SESSION['no_hp'];
                                                                                                                            } ?>" required>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card-auth" style="margin-top: 0; margin-bottom: 10px">
                                <div class="text-center">
                                    <h3 style="text-transform: uppercase;">Pembayaran</h3>
                                </div>
                                <hr>
                                <p>Pilih metode pembayaran: <span style="color:red">*</span></p>
                                <div class="row">
                                    <?php
                                            $query = $mysqli->query("SELECT * FROM rekening_bank ORDER BY id DESC");
                                            while ($data = $query->fetch_array()) {
                                                $nama_bank = $data['nama_bank'];
                                                $logo_bank = $data['logo_bank'];

                                                echo '
                                                <div class="col-md-6">
                                                    <div class="cc-selector">
                                                        <input id="' . $nama_bank . '" type="radio" name="bank" value="' . $nama_bank . '" required />

                                                        <label class="drinkcard-cc" for="' . $nama_bank . '" style="background-image:url(' . $set['url_website'] . 'img/source/' . $logo_bank . ');"></label>
                                                    </div>
                                                </div>
                                                ';
                                            }
                                            ?>
                                </div>
                                <hr>


                            </div>

                            <div class="card-tambahan">
                                <h3 style="text-transform: uppercase; margin-top: 0px !important;">Tambahan</h3>
                                <label>
                                    <input type="checkbox" name="alias" value="Hamba Allah">
                                    Samarkan identitas menggunakan nama <strong>Hamba Allah</strong>?
                                </label>
                                <br>
                                <textarea name="doa" placeholder="Titip doa terbaik Anda" rows="3" class="form-control"></textarea>
                            </div>

                        </div>
                        <div class="col-md-12 text-center" style="margin-top:20px">
                            <button class="primary-button" type="submit">Lanjut</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
        <?php 
        } else {
            if ($jumlah_lain < 10000) {
                echo '
                <script>
                alert("Mohon maaf, jumlah donasi minimal Rp 10.000");
                window.location = "' . $set['url_website'] . '";
                </script>
                ';
            } else { ?>
            <div id="page-header">
                <div class="section-bg" style="background-image: url(./img/background-2.jpg);"></div>

                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="header-content">
                                <h1>Konfirmasi Donasi</h1>
                                <ul class="breadcrumb">
                                    <li><a href="<?php echo $set['url_website']; ?>">Home</a></li>
                                    <li><a href="#">Konfirmasi Donasi</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="section">
                <div class="container">
                    <div class="row">
                        <form action="<?php echo $set['url_website']; ?>terimakasih" method="post">
                            <input type="hidden" name="jumlah" value="<?php echo $jumlah_lain; ?>">
                            <?php
                                    if (isset($_SESSION['log']) == 1) {
                                        echo '
                                    <input type="hidden" name="sukarelawan" value="' . $_SESSION['id'] . '">
                                    ';
                                    }
                                    ?>
                            <div class="col-md-6">
                                <div class="card-auth" style="margin-top: 0">
                                    <?php
                                            if (isset($_SESSION['log']) == 1) {
                                                echo '
                                                <h3>Data diri:</h3>
                                                <hr>
                                                ';
                                            } else {
                                                echo '
                                                <div class="text-center">
                                                <p>
                                                        <a href="' . $set['url_website'] . 'auth?login" style="color:blue">Masuk</a> atau lengkapi data diri dibawah ini.
                                                    </p>
                                                </div>
                                                <hr>
                                                ';
                                            }
                                            ?>

                                    <div class="form-group">
                                        <label for="nama">Nama Lengkap<span style="color:red">*</span></label>
                                        <input type="text" id="nama" placeholder="Nama" name="nama" value="<?php if (isset($_SESSION['log']) == 1) {
                                                                                                                        echo $_SESSION['nama_lengkap'];
                                                                                                                    } ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email<span style="color:red">*</span></label>
                                        <input type="email" id="email" placeholder="Email" name="email" value="<?php if (isset($_SESSION['log']) == 1) {
                                                                                                                            echo $_SESSION['email'];
                                                                                                                        } ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="hp">Nomor Handphone(Wa)<span style="color:red">*</span></label>
                                        <input type="tel" id="hp" placeholder="Contoh: 0821xxxxxxxx" name="hp" value="<?php if (isset($_SESSION['log']) == 1) {
                                                                                                                                    echo $_SESSION['no_hp'];
                                                                                                                                } ?>" required>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card-auth" style="margin-top: 0; margin-bottom: 10px">
                                    <div class="text-center">
                                        <h3 style="text-transform: uppercase;">Pembayaran</h3>
                                    </div>
                                    <hr>
                                    <p>Pilih metode pembayaran: <span style="color:red">*</span></p>
                                    <div class="row">
                                        <?php
                                                $query = $mysqli->query("SELECT * FROM rekening_bank ORDER BY id DESC");
                                                while ($data = $query->fetch_array()) {
                                                    $nama_bank = $data['nama_bank'];
                                                    $logo_bank = $data['logo_bank'];

                                                    echo '
                                                    <div class="col-md-6">
                                                        <div class="cc-selector">
                                                            <input id="' . $nama_bank . '" type="radio" name="bank" value="' . $nama_bank . '" required />

                                                            <label class="drinkcard-cc" for="' . $nama_bank . '" style="background-image:url(' . $set['url_website'] . 'img/source/' . $logo_bank . ');"></label>
                                                        </div>
                                                    </div>
                                                    ';
                                                }
                                                ?>
                                    </div>
                                    <hr>


                                </div>

                                <div class="card-tambahan">
                                    <h3 style="text-transform: uppercase; margin-top: 0px !important;">Tambahan</h3>
                                    <label>
                                        <input type="checkbox" name="alias" value="Hamba Allah">
                                        Samarkan identitas menggunakan nama <strong>Hamba Allah</strong>?
                                    </label>
                                    <br>
                                    <textarea name="doa" placeholder="Titip doa terbaik Anda" rows="3" class="form-control"></textarea>
                                </div>

                            </div>
                            <div class="col-md-12 text-center" style="margin-top:20px">
                                <button class="primary-button" type="submit">Lanjut</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        <?php
            }
        }
        ?>
<?php        
} elseif (isset($_GET['jumlah-lain'])) {
        $jumlah_lain = str_replace(".", "", $_GET['jumlah-lain']);
        if ($jumlah_lain < 10000) {
            echo '
            <script>
            alert("Mohon maaf, jumlah donasi minimal Rp 10.000");
            window.location = "' . $set['url_website'] . '";
            </script>
            ';
        } else { ?>
            <div id="page-header">
                <div class="section-bg" style="background-image: url(./img/background-2.jpg);"></div>

                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="header-content">
                                <h1>Konfirmasi Donasi</h1>
                                <ul class="breadcrumb">
                                    <li><a href="<?php echo $set['url_website']; ?>">Home</a></li>
                                    <li><a href="#">Konfirmasi Donasi</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="section">
                <div class="container">
                    <div class="row">
                        <form action="<?php echo $set['url_website']; ?>terimakasih" method="post">
                            <input type="hidden" name="jumlah" value="<?php echo $jumlah_lain; ?>">
                            <?php
                                    if (isset($_SESSION['log']) == 1) {
                                        echo '
                                    <input type="hidden" name="sukarelawan" value="' . $_SESSION['id'] . '">
                                    ';
                                    }
                                    ?>
                            <div class="col-md-6">
                                <div class="card-auth" style="margin-top: 0">
                                    <?php
                                            if (isset($_SESSION['log']) == 1) {
                                                echo '
                                                <h3>Data diri:</h3>
                                                <hr>
                                                ';
                                            } else {
                                                echo '
                                                <div class="text-center">
                                                <p>
                                                        <a href="' . $set['url_website'] . 'auth?login" style="color:blue">Masuk</a> atau lengkapi data diri dibawah ini.
                                                    </p>
                                                </div>
                                                <hr>
                                                ';
                                            }
                                            ?>

                                    <div class="form-group">
                                        <label for="nama">Nama Lengkap<span style="color:red">*</span></label>
                                        <input type="text" id="nama" placeholder="Nama" name="nama" value="<?php if (isset($_SESSION['log']) == 1) {
                                                                                                                        echo $_SESSION['nama_lengkap'];
                                                                                                                    } ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email<span style="color:red">*</span></label>
                                        <input type="email" id="email" placeholder="Email" name="email" value="<?php if (isset($_SESSION['log']) == 1) {
                                                                                                                            echo $_SESSION['email'];
                                                                                                                        } ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="hp">Nomor Handphone(Wa)<span style="color:red">*</span></label>
                                        <input type="tel" id="hp" placeholder="Contoh: 0821xxxxxxxx" name="hp" value="<?php if (isset($_SESSION['log']) == 1) {
                                                                                                                                    echo $_SESSION['no_hp'];
                                                                                                                                } ?>" required>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card-auth" style="margin-top: 0; margin-bottom: 10px">
                                    <div class="text-center">
                                        <h3 style="text-transform: uppercase;">Pembayaran</h3>
                                    </div>
                                    <hr>
                                    <p>Pilih metode pembayaran: <span style="color:red">*</span></p>
                                    <div class="row">
                                        <?php
                                                $query = $mysqli->query("SELECT * FROM rekening_bank ORDER BY id DESC");
                                                while ($data = $query->fetch_array()) {
                                                    $nama_bank = $data['nama_bank'];
                                                    $logo_bank = $data['logo_bank'];

                                                    echo '
                                                    <div class="col-md-6">
                                                        <div class="cc-selector">
                                                            <input id="' . $nama_bank . '" type="radio" name="bank" value="' . $nama_bank . '" required />

                                                            <label class="drinkcard-cc" for="' . $nama_bank . '" style="background-image:url(' . $set['url_website'] . 'img/source/' . $logo_bank . ');"></label>
                                                        </div>
                                                    </div>
                                                    ';
                                                }
                                                ?>
                                    </div>
                                    <hr>


                                </div>

                                <div class="card-tambahan">
                                    <h3 style="text-transform: uppercase; margin-top: 0px !important;">Tambahan</h3>
                                    <label>
                                        <input type="checkbox" name="alias" value="Hamba Allah">
                                        Samarkan identitas menggunakan nama <strong>Hamba Allah</strong>?
                                    </label>
                                    <br>
                                    <textarea name="doa" placeholder="Titip doa terbaik Anda" rows="3" class="form-control"></textarea>
                                </div>

                            </div>
                            <div class="col-md-12 text-center" style="margin-top:20px">
                                <button class="primary-button" type="submit">Lanjut</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
<?php 
} else { ?>
    <div class="section">
        <div class="section-bg" style="background-image: url(./img/background-1.jpg);" data-stellar-background-ratio="0.5"></div>
        <div class="container">
            <div class="row donasi">
                <div class="col-md-6">
                    <h1 class="donasi-judul">Selamatkan Anak-Anak</h1>
                    <p class="donasi-tag">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>
                <div class="col-md-6">
                    <div class="card-donasi">
                        <h1>Donasi Sekarang</h1>
                        <p>Ayo Selamatkan Hidup Anak Bangsa Sekarang!.</p>
                        <form>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="radio1" style="width:245px">
                                        <input type="radio" id="radio1" name="nominal" value="500000">
                                        <div class="radio-donasi">
                                            RP. 500.000
                                        </div>
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <label for="radio2" style="width:245px">
                                        <input type="radio" id="radio2" name="nominal" value="1000000">
                                        <div class="radio-donasi">
                                            RP. 1.000.000
                                        </div>
                                    </label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="radio3" style="width:245px">
                                        <input type="radio" id="radio3" name="nominal" value="1500000">
                                        <div class="radio-donasi">
                                            RP. 1.500.000
                                        </div>
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <label for="radio4" style="width:245px">
                                        <input type="radio" id="radio4" name="nominal" value="2000000">
                                        <div class="radio-donasi">
                                            RP. 2.000.000
                                        </div>
                                    </label>
                                </div>
                            </div>
                            <br />
                            <div class="text-center">
                                <div id="btn-jml-lain" class="jumlah-lain">Jumlah Lain</div>
                            </div>
                            <br />
                            <div id="jml-lain" class="input-group" style="margin-bottom:10px;display: none;">
                                <span class="input-group-addon" style="background-color:#83ba09;color:#FFF">Rp.</span>
                                <input type="text" class="form-control input-donasi" name="jumlah-lain" placeholder="100.000" style="text-transform: none;" maxlength="11">
                            </div>
                            <br />
                            <button class="primary-button" type="submit">Bantu Sekarang</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>


<?php
include "website/footer.php";
?>