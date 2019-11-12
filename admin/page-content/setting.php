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
            <div class="row">';
        echo'
                <div class="col-md-12">
                    <div class="card card-default">
                        <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-credit-card"></i>
                            Daftar Rekening Bank
                        </h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                            <a href="'.$link.'&show=form" class="btn btn-primary btn-icon-split" style="float: right!important;">
                                <span class="icon text-white-50">
                                    <i class="fas fa-plus"></i>
                                </span>
                                <span class="text">Tambah</span>
                            </a>
                        </div>
                        <div class="card-body">

                        </div>
                    </div>
                </div>
        ';
        echo'
                <div class="col-md-6">
                    <div class="card card-default">
                        <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-exclamation-triangle"></i>
                            Informasi Website
                        </h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
        ';
                        $query  = $mysqli->query("SELECT * FROM setting ");
                        $data = $query->fetch_array();
                        buka_form($link, $data['id'], "setting");
                        buat_textbox('Judul Website', 'judul_website', $data['judul_website'], 'Enter judul website');
                        buat_textbox('Url Website', 'url_website', $data['url_website'], 'http://domain.com/');
                        buat_textarea('Deskripsi Website (*Jangan pakai enter)', 'deskripsi_website', $data['deskripsi_website'], 'Enter deskripsi website');
                        buat_textarea('Alamat Kantor (*Jangan pakai enter)', 'alamat', $data['alamat'], 'Enter alamat kantor');
                        buat_textbox('Telepon Kantor', 'telepon', $data['telepon'], '+62xxxxxxxxxxx');
                        buat_textbox('Email Kantor', 'email', $data['email'], 'email@domain.com');
                        buat_textbox('WhatsApp', 'wa', $data['wa'], '62xxxxxxxxxxx');
                        buat_textbox('Instagram', 'ig', $data['ig'], 'https://www.instagram.com/xxxxxx/');
                        buat_textbox('Facebook', 'fb', $data['fb'], 'https://www.facebook.com/xxxxxx/');
                        buat_textbox('Twitter', 'twitter', $data['twitter'], 'https://twitter.com/xxxxxx/');
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
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
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
        echo '<div>
        </div>
    </section>
            ';
        break;
    
    case "form":
        global $mysqli;
        if(isset($_GET['id'])){
            $query  = $mysqli->query ( "SELECT * FROM rekening_bank WHERE id='$_GET[id]'");
            $data= $query->fetch_array();
            $aksi   = "Edit";
        }else{
            $data = array("id"=>"", "nama_bank"=>"", "no_rek"=>"", "nama_pemilik"=>"");
            $aksi   = "Tambah";
        }
        
        if($aksi=="Edit" and $_SESSION['level']!="admin" and $data['id']!=$_SESSION['id']){
            header('location:'.$link);
        }else{
            echo'
            <section class="content">
            <div class="container-fluid">
            <br>
                <div class="card ">
                <div class="card-header">
                    <h3 class="card-title">'.$aksi.' Program Pilihan</h3>
                </div>
                <div class="card-body">';
                buka_form($link, $data['id'], strtolower($aksi));
                    buat_textbox("Nama Bank", "nama_bank", $data['nama_bank'], "Enter nama bank");
                    buat_textbox("No Rekening", "no_rek", $data['no_rek'], "Enter no.rekening");
                    buat_textbox("Nama Pemilik", "nama_pemilik", $data['nama_pemilik'], "Enter nama pemilik");
                tutup_form($link);
        echo'                
                </div>
                </div>
            </div>
        </section>
        ';
        }
        break;

    case "action":
        $judul_website   = ucwords(addslashes($_POST['judul_website']));
        $url_website   = addslashes($_POST['url_website']);
        $deskripsi_website  = addslashes($_POST['deskripsi_website']);
        $alamat  = addslashes($_POST['alamat']);
        $telepon  = addslashes($_POST['telepon']);
        $email  = addslashes($_POST['email']);
        $wa  = addslashes($_POST['wa']);
        $ig  = addslashes($_POST['ig']);
        $fb  = addslashes($_POST['fb']);
        $twitter  = addslashes($_POST['twitter']);
        $visi  = addslashes($_POST['visi']);
        $misi  = addslashes($_POST['misi']);


        if ($_POST['aksi'] == "setting") {
            $query  = $mysqli->query("UPDATE setting SET       
                judul_website = '$judul_website',
                url_website = '$url_website',
                deskripsi_website = '$deskripsi_website',
                alamat = '$alamat',
                telepon = '$telepon',
                email = '$email',
                wa = '$wa',
                ig = '$ig',
                fb = '$fb',
                twitter = '$twitter'
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