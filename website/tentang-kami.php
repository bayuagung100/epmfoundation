<?php include "header.php"; ?>
<div id="page-header">
    <div class="section-bg" style="background-image: url(./img/background-2.jpg);"></div>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="header-content">
                    <h1>Tentang Kami</h1>
                    <ul class="breadcrumb">
                        <li><a href="<?php echo $set['url_website']; ?>">Home</a></li>
                        <li><a href="#">Tentang Kami</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="section">
    <div class="container">
        <div class="row">
            <main id="main" class="col-md-9">
                <div class="article event-details">
                    <div class="article-content">
                        <?php
                        $query = $mysqli->query("SELECT * FROM tentang_kami");
                        $data = $query->fetch_array();
                        $isi = str_replace('../', $set['url_website'], $data['isi']);

                        echo $isi;
                        ?>
                    </div>
                </div>
            </main>

            <?php include "sidebar.php"; ?>

        </div>
    </div>
</div>

<?php include "footer.php"; ?>