<?php
if (!defined("INDEX")) header('location: ../index.php');
$show = isset($_GET['show']) ? $_GET['show'] : "";
$link = "?content=kategori-program";
switch ($show) {
    default:
        echo '
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Kategori Program</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Daftar Kategori Program</h3>
                    <a href="' . $link . '&show=form" class="btn btn-primary btn-icon-split" style="float: right!important;">
                        <span class="icon text-white-50">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="text">Tambah</span>
                    </a>
                </div>
    ';
        buka_tabel_program(array("Nama Kategori"));
        $no = 1;
        $query = $mysqli->query("SELECT * FROM kategori_program ORDER BY id DESC");
        while ($data = $query->fetch_array()) {
            $kategori = $data['kategori'];
            isi_table_program($no, array($kategori), $link, $data['id']);
            $no++;
        }

        tutup_tabel_program(array("Nama Kategori"));
        echo '
            </div>
        </div>
    </section>
    ';
        break;

    case "form":
        if (isset($_GET['id'])) {
            $query     = $mysqli->query("SELECT * FROM kategori_program WHERE id='$_GET[id]'");
            $data = $query->fetch_array();
            $aksi     = "Edit";
        } else {
            $data = array("id" => "","kategori" => "");
            $aksi     = "Tambah";
        }
        echo '
        <section class="content">
            <div class="container-fluid">
            <br>
                <div class="card ">
                <div class="card-header">
                    <h3 class="card-title">'.$aksi.' Kategori Program</h3>
                </div>
                <div class="card-body">';
                buka_form($link, $data['id'], strtolower($aksi));
                buat_textbox("Nama Kategori", "kategori", $data['kategori'],"Enter nama kategori");
                tutup_form($link);
        echo'                
                </div>
                </div>
            </div>
        </section>
        ';
        break;
        
    case "action":
        $kategori	= addslashes($_POST['kategori']);

        if ($_POST['aksi']=="tambah") {
            $query = $mysqli->query("INSERT INTO kategori_program
            (
                kategori
            )
            VALUES
            (
                '$kategori'
            )
            ");
        }
        if ($_POST['aksi']=="edit") {
            $query = $mysqli->query("UPDATE kategori_program SET
            kategori = '$kategori'

            WHERE id='$_POST[id]'
            ");
        }
        header('location:'.$link);
        break;
    
    case "delete":
        $query = $mysqli->query("DELETE FROM kategori_program WHERE id='$_GET[id]'");
        header('location:'.$link);
        break;
}
?>