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
                        <?php include "side.php";?>
                    </div>
                    <div class="col-sm-12 col-md-9" style="margin-bottom:15px">
                        <h3>Selamat Datang <?php echo $_SESSION['nama_lengkap']; ?></h3>
                        <p>di panel ini Anda bisa melihat data donasi, edit data profil, dan lainnya</p>
                        <div class="card">
                            <h3>Donasi Terbaru</h3>
                            <table id="sukarelawan" class="display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>TANGGAL</th>
                                        <th>NOMINAL</th>
                                        <th>STATUS</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php include "website/footer.php";
}
?>