<?php
if (empty($_FILES['file'])) {
    exit();
}
$temp = explode(".", $_FILES["file"]["name"]);
$newfilename = round(microtime(true)).'.'.end($temp);
$destination = '../img/'.$newfilename;
if (!move_uploaded_file($_FILES['file']['tmp_name'], $destination)) {
    echo "gagal";
}else{
    echo $destination;
} 
?>