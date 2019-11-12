-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 12 Nov 2019 pada 04.31
-- Versi server: 10.4.8-MariaDB
-- Versi PHP: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epmfoundation`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `acara`
--

CREATE TABLE `acara` (
  `id` int(50) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `tanggal_posting` date NOT NULL,
  `tanggal` date NOT NULL,
  `jam_mulai` varchar(20) NOT NULL,
  `jam_selesai` varchar(20) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `user` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `acara`
--

INSERT INTO `acara` (`id`, `judul`, `url`, `gambar`, `tanggal_posting`, `tanggal`, `jam_mulai`, `jam_selesai`, `alamat`, `deskripsi`, `user`) VALUES
(1, 'Santunan Anak Yatim', 'santunan-anak-yatim', 'dukung-yatim-and-dhuafa-hingga-perguruan-tinggi_detail_image.jpg', '2019-10-01', '2019-10-31', '8:00 AM', '1:07 PM', 'Jakarta selatan', '<p>Santunan untuk anak2 yatim di daerah jakarta selatan yang akan ...</p>', 1),
(2, 'Back To School (BTS)', 'back-to-school-bts', 'back-to-school-bts_detail_image.jpg', '2019-11-01', '2019-11-01', '9:12 AM', '1:55 PM', 'Jakarta', '<p><span style=\"font-weight: 400;\">Sehari-hari Zahra ke sekolah menggunakan sepatu Ali. Zahra yang memiliki jadwal di pagi hari dan Ali yang baru masuk di siang hari memungkinkan mereka untuk menggunakan sepatu milik Ali secara bergantian. Zahra harus berlari saat pulang sekolah untuk menukar sepatu kakaknya dengan sandal yang digunakan oleh Ali yang sudah menunggu kedatangannya di balik tembok. Sedangkan Ali harus berlari ke sekolah agar tidak telat. Begitulah kisah dua adik-kakak ini berlangsung.</span></p>', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `blog`
--

CREATE TABLE `blog` (
  `id` int(50) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `deskripsi` text NOT NULL,
  `user` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `blog`
--

INSERT INTO `blog` (`id`, `judul`, `url`, `gambar`, `tanggal`, `deskripsi`, `user`) VALUES
(1, 'Bank Makanan Untuk Korban Kebakaran Di Johar Baru, Jakarta Pusat', 'bank-makanan-untuk-korban-kebakaran-di-johar-baru-jakarta-pusat', 'MTU3NTE1Njc3MzY4NTI.jpg', '2019-10-23', '<p style=\"box-sizing: border-box; margin: 0px 0px 11.5px; text-align: justify;\"><span style=\"color: black; font-size: medium;\"><span style=\"color: #333333; font-family: Heebo, sans-serif;\"><span style=\"font-size: 14px;\">Minggu (1/9/19), kebakaran melanda pemukiman padat penduduk di wilayah Ibukota Jakarta, tepatnya di Kampung Rawa Sawah RT 005 - 007 RW 006, Johar Baru, Jakarta Pusat. Berdasarkan laporan yang didapat kebakaran yang terjadi pukul 19.20 WIB telah meludeskan belasan rumah warga.</span></span></span></p>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 11.5px; text-align: justify;\"><span style=\"color: #333333; font-family: Heebo, sans-serif;\"><span style=\"font-size: 14px;\">Menurut kabar yang berkembang dari warga sekitar, korsleting kabel listrik dari salah satu rumah menjadi titik awal munculnya sumber api. Diliputi kepanikan, para warga sekitar berbondong-bondong berupaya mencegah agar api tersebut tak terus menyambar bangunan lainnya.</span></span></p>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 11.5px; text-align: justify;\"><span style=\"color: #333333; font-family: Heebo, sans-serif;\"><span style=\"font-size: 14px;\">Lokasi kebakaran yang berada di gang sempit menjadi kesulitan tersendiri bagi petugas damkar yang berdatangan untuk meredam ganasnya kobaran api, setidaknya butuh waktu lebih dari satu setengah jam lamanya bagi petugas untuk menjinakkan si jago merah.</span></span></p>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 11.5px; text-align: justify;\"><span style=\"color: #333333; font-family: Heebo, sans-serif;\"><span style=\"font-size: 14px;\">Zakat yang diberikan Muzakki ke BAZNAS bermanfaat dan dapat membantu mereka yang membutuhkan. Tim Layanan Aktif @baznasindonesia bergerak cepat meninjau lokasi pasca kebakaran dan mendistribusikan bantuan Bank Makanan sebanyak 100 porsi untuk para korban kebakaran yang berada di pengungsian.</span></span></p>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 11.5px; text-align: justify;\"><span style=\"color: #333333; font-family: Heebo, sans-serif;\"><span style=\"font-size: 14px;\">Mari bantu Korban Kebakaran di Kp Sawah, Johar Baru, Jakarta Pusat melalui transfer ke Rekening BAZNAS :</span></span></p>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 11.5px; text-align: justify;\"><span style=\"color: #333333; font-family: Heebo, sans-serif;\"><span style=\"font-size: 14px;\">BCA 6867037777</span></span></p>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 11.5px; text-align: justify;\"><span style=\"color: #333333; font-family: Heebo, sans-serif;\"><span style=\"font-size: 14px;\">BNI Syariah 0900005574</span></span></p>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 11.5px; text-align: justify;\"><span style=\"color: #333333; font-family: Heebo, sans-serif;\"><span style=\"font-size: 14px;\">a.n BAZNAS</span></span></p>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 11.5px; text-align: justify;\"><span style=\"color: #333333; font-family: Heebo, sans-serif;\"><span style=\"font-size: 14px;\">Atau melalui online payment :</span></span></p>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 11.5px; text-align: justify;\"><span style=\"color: #333333; font-family: Heebo, sans-serif;\"><span style=\"font-size: 14px;\">? bit.ly/pedulimustahik</span></span></p>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 11.5px; text-align: justify;\"><span style=\"color: #333333; font-family: Heebo, sans-serif;\"><span style=\"font-size: 14px;\">Contact Center BAZNAS</span></span></p>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 11.5px; text-align: justify;\"><span style=\"color: #333333; font-family: Heebo, sans-serif;\"><span style=\"font-size: 14px;\">+62 21- 3904555</span></span></p>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 11.5px; text-align: justify;\"><span style=\"color: #333333; font-family: Heebo, sans-serif;\"><span style=\"font-size: 14px;\">+6287877373555 &ndash; whatsapp</span></span></p>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 11.5px; text-align: justify;\"><span style=\"color: #333333; font-family: Heebo, sans-serif;\"><span style=\"font-size: 14px;\">layananmuzaki@baznas.or.id</span></span></p>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 11.5px; text-align: justify;\"><span style=\"color: #333333; font-family: Heebo, sans-serif;\"><span style=\"font-size: 14px;\">Atau klik :</span></span></p>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 11.5px; text-align: justify;\"><span style=\"color: #333333; font-family: Heebo, sans-serif;\"><span style=\"font-size: 14px;\">bit.ly/KonfirmasizakatBAZNAS</span></span></p>\r\n<p>&nbsp;</p>', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_program`
--

