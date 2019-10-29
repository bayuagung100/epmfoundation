<?php
if(!defined("INDEX")) header('location: ../index.php');
$show = isset($_GET['show']) ? $_GET['show'] : "";
$link = "?content=blog";
switch($show){
    default:
    echo'
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Blog</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Daftar Blog</h3>
                    <a href="'.$link.'&show=form" class="btn btn-primary btn-icon-split" style="float: right!important;">
                        <span class="icon text-white-50">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="text">Tambah</span>
                    </a>
                </div>
    ';
                buka_tabel_program(array("Judul","Gambar","Tanggal Posting","Deskripsi"));
                $no = 1;
                $query = $mysqli->query("SELECT * FROM blog ORDER BY id DESC");
                while ($data = $query->fetch_array()) {
                    $judul = $data['judul'];
                    $gambar = $data['gambar'];
                    if($gambar){
                        $pic = "../img/thumbs/".$gambar;
                    }
                    $tanggal = $data['tanggal'];
                    $deskripsi = $data['deskripsi'];
                       
                    isi_table_program($no, array($judul, "<img src='".$pic."' width='150' style='margin-bottom: 10px'>", tgl_indonesia($tanggal), limit_words(strip_tags($deskripsi),10)),$link ,$data['id']);
                    $no++;
                    
                }

                tutup_tabel_program(array("Judul","Gambar","Tanggal Posting","Deskripsi"));
    echo'
            </div>
        </div>
    </section>
    ';
        break;
    
    case "form":
        if (isset($_GET['id'])) {
            $query     = $mysqli->query("SELECT * FROM blog WHERE id='$_GET[id]'");
            $data = $query->fetch_array();
            $aksi     = "Edit";
        } else {
            $data = array("id" => "", "judul" => "", "gambar" => "", "tanggal" => "","alamat" => "", "deskripsi" => "");
            $aksi     = "Tambah";
        }
        echo '
        <section class="content">
            <div class="container-fluid">
            <br>
                <div class="card ">
                <div class="card-header">
                    <h3 class="card-title">'.$aksi.' Blog</h3>
                </div>
                <div class="card-body">';
                buka_form($link, $data['id'], strtolower($aksi));
                buat_textbox("Judul Blog", "judul", $data['judul'],"Enter judul blog");
                buat_imagepicker("Thumbnail", "gambar", $data['gambar']);
                buat_tinymce("Deskripsi Blog", "deskripsi", $data['deskripsi'], "Enter deskripsi blog", "richtext");
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
        $tanggal	= date("Y-m-d");
        $deskripsi	= addslashes($_POST['deskripsi']);
        $user = $_SESSION['id'];

        if ($_POST['aksi']=="tambah") {
            $query = $mysqli->query("INSERT INTO blog
            (
                judul,
                url,
                gambar,
                tanggal,
                deskripsi,
                user
            )
            VALUES
            (
                '$judul',
                '$url',
                '$gambar',
                '$tanggal',
                '$deskripsi',
                '$user'
            )
            ");
        }
        if ($_POST['aksi']=="edit") {
            $query = $mysqli->query("UPDATE blog SET
            judul = '$judul',
            url = '$url',
            gambar = '$gambar',
            deskripsi = '$deskripsi'

            WHERE id='$_POST[id]'
            ");
        }
        header('location:'.$link);
        break;
    
    case "delete":
        $query = $mysqli->query("DELETE FROM blog WHERE id='$_GET[id]'");
        header('location:'.$link);
        break;
}
?>