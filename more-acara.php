<?php
if(!empty($_POST["id"])){

    // Include the database configuration file
    include 'admin/config.php';
    include 'func/func_date.php';
    
    // Count all records except already displayed
    $query = $mysqli->query("SELECT COUNT(*) as num_rows FROM acara WHERE id < ".$_POST['id']." ORDER BY id DESC");
    $row = $query->fetch_assoc();
    $totalRowCount = $row['num_rows'];
    
    $showLimit = 6;
    
    // Get records from the database
    $pquery = $mysqli->query("SELECT * FROM acara WHERE id < ".$_POST['id']." ORDER BY id DESC LIMIT $showLimit");
    $jml = $pquery->num_rows;
    while ($data = $pquery->fetch_array()) {
        $id = $data['id'];
        $gambar = "./img/source/" . $data['gambar'];
        $judul = $data['judul'];
        $convert = convert_seo($judul);
        $url = str_replace("--", "-", $convert);
        $tanggal_posting = tgl_indonesia($data['tanggal_posting']);
        $deskripsi = $data['deskripsi'];
        $userid = $data['user'];

        $uquery = $mysqli->query("SELECT * FROM user WHERE id='$userid' ");
        $user = $uquery->fetch_array();
        $nama = $user['nama'];

        echo '
            <div class="col-md-6">
                <div class="article">
                    <div class="article-img">
                        <a href="' . $set["url_website"] . 'acara/' . $url . '">
                            <img src="' . $gambar . '" alt="' . $judul . '" style="height:305px">
                        </a>
                    </div>
                    <div class="article-content">
                        <h3 class="article-title"><a href="' . $set["url_website"] . 'acara/' . $url . '">' . $judul . '</a></h3>
                        <ul class="article-meta">
                            <li>'.$tanggal_posting.'</li>
                            <li>Diposting oleh: ' . $nama . '</li>
                        </ul>
                        <p>' . limit_words(strip_tags($deskripsi), 20) . '</p>
                    </div>
                </div>
            </div>
            ';
        if ($jml % 2 == 1) {
            echo '<div class="clearfix visible-md visible-lg"></div>';
        }
        $jml++;
    }

    if($totalRowCount > $showLimit){
        echo '
        <div class="col-md-12 text-center" id="more_acara_main' . $id . '">
            <button class="primary-button more_acara" id="' . $id . '" >Lebih Banyak</button>
            <span class="loading_acara" style="display: none;"><span>Loading...</span></span>
        </div>';
    }
}
?>
