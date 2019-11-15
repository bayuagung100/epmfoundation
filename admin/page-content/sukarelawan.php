<?php
if(!defined("INDEX")) header('location: ../index.php');
$show = isset($_GET['show']) ? $_GET['show'] : "";
$link = "?content=sukarelawan";
switch($show){
    default:
    echo'
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Sukarelawan</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Daftar Sukarelawan</h3>
                </div>
    ';
                buka_tabel_program(array("Nama","Email","No Hp"));
                $no = 1;
                $query = $mysqli->query("SELECT * FROM sukarelawan ORDER BY id DESC");
                while ($data = $query->fetch_array()) {
                    $nama = $data['nama_lengkap'];
                    $email = $data['email'];
                    $no_hp = $data['no_hp'];
                    isi_table_sukarelawan($no, array($nama, $email, $no_hp),$link ,$data['id']);
                    $no++;
                }

                tutup_tabel_program(array("Nama","Email","No Hp"));
    echo'
            </div>
        </div>
    </section>
    ';
        break;
    
    case "form":
        if (isset($_GET['id'])) {
            $query     = $mysqli->query("SELECT * FROM sukarelawan WHERE id='$_GET[id]'");
            $data = $query->fetch_array();
            $aksi     = "Detail";
        } 
        echo '
        <section class="content">
            <div class="container-fluid">
            <br>
                <div class="card ">
                <div class="card-header">
                    <h3 class="card-title">'.$aksi.' Sukarelawan</h3>
                </div>
                <div class="card-body">
                
                <div class="table-responsive">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>Nama</td>
                                <td>:</td>
                                <td>'.$data['nama_lengkap'].'</td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>:</td>
                                <td>'.$data['email'].'</td>
                            </tr>
                            <tr>
                                <td>Nomor Handphone(Wa)</td>
                                <td>:</td>
                                <td>'.$data['no_hp'].'</td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td>:</td>
                                <td>'.$data['alamat'].'</td>
                            </tr>
                            <tr>
                                <td>Kota / Kabupaten</td>
                                <td>:</td>
                                <td>'.$data['kota'].'</td>
                            </tr>
                        </tbody>
                    </table>
                </div>    
                <a href="'.$link.'" class="btn btn-primary btn-icon-split" style="float: left!important;">
                    <span class="text">< Kembali</span>
                </a>

                </div>
                </div>
            </div>
        </section>
        ';
        break;
        
    
}
?>