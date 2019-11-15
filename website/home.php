<?php include "header.php"; ?>
<div id="home-owl" class="owl-carousel owl-theme">
	<div class="home-item">
		<div class="section-bg" style="background-image: url(./img/background-1.jpg);"></div>

		<div class="home">
			<div class="container">
				<div class="row">
					<div class="col-md-8">
						<div class="home-content">
							<h1>Selamatkan Anak-Anak</h1>
							<p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
							<a href="<?php echo $set["url_website"]; ?>donasi" class="primary-button">Donasi Sekarang</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="home-item">
		<div class="section-bg" style="background-image: url(./img/background-2.jpg);"></div>

		<div class="home">
			<div class="container">
				<div class="row">
					<div class="col-md-8">
						<div class="home-content">
							<h1>Jadilah Sukarelawan</h1>
							<p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
							<a href="<?php echo $set["url_website"]; ?>auth?daftar" class="primary-button">Daftar Sekarang</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</header>

<div id="numbers" class="section">
	<div class="container">
		<div class="row">
			<?php 
				$relquery = $mysqli->query("SELECT * FROM sukarelawan");
				$reldata = $relquery->num_rows;
				$danaquery = $mysqli->query("SELECT SUM(total) AS total FROM donasi WHERE status='berhasil' ");
				$danadata = $danaquery->fetch_array(); 
				$progquery = $mysqli->query("SELECT * FROM program");
				$progdata = $progquery->num_rows;
			?>
			<div class="col-md-3 col-sm-6">
				<div class="number">
					<i class="fa fa-handshake-o"></i>
					<h3><?php echo $reldata;?></h3>
					<span>Sukarelawan</span>
				</div>
			</div>

			<div class="col-md-3 col-sm-6">
				<div class="number">
					<i class="fa fa-smile-o"></i>
					<h3><?php echo $progdata;?></h3>
					<span>Program Amal</span>
				</div>
			</div>

			<div class="col-md-3 col-sm-6">
				<div class="number">
					<i class="fa fa-heartbeat"></i>
					<h3>154K</h3>
					<span>Penerima Amal</span>
				</div>
			</div>

			<div class="col-md-3 col-sm-6">
				<div class="number">
					<i class="fa fa-money"></i>
					<h3><?php echo rupiah($danadata['total']);?></h3>
					<span>Dana Terhimpun</span>
				</div>
			</div>

		</div>
	</div>
</div>

<div id="causes" class="section">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="section-title text-center">
					<h2 class="title">PROGRAM PILIHAN</h2>
					<p class="sub-title">Pilih dan salurkan donasi untuk program yang berarti bagi Anda dan mereka.</p>
				</div>
			</div>

			<?php
			$query = $mysqli->query("SELECT * FROM program ORDER BY id DESC");
			$jml = $query->num_rows;
			while ($data = $query->fetch_array()) {
				$id = $data['id'];
				$gambar = "./img/source/" . $data['gambar'];
				$kategori = $data['kategori'];

				$judul = $data['judul'];
				$convert = convert_seo($judul);
				$url = str_replace("--", "-", $convert);
				$deskripsi = $data['deskripsi'];
				$katquery = $mysqli->query("SELECT * FROM kategori_program WHERE id='$kategori' ");
				$kdata = $katquery->fetch_array();
				$nk = $kdata['kategori'];

				echo '
					<div class="col-md-4">
						<div class="causes">
							<div class="causes-img">
								<a href="' . $set["url_website"] . 'program/' . $url . '">
									<img src="' . $gambar . '" alt="' . $judul . '" style="height:230px">
								</a>
							</div>
							<div class="causes-progress">
								<div>
									<span class="causes-raised">Kategori: ' . $nk . '</span>
								</div>
							</div>
							<div class="causes-content">
								<h3><a href="' . $set["url_website"] . 'program/' . $url . '">' . $judul . '</a></h3>
								<p>' . limit_words(strip_tags($deskripsi), 20) . '</p>
								<a href="' . $set["url_website"] . 'program/' . $url . '" class="primary-button causes-donate">Donasi</a>
							</div>
						</div>
					</div>
					';
				if ($jml % 3 == 1) {
					echo '<div class="clearfix visible-md visible-lg"></div>';
				}
				$jml++;
			}
			?>

			<div class="col-md-12 text-center">
				<a href="<?php echo $set["url_website"] . 'program'; ?>" style="color:#fff"><button class="primary-button">PROGRAM LAINNYA</button></a>
			</div>
		</div>
	</div>
</div>

<div id="cta" class="section">
	<div class="section-bg" style="background-image: url(./img/background-1.jpg);" data-stellar-background-ratio="0.5"></div>

	<div class="container">
		<div class="row">
			<div class="col-md-offset-2 col-md-8">
				<div class="cta-content text-center">
					<h1>Jadilah Sukarelawan</h1>
					<p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
					<a href="<?php echo $set["url_website"]; ?>auth?daftar" class="primary-button">Daftar Sekarang</a>
				</div>
			</div>
		</div>
	</div>
