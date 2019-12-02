<?php
if(!defined("INDEX")) header('location: ../index.php');
$show = isset($_GET['show']) ? $_GET['show'] : "";
$link = "?content=donasi";
switch($show){
    default:
    echo'
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Donasi</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Daftar Donasi</h3>
                </div>
    ';
                buka_tabel_program(array("Nama","Email","No Hp","Nominal","Rek Tujuan","Status"));
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
                    isi_table_sukarelawan($no, array($nama, $email, $hp,rupiah($total),$rek_tujuan,$status),$link ,$data['id']);
                    $no++;
                }

                tutup_tabel_program(array("Nama","Email","No Hp","Nominal","Rek Tujuan","Status"));
    echo'
            </div>
        </div>
    </section>
    ';
        break;
    
    case "form":
        if (isset($_GET['id'])) {
            $query     = $mysqli->query("SELECT * FROM donasi WHERE id='$_GET[id]'");
            $data = $query->fetch_array();
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
            $status = $data['status'];
            $programquery = $mysqli->query("SELECT * FROM program where id='$id_program' ");
            $pdata = $programquery->fetch_array();
            if ($pdata['judul']=="") {
                $judul = "Donasi untuk semua";
            }else {
                $judul = $pdata['judul'];
            }

            $aksi     = "Detail";
        } 
        echo '
        <section class="content">
            <div class="container-fluid">
            <br>
                <div class="card ">
                <div class="card-header">
                    <h3 class="card-title">'.$aksi.' Donasi</h3>
                </div>
                <div class="card-body">
                
                <div class="table-responsive">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>Nama</td>
                                <td>:</td>
                                <td>'.$nama.'</td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>:</td>
                                <td>'.$email.'</td>
                            </tr>
                            <tr>
                                <td>Nomor Handphone(Wa)</td>
                                <td>:</td>
                                <td>'.$hp.'</td>
                            </tr>
                            <tr>
                                <td>Program</td>
                                <td>:</td>
                                <td>'.$judul.'</td>
                            </tr>
                            <tr>
                                <td>Doa</td>
                                <td>:</td>
                                <td>'.$doa.'</td>
                            </tr>
                            <tr>
                                <td>Tanggal</td>
                                <td>:</td>
                                <td>'.tgl_indonesia($tanggal).'</td>
                            </tr>
                            <tr>
                                <td>Batas Tanggal</td>
                                <td>:</td>
                                <td>'.tgl_indonesia($batas_tanggal).'</td>
                            </tr>
                            <tr>
                                <td>Rekening Tujuan</td>
                                <td>:</td>
                                <td>'.$rek_tujuan.'</td>
                            </tr>';
                            if ($status=="pending") {
                            echo'
                            <tr>
                                <td colspan="3">';
                                buka_form($link, $data['id'], strtolower($aksi));
                                $list = array();
                                $list[] = array('val'=>'pending', 'cap'=>'Pending');
                                
                                $list[] = array('val'=>'berhasil', 'cap'=>'Berhasil');
                                buat_combobox("Status", "status", $list, $status);
                                tutup_form($link);
                            echo'
                                </td>
                            </tr>
                            ';
                                
                            }
                            echo'
                            <tr>
                                <td>Status</td>
                                <td>:</td>
                                <td>'.$status.'</td>
                            </tr>
                            <tr>
                                <td>Jumlah</td>
                                <td>:</td>
                                <td>'.rupiah($jumlah).'</td>
                            </tr>
                            <tr>
                                <td>Kode Unik</td>
                                <td>:</td>
                                <td>'.$kode_unik.'</td>
                            </tr>
                            <tr>
                                <td>Total</td>
                                <td>:</td>
                                <td>'.rupiah($total).'</td>
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
    
    case "action":
        $status = addslashes($_POST['status']);
        if ($_POST['aksi']=="detail") {
            $query = $mysqli->query("UPDATE donasi SET
            status = '$status'

            WHERE id='$_POST[id]'
            ");
        }
        header('location:'.$link);
        break;
    break;
    
}
?>