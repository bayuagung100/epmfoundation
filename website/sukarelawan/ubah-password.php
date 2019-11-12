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
                        <?php
                            if (isset($_POST['ubah-password'])) {
                                $passwordlama = $_POST['password-lama'];
                                $passwordbaru = $_POST['password-baru'];
                                $ulangipasswordbaru = $_POST['ulangi-password-baru'];
                                $passwordbarumd5 = md5($_POST['password-baru']);
                                $passwordlamamd5 = md5($_POST['password-lama']);

                                if ($passwordlamamd5 != $_SESSION['password']) {
                                    echo'<div class="alert alert-danger" role="alert"><b>Sorry!</b> Password lama tidak sama.</div>';
                                } elseif  ($passwordbaru != $ulangipasswordbaru) {
                                    echo'<div class="alert alert-danger" role="alert"><b>Sorry!</b> Password baru yang Anda masukan tidak sama.</div>';
                                } else {
                                    $query = $mysqli->query("UPDATE sukarelawan SET
                                        password='$passwordbarumd5'
                                        WHERE id = '$_SESSION[id]'
                                    ");
                                    if ($query) {
                                        $_SESSION['password'] = $passwordbarumd5;
    
                                        echo '
                                        <script>
                                        alert("Ubah password berhasil.");
                                        window.location = "' . $set['url_website'] . 'sukarelawan/ubah-password";
                                        </script>
                                        ';
                                    }
                                }
                            }
                        ?>
                        <div class="card">
                            <form action="" method="post">
                                <h3>Ubah Password</h3>
                                <div class="form-group">
                                    <label for="password-lama">Password Lama<span style="color:red">*</span></label>
                                    <input type="password" id="password-lama" placeholder="Password lama" name="password-lama" required>
                                    <span toggle="#password-lama" class="fa fa-eye show toggle-password" aria-hidden="true"> Lihat</span>
                                </div>
                                <div class="form-group">
                                    <label for="password-baru">Password Baru<span style="color:red">*</span></label>
                                    <input type="password" id="password-baru" placeholder="Password baru" name="password-baru" required>
                                    <span toggle="#password-baru" class="fa fa-eye show toggle-password" aria-hidden="true"> Lihat</span>
                                </div>
                                <div class="form-group">
                                    <label for="ulangi-password-baru">Ulangi Password Baru<span style="color:red">*</span></label>
                                    <input type="password" id="ulangi-password-baru" placeholder="Ulangi password baru" name="ulangi-password-baru" required>
                                    <span toggle="#ulangi-password-baru" class="fa fa-eye show toggle-password" aria-hidden="true"> Lihat</span>
                                </div>
                                
                                <button type="submit" name="ubah-password" class="btn btn-sm btn-success"> Ubah Password</button>
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