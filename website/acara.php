<?php include "header.php";
$id = $_GET['id'];
$query = mysqli_query($mysqli, "SELECT * FROM acara WHERE url='$id' ");
while ($data = $query->fetch_array()) {
    $judul = $data['judul'];
    $gambar = $set['url_website'] . "img/source/" . $data['gambar'];
    $tanggal_posting = tgl_indonesia($data['tanggal_posting']);
    $tanggal = tgl_indonesia($data['tanggal']);
    $jam_mulai = $data['jam_mulai'];
    $jam_selesai = $data['jam_selesai'];
    $alamat = $data['alamat'];
    $deskripsi = $data['deskripsi'];
    $userid = $data['user'];

    $uquery = $mysqli->query("SELECT * FROM user WHERE id='$userid' ");
    $user = $uquery->fetch_array();
    $nama = $user['nama'];
}
?>

<div id="page-header">
    <div class="section-bg" style="background-image: url(<?php echo $set['url_website']; ?>img/background-2.jpg);"></div>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="header-content">
                    <h1><?php echo $judul; ?></h1>
                    <ul class="breadcrumb">
                        <li><a href="<?php echo $set['url_website']; ?>">Home</a></li>
                        <li><a href="<?php echo $set['url_website']; ?>acara">Acara</a></li>
                        <li class="active"><?php echo $judul; ?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="section">
    <div class="container">
        <div class="row">
            <div class="article causes-details">
                <div class="col-md-9" style="margin-bottom:10px;">
                    <div class="article event-details">
                        <div class="article-img">
                            <img src="<?php echo $gambar; ?>" alt="<?php echo $judul; ?>" style="max-height:450px">
                        </div>

                        <div class="article-content">
                            <h2 class="article-title"><?php echo $judul; ?></h2>
                            <ul class="article-meta">
                                <li><?php echo $tanggal_posting;?></li>
                                <li>Diposting oleh: <?php echo $nama; ?></li>
                            </ul>
                            <div class="article-tags-share" style="margin-bottom: 15px;">
                                <ul class="share">
                                    <li>SHARE:</li>
                                    <li><a href="https://twitter.com/share?url=<?php echo $set['url_website'].$id; ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="http://www.facebook.com/sharer.php?u=<?php echo $set['url_website'].$id; ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                </ul>
                            </div>

                            <?php echo $deskripsi; ?>
                        </div>

                        <ul class="event-meta">
                            <li>
                                <h4>Detail Acara</h4>
                            </li>
                            <li><i class="fa fa-clock-o"></i><strong>Tanggal:</strong> <?php echo $tanggal; ?> | <?php echo $jam_mulai; ?> - <?php echo $jam_selesai; ?></li>
                            <li><i class="fa fa-map-marker"></i><strong>Lokasi:</strong> <?php echo $alamat; ?></li>
                        </ul>

                        <div class="article-tags-share">
                            <ul class="share">
                                <li>SHARE:</li>
                                <li><a href="https://twitter.com/share?url=<?php echo $set['url_website'].$id; ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="http://www.facebook.com/sharer.php?u=<?php echo $set['url_website'].$id; ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
                            </ul>
                        </div>

                        <!-- <div class="article-reply">
                            
                        </div> -->

                    </div>
                </div>

                <?php include "sidebar.php"; ?>
            </div>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>