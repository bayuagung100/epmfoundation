<?php
if(!empty($_POST["id"])){

    // Include the database configuration file
    include 'admin/config.php';
    
    // Count all records except already displayed
    $query = $mysqli->query("SELECT COUNT(*) as num_rows FROM program WHERE id < ".$_POST['id']." ORDER BY id DESC");
    $row = $query->fetch_assoc();
    $totalRowCount = $row['num_rows'];
    
    $showLimit = 4;
    
    // Get records from the database
    $pquery = $mysqli->query("SELECT * FROM program WHERE id < ".$_POST['id']." ORDER BY id DESC LIMIT $showLimit");
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
    if($totalRowCount > $showLimit){
    echo'
        <div class="col-md-12 text-center" id="more_program_main'.$id.'">
            <button class="primary-button more_program" id="'.$id.'" >Lebih Banyak</button>
            <span class="loading_program" style="display: none;"><span>Loading...</span></span>
        </div>';
    }
}
?>