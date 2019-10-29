<?php
if(!defined("INDEX")) header('location: ../index.php');
$show = isset($_GET['show']) ? $_GET['show'] : "";
$link = "?content=program";
switch($show){
    default:
    echo'
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Program Pilihan</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Daftar Program Pilihan</h3>
                    <a href="'.$link.'&show=form" class="btn btn-primary btn-icon-split" style="float: right!important;">
                        <span class="icon text-white-50">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="text">Tambah</span>
                    </a>
                </div>
    ';
                buka_tabel_program(array("Judul","Gambar","Deskripsi","Kategori"));
                $no = 1;
                $query = $mysqli->query("SELECT * FROM program ORDER BY id DESC");
                while ($data = $query->fetch_array()) {
                    $judul = $data['judul'];
                    $gambar = $data['gambar'];
                    if($gambar){
                        $pic = "../img/thumbs/".$gambar;
                    }
                    $deskripsi = $data['deskripsi'];
                    $kategori = $data['kategori'];
                        $katquery = $mysqli->query("SELECT * FROM kategori_program WHERE id='$kategori' ");
                        while ($kat = $katquery->fetch_array()) {
                            $kp = $kat['kategori'];
                        }
                        isi_table_program($no, array($judul, "<img src='".$pic."' width='150' style='margin-bottom: 10px'>", limit_words(strip_tags($deskripsi),10), $kp),$link ,$data['id']);
                            $no++;
                }

                tutup_tabel_program(array("Judul","Gambar","Deskripsi","Kategori"));
    echo'
            </div>
        </div>
    </section>
    ';
        break;
    
    case "form":
        if (isset($_GET['id'])) {
            $query     = $mysqli->query("SELECT * FROM program WHERE id='$_GET[id]'");
            $data = $query->fetch_array();
            $aksi     = "Edit";
        } else {
            $data = array("id" => "", "judul" => "", "gambar" => "", "deskripsi" => "", "kategori" => "");
            $aksi     = "Tambah";
        }
        echo '
        <section class="content">
            <div class="container-fluid">
            <br>
                <div class="card ">
                <div class="card-header">
                    <h3 class="card-title">'.$aksi.' Program Pilihan</h3>
                </div>
                <div class="card-body">';
                buka_form($link, $data['id'], strtolower($aksi));
                buat_textbox("Judul Program", "judul", $data['judul'],"Enter judul program");
                buat_imagepicker("Thumbnail", "gambar", $data['gambar']);
                $kategori = $mysqli->query ("SELECT * FROM kategori_program");
                $list = array();
                $list[] = array('val'=>'0', 'cap'=>'Tidak Ada Kategori');
                while($k = $kategori->fetch_array()){
                    $list[] = array('val'=>$k['id'], 'cap'=>$k['kategori']);
                }
                buat_combobox("Kategori", "kategori", $list, $data['kategori']);
                buat_tinymce("Deskripsi Program", "deskripsi", $data['deskripsi'], "Enter deskripsi program", "richtext");
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
        $kategori	= addslashes($_POST['kategori']);
        $deskripsi	= addslashes($_POST['deskripsi']);
        $user = $_SESSION['id'];

        if ($_POST['aksi']=="tambah") {
            $query = $mysqli->query("INSERT INTO program
            (
                judul,
                url,
                gambar,
                tanggal,
                deskripsi,
                kategori,
                user
            )
            VALUES
            (
                '$judul',
                '$url',
                '$gambar',
                '$tanggal',
                '$deskripsi',
                '$kategori',
                '$user'
            )
            ");
        }
        if ($_POST['aksi']=="edit") {
            $query = $mysqli->query("UPDATE program SET
            judul = '$judul',
            url = '$url',
            gambar = '$gambar',
            deskripsi = '$deskripsi',
            kategori = '$kategori'

            WHERE id='$_POST[id]'
            ");
        }
        header('location:'.$link);
        break;
    
    case "delete":
        $query = $mysqli->query("DELETE FROM program WHERE id='$_GET[id]'");
        header('location:'.$link);
        break;
}
?>