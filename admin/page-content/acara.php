<?php
if(!defined("INDEX")) header('location: ../index.php');
$show = isset($_GET['show']) ? $_GET['show'] : "";
$link = "?content=acara";
switch($show){
    default:
    echo'
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Acara</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Daftar Acara</h3>
                    <a href="'.$link.'&show=form" class="btn btn-primary btn-icon-split" style="float: right!important;">
                        <span class="icon text-white-50">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="text">Tambah</span>
                    </a>
                </div>
    ';
                buka_tabel_program(array("Judul","Gambar","Lokasi","Deskripsi"));
                $no = 1;
                $query = $mysqli->query("SELECT * FROM acara ORDER BY id DESC");
                while ($data = $query->fetch_array()) {
                    $judul = $data['judul'];
                    $gambar = $data['gambar'];
                    if($gambar){
                        $pic = "../img/thumbs/".$gambar;
                    }
                    $tanggal = $data['tanggal'];
                    $jam_mulai = $data['jam_mulai'];
                    $jam_selesai = $data['jam_selesai'];
                    $alamat = $data['alamat'];
                    $deskripsi = $data['deskripsi'];
                       
                    isi_table_program($no, array($judul, "<img src='".$pic."' width='150' style='margin-bottom: 10px'>", $alamat."<br>".tgl_indonesia($tanggal)." | ".$jam_mulai."-".$jam_selesai, limit_words(strip_tags($deskripsi),10)),$link ,$data['id']);
                    $no++;
                    
                }

                tutup_tabel_program(array("Judul","Gambar","Lokasi","Deskripsi"));
    echo'
            </div>
        </div>
    </section>
    ';
        break;
    
    case "form":
        if (isset($_GET['id'])) {
            $query     = $mysqli->query("SELECT * FROM acara WHERE id='$_GET[id]'");
            $data = $query->fetch_array();
            $aksi     = "Edit";
        } else {
            $data = array("id" => "", "judul" => "", "gambar" => "", "tanggal" => "", "jam_mulai" => "", "jam_selesai" => "","alamat" => "", "deskripsi" => "");
            $aksi     = "Tambah";
        }
        echo '
        <section class="content">
            <div class="container-fluid">
            <br>
                <div class="card ">
                <div class="card-header">
                    <h3 class="card-title">'.$aksi.' Acara</h3>
                </div>
                <div class="card-body">';
                buka_form($link, $data['id'], strtolower($aksi));
                buat_textbox("Judul Acara", "judul", $data['judul'],"Enter judul acara");
                buat_imagepicker("Thumbnail", "gambar", $data['gambar']);
                buat_inlinebuka();
                    buat_inlinebuka_col();
                    buat_inline("Tanggal Acara", "tanggal", $data['tanggal'],"Enter tanggal acara","date");
                    buat_inlinetutup_col();
                    buat_inlinebuka_col();
                    buat_time("Jam Mulai Acara", "jam_mulai", $data['jam_mulai'],"Jam mulai acara");
                    buat_inlinetutup_col();
                    buat_inlinebuka_col();
                    buat_time("Jam Selesai Acara", "jam_selesai", $data['jam_selesai'],"Jam selesai acara");
                    buat_inlinetutup_col();
                buat_inlinetutup();
                buat_textarea("Alamat Acara (*Jangan pakai enter)","alamat",$data['alamat'],"Enter alamat");
                buat_tinymce("Deskripsi Acara", "deskripsi", $data['deskripsi'], "Enter deskripsi acara", "richtext");
                tutup_form($link);
        echo'                
                </div>
                </div>
            </div>
        </section>
        ';
        break;
        
    case "action":
        $judul	= ucwords(addslashes($_POST['judul']));
        $convert = convert_seo($judul);
        $url = str_replace("--","-",$convert);
        $gambar	= addslashes($_POST['gambar']);
        $tanggal_posting	= date("Y-m-d");
        $tanggal	= addslashes($_POST['tanggal']);
        $jam_mulai	= addslashes($_POST['jam_mulai']);
        $jam_selesai	= addslashes($_POST['jam_selesai']);
        $alamat	= addslashes($_POST['alamat']);
        $deskripsi	= addslashes($_POST['deskripsi']);
        $user = $_SESSION['id'];

        if ($_POST['aksi']=="tambah") {
            $query = $mysqli->query("INSERT INTO acara
            (
                judul,
                url,
                gambar,
                tanggal_posting,
                tanggal,
                jam_mulai,
                jam_selesai,
                alamat,
                deskripsi,
                user
            )
            VALUES
            (
                '$judul',
                '$url',
                '$gambar',
                '$tanggal_posting',
                '$tanggal',
                '$jam_mulai',
                '$jam_selesai',
                '$alamat',
                '$deskripsi',
                '$user'
            )
            ");
        }
        if ($_POST['aksi']=="edit") {
            $query = $mysqli->query("UPDATE acara SET
            judul = '$judul',
            url = '$url',
            gambar = '$gambar',
            tanggal = '$tanggal',
            jam_mulai = '$jam_mulai',
            jam_selesai = '$jam_selesai',
            alamat = '$alamat',
            deskripsi = '$deskripsi'

            WHERE id='$_POST[id]'
            ");
        }
        header('location:'.$link);
        break;
    
    case "delete":
        $query = $mysqli->query("DELETE FROM acara WHERE id='$_GET[id]'");
        header('location:'.$link);
        break;
}
?>