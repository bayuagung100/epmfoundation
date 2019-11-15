<aside id="aside" class="col-md-3">
    <!-- <div class="widget">
        <h3 class="widget-title">Donasi Sekarang</h3>
        <form>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-2">
                    <label for="donasi" style="padding:10px">Rp.</label>
                    </div>
                    <div class="col-md-10">
                    <input class="input" placeholder="0" type="text" name="donasi" maxlength="11" required>
                    </div>
                </div>
            </div>
            <button class="primary-button">Beri Donasi</button>
        </form>
    </div> -->
    <div class="widget">
        <h3 class="widget-title">Donatur</h3>
        <table id="donatur" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>TANGGAL</th>
                    <th>NOMINAL</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $query = $mysqli->query("SELECT * FROM donasi WHERE status='berhasil' ORDER BY id DESC");
                    while ($data = $query->fetch_array()) {
                        $nama = $data['nama'];
                        $alias = $data['alias'];
                        $date = $data['date'];
                        $tanggal = explode(" ", $date);
                        $nominal = $data['total'];
                        echo '
                        <tr>
                            <td>
                                <b>';
                                if ($alias=="") {
                                   echo $nama; 
                                } else {
                                    echo $alias;
                                }
                        echo'
                                </b>
                                <br>'.tgl_indonesia($tanggal[0]).'
                            </td>
                            <td>
                                <b>'.rupiah($nominal).'</b>
                            </td>
                        </tr>
                        ';
                    }
                ?>
            </tbody>
        </table>
    </div>
    <div class="widget">
        <h3 class="widget-title">Latest Acara</h3>
        <?php
        $query = $mysqli->query("SELECT * FROM acara ORDER BY id DESC LIMIT 3");
        while ($data = $query->fetch_array()) {
            $judul = $data['judul'];
            $gambar = $set['url_website'] . "/img/source/" . $data['gambar'];
            $tanggal_posting = tgl_indonesia($data['tanggal_posting']);
            $tanggal = tgl_indonesia($data['tanggal']);
            $jam_mulai = $data['jam_mulai'];
            $jam_selesai = $data['jam_selesai'];
            $alamat = $data['alamat'];
            $userid = $data['user'];

            $uquery = $mysqli->query("SELECT * FROM user WHERE id='$userid' ");
            $user = $uquery->fetch_array();
            $nama = $user['nama'];
            echo '
                    <div class="widget-post">
                        <a href="#">
                            <div class="widget-img">
                                <img src="' . $gambar . '" alt="' . $judul . '" style="height:80px">
                            </div>
                            <div class="widget-content">
                            ' . $judul . '
                            <ul class="event-meta">
								<li><i class="fa fa-clock-o"></i> ' . $tanggal . ' | ' . $jam_mulai . ' - ' . $jam_selesai . '</li>
								<li><i class="fa fa-map-marker"></i> ' . $alamat . '</li>
							</ul>
                            </div>
                        </a>
                        <ul class="article-meta">
                            <li>By: ' . $nama . '</li>
                            <li>' . $tanggal_posting . '</li>
                        </ul>
                    </div>
                    
                    ';
        }
        ?>
    </div>
    <div class="widget">
        <h3 class="widget-title">Latest Blog</h3>
        <?php
        $query = $mysqli->query("SELECT * FROM blog ORDER BY id DESC LIMIT 3");
        while ($data = $query->fetch_array()) {
            $judul = $data['judul'];
            $gambar = $set['url_website'] . "/img/source/" . $data['gambar'];
            $tanggal = tgl_indonesia($data['tanggal']);
            $user = $data['user'];

            $uquery = $mysqli->query("SELECT * FROM user WHERE id='$user' ");
            while ($udata = $uquery->fetch_array()) {
                $nama = $udata['nama'];

                echo '
                    <div class="widget-post">
                        <a href="#">
                            <div class="widget-img">
                                <img src="' . $gambar . '" alt="' . $judul . '" style="height:80px">
                            </div>
                            <div class="widget-content">
                            ' . $judul . '
                            </div>
                        </a>
                        <ul class="article-meta">
                            <li>By: ' . $nama . '</li>
                            <li>' . $tanggal . '</li>
                        </ul>
                    </div>
                    
                    ';
            }
        }
        ?>
    </div>


</aside>