<?php
//Menghubungkan dengan Pangkalan Data
require ('config.php');
//Mula Session
session_start();

//Pengisytiharan pembolehubah KPadmin dan LogMasuk melalui Session Dengan Data 
$_SESSION['noKPadmin'] = $_POST['IDahli'];
$_SESSION['LogMasuk'] = true;
//Pengisytiharan IDahli yang diperolehi dari Borang LogMasuk
$IDahli = $_POST ['IDahli'];
//Pengisytiharan KataLaluan yang diperolehi dari Borang LogMasuk
$KataLaluan = $_POST ['KataLaluan'];

//Pengisytiharan dan Pengambilan Data yang diperolehi ke dalam Pangakalan Data dalam SQL
$rekod = mysqli_query($con,"SELECT * FROM PENGGUNA WHERE IDahli = '$IDahli' AND KataLaluan = '$KataLaluan' ");
//Menyemak Rekod sama ada Benar atau Palsu
$hasil = mysqli_num_rows($rekod);

//Jika Kedua-dua data diisi adalah "admin"
if($IDahli == 'admin' && $KataLaluan == 'admin') {
    //Maklumkan Log Masuk Admin Berjaya
    print "<script>alert('Selamat Datang Pengurus Sistem!');</script>";
    //Menuju Pengguna ke Menu Utama Pengurus
    print "<script>window.location='AdminPage_MenuUtama.php';</script>";
    } 
    //Jika Data yang diisi bukan "admin"
    else {
        //Jika Data disemak adalah Benar dan Sama seperti Pangkalan Data
        if($hasil>0) {
            //Maklumkan Log Masuk Ahli Berjaya
            print "<script>alert('Selamat Datang Ahli Kelab!');</script>";
            //Menuju Pengguna ke  Menu Utama Ahli
            print "<script>window.location='AhliPage_MenuUtama.php';</script>";
        } 
        //Jika Data disemak adalah palsu dan tidak Sama seperti Pangkalan Data
        else {
            //Maklumkan Pengguna Log Masuk Gagal akibat Kesalahan
            print "<script>alert('Ada Masalah Maklumat.Sila Cuba Lagi!');</script>";
            //Menuju Pengguna ke Borang LogMasuk
            print "<script>window.location = 'LogMasuk.php';</script>";
        }
    }
?>
