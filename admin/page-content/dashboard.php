<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Dashboard</h1>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-6">
                <div class="small-box bg-info">
                    <div class="inner">
                        <?php 
                        $relquery = $mysqli->query("SELECT * FROM sukarelawan");
                        $reldata = $relquery->num_rows;
                        $danaquery = $mysqli->query("SELECT SUM(total) AS total FROM donasi WHERE status='berhasil' ");
                        $danadata = $danaquery->fetch_array(); 
                        $progquery = $mysqli->query("SELECT * FROM program");
                        $progdata = $progquery->num_rows;
                        ?>
                        <h3><?php echo $reldata;?></h3>
                        <p>Sukarelawan</p>
                    </div>
                    <div class="icon">
                        <i class="far fa-handshake"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3><?php echo $progdata;?></h3>
                        <p>Program Amal</p>
                    </div>
                    <div class="icon">
                        <i class="far fa-smile"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>44</h3>
                        <p>Penerima Amal</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-heartbeat"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3><?php echo rupiah($danadata['total']);?></h3>
                        <p>Dana Terhimpun</p>
                    </div>
                    <div class="icon">
                        <i class="far fa-money-bill-alt"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>