<?php
if (!defined("INDEX")) header('location: ../index.php');

$show = isset($_GET['show']) ? $_GET['show'] : "";
$link = "?content=setting";

switch ($show) {
    default:
        echo '
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1>Setting</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-default">
                        <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-exclamation-triangle"></i>
                            Informasi Website
                        </h3>
                        </div>
                        <div class="card-body">
            ';
        $query  = $mysqli->query("SELECT * FROM setting ");
        $data = $query->fetch_array();
        buka_form($link, $data['id'], "setting");
        buat_textbox('Judul Website', 'judul_website', $data['judul_website'], 'Enter judul website');
        buat_textbox('Url Website', 'url_website', $data['url_website'], 'http://domain.com/');
        buat_textarea('Deskripsi Website (*Jangan pakai enter)', 'deskripsi_website', $data['deskripsi_website'], 'Enter deskripsi website');
        tutup_form($link);

        echo '          </div>
                    </div>
                </div>
            ';
        echo '  <div class="col-md-6">
                    <div class="card card-default">
                        <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-bullhorn"></i>
                            Visi & Misi Foundation
                        </h3>
                        </div>
                        <div class="card-body">
            ';
        $query  = $mysqli->query("SELECT * FROM visi_misi ");
        $data = $query->fetch_array();
        buka_form($link, $data['id'], 'visi_misi');
        buat_textarea('Visi (*Jangan pakai enter)', 'visi', $data['visi'], 'Enter visi');
        buat_textarea('Misi (*Jangan pakai enter)', 'misi', $data['misi'], 'Enter misi');
        tutup_form($link);
        echo '          </div>
                    </div>
                </div>
            ';
        echo '  <div class="col-md-12">    
                    <div class="card card-default">
                        <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-users"></i>
                            Tentang Kami
                        </h3>
                        </div>
                        <div class="card-body">
                        <textarea class="textarea" placeholder="Place some text here"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
            ';
        echo '          </div>
                    </div>
                </div>
            ';

        echo '<div>
        </div>
    </section>
            ';
        break;

    case "action":
        $judul_website   = ucwords(addslashes($_POST['judul_website']));
        $url_website   = addslashes($_POST['url_website']);
        $deskripsi_website  = addslashes($_POST['deskripsi_website']);
        $visi  = addslashes($_POST['visi']);
        $misi  = addslashes($_POST['misi']);


        if ($_POST['aksi'] == "setting") {
            $query  = $mysqli->query("UPDATE setting SET       
                judul_website = '$judul_website',
                url_website = '$url_website',
                deskripsi_website = '$deskripsi_website'
                WHERE id='$_POST[id]'
                ");
        }
        if ($_POST['aksi'] == "visi_misi") {
            $query  = $mysqli->query("UPDATE visi_misi SET       
            visi = '$visi',
            misi = '$misi'
            WHERE id='$_POST[id]'
            ");
        }
        header('location:' . $link);
        break;
}
?>