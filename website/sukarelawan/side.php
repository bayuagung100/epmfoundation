<h3>Assalamu'alaikum, <?php echo $_SESSION['nama_lengkap']; ?></h3>
<div class="card">
    <h5><i class="fa fa-money"></i> TOTAL DONASI BERHASIL</h5>
    <?php 
        $query = $mysqli->query("SELECT SUM(total) AS total FROM donasi WHERE id_sukarelawan='$_SESSION[id]' AND status='berhasil' ");
        $data = $query->fetch_array();  
        echo '
        <p><b>'.rupiah($data['total']).'</b></p>
        ';
    ?>
    
</div>
<a href="<?php echo $set['url_website'];?>logout" class="primary-button">Logout</a>
<hr>
<div class="menu hidden-xm hidden-xs">
    <h3 class="menu-title">Menu Anda</h3>
    <ul>
        <li>
            <a href="<?php echo $set['url_website'];?>sukarelawan/dashboard"><i class="fa fa-angle-right"></i> Dashboard</a>
        </li>
        <li>
            <a href="<?php echo $set['url_website'];?>sukarelawan/profile"><i class="fa fa-angle-right"></i> Informasi Kontak</a>
        </li>
        <li>
            <a href="<?php echo $set['url_website'];?>sukarelawan/ubah-password"><i class="fa fa-angle-right"></i> Ubah Password</a>
        </li>
    </ul>
</div>