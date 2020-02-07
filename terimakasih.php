<?php
session_start();
include "admin/config.php";
include "website/header.php";
echo "</header>";
?>
<?php 
if (isset($_POST['jumlah']) && isset($_POST['program']) && isset($_POST['nama']) && isset($_POST['email']) && isset($_POST['hp']) && isset($_POST['bank'])) {
    $jumlah = $_POST['jumlah'];
    $idprogram = $_POST['program'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $hp = $_POST['hp'];
    $bank = $_POST['bank'];
    $doa = $_POST['doa'];
    $date = date("Y-m-d h:i:s");
    $enddate = date("Y-m-d h:i:s", strtotime('+24 hours'));
    $kode_unik = rand(100, 999);
    $total = $jumlah + $kode_unik;

    $bankquery = $mysqli->query("SELECT * FROM rekening_bank WHERE nama_bank='$bank'");
    $bankdata = $bankquery->fetch_array();
    $rek_tujuan = $bankdata['nama_bank'] . "-" . $bankdata['no_rek'] . "-" . $bankdata['nama_pemilik'];

    if (isset($_POST['sukarelawan']) && isset($_POST['alias'])) {
        // echo "sukarelawan dan alias";
        $sukarelawan = $_POST['sukarelawan'];
        $alias = $_POST['alias'];
        $dquery = $mysqli->query(" INSERT INTO donasi
            (
                id_program,
                id_sukarelawan,
                nama,
                alias,
                email,
                hp,
                doa,
                rekening_tujuan,
                date,
                end_date,
                jumlah,
                kode_unik,
                total
            )
            VALUES
            (
                '$idprogram',
                '$sukarelawan',
                '$nama',
                '$alias',
                '$email',
                '$hp',
                '$doa',
                '$rek_tujuan',
                '$date',
                '$enddate',
                '$jumlah',
                '$kode_unik',
                '$total'
            )
        ");
    } elseif (isset($_POST['sukarelawan'])) {
        // echo 'masuk sukarelawan';
        $sukarelawan = $_POST['sukarelawan'];
        $dquery = $mysqli->query(" INSERT INTO donasi
            (
                id_program,
                nama,
                sukarelawan,
                email,
                hp,
                doa,
                rekening_tujuan,
                date,
                end_date,
                jumlah,
                kode_unik,
                total
            )
            VALUES
            (
                '$idprogram',
                '$nama',
                '$sukarelawan',
                '$email',
                '$hp',
                '$doa',
                '$rek_tujuan',
                '$date',
                '$enddate',
                '$jumlah',
                '$kode_unik',
                '$total'
            )
        ");
    } elseif (isset($_POST['alias'])) {
        // echo 'masuk alias';
        $alias = $_POST['alias'];
        $dquery = $mysqli->query(" INSERT INTO donasi
            (
                id_program,
                nama,
                alias,
                email,
                hp,
                doa,
                rekening_tujuan,
                date,
                end_date,
                jumlah,
                kode_unik,
                total
            )
            VALUES
            (
                '$idprogram',
                '$nama',
                '$alias',
                '$email',
                '$hp',
                '$doa',
                '$rek_tujuan',
                '$date',
                '$enddate',
                '$jumlah',
                '$kode_unik',
                '$total'
            )
        ");
    } else {
        // echo "masuk else <br>";
        // echo $idprogram."<br>";
        // echo $nama."<br>";
        // echo $email."<br>";
        // echo $hp."<br>";
        // echo $doa."<br>";
        // echo $rek_tujuan."<br>";
        // echo $date."<br>";
        // echo $enddate."<br>";
        // echo $jumlah."<br>";
        // echo $kode_unik."<br>";
        // echo $total."<br>";
        $dquery = $mysqli->query(" INSERT INTO donasi
            (
                id_program,
                nama,
                email,
                hp,
                doa,
                rekening_tujuan,
                date,
                end_date,
                jumlah,
                kode_unik,
                total
            )
            VALUES
            (
                '$idprogram',
                '$nama',
                '$email',
                '$hp',
                '$doa',
                '$rek_tujuan',
                '$date',
                '$enddate',
                '$jumlah',
                '$kode_unik',
                '$total'
            )
        ");
    }

    if ($dquery) {
        $idquery = $mysqli->query("SELECT * FROM donasi 
            WHERE jumlah='$jumlah' AND id_program='$idprogram' AND nama='$nama' AND email='$email' 
            AND hp='$hp' AND date='$date' AND end_date='$enddate' AND kode_unik='$kode_unik' ");
        $iddata = $idquery->fetch_array();
        $iddonasi = $iddata['id'];
    ?>
        <div class="section">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-10 col-lg-10 page-main-content col-md-offset-1 col-lg-offset-1">

                        <h1 class="text-center" style="color: #A6CE38;">TERIMA KASIH</h1>
                        <h4 class="text-center">Atas rencana donasi yang Anda lakukan</h4>

                        <p class="text-center"><i class="fa fa-heart" style="font-size: 70px; color: #ff0050;"></i></p>
                        <hr>
                        <br><br>
                        <table class="table table-responsive table-striped">
                            <tbody>
                                <tr>
                                    <th>ID Donasi</th>
                                    <td>
                                        <?php 
                                            echo $iddonasi;
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Nama Donatur</th>
                                    <td><?php if (isset($_POST['alias']) == "") {
                                                    echo $nama;
                                                } else {
                                                    echo $_POST['alias'];
                                                } ?></td>
                                </tr>
                                <tr>
                                    <th>Judul Program</th>
                                    <td>
                                        <?php
                                                $pquery =  $mysqli->query("SELECT * FROM program WHERE id='$idprogram'");
                                                $pdata = $pquery->fetch_array();
                                                echo $pdata['judul']; ?>
                                    </td>
                                </tr>
                                <?php
                                        $query = $mysqli->query("SELECT * FROM rekening_bank WHERE nama_bank='$bank'");
                                        while ($data = $query->fetch_array()) {
                                            $nama_bank = $data['nama_bank'];
                                            $no_rek = $data['no_rek'];
                                            $nama_pemilik = $data['nama_pemilik'];
                                            $logo_bank = $data['logo_bank'];
                                        }
                                        if ($bank == $nama_bank) { ?>
                                    <tr>
                                        <th>Metode Pembayaran</th>
                                        <td>Transfer Bank <?php echo $nama_bank; ?></td>
                                    </tr>
                                    <tr class="warning">
                                        <th>No Rekening Tujuan</th>
                                        <td>
                                            <p class="pull-left">
                                                <input type="text" value="<?php echo $no_rek; ?>" id="copytext" style="background-color: #fcf8e3;" readonly="true">
                                                <button onclick="ClipBoard();" class="btn btn-primary">Copy</button>
                                                <br>atas nama <?php echo $nama_pemilik; ?>
                                            </p>
                                            <img src="./img/source/<?php echo $logo_bank; ?>" width="200px;" class="img img-responsive pull-right">
                                        </td>
                                    </tr>
                                <?php } ?>

                            </tbody>
                        </table>
                        <br>
                        <div class="well">
                            <p><strong>Nominal Donasi</strong> <span class="pull-right"><?php echo rupiah($jumlah); ?></span></p>
                            <p><strong>Kode Unik</strong><span class="pull-right"><?php echo $kode_unik; ?></span><br><i>Penting: angka unik ini akan turut didonasikan.</i></p>
                            <hr>
                            <br>
                            <p>
                                <strong>Total</strong>
                                <span class="pull-right" style="font-size: 36px; color: #34654f;">
                                    <strong>
                                        <?php echo rupiah($total); ?>
                                    </strong>
                                </span>
                            </p>
                            <p><i>Mohon agar ditransfer sesuai dengan tiga angka terakhir agar mempermudah verifikasi.</i></p>
                        </div>

                        <div class="panel panel-danger">
                            <div class="panel-heading">
                                * Pastikan anda transfer sebelum <?php echo $enddate; ?> atau transaksi anda akan batal secara otomatis oleh sistem.
                            </div>
                        </div>
                        <a href="<?php echo $set['url_website']; ?>program"><button class="btn btn-danger form-control" style="text-transform: uppercase; margin-top: 5px;">Kembali ke halaman program</button></a>
                    </div>
                </div>
            </div>
        </div>
    <?php 
    } else {
        echo '
        <script>
        alert("Tidak dapat melakukan donasi, harap diulang kembali.\n'.$mysqli->error.'");
        window.location = "' . $set['url_website'] . '";
        </script>
        ';
    }
    ?>
<?php
} elseif (isset($_POST['jumlah']) && isset($_POST['nama']) && isset($_POST['email']) && isset($_POST['hp']) && isset($_POST['bank'])) {
    $jumlah = $_POST['jumlah'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $hp = $_POST['hp'];
    $bank = $_POST['bank'];
    $doa = $_POST['doa'];
    $date = date("Y-m-d h:i:s");
    $enddate = date("Y-m-d h:i:s", strtotime('+24 hours'));
    $kode_unik = rand(100, 999);
    $total = $jumlah + $kode_unik;

    $bankquery = $mysqli->query("SELECT * FROM rekening_bank WHERE nama_bank='$bank'");
    $bankdata = $bankquery->fetch_array();
    $rek_tujuan = $bankdata['nama_bank'] . "-" . $bankdata['no_rek'] . "-" . $bankdata['nama_pemilik'];

    if (isset($_POST['sukarelawan']) && isset($_POST['alias'])) {
        // echo "masuk sukarelawan alias";
        $sukarelawan = $_POST['sukarelawan'];
        $alias = $_POST['alias'];
        $dquery = $mysqli->query(" INSERT INTO donasi
            (
                id_sukarelawan,
                nama,
                alias,
                email,
                hp,
                doa,
                rekening_tujuan,
                date,
                end_date,
                jumlah,
                kode_unik,
                total
            )
            VALUES
            (
                '$sukarelawan',
                '$nama',
                '$alias',
                '$email',
                '$hp',
                '$doa',
                '$rek_tujuan',
                '$date',
                '$enddate',
                '$jumlah',
                '$kode_unik',
                '$total'
            )
        ");
    } elseif (isset($_POST['sukarelawan'])) {
        // echo "masuk sukarelawan";
        $sukarelawan = $_POST['sukarelawan'];
        $dquery = $mysqli->query(" INSERT INTO donasi
            (
                nama,
                sukarelawan,
                email,
                hp,
                doa,
                rekening_tujuan,
                date,
                end_date,
                jumlah,
                kode_unik,
                total
            )
            VALUES
            (
                '$nama',
                '$sukarelawan',
                '$email',
                '$hp',
                '$doa',
                '$rek_tujuan',
                '$date',
                '$enddate',
                '$jumlah',
                '$kode_unik',
                '$total'
            )
        ");
    } elseif (isset($_POST['alias'])) {
        // echo "masuk alias";
        $alias = $_POST['alias'];
        $dquery = $mysqli->query(" INSERT INTO donasi
            (
                nama,
                alias,
                email,
                hp,
                doa,
                rekening_tujuan,
                date,
                end_date,
                jumlah,
                kode_unik,
                total
            )
            VALUES
            (
                '$nama',
                '$alias',
                '$email',
                '$hp',
                '$doa',
                '$rek_tujuan',
                '$date',
                '$enddate',
                '$jumlah',
                '$kode_unik',
                '$total'
            )
        ");
    } else {
        // echo "masuk else";
        $dquery = $mysqli->query(" INSERT INTO donasi
            (
                nama,
                email,
                hp,
                doa,
                rekening_tujuan,
                date,
                end_date,
                jumlah,
                kode_unik,
                total
            )
            VALUES
            (
                '$nama',
                '$email',
                '$hp',
                '$doa',
                '$rek_tujuan',
                '$date',
                '$enddate',
                '$jumlah',
                '$kode_unik',
                '$total'
            )
        ");
    }

    if ($dquery) {
        $idquery = $mysqli->query("SELECT * FROM donasi 
            WHERE jumlah='$jumlah' AND nama='$nama' AND email='$email' 
            AND hp='$hp' AND date='$date' AND end_date='$enddate' AND kode_unik='$kode_unik' ");
        $iddata = $idquery->fetch_array();
        $iddonasi = $iddata['id'];
        ?>
        <div class="section">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-10 col-lg-10 page-main-content col-md-offset-1 col-lg-offset-1">

                        <h1 class="text-center" style="color: #A6CE38;">TERIMA KASIH</h1>
                        <h4 class="text-center">Atas rencana donasi yang Anda lakukan</h4>

                        <p class="text-center"><i class="fa fa-heart" style="font-size: 70px; color: #ff0050;"></i></p>
                        <hr>
                        <br><br>
                        <table class="table table-responsive table-striped">
                            <tbody>
                                <tr>
                                    <th>ID Donasi</th>
                                    <td>
                                        <?php 
                                            echo $iddonasi;
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Nama Donatur</th>
                                    <td><?php if (isset($_POST['alias']) == "") {
                                                    echo $nama;
                                                } else {
                                                    echo $_POST['alias'];
                                                } ?></td>
                                </tr>
                                <?php
                                        $query = $mysqli->query("SELECT * FROM rekening_bank WHERE nama_bank='$bank'");
                                        while ($data = $query->fetch_array()) {
                                            $nama_bank = $data['nama_bank'];
                                            $no_rek = $data['no_rek'];
                                            $nama_pemilik = $data['nama_pemilik'];
                                            $logo_bank = $data['logo_bank'];
                                        }
                                        if ($bank == $nama_bank) { ?>
                                    <tr>
                                        <th>Metode Pembayaran</th>
                                        <td>Transfer Bank <?php echo $nama_bank; ?></td>
                                    </tr>
                                    <tr class="warning">
                                        <th>No Rekening Tujuan</th>
                                        <td>
                                            <p class="pull-left">
                                                <input type="text" value="<?php echo $no_rek; ?>" id="copytext" style="background-color: #fcf8e3;" readonly="true">
                                                <button onclick="ClipBoard();" class="btn btn-primary">Copy</button>
                                                <br>atas nama <?php echo $nama_pemilik; ?>
                                            </p>
                                            <img src="./img/source/<?php echo $logo_bank; ?>" width="200px;" class="img img-responsive pull-right">
                                        </td>
                                    </tr>
                                <?php } ?>

                            </tbody>
                        </table>
                        <br>
                        <div class="well">
                            <p><strong>Nominal Donasi</strong> <span class="pull-right"><?php echo rupiah($jumlah); ?></span></p>
                            <p><strong>Kode Unik</strong><span class="pull-right"><?php echo $kode_unik; ?></span><br><i>Penting: angka unik ini akan turut didonasikan.</i></p>
                            <hr>
                            <br>
                            <p>
                                <strong>Total</strong>
                                <span class="pull-right" style="font-size: 36px; color: #34654f;">
                                    <strong>
                                        <?php echo rupiah($total); ?>
                                    </strong>
                                </span>
                            </p>
                            <p><i>Mohon agar ditransfer sesuai dengan tiga angka terakhir agar mempermudah verifikasi.</i></p>
                        </div>

                        <div class="panel panel-danger">
                            <div class="panel-heading">
                                * Pastikan anda transfer sebelum <?php echo $enddate; ?> atau transaksi anda akan batal secara otomatis oleh sistem.
                            </div>
                        </div>
                        <a href="<?php echo $set['url_website']; ?>program"><button class="btn btn-danger form-control" style="text-transform: uppercase; margin-top: 5px;">Kembali ke halaman program</button></a>
                    </div>
                </div>
            </div>
        </div>
    <?php 
    } else {
        echo '
        <script>
        alert("Tidak dapat melakukan donasi, harap diulang kembali.\n'.$mysqli->error.'");
        window.location = "' . $set['url_website'] . '";
        </script>
        ';
    }
    ?>
<?php
} else {
    echo '
        <script>
        window.location = "' . $set['url_website'] . '";
        </script>
        ';
} ?>
<?php
include "website/footer.php";
?>