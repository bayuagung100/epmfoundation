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
                            <h3>Profil Anda
                                <a href="<?php echo $set['url_website']; ?>sukarelawan/profile/edit" class="btn btn-sm btn-success pull-right"><i class="fa fa-pencil"></i> Edit Profil</a>
                            </h3>
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td>Nama</td>
                                            <td>:</td>
                                            <td><?php echo $_SESSION['nama_lengkap']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Email</td>
                                            <td>:</td>
                                            <td><?php echo $_SESSION['email']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Nomor Handphone(Wa)</td>
                                            <td>:</td>
                                            <td><?php echo $_SESSION['no_hp']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Alamat</td>
                                            <td>:</td>
                                            <td><?php echo $_SESSION['alamat']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Kota / Kabupaten</td>
                                            <td>:</td>
                                            <td><?php echo $_SESSION['kota']; ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php include "website/footer.php";
}
?>