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
							<a href="#" class="primary-button">Donasi Sekarang</a>
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
							<a href="#" class="primary-button">Daftar Sekarang</a>
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
			<div class="col-md-3 col-sm-6">
				<div class="number">
					<i class="fa fa-handshake-o"></i>
					<h3>357</h3>
					<span>Sukarelawan</span>
				</div>
			</div>

			<div class="col-md-3 col-sm-6">
				<div class="number">
					<i class="fa fa-smile-o"></i>
					<h3>47k</h3>
					<span>Proyek Amal</span>
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
					<h3>785K</h3>
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
				$query = $mysqli->query("SELECT * FROM program order by id desc");
				while ($data = $query->fetch_array()) {
					$gambar = "./img/source/".$data['gambar'];
					$kategori = $data['kategori'];
					
					$judul = $data['judul'];
					$deskripsi = $data['deskripsi'];
					$katquery = $mysqli->query("SELECT * FROM kategori_program WHERE id='$kategori' ");
					while ($kdata = $katquery->fetch_array()) {
						$nk = $kdata['kategori'];

						echo'
						<div class="col-md-4">
							<div class="causes">
								<div class="causes-img">
									<a href="single-cause.html">
										<img src="'.$gambar.'" alt="'.$judul.'" style="height:230px">
									</a>
								</div>
								<div class="causes-progress">
									<div>
										<span class="causes-raised">Kategori: '.$nk.'</span>
									</div>
								</div>
								<div class="causes-content">
									<h3><a href="single-cause.html">'.$judul.'</a></h3>
									<p>'.limit_words($deskripsi, 20).'</p>
									<a href="single-cause.html" class="primary-button causes-donate">Donasi</a>
								</div>
							</div>
						</div>
						';
					}
				}
			?>

			

			<div class="col-md-12 text-center">
				<button class="primary-button">PROGRAM LAINNYA</button>
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
					<a href="#" class="primary-button">Daftar Sekarang</a>
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

			<div class="col-md-6">
				<div class="event">
					<div class="event-img">
						<a href="single-event.html">
							<img src="./img/event-1.jpg" alt="">
						</a>
					</div>
					<div class="event-content">
						<h3><a href="single-event.html">Judul</a></h3>
						<ul class="event-meta">
							<li><i class="fa fa-clock-o"></i> Tanggal | Jam</li>
							<li><i class="fa fa-map-marker"></i> Alamat</li>
						</ul>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
					</div>
				</div>
			</div>

			<div class="col-md-6">
				<div class="event">
					<div class="event-img">
						<a href="single-event.html">
							<img src="./img/event-2.jpg" alt="">
						</a>
					</div>
					<div class="event-content">
						<h3><a href="single-event.html">Judul</a></h3>
						<ul class="event-meta">
							<li><i class="fa fa-clock-o"></i> Tanggal | Jam</li>
							<li><i class="fa fa-map-marker"></i> Alamat</li>
						</ul>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
					</div>
				</div>
			</div>

			<div class="clearfix visible-md visible-lg"></div>
			<div class="col-md-6">
				<div class="event">
					<div class="event-img">
						<a href="single-event.html">
							<img src="./img/event-3.jpg" alt="">
						</a>
					</div>
					<div class="event-content">
						<h3><a href="single-event.html">Judul</a></h3>
						<ul class="event-meta">
							<li><i class="fa fa-clock-o"></i> Tanggal | Jam</li>
							<li><i class="fa fa-map-marker"></i> Alamat</li>
						</ul>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
					</div>
				</div>
			</div>

			<div class="col-md-6">
				<div class="event">
					<div class="event-img">
						<a href="single-event.html">
							<img src="./img/event-4.jpg" alt="">
						</a>
					</div>
					<div class="event-content">
						<h3><a href="single-event.html">Judul</a></h3>
						<ul class="event-meta">
							<li><i class="fa fa-clock-o"></i> Tanggal | Jam</li>
							<li><i class="fa fa-map-marker"></i> Alamat</li>
						</ul>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
					</div>
				</div>
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

						echo'
						<div class="col-md-6">
							<div class="cta-content visi">
								<h3>Visi</h3>
								<p class="lead">'.$visi.'</p>
							</div>
						</div>
						<div class="col-md-6">
							<div class="cta-content misi">
								<h3>Misi</h3>
								<p class="lead">'.$misi.'</p>
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

			<div class="col-md-4">
				<div class="article">
					<div class="article-img">
						<a href="single-blog.html">
							<img src="./img/post-1.jpg" alt="">
						</a>
					</div>
					<div class="article-content">
						<h3 class="article-title"><a href="single-blog.html">Judul</a></h3>
						<ul class="article-meta">
							<li>Tanggal</li>
						</ul>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
					</div>
				</div>
			</div>

			<div class="col-md-4">
				<div class="article">
					<div class="article-img">
						<a href="single-blog.html">
							<img src="./img/post-2.jpg" alt="">
						</a>
					</div>
					<div class="article-content">
						<h3 class="article-title"><a href="single-blog.html">Judul</a></h3>
						<ul class="article-meta">
							<li>Tanggal</li>
						</ul>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
					</div>
				</div>
			</div>

			<div class="col-md-4">
				<div class="article">
					<div class="article-img">
						<a href="single-blog.html">
							<img src="./img/post-3.jpg" alt="">
						</a>
					</div>
					<div class="article-content">
						<h3 class="article-title"><a href="single-blog.html">Judul</a></h3>
						<ul class="article-meta">
							<li>Tanggal</li>
						</ul>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php include "footer.php"; ?>