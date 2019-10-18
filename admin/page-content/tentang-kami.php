<?php
if (!defined("INDEX")) header('location: ../index.php');

$show = isset($_GET['show']) ? $_GET['show'] : "";
$link = "?content=tentang-kami";

switch ($show) {
    default:
        echo '
    <section class="content">
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
        echo'           <textarea name="isi" id="summernote" placeholder="Place some text here"
                        style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                        '.$data['isi'].'</textarea>
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