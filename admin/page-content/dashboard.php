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
            <div class="col-lg-4 col-6">
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
                        <h3><?php echo $reldata; ?></h3>
                        <p>Sukarelawan</p>
                    </div>
                    <div class="icon">
                        <i class="far fa-handshake"></i>
                    </div>
                    <a href="?content=sukarelawan" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-4 col-6">
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3><?php echo $progdata; ?></h3>
                        <p>Program Amal</p>
                    </div>
                    <div class="icon">
                        <i class="far fa-smile"></i>
                    </div>
                    <a href="?content=program" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- <div class="col-lg-3 col-6">
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>154k</h3>
                        <p>Anak-Anak Terselamatkan</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-heartbeat"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div> -->
            <div class="col-lg-4 col-6">
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3><?php echo rupiah($danadata['total']); ?></h3>
                        <p>Dana Terhimpun</p>
                    </div>
                    <div class="icon">
                        <i class="far fa-money-bill-alt"></i>
                    </div>
                    <a href="?content=donasi" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Donasi Terbaru</h5>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="card-header">
                            <h3 class="card-title">Daftar Donasi</h3>
                            <a href="?content=donasi" class="btn btn-primary btn-icon-split" style="float: right!important;">
                                <span class="icon text-white-50">
                                    <i class="fas fa-eye"></i>
                                </span>
                                <span class="text">Lihat</span>
                            </a>
                        </div>
                        <?php 
                        buka_tabel_dashboard(array("Nama","Email","No Hp","Nominal","Rek Tujuan","Status"));
                        $no = 1;
                        $query = $mysqli->query("SELECT * FROM donasi ORDER BY id DESC");
                        while ($data = $query->fetch_array()) {
                            $id_program = $data['id_program'];
                            $alias = $data['alias'];
                            if ($alias=="") {
                                $nama = $data['nama'];
                            }else {
                                $nama = $alias;
                            }
                            
                            $email = $data['email'];
                            $hp = $data['hp'];
                            $doa = $data['doa'];
                            $rek_tujuan = $data['rekening_tujuan'];
                            $tanggal = $data['date'];
                            $batas_tanggal = $data['end_date'];
                            $jumlah = $data['jumlah'];
                            $kode_unik = $data['kode_unik'];
                            $total = $data['total'];
                            if ($data['status']=="pending") {
                                $status = $data['status']."<br> batas tanggal transfer: ".$batas_tanggal;
                            }else {
                                $status = $data['status'];
                            }
                            isi_table_dashboard($no, array($nama, $email, $hp,rupiah($total),$rek_tujuan,$status));
                            $no++;
                        }

                        tutup_tabel_dashboard(array("Nama","Email","No Hp","Nominal","Rek Tujuan","Status"));
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>