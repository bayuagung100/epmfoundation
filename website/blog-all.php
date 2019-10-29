<?php include "header.php";

?>
<div id="page-header">
    <div class="section-bg" style="background-image: url(./img/background-2.jpg);"></div>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="header-content">
                    <h1>Daftar Blog</h1>
                    <ul class="breadcrumb">
                        <li><a href="<?php echo $set['url_website']; ?>">Home</a></li>
                        <li class="active">Blog</li>
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
            <div class="col-md-9">
                <div class="row">
                    <?php
                    echo '<div id="post_blog">';
                    $limit = 6;
                    $sql = $mysqli->query("SELECT * FROM blog");
                    $totalRowCount = $sql->num_rows;
                    $query = $mysqli->query("SELECT * FROM blog ORDER BY id DESC LIMIT $limit ");
                    $jml = $query->num_rows;
                    while ($data = $query->fetch_array()) {
                        $id = $data['id'];
                        $gambar = "./img/source/" . $data['gambar'];
                        $judul = $data['judul'];
                        $url = $data['url'];
                        $tanggal = tgl_indonesia($data['tanggal']);
                        $deskripsi = $data['deskripsi'];
                        $userid = $data['user'];

                        $uquery = $mysqli->query("SELECT * FROM user WHERE id='$userid' ");
                        $user = $uquery->fetch_array();
                        $nama = $user['nama'];

                        echo '
                            <div class="col-md-6">
                                <div class="article">
                                    <div class="article-img">
                                        <a href="' . $set["url_website"] . 'blog/' . $url . '">
                                            <img src="' . $gambar . '" alt="' . $judul . '" style="height:305px">
                                        </a>
                                    </div>
                                    <div class="article-content">
                                        <h3 class="article-title"><a href="' . $set["url_website"] . 'blog/' . $url . '">' . $judul . '</a></h3>
                                        <ul class="article-meta">
                                            <li>'.$tanggal.'</li>
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

                    if ($totalRowCount > $limit) {
                        echo '
                        <div class="col-md-12 text-center" id="more_blog_main' . $id . '">
                            <button class="primary-button more_blog" id="' . $id . '" >Lebih Banyak</button>
                            <span class="loading_blog" style="display: none;"><span>Loading...</span></span>
                        </div>';
                    }

                    echo '</div>';
                    ?>
                    
                </div>
            </div>
            <?php include "sidebar.php"; ?>
        </div>

    </div>
</div>

<?php include "footer.php"; ?>