<?php
if (empty($_SESSION['email']) or empty($_SESSION['password']) or $_SESSION['log'] == 0) {
    echo '
        <script>
        window.location = "' . $set['url_website'] . 'auth?login";
        </script>
        ';
} else {
    include "website/header.php"; ?>

    </header>

    <div class="section">
        <div class="container">
            <div class="sukarelawan">
                <div class="row">
                    <div class="col-sm-12 col-md-3" style="margin-bottom:15px">
                        <?php include "side.php"; ?>
                    </div>
                    <div class="col-sm-12 col-md-9" style="margin-bottom:15px">
                        <h3>Selamat Datang <?php echo $_SESSION['nama_lengkap']; ?></h3>
                        <p>di panel ini Anda bisa melihat data donasi, edit data profil, dan lainnya</p>
                        <div class="card">
                            <?php
                                if (isset($_POST['edit'])) {
                                    $nama = $_POST['nama'];
                                    $email = $_POST['email'];
                                    $hp = $_POST['hp'];
                                    $alamat = $_POST['alamat'];
                                    $kota = $_POST['kota'];

                                    $query = $mysqli->query("UPDATE sukarelawan SET
                                        nama_lengkap = '$nama',
                                        alamat = '$alamat',
                                        kota = '$kota',
                                        no_hp = '$hp',
                                        email = '$email'

                                        WHERE id = '$_SESSION[id]'
                                    ");
                                    if ($query) {
                                        $_SESSION['nama_lengkap']  = $nama;
                                        $_SESSION['alamat']  = $alamat;
                                        $_SESSION['kota']  = $kota;
                                        $_SESSION['no_hp']  = $hp;
                                        $_SESSION['email']  = $email;

                                        echo '
                                        <script>
                                        window.location = "' . $set['url_website'] . 'sukarelawan/profile";
                                        </script>
                                        ';
                                    }
                                }
                            ?>
                            <form action="" method="post">
                                <h3>Edit Profil
                                    <span class="pull-right">
                                        <a href="<?php echo $set['url_website']; ?>sukarelawan/profile" class="btn btn-sm btn-default "> Batal</a>
                                        <button type="submit" name="edit" class="btn btn-sm btn-success"> Simpan</button>
                                    </span>
                                </h3>
                                <div class="form-group">
                                    <label for="nama">Nama Lengkap<span style="color:red">*</span></label>
                                    <input type="text" id="nama" placeholder="Nama" name="nama" value="<?php echo $_SESSION['nama_lengkap']; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email<span style="color:red">*</span></label>
                                    <input type="email" id="email" placeholder="Email" name="email" value="<?php echo $_SESSION['email']; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="hp">Nomor Handphone(Wa)<span style="color:red">*</span></label>
                                    <input type="tel" id="hp" placeholder="Contoh: 0821xxxxxxxx" name="hp" value="<?php echo $_SESSION['no_hp']; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat<span style="color:red">*</span></label>
                                    <input type="text" id="alamat" placeholder="Alamat saat ini" name="alamat" value="<?php echo $_SESSION['alamat']; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="kota">Kota / Kabupaten<span style="color:red">*</span></label>
                                    <input type="text" id="kota" placeholder="Kota / Kabupaten" name="kota" value="<?php echo $_SESSION['kota']; ?>" required>
                                </div>
                            </form>
                            <!-- <table class="table ">
                                    <tbody>
                                        <tr>
                                            <td>Nama</td>
                                            <td>:</td>
                                            <td><input type="text" name="nama" value="<?php echo $_SESSION['nama_lengkap']; ?>"></td>
                                        </tr>
                                        <tr>
                                            <td>Email</td>
                                            <td>:</td>
                                            <td><input type="email" name="email" value="<?php echo $_SESSION['email']; ?>"></td>
                                        </tr>
                                        <tr>
                                            <td>Nomor Handphone(Wa)</td>
                                            <td>:</td>
                                            <td><input type="tel" name="no_hp" value="<?php echo $_SESSION['no_hp']; ?>"></td>
                                        </tr>
                                        <tr>
                                            <td>Alamat</td>
                                            <td>:</td>
                                            <td><textarea name="alamat" cols="50" rows="5"><?php echo $_SESSION['alamat']; ?></textarea></td>
                                        </tr>
                                        <tr>
                                            <td>Kota / Kabupaten</td>
                                            <td>:</td>
                                            <td><?php echo $_SESSION['kota']; ?></td>
                                        </tr>
                                    </tbody>
                                </table> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php include "website/footer.php";
}
?>