CREATE TABLE `kategori_program` (
  `id` int(10) NOT NULL,
  `kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori_program`
--

INSERT INTO `kategori_program` (`id`, `kategori`) VALUES
(1, 'Pendidikan'),
(2, 'Kesehatan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `program`
--

CREATE TABLE `program` (
  `id` int(50) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `deskripsi` text NOT NULL,
  `kategori` varchar(10) NOT NULL,
  `user` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `program`
--

INSERT INTO `program` (`id`, `judul`, `url`, `gambar`, `tanggal`, `deskripsi`, `kategori`, `user`) VALUES
(1, 'Bantu Ratusan Desa Rawan Kesehatan Di Indonesia', 'bantu-ratusan-desa-rawan-kesehatan-di-indonesia', 'bantu-Ratusan-desa-rawan-kesehatan-di-indonesia_detail_image.jpg', '2019-10-23', '<p style=\"text-align: justify;\">Mewujudkan tatanan masyarakat yang sehat secara berkeadilan merupakan tanggung jawab bersama,melalui pengelolaan dana zakat yang diberikan oleh para muzaki,</p>\r\n<p style=\"text-align: justify;\"><img class=\"img img-responsive\" src=\"http://donasionline.id/images/12/5a0d4310c070b.JPG\" width=\"100%\" height=\"\" /></p>\r\n<p style=\"text-align: justify;\">Tidak terbatas oleh jarak, demi memeratakan penanganan rawan kesehatan di setiap daerah, Rumah Yatim berupaya menjangkau daerah &ndash; daerah terpencil untuk mengadakan kegiatan pengobatan gratis, yang secara massif menjangkau daerah yang jauh dari akses kesehatan.</p>\r\n<p style=\"text-align: justify;\"><img class=\"img img-responsive\" src=\"https://www.donasionline.id/images/35/5d96f89b5d642.jpg\" alt=\"\" width=\"100%\" /></p>\r\n<p style=\"text-align: justify;\"><span style=\"font-weight: 400;\">Pengobatan gratis rutin Rumah Yatim adakan di berbagai lokasi yang membutuhkan bantuan pengobatan gratis. Tujuannya adalah bisa memberikan pelayanan kesehatan bagi dhuafa yang tidak memiliki kemampuan finansial untuk berobat, lansia yang hidup sebtang kara dan tak mampu berobat serta anak-anak yang kurang mampu.</span></p>\r\n<p style=\"text-align: justify;\"><span style=\"font-weight: 400;\"><img src=\"https://www.donasionline.id/images/35/5d96f681591c0.jpeg\" alt=\"\" width=\"100%\" /></span></p>\r\n<p style=\"text-align: justify;\"><span style=\"font-weight: 400;\">Program ini menjadi sarana untuk masyarakat untuk berobat secara gratis tanpa biaya sedikitpun. Kami berharap adanya program pengobatan gratis ini bisa terus berjalan ke depannya serta untuk memberikan bantuan kepada dhuafa, lansia serta masyarakat prasejahtera lainnya.</span></p>\r\n<p style=\"text-align: justify;\"><span style=\"font-weight: 400;\"><img src=\"https://www.donasionline.id/images/35/5d96f89af0656.jpg\" alt=\"\" width=\"100%\" /></span></p>\r\n<p style=\"text-align: justify;\"><span style=\"font-weight: 400;\">Rumah Yatim berkomitmen untuk terus konsisten dengan program yang diadakan dan semakin banyak lagi warga masyarakat yang bisa terbantu. Pengobatan gratis Rumah Yatim pun melakukan kegiatan door to door kepada warga yang tidak bisa ke lokasi pengobatan.</span></p>\r\n<p style=\"text-align: justify;\"><span style=\"font-weight: 400;\"><img src=\"https://www.donasionline.id/images/35/5d96f89990941.jpg\" alt=\"\" width=\"100%\" /></span></p>\r\n<p>Mari bantu mereka dengan cara :</p>\r\n<ol>\r\n<li>Klik tombol \"DONASI SEKARANG\"</li>\r\n<li>Isi nominal donasi yang ingin diberikan</li>\r\n<li>Pilih metode pembayaran</li>\r\n<li>Transfer ke nomor rekening yang muncul dan bantu&nbsp; &nbsp;&nbsp; &nbsp;sebarkan melalui sosial media anda</li>\r\n</ol>', '2', 1),
(2, 'Beasiswa Pendidikan 350 Yatim', 'beasiswa-pendidikan-350-yatim', 'beasiswa-pendidikan-350-yatim_detail_image.jpg', '2019-10-23', '<p style=\"text-align: justify;\">Pendidikan dasar adalah hak setiap anak di bangsa ini, tak terkecuali kaum yatim dan dhuafa. Namun tidak semua anak bisa mendapatkan akses untuk sekolah. Salah satunya adalah Anis Nasih Taqiyuddin (16 tahun) anak asuh Rumah Yatim asal Majalengka.</p>\r\n<p style=\"text-align: justify;\">Anis telah menjadi yatim sejak usia 3 tahun. Ayahnya meninggal karena sakit. Otomatis, kondisi ekonomi keluarganya tidak stabil. Ibu Anis sempat bingung bagaimana menyekolahkan Anis. Syukurlah, beliau akhirnya menitipkan Anis di Asrama Rumah Yatim.&nbsp;</p>\r\n<p style=\"text-align: justify;\">Terkadang Anis rindu merasakan kasih sayang dari Ayahnya, karena tidak ada tempat untuk berbagi cerita dan meminta nasehat. Namun, Anis memutuskan untuk bangkit, karena baginya hidup tidak boleh larut dalam kesedihan.</p>\r\n<p style=\"text-align: justify;\"><img class=\"img img-responsive\" src=\"https://www.donasionline.id/images/35/5d77611f92c8b.png\" alt=\"\" width=\"100%\" height=\"\" /></p>\r\n<p style=\"text-align: justify;\">Anis adalah remaja berprestasi.&nbsp;Tercatat, sejumlah prestasi pernah diraihnya antara lain Juara Kelas, Juara Lomba Cerdas Cermat PAI dan Menjadi Semi Finalis Olimpiade Matematika Tingkat Nasional.<br /><br />Anis juga berhasil menghafal 6 juz Al-Qur&rsquo;an. Ia juga dikenal sebagai pribadi yang murah senyum dan bersahabat. Di masa depan, ia bercita-cita ingin menjadi Guru Matematika.<br /><br /></p>\r\n<p>***</p>\r\n<p><img class=\"img img-responsive\" src=\"https://www.donasionline.id/images/35/5d77621bc7c68.png\" alt=\"\" width=\"100%\" height=\"\" /></p>\r\n<p><strong>Kini,&nbsp;</strong><strong>saatnya kamu berkontribus</strong>i&nbsp;<strong>mengulurkan tanganmu&nbsp;</strong><strong>agar anak&nbsp;yatim dan dhuafa dapat merasakan indahnya masa sekolah dan dapat meraih cita-citanya.</strong></p>\r\n<p><strong><img src=\"https://www.donasionline.id/images/35/5d4d2bd09b58d.png\" alt=\"\" width=\"100%\" height=\"\" /></strong></p>\r\n<p><strong>Bagi kamu yang ingin bergabung menghidupkan kembali harapan ribuan anak ini untuk bersekolah, silakan berdonasi dengan cara:</strong></p>\r\n<ol>\r\n<li>Klik &ldquo;BERI DONASI&rdquo;;</li>\r\n<li>Masukan nominal donasi;</li>\r\n<li>Pilih bank (BNI Syariah/Mandiri/BCA/BRI);</li>\r\n<li>Dapatkan laporan melalui email.</li>\r\n</ol>', '1', 1),
(3, 'Back To School (BTS)', 'back-to-school-bts', 'back-to-school-bts_detail_image.jpg', '2019-10-23', '<p style=\"text-align: justify;\"><span style=\"font-weight: 400;\">Sehari-hari Zahra ke sekolah menggunakan sepatu Ali. Zahra yang memiliki jadwal di pagi hari dan Ali yang baru masuk di siang hari memungkinkan mereka untuk menggunakan sepatu milik Ali secara bergantian. Zahra harus berlari saat pulang sekolah untuk menukar sepatu kakaknya dengan sandal yang digunakan oleh Ali yang sudah menunggu kedatangannya di balik tembok. Sedangkan Ali harus berlari ke sekolah agar tidak telat. Begitulah kisah dua adik-kakak ini berlangsung.</span></p>\r\n<p style=\"text-align: justify;\"><img class=\"img img-responsive\" src=\"https://www.donasionline.id/images/35/5da5541770f79.jpg\" alt=\"\" width=\"650\" /></p>\r\n<h2 style=\"text-align: justify;\"><span style=\"font-weight: 400;\">Film yang menyentuh siapa saja yang menontonnya. Tak ayal air matapun secara tak sadar menetes saat menonton film ini.&nbsp;</span></h2>\r\n<p style=\"text-align: justify;\"><img class=\"img img-responsive\" src=\"https://www.donasionline.id/images/35/5da5541c68eca.jpeg\" alt=\"\" width=\"400\" /></p>\r\n<p style=\"text-align: justify;\"><span style=\"font-weight: 400;\">Hanya terbayang jika suasana dan kondisi Zahra dan Ali terjadi di film saja tetapi fakta yang Rumah Yatim temui ternyata mirip dengan kisah film ini. Saat penyaluran bantuan perlengkapan sekolah yang rutin Rumah Yatim gelar tiap bulannya, tepatnya di MI Tarbiyatul Falah di Kab. Bogor ada salah satu siswa bernama M. Ilfan (13) yang setiap hari bergantian sepatu dengan sang adik Mubar (9) yang sepatunya telah jebol saking usangnya.</span></p>\r\n<p style=\"text-align: justify;\"><img class=\"img img-responsive\" src=\"https://www.donasionline.id/images/35/5da5542bdea48.jpeg\" alt=\"\" width=\"400\" /></p>\r\n<p style=\"text-align: justify;\"><span style=\"font-weight: 400;\">Walau demikian kondisi itu tak menyurutkan semangat kakak dan adik ini terus bersekolah. Terlebih keadaan orangtua yang hanya bekerja sebagai seorang buruh tani. Inilah alasan utama Rumah Yatim yang dengan konsisten untuk menggalang dana biaya pendidikan anak-anak tidak mampu. Fakta bahwa mereka tetap semangat mengejar mimpi dengan kondisi ini membuat kami semakin bersemangat untuk selalu membantu mereka.</span></p>\r\n<p style=\"text-align: justify;\"><img class=\"img img-responsive\" src=\"https://www.donasionline.id/images/35/5da5542079972.jpeg\" alt=\"\" width=\"400\" /></p>\r\n<p style=\"text-align: justify;\"><span style=\"font-weight: 400;\">Tentunya dengan bantuan dan dukungan dari para donatur kami pun tak bisa membantu anak-anak seperti Mubar dan Ilfan. Terlebih di luar sana masih banyak kisah Children Of Heaven lainnya yang memerlukan bantuan dari kita semua.</span></p>\r\n<p style=\"text-align: justify;\"><img class=\"img img-responsive\" src=\"https://www.donasionline.id/images/35/5d4d32d5dcd5f.png\" alt=\"\" width=\"725\" height=\"407\" /></p>\r\n<p style=\"text-align: justify;\"><img class=\"img img-responsive\" src=\"https://www.donasionline.id/images/35/5d4d32d67997f.png\" alt=\"\" width=\"725\" height=\"408\" /></p>\r\n<p style=\"text-align: justify;\"><img class=\"img img-responsive\" src=\"https://www.donasionline.id/images/35/5d4d32d63d60f.png\" alt=\"\" width=\"724\" height=\"408\" /></p>\r\n<p style=\"text-align: justify;\"><strong>Ilfan, Mubar, akbar dan anak yatim dhuafa lainnya ingin terus sekolah meski dengan segala keterbatasan. Bukankah kita bisa mendukung agar mereka lebih bersemangat lagi?</strong></p>\r\n<p style=\"text-align: justify;\">Mari dukung mereka melalui program Back To School (BTS) dengan cara:<br />1. Klik &ldquo;BERI DONASI&rdquo;;<br />2. Masukan nominal donasi;<br />3. Pilih bank ;<br />4. Dapatkan laporan melalui email.</p>\r\n<h2 style=\"text-align: justify;\">Mari dukung putra-putri bangsa ini agar menjadi insan berprestasi, unggul dan mandiri dengan mendukung mereka melalui program Back To School (BTS).</h2>', '1', 1),
(4, 'Dukung Yatim & Dhuafa Hingga Perguruan Tinggi', 'dukung-yatim-dhuafa-hingga-perguruan-tinggi', 'dukung-yatim-and-dhuafa-hingga-perguruan-tinggi_detail_image.jpg', '2019-10-23', '<p>Halo Kak, namaku Aulia Nisa Asyani, lahir di Indramayu 17 tahun yang lalu. Aku sangat bahagia dengan keluarga sederhanaku, sampai akhirnya&nbsp;<strong>pada tanggal 16 Juni 2017 setelah adzan dzuhur Abiku dipanggil sama Allah kata-Nya suruh istirahat di surga.</strong>Duniaku seakan runtuh, Kak, tapi aku ikhlas meski Abi kini sudah tiada karena Abi hanya titipan dari Allah. Beliau adalah Abi terbaik untukku.</p>\r\n<p style=\"text-align: justify;\">Aku tinggal di asrama pendidikan Rumah Yatim. Salah satu motivasi terbesarku untuk terus berjuang adalah Umi. Aku ingin suatu saat bisa menjadi orang sukses agar Abi dan Umi bangga kepadaku.</p>\r\n<p style=\"text-align: justify;\"><img class=\"img img-responsive\" src=\"https://www.donasionline.id/images/35/5d4d29f8d0513.png\" alt=\"\" width=\"100%\" height=\"\" /></p>\r\n<p style=\"text-align: justify;\">Alhamdulillah dua tahun terakhir ini aku meraih peringkat 3 besar di kelas dan membuatku semakin semangat untuk kuliah.</p>\r\n<p style=\"text-align: justify;\">Di asrama aku dan teman-teman terus berusaha, belajar hingga larut malam menahan kantuk karena kami punya tujuan yang besar, kami sama-sama berjuang demi satu harapan.&nbsp;</p>\r\n<p style=\"text-align: justify;\"><img class=\"img img-responsive\" src=\"https://www.donasionline.id/images/35/5d280a2e7d02a.jpeg\" alt=\"\" width=\"100%\" height=\"\" /></p>\r\n<h2 style=\"text-align: justify;\"><strong>Alhamdulillah, perjuanganku pun tak sia-sia. Aku menjadi salah satu dari 168.742 peserta SBMPTN yang lulus seleksi tahun 2019, aku diterima di PGSD UPI Cibiru, Kak.&nbsp;</strong></h2>\r\n<h2 style=\"text-align: justify;\"><strong>Di masa depan, aku bercita-cita ingin menjadi seorang Guru IPS.</strong></h2>\r\n<p><strong><img src=\"https://www.donasionline.id/images/35/5d4d29f529558.png\" alt=\"\" width=\"100%\" /></strong></p>\r\n<p><strong><img src=\"https://www.donasionline.id/images/35/5d4d2bd09b58d.png\" alt=\"\" width=\"100%\" height=\"\" /></strong></p>\r\n<p><strong><img src=\"https://www.donasionline.id/images/35/5d4d2bc9b64fa.png\" alt=\"\" width=\"100%\" height=\"\" /></strong></p>\r\n<p><strong><img src=\"https://www.donasionline.id/images/35/5d4d2bca09d8b.png\" alt=\"\" width=\"100%\" height=\"\" /></strong></p>\r\n<h2><strong>Aulia adalah salah satu dari ratusan anak yatim dhuafa yang membutuhkan uluran tangan kita untuk bisa melanjutkan kuliah.</strong></h2>', '1', 1),
(11, 'Bantu Anak Yatim Memiliki Tabungan Pendidikan Sendiri', 'bantu-anak-yatim-memiliki-tabungan-pendidikan-sendiri', 'bantu-anak-yatim-memiliki-tabungan-pendidikan-sendiri_detail_image.jpg', '2019-10-25', '<p style=\"text-align: justify;\"><img class=\"img img-responsive\" src=\"https://donasionline.id/images/1549/5caacfa340440.jpeg\" alt=\"\" width=\"100%\" />Rumah Yatim begitu fokus dalam peningkatan kualitas pendidikan. Tak hanya dalam mendidik anak asuhnya untuk terus mandiri dan berprestasi, kami pun begitu fokus dalam menunjang keberlangsungan kegiatan belajar mengajar mereka sehingga mereka tidak terganggu dengan masalah ekonomi yang di alaminya.</p>\r\n<p style=\"text-align: justify;\"><img class=\"img img-responsive\" src=\"https://donasionline.id/images/1549/5caacfb01c529.jpeg\" alt=\"\" width=\"100%\" /></p>\r\n<p style=\"text-align: justify;\">Begitu banyak anak yang kurang beruntung dalam menimba ilmu, berbagai faktor mendasarinya. Mulai dari perekonomian hingga faktor percaya diri mereka. Hal ini menjadi faktor penting untuk anak secara fokus meraih impiannya tanpa mengkhawatirkan biaya pendidikan. Banyak cara yang Rumah Yatim lakukan untuk mendukung mereka khususnya anak-anak Yatim dan dhuafa. Salah satunya adalah dengan pemberian bantuan melalui ATM Mustahik.</p>\r\n<p style=\"text-align: justify;\"><img class=\"img img-responsive\" src=\"https://donasionline.id/images/1549/5caacfafd08ae.jpeg\" alt=\"\" width=\"100%\" /></p>\r\n<p style=\"text-align: justify;\">ATM Mustahiq adalah sebuah program inovatif Rumah Yatim dalam teknis penyaluran dana ZIS (Zakat, Infaq, Shoadqoh) kepada para Mustahik untuk membantu membiayai kebutuhan pendidikan mereka melalui ATM (Automated Teller Machine) sehingga dana bantuan dapat tersalurkan secara aman, akuntable dan tepat sasaran.</p>\r\n<p style=\"text-align: justify;\"><img class=\"img img-responsive\" src=\"https://donasionline.id/images/1549/5caacfada2a19.jpeg\" alt=\"\" width=\"100%\" /></p>\r\n<p style=\"text-align: justify;\"><strong>Sekitar 5000 anak dari keluarga tidak mampu menaruh mimpi dengan bantuan dari ATM Mustahik ini. Mari bantu wujudkan cita-cita mereka dengan Rp. 300.000/bulan/anak dengan mendukung mereka di program ini.</strong></p>\r\n<p style=\"text-align: justify;\"><strong><img src=\"https://donasionline.id/images/1549/5caacfb2dd75f.jpeg\" alt=\"\" width=\"100%\" /></strong></p>', '1', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `setting`
--

CREATE TABLE `setting` (
  `id` int(10) NOT NULL,
  `judul_website` varchar(100) NOT NULL,
  `url_website` varchar(100) NOT NULL,
  `deskripsi_website` text NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(14) NOT NULL,
  `email` varchar(50) NOT NULL,
  `wa` varchar(100) NOT NULL,
  `ig` varchar(100) NOT NULL,
  `fb` varchar(100) NOT NULL,
  `twitter` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `setting`
--

INSERT INTO `setting` (`id`, `judul_website`, `url_website`, `deskripsi_website`, `alamat`, `telepon`, `email`, `wa`, `ig`, `fb`, `twitter`) VALUES
(1, 'Epm Foundation', 'http://localhost/epmfoundation/', 'Epm Foundation adalah sebuah platform ...', 'Jl.', '+62', 'email@domain.com', '', '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sukarelawan`
--

CREATE TABLE `sukarelawan` (
  `id` int(50) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `kota` varchar(255) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sukarelawan`
--

INSERT INTO `sukarelawan` (`id`, `nama_lengkap`, `alamat`, `kota`, `no_hp`, `email`, `password`) VALUES
(1, 'Bayu Agung Gumelar', 'Kemuning Permai blok b2 no 31', 'Kab Tangerang', '089634372389', 'bayuagung100@gmail.com', 'e955a0cd420939c1a8812ac52342ba0f');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tentang_kami`
--

CREATE TABLE `tentang_kami` (
  `id` int(10) NOT NULL,
  `isi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tentang_kami`
--

INSERT INTO `tentang_kami` (`id`, `isi`) VALUES
(1, '<h2 class=\"article-title\"><strong>Lorem ipsum dolor sit amet</strong></h2>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n<p><img src=\"../img/source/Screenshot%20from%202019-10-15%2011-30-43.png\" alt=\"Screenshot from 2019-10-15 11-30-43\" width=\"100%\" height=\"\" /></p>');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `password`) VALUES
(1, 'Epm Foundation', 'epmfoundation', '092207099af0b9d66a2adadd150a7db3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `visi_misi`
--

CREATE TABLE `visi_misi` (
  `id` int(10) NOT NULL,
  `visi` text NOT NULL,
  `misi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `visi_misi`
--

INSERT INTO `visi_misi` (`id`, `visi`, `misi`) VALUES
(1, 'Visi kita adalah ...', 'Misi kita adalah ...');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `acara`
--
ALTER TABLE `acara`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kategori_program`
--
ALTER TABLE `kategori_program`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sukarelawan`
--
ALTER TABLE `sukarelawan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tentang_kami`
--
ALTER TABLE `tentang_kami`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `visi_misi`
--
ALTER TABLE `visi_misi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `acara`
--
ALTER TABLE `acara`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `kategori_program`
--
ALTER TABLE `kategori_program`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `program`
--
ALTER TABLE `program`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `sukarelawan`
--
ALTER TABLE `sukarelawan`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tentang_kami`
--
ALTER TABLE `tentang_kami`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `visi_misi`
--
ALTER TABLE `visi_misi`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
