<?php
//Mula Session
session_start();
//Umpukkan Semua Session yang relevan kepada 0
session_unset();
//Hapuskan Session dan Tutup Proses
session_destroy();
//Maklumkan Pengguna sudah log keluar
print "<script>alert('Anda sudah Log Keluar');</script>";
//Menuju Pengguna ke Menu Utama Awam
print "<script>window.location.replace('Index.php');</script>";
exit;
?>