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
                                        <th>No</th>
                                        <th>ID DONASI</th>
                                        <th>TANGGAL</th>
                                        <th>NOMINAL</th>
                                        <th>STATUS</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $no = 1;
                                        $query = $mysqli->query("SELECT * FROM donasi WHERE id_sukarelawan='$_SESSION[id]' ORDER BY id DESC");
                                        while ($data = $query->fetch_array()) {
                                            $id = $data['id'];
                                            $date = $data['date'];
                                            $tanggal = explode(" ", $date);
                                            $nominal = $data['total'];
                                            $status = ucwords($data['status']);

                                            echo '
                                            <tr>
                                                <td>
                                                    '.$no.'
                                                </td>
                                                <td>
                                                    '.$id.'
                                                </td>
                                                <td>
                                                    '.tgl_indonesia($tanggal[0]).'
                                                </td>
                                                <td>
                                                    '.rupiah($nominal).'
                                                </td>
                                                ';
                                                if ($status=="Pending") {
                                                    echo '
                                                    <td style="color:red">
                                                        '.$status.'<br>(Belum Transfer)
                                                    </td>
                                                    ';
                                                }else {
                                                    echo '
                                                    <td style="color:green">
                                                        '.$status.'<br>(Sudah Transfer)
                                                    </td>
                                                    ';
                                                }
                                            echo'
                                            </tr>
                                            ';

                                            $no++;
                                        }
                                    ?>
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