</div>

<div id="events" class="section">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="section-title text-center">
					<h2 class="title">Acara Mendatang</h2>
					<p class="sub-title">Datanglah bersama kami di acara santunan anak yatim.</p>
				</div>
			</div>

			<?php
			$query = $mysqli->query("SELECT * FROM acara ORDER BY id DESC LIMIT 6");
			while ($data = $query->fetch_array()) {
				$judul = $data['judul'];
				$url = $data['url'];
				$gambar = "./img/source/" . $data['gambar'];
				$tanggal = tgl_indonesia($data['tanggal']);
				$jam_mulai = $data['jam_mulai'];
				$jam_selesai = $data['jam_selesai'];
				$alamat = $data['alamat'];
				$deskripsi = limit_words($data['deskripsi'], 20);

				echo '
				<div class="col-md-6">
					<div class="event">
						<div class="event-img">
							<a href="' . $set["url_website"] . 'acara/' . $url . '">
								<img src="' . $gambar . '" alt="' . $judul . '" style="height:145px">
							</a>
						</div>
						<div class="event-content">
							<h3><a href="' . $set["url_website"] . 'acara/' . $url . '">' . $judul . '</a></h3>
							<ul class="event-meta">
								<li><i class="fa fa-clock-o"></i> ' . $tanggal . ' | ' . $jam_mulai . ' - ' . $jam_selesai . '</li>
								<li><i class="fa fa-map-marker"></i> ' . $alamat . '</li>
							</ul>
							<p>' . $deskripsi . '</p>
						</div>
					</div>
				</div>
				';
			}
			?>

			<div class="col-md-12 text-center">
				<a href="<?php echo $set["url_website"] . 'acara'; ?>" style="color:#fff"><button class="primary-button">ACARA LAINNYA</button></a>
			</div>

		</div>
	</div>
</div>

<div id="testimonial" class="section">
	<div class="section-bg" style="background-image: url(./img/background-2.jpg);" data-stellar-background-ratio="0.5"></div>

	<div class="container">
		<div class="row">
			<div class="col-md-offset-2 col-md-8">
				<div class="cta-content text-center">
					<h1>Visi & Misi</h1>
					<p class="lead">Visi dan Misi kami membangun platform ini.</p>
					<div class="row">
						<?php
						$query = $mysqli->query("SELECT * FROM visi_misi");
						while ($data = $query->fetch_array()) {
							$visi = $data['visi'];
							$misi = $data['misi'];

							echo '
						<div class="col-md-6">
							<div class="cta-content visi">
								<h3>Visi</h3>
								<p class="lead">' . $visi . '</p>
							</div>
						</div>
						<div class="col-md-6">
							<div class="cta-content misi">
								<h3>Misi</h3>
								<p class="lead">' . $misi . '</p>
							</div>
						</div>
						';
						}
						?>

					</div>
				</div>
			</div>
		</div>
	</div>

</div>

<div id="blog" class="section">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="section-title text-center">
					<h2 class="title">Blog</h2>
					<p class="sub-title">Tetaplah terhubung dengan kami melalui artikel-artikel ini.</p>
				</div>
			</div>
			<?php
			$query = $mysqli->query("SELECT * FROM blog ORDER BY id DESC LIMIT 6");
			while ($data = $query->fetch_array()) {
				$judul = $data['judul'];
				$url = $data['url'];
				$gambar = "./img/source/" . $data['gambar'];
				$tanggal = tgl_indonesia($data['tanggal']);
				$deskripsi = limit_words($data['deskripsi'], 30);
				$user = $data['user'];

				$uquery = $mysqli->query("SELECT * FROM user WHERE id='$user' ");
				while ($udata = $uquery->fetch_array()) {
					$nama = $udata['nama'];

					echo '
					<div class="col-md-4">
						<div class="article">
							<div class="article-img">
								<a href="' . $set["url_website"] . 'blog/' . $url . '">
									<img src="' . $gambar . '" alt="' . $judul . '" style="height:230px">
								</a>
							</div>
							<div class="article-content">
								<h3 class="article-title"><a href="' . $set["url_website"] . 'blog/' . $url . '">' . $judul . '</a></h3>
								<ul class="article-meta">
									<li>Tanggal: ' . $tanggal . '</li>
									<li></li>
									<li>Diposting oleh: ' . $nama . '</li>
								</ul>
								<p>' . $deskripsi . '</p>
							</div>
						</div>
					</div>
					';
				}
			}
			?>

			<div class="col-md-12 text-center">
				<a href="<?php echo $set["url_website"] . 'blog'; ?>" style="color:#fff"><button class="primary-button">LIHAT SEMUA</button></a>
			</div>

		</div>
	</div>
</div>
<?php include "footer.php"; ?>