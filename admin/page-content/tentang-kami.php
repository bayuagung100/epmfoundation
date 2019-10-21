<?php
if (!defined("INDEX")) header('location: ../index.php');

$show = isset($_GET['show']) ? $_GET['show'] : "";
$link = "?content=tentang-kami";

switch ($show) {
    default:
        echo '
    <section class="content" style="padding-top:10px">
        <div class="container-fluid">
            ';
        echo '  <div class="col-md-12">    
                    <div class="card card-default">
                        <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-users"></i>
                            Tentang Kami
                        </h3>
                        </div>
                        <div class="card-body">';
                        $query  = $mysqli->query("SELECT * FROM tentang_kami ");
                        $data = $query->fetch_array();
                        buka_form($link, $data['id'], "about");
        echo'           <textarea name="isi" class="richtext">'.$data['isi'].'</textarea>
                        <br>
            ';
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

    case "action":
        $isi  = addslashes($_POST['isi']);
        if ($_POST['aksi'] == "about") {
            $query  = $mysqli->query("UPDATE tentang_kami SET       
                isi = '$isi'
                WHERE id='$_POST[id]'
                ");
        }
        header('location:' . $link);
    break;
}
?>