<?php
session_start();
error_reporting();
ob_start();
include "admin/config.php";
include "func/func_date.php";

$content  = (isset($_GET['content'])) ? $_GET['content'] : "home";
$kosong   = true;
$page     = array('home','tentang-kami','program','program-all','acara','acara-all','blog','blog-all','sukarelawan/index','sukarelawan/dashboard','sukarelawan/profile','sukarelawan/profile-edit','sukarelawan/ubah-password');
foreach($page as $pg){
  if($content == $pg and $kosong){
    
      include 'website/'.$pg.'.php';
      $kosong = false;
    
  }
}

if($kosong) include 'website/404.php';
?>
