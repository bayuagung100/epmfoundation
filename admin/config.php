
 <?php
//server hosting
$servername = "localhost";
$username = "u328098603_epmfoundation";
$password = "lalaLand123";
$database = "u328098603_epmfoundation"; 

//local-server
// $servername = "sql261.main-hosting.eu";
// $username = "u328098603_fathi";
// $password = "lalaLand123";
// $database = "u328098603_fathi";

//localpc
// $servername = "localhost";
// $username = "root";
// $password = "";
// $database = "epmfoundation";
 
// Create connection
$mysqli = new mysqli($servername, $username, $password, $database);


//Menentukan timezone //
date_default_timezone_set('Asia/Jakarta'); 

//Membuat variabel yang menyimpan nilai waktu //
$nama_hari 	= array("Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu");
$hari		= date("w");
$hari_ini 	= $nama_hari[$hari];

$tgl_sekarang = date("d");
$bln_sekarang = date("m");
$thn_sekarang = date("Y");

$tanggal 	= date("Y-m-d");  
$jam 		= date("H:i:s");

$query = $mysqli->query("SELECT * FROM setting");
$set = $query->fetch_array();


$lama = 1; // lama data yang tersimpan di database dan akan otomatis terhapus setelah 1 hari
// proses untuk melakukan penghapusan data otomatis CURDATE() untuk tanggal CURTIME() untuk jam
$del = $mysqli->query("DELETE FROM donasi WHERE status='pending' AND DATEDIFF(CURDATE(), end_date) > $lama");


function rupiah($angka){
	$hasil_rupiah = "Rp " . number_format($angka,0,',','.');
	return $hasil_rupiah;
}

function limit_words($string, $word_limit){
    $words = explode(" ",$string);
    return implode(" ",array_splice($words,0,$word_limit)).' ...';
}	
function convert_seo($kata) {
    $simbol = array ('-','/','\\',',','.','#',':',';','\',','"','[',']','{','}',')','(','|','`','~','!','@','%','$','^','&','*','=','?','+');
	
	//Menghilangkan simbol pada array $simbol
    $kata = str_replace($simbol, '', $kata); 
	//Ubah ke huruf kecil dan mengganti spasi dengan (-)
    $kata = strtolower(str_replace(' ', '-', $kata)); 
    
	return $kata;
}



?> 
