<?php
include "admin/config.php";
include "website/header.php";
echo "</header>";
if (isset($_GET['daftar'])) { ?>
    <div class="section">
        <div class="container">
            <div class="card-auth">
                <div class="text-center">
                    <h3 style="text-transform: uppercase;">Pendaftaran Sukarelawan</h3>
                    <p>
                        Lengkapi data berikut untuk registrasi<br>
                        Tanda (<span style="color:red">*</span>) wajib diisi.
                    </p>
                    <?php
                        if ($_GET['daftar'] == "gagal") {
                            echo '<div class="alert alert-danger" role="alert"><b>Sorry!</b> Password yang anda masukkan tidak sama.</div>';
                        }
                        ?>
                </div>
                <hr>
                <form action="auth" method="post">
                    <input type="hidden" name="oauth" value="daftar">
                    <div class="form-group">
                        <label for="nama">Nama Lengkap<span style="color:red">*</span></label>
                        <input type="text" id="nama" placeholder="Nama" name="nama" required>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" id="alamat" placeholder="Alamat saat ini" name="alamat">
                    </div>
                    <div class="form-group">
                        <label for="kota">Kota / Kabupaten</label>
                        <input type="text" id="kota" placeholder="Kota / Kabupaten" name="kota">
                    </div>
                    <div class="form-group">
                        <label for="hp">Nomor Handphone(Wa)<span style="color:red">*</span></label>
                        <input type="tel" id="hp" placeholder="Contoh: 0821xxxxxxxx" name="hp" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email<span style="color:red">*</span></label>
                        <input type="email" id="email" placeholder="Email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password<span style="color:red">*</span></label>
                        <input type="password" id="password" placeholder="Password" name="password" required>
                        <span toggle="#password" class="fa fa-eye show toggle-password" aria-hidden="true"> Lihat</span>
                    </div>
                    <div class="form-group">
                        <label for="password_repeat">Ulangi Password<span style="color:red">*</span></label>
                        <input type="password" id="password_repeat" placeholder="Ulangi Password" name="password_repeat" required>
                        <span toggle="#password_repeat" class="fa fa-eye show toggle-password" aria-hidden="true"> Lihat</span>
                    </div>
                    <button class="primary-button" type="submit">Daftar</button>
                </form>
                <hr>
                <p>Sudah punya akun? <a href="<?php echo $set['url_website']; ?>auth?login">Login Disini</a></p>
            </div>
        </div>
    </div>
<?php
} elseif (isset($_GET['lupa-password'])) { ?>
    <div class="section">
        <div class="container">
            <div class="card-auth">
                <div class="text-center">
                    <h3 style="text-transform: uppercase;">Lupa Password</h3>
                    <p>
                        Anda dapat mengatur ulang kata sandi Anda di sini.
                    </p>
                    <?php
                        if ($_GET['lupa-password'] == "send") {
                            echo '<div class="alert alert-success" role="alert">Silahkan cek email Anda untuk reset password. pastikan cek di folder spam juga.</div>';
                        }
                        ?>
                    <p>
                </div>
                <hr>
                <form action="auth" method="post">
                    <input type="hidden" name="oauth" value="lupa-password">
                    <div class="form-group">
                        <label for="email">Email<span style="color:red">*</span></label>
                        <input type="email" id="email" placeholder="Email" name="email" required>
                    </div>
                    <button class="primary-button" type="submit">Reset Password</button>
                </form>
            </div>
        </div>
    </div>
<?php
} elseif (isset($_GET['reset-password']) and isset($_GET['email'])) { ?>
    <div class="section">
        <div class="container">
            <div class="card-auth">
                <div class="text-center">
                    <h3 style="text-transform: uppercase;">Ganti Password Baru</h3>
                    <?php
                        if ($_GET['pesan'] == "gagal") {
                            echo '<div class="alert alert-danger" role="alert"><b>Sorry!</b> Password yang anda masukkan tidak sama.</div>';
                        }
                        ?>
                </div>
                <hr>
                <form action="auth" method="post">
                    <input type="hidden" name="oauth" value="ganti-password">
                    <div class="form-group">
                        <label for="password">Password<span style="color:red">*</span></label>
                        <input type="password" id="password" placeholder="Password" name="password" required>
                        <span toggle="#password" class="fa fa-eye show toggle-password" aria-hidden="true"> Lihat</span>
                    </div>
                    <div class="form-group">
                        <label for="password_repeat">Ulangi Password<span style="color:red">*</span></label>
                        <input type="password" id="password_repeat" placeholder="Ulangi Password" name="password_repeat" required>
                        <span toggle="#password_repeat" class="fa fa-eye show toggle-password" aria-hidden="true"> Lihat</span>
                    </div>
                    <button class="primary-button" type="submit">Ganti Password</button>
                </form>
            </div>
        </div>
    </div>
<?php
} elseif (isset($_GET['login'])) { ?>
    <div class="section">
        <div class="container">
            <div class="card-auth">
                <div class="text-center">
                    <h3 style="text-transform: uppercase;">Login Sukarelawan</h3>
                    <?php
                        if ($_GET['login'] == "new-member") {
                            echo '<div class="alert alert-success" role="alert">Pendaftaran berhasil. Silahkan login!</div>';
                        }
                        ?>
                    <p>
                        Isi email dan password Anda untuk login
                    </p>
                </div>
                <hr>
                <form action="auth" method="post">
                    <input type="hidden" name="oauth" value="login">
                    <div class="form-group">
                        <label for="email">Email<span style="color:red">*</span></label>
                        <input type="email" id="email" placeholder="Email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password<span style="color:red">*</span></label>
                        <input type="password" id="password" placeholder="Password" name="password" required>
                        <span toggle="#password" class="fa fa-eye show toggle-password" aria-hidden="true"> Lihat</span>
                    </div>
                    <button class="primary-button" type="submit">Login</button>
                </form>
            </div>
        </div>
    </div>
<?php
} elseif ($_POST['oauth'] == "login") {
    $email = $_POST['email'];
    $password = $_POST['password'];
} elseif ($_POST['oauth'] == "daftar") {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $kota = $_POST['kota'];
    $hp = $_POST['hp'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_repeat = $_POST['password_repeat'];

    if ($password != $password_repeat) {
        echo '
        <script>
        window.location = "' . $set['url_website'] . 'auth?daftar=gagal";
        </script>
        ';
    } else {
        echo '
        <script>
        window.location = "' . $set['url_website'] . 'auth?login=new-member";
        </script>
        ';
    }
} elseif ($_POST['oauth'] == "lupa-password") {
    $email = $_POST['email'];
    echo '
        <script>
        window.location = "' . $set['url_website'] . 'auth?lupa-password=send";
        </script>
        ';
} elseif ($_POST['oauth'] == "ganti-password") {
    $reset = $_GET['reset-password'];
    $email = $_GET['email'];
    $password = $_POST['password'];
    $password_repeat = $_POST['password_repeat'];
    if ($password != $password_repeat) {
        echo '
        <script>
        window.location = "' . $set['url_website'] . 'auth?reset-password='.$reset.'&email='.$email.'&pesan=gagal";
        </script>
        ';
    } else {
        echo '
        <script>
        window.location = "' . $set['url_website'] . 'auth?login";
        </script>
        ';
    }
    echo '
        <script>
        window.location = "' . $set['url_website'] . 'auth?login";
        </script>
        ';
} else {
    echo '
        <script>
        window.location = "' . $set['url_website'] . 'auth?login";
        </script>
        ';
}

include "website/footer.php";
?>