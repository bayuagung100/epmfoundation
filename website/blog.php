<?php include "header.php";
$id = $_GET['id'];
$query = mysqli_query($mysqli, "SELECT * FROM blog WHERE url='$id' ");
while ($data = $query->fetch_array()) {
    $judul = $data['judul'];
    $gambar = $set['url_website'] . "img/source/" . $data['gambar'];
    $tanggal = tgl_indonesia($data['tanggal']);
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
                        <li><a href="<?php echo $set['url_website']; ?>blog">Blog</a></li>
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
                                <li><?php echo $tanggal;?></li>
                                <li>Diposting oleh: <?php echo $nama; ?></li>
                            </ul>
                            <div class="article-tags-share" style="margin-bottom: 15px;">
                                <ul class="share">
                                    <li>SHARE:</li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                    <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                </ul>
                            </div>

                            <?php echo $deskripsi; ?>
                        </div>

                        <div class="article-tags-share">
                            <ul class="share">
                                <li>SHARE:</li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            </ul>
                        </div>

                        <div class="article-reply">
                            <h3>Leave a reply</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                            <form>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <input class="input" placeholder="Name" type="text">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <input class="input" placeholder="Email" type="email">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <input class="input" placeholder="Website" type="text">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <textarea class="input" placeholder="Message"></textarea>
                                        </div>
                                        <button class="primary-button">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>

                <?php include "sidebar.php"; ?>
            </div>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>