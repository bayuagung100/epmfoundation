<?php include "header.php";

?>
<div id="page-header">
    <div class="section-bg" style="background-image: url(./img/background-2.jpg);"></div>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="header-content">
                    <h1>Daftar Program</h1>
                    <ul class="breadcrumb">
                        <li><a href="<?php echo $set['url_website']; ?>">Home</a></li>
                        <li class="active">Program</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
</header>

<div class="section">
    <div class="container">

        <div class="row">
            <div class="col-sm-12 col-md-3" style="margin-bottom:15px">

                <form action="" method="post">
                    <input type="hidden" name="aksi" value="search">
                    <div class="input-group" style="margin-bottom:10px">
                        <input type="text" class="form-control" name="cari" placeholder="Cari program" required>
                        <div class="input-group-btn">
                            <button class="btn btn-default" style="background-color: #83ba09;color:#fff;">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
                <form action="" method="post">
                    <select name="kategori" onchange="this.form.submit()" style="background-color: #83ba09;color:#fff;padding:10px;width:100%;border-radius: 5px;">
                        <option>Pilih kategori</option>
                        <?php
                        $query = $mysqli->query("SELECT * FROM kategori_program");
                        while ($data = $query->fetch_array()) {
                            $id = $data['id'];
                            $kategori = $data['kategori'];

                            $pquery = $mysqli->query("SELECT COUNT(*) AS jumlah FROM program WHERE kategori='$id' ");
                            $count = $pquery->fetch_array();
                            echo '
                            <option value="' . $kategori . '">' . $kategori . ' <span class="pull-right">(' . $count['jumlah'] . ')</span></option>
                                ';
                        }
                        ?>
                    </select>
                </form>

            </div>
            <div class="col-sm-12 col-md-9">
                <?php
                if (isset($_POST['cari'])) {
                    echo "<b>Hasil pencarian: " . $_POST['cari'] . "</b> <span class='pull-right'><a href='' style='color: blue'>Lihat semua program</a></span><br><br>";
                    echo '<div id="post_search">';
                    $limit = 4;
                    $sql = $mysqli->query("SELECT * FROM program WHERE judul LIKE '%$_POST[cari]%' ORDER BY id DESC");
                    $totalRowCount = $sql->num_rows;
                    $query = $mysqli->query("SELECT * FROM program WHERE judul LIKE '%$_POST[cari]%' ORDER BY id DESC LIMIT $limit ");
                    $jml = $query->num_rows;
                    if ($jml > 0) {
                        while ($data = $query->fetch_array()) {
                            $id = $data['id'];
                            $gambar = "./img/source/" . $data['gambar'];
                            $kategori = $data['kategori'];

                            $judul = $data['judul'];
                            $convert = convert_seo($judul);
                            $url = str_replace("--", "-", $convert);
                            $deskripsi = $data['deskripsi'];
                            $katquery = $mysqli->query("SELECT * FROM kategori_program WHERE id='$kategori' ");
                            $kdata = $katquery->fetch_array();
                            $nk = $kdata['kategori'];
                            $ik = $kdata['id'];

                            echo '
                                <div class="col-md-6">
                                    <div class="causes">
                                        <div class="causes-img">
                                            <a href="' . $set["url_website"] . 'program/' . $url . '">
                                                <img src="' . $gambar . '" alt="' . $judul . '" >
                                            </a>
                                        </div>
                                        <div class="causes-progress">
                                            <div>
                                                <span class="causes-raised">Kategori: ' . $nk . '</span>
                                            </div>
                                        </div>
                                        <div class="causes-content">
                                            <h3><a href="' . $set["url_website"] . 'program/' . $url . '">' . $judul . '</a></h3>
                                            <p>' . limit_words(strip_tags($deskripsi), 20) . '</p>
                                            <a href="' . $set["url_website"] . 'program/' . $url . '" class="primary-button causes-donate">Donasi</a>
                                        </div>
                                    </div>
                                </div>
                                ';
                            if ($jml % 2 == 1) {
                                echo '<div class="clearfix visible-md visible-lg"></div>';
                            }
                            $jml++;
                        }
                        if ($totalRowCount > $limit) {
                            echo '
                                <div class="col-md-12 text-center" id="more_search_main' . $id . '">
                                    <button class="primary-button more_search" id="' . $id . '" name="' . $_POST['cari'] . '" >Lebih Banyak</button>
                                    <span class="loading_search" style="display: none;"><span>Loading...</span></span>
                                </div>';
                        }
                    }else {
                        echo '
                            <p>Hasil yang ada cari tidak ditemukan</p>
                        ';
                    }

                    echo '</div>';
                } elseif (isset($_POST['kategori'])) {
                    echo "<b>Kategori: " . $_POST['kategori'] . "</b> <span class='pull-right'><a href='' style='color: blue'>Lihat semua program</a></span><br><br>";
                    echo '<div id="post_kategori">';
                    $limit = 4;
                    $query = $mysqli->query("SELECT * FROM kategori_program WHERE kategori LIKE '%$_POST[kategori]%' ");
                    $id_kat = $query->fetch_array();
                    $sql = $mysqli->query("SELECT * FROM program WHERE kategori='$id_kat[id]' ORDER BY id DESC");
                    $totalRowCount = $sql->num_rows;
                    $pquery = $mysqli->query("SELECT * FROM program WHERE kategori='$id_kat[id]' ORDER BY id DESC LIMIT $limit ");
                    $jml = $pquery->num_rows;
                    while ($data = $pquery->fetch_array()) {
                        $id = $data['id'];
                        $gambar = "./img/source/" . $data['gambar'];
                        $kategori = $data['kategori'];

                        $judul = $data['judul'];
                        $convert = convert_seo($judul);
                        $url = str_replace("--", "-", $convert);
                        $deskripsi = $data['deskripsi'];
                        $katquery = $mysqli->query("SELECT * FROM kategori_program WHERE id='$kategori' ");
                        $kdata = $katquery->fetch_array();
                        $nk = $kdata['kategori'];
                        $ik = $kdata['id'];

                        echo '
                            <div class="col-md-6">
                                <div class="causes">
                                    <div class="causes-img">
                                        <a href="' . $set["url_website"] . 'program/' . $url . '">
                                            <img src="' . $gambar . '" alt="' . $judul . '">
                                        </a>
                                    </div>
                                    <div class="causes-progress">
                                        <div>
                                            <span class="causes-raised">Kategori: ' . $nk . '</span>
                                        </div>
                                    </div>
                                    <div class="causes-content">
                                        <h3><a href="' . $set["url_website"] . 'program/' . $url . '">' . $judul . '</a></h3>
                                        <p>' . limit_words(strip_tags($deskripsi), 20) . '</p>
                                        <a href="' . $set["url_website"] . 'program/' . $url . '" class="primary-button causes-donate">Donasi</a>
                                    </div>
                                </div>
                            </div>
                            ';
                        if ($jml % 2 == 1) {
                            echo '<div class="clearfix visible-md visible-lg"></div>';
                        }
                        $jml++;
                    }
                    if ($totalRowCount > $limit) {
                        echo '
                        <div class="col-md-12 text-center" id="more_kategori_main' . $id . '">
                            <button class="primary-button more_kategori" id="' . $id . '" name="' . $ik . '" >Lebih Banyak</button>
                            <span class="loading_kategori" style="display: none;"><span>Loading...</span></span>
                        </div>';
                    }
                    echo '</div>';
                } else {
                    echo '<div id="post_program">';
                    $limit = 4;
                    $sql = $mysqli->query("SELECT * FROM program");
                    $totalRowCount = $sql->num_rows;
                    $query = $mysqli->query("SELECT * FROM program ORDER BY id DESC LIMIT $limit ");
                    $jml = $query->num_rows;
                    while ($data = $query->fetch_array()) {
                        $id = $data['id'];
                        $gambar = "./img/source/" . $data['gambar'];
                        $kategori = $data['kategori'];

                        $judul = $data['judul'];
                        $convert = convert_seo($judul);
                        $url = str_replace("--", "-", $convert);
                        $deskripsi = $data['deskripsi'];
                        $katquery = $mysqli->query("SELECT * FROM kategori_program WHERE id='$kategori' ");
                        $kdata = $katquery->fetch_array();
                        $nk = $kdata['kategori'];
                        $ik = $kdata['id'];

                        echo '
                            <div class="col-md-6">
                                <div class="causes">
                                    <div class="causes-img">
                                        <a href="' . $set["url_website"] . 'program/' . $url . '">
                                            <img src="' . $gambar . '" alt="' . $judul . '">
                                        </a>
                                    </div>
                                    <div class="causes-progress">
                                        <div>
                                            <span class="causes-raised">Kategori: ' . $nk . '</span>
                                        </div>
                                    </div>
                                    <div class="causes-content">
                                        <h3><a href="' . $set["url_website"] . 'program/' . $url . '">' . $judul . '</a></h3>
                                        <p>' . limit_words(strip_tags($deskripsi), 20) . '</p>
                                        <a href="' . $set["url_website"] . 'program/' . $url . '" class="primary-button causes-donate">Donasi</a>
                                    </div>
                                </div>
                            </div>
                            ';
                        if ($jml % 2 == 1) {
                            echo '<div class="clearfix visible-md visible-lg"></div>';
                        }
                        $jml++;
                    }

                    if ($totalRowCount > $limit) {
                        echo '
                        <div class="col-md-12 text-center" id="more_program_main' . $id . '">
                            <button class="primary-button more_program" id="' . $id . '" >Lebih Banyak</button>
                            <span class="loading_program" style="display: none;"><span>Loading...</span></span>
                        </div>';
                    }

                    echo '</div>';
                }
                ?>

            </div>
        </div>

    </div>
</div>

<?php include "footer.php"; ?>