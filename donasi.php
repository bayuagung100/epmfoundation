<?php
session_start();
include "admin/config.php";
include "website/header.php";
echo "</header>";
?>
<?php
if (isset($_GET['donasi'])) { ?>
<div id="page-header">
    <div class="section-bg" style="background-image: url(./img/background-2.jpg);"></div>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="header-content">
                    <h1>Konfirmasi Donasi</h1>
                    <ul class="breadcrumb">
                        <li><a href="<?php echo $set['url_website']; ?>">Home</a></li>
                        <li><a href="#">Konfirmasi Donasi</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

    <div class="section">
        <div class="container">
            <div class="row">
            <form action="" method="get">
            <input type="hidden" name="jumlah" value="<?php echo $_GET['donasi'];?>">
                <div class="col-md-6">
                    <div class="card-auth" style="margin: 0">
                        <div class="text-center">
                            <p>
                                <a href="http://localhost/epmfoundation/auth?login" style="color:blue">Masuk</a> atau lengkapi data dibawah ini.
                            </p>
                        </div>
                        <hr>
                            <div class="form-group">
                                <label for="nama">Nama Lengkap<span style="color:red">*</span></label>
                                <input type="text" id="nama" placeholder="Nama" name="nama" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email<span style="color:red">*</span></label>
                                <input type="email" id="email" placeholder="Email" name="email" required>
                            </div>
                            <div class="form-group">
                                <label for="hp">Nomor Handphone(Wa)<span style="color:red">*</span></label>
                                <input type="tel" id="hp" placeholder="Contoh: 0821xxxxxxxx" name="hp" required>
                            </div>
                        
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card-auth" style="margin: 0">
                        <div class="text-center">
                            <h3 style="text-transform: uppercase;">Pembayaran</h3>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="cc-selector">
                                    <input id="bca" type="radio" name="bank" value="bca" />
                                    <label class="drinkcard-cc bca" for="bca"></label>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="cc-selector">
                                    
                                    <input id="bri" type="radio" name="bank" value="bri" />
                                    <label class="drinkcard-cc bri" for="bri"></label>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="cc-selector">
                                    
                                    <input id="bni-syariah" type="radio" name="bank" value="bni-syariah" />
                                    <label class="drinkcard-cc bni-syariah" for="bni-syariah"></label>
                                   
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="cc-selector">
                                    
                                    <input id="mandiri" type="radio" name="bank" value="mandiri" />
                                    <label class="drinkcard-cc mandiri" for="mandiri"></label>
                                   
                                </div>
                            </div>
                            
                        </div>
                        
                    </div>
                </div>
                <div class="col-md-12 text-center" style="margin-top:20px">
                    <button class="primary-button" type="submit">Lanjut</button>
                </div>
                
                </form>
            </div>
        </div>
    </div>

<?php } else { ?>
<div class="section">
	<div class="section-bg" style="background-image: url(./img/background-1.jpg);" data-stellar-background-ratio="0.5"></div>
	<div class="container">
		<div class="row donasi">
			<div class="col-md-6">
                <h1 class="donasi-judul">Selamatkan Anak-Anak</h1>
			    <p class="donasi-tag">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>
            <div class="col-md-6">
                <div class="card-donasi">
                    <h1>Donasi Sekarang</h1>
                    <p>Ayo Selamatkan Hidup Anak Bangsa Sekarang!.</p>
                    <form>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="radio1" style="width:245px">
                                    <input type="radio" id="radio1" name="nominal" value="500000" >
                                    <div class="radio-donasi">
                                    RP. 500.000 
                                    </div>
                                </label>
                            </div>
                            <div class="col-md-6">
                                <label for="radio2" style="width:245px">
                                    <input type="radio" id="radio2" name="nominal" value="1000000"  >
                                    <div class="radio-donasi">
                                    RP. 1.000.000 
                                    </div>
                                </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="radio3" style="width:245px">
                                    <input type="radio" id="radio3" name="nominal" value="1500000" >
                                    <div class="radio-donasi">
                                    RP. 1.500.000 
                                    </div>
                                </label>
                            </div>
                            <div class="col-md-6">
                                <label for="radio4" style="width:245px">
                                    <input type="radio" id="radio4" name="nominal" value="2000000"  >
                                    <div class="radio-donasi">
                                    RP. 2.000.000 
                                    </div>
                                </label>
                            </div>
                        </div>
                        <br/>
                        <div class="text-center">
                        <div id="btn-jml-lain" class="jumlah-lain" >Jumlah Lain</div>
                        </div>
                        <br/>
                        <div id="jml-lain" class="input-group" style="margin-bottom:10px;display: none;">
                            <span class="input-group-addon" style="background-color:#83ba09;color:#FFF">Rp.</span>
                            <input type="text" class="form-control input-donasi" name="jumlah-lain" placeholder="100.000" style="text-transform: none;" maxlength="11">
                        </div>
                        <br/>
                        <button class="primary-button" type="submit">Bantu Sekarang</button>
                    </form>
                </div>
            </div>
		</div>
	</div>
</div>
<?php } ?>


<?php
include "website/footer.php";
?>