<?php
//Menghubungkan dengan Pangkalan Data
require ('config.php');

//Pengisytiharan IDahli yang diperolehi dari Borang DaftarAhli
$IDahli = $_POST ['IDahli'];
//Pengisytiharan KataLaluan yang diperolehi dari Borang DaftarAhli
$KataLaluan = $_POST ['KataLaluan'];
//Pengisytiharan Nama yang diperolehi dari Borang DaftarAhli
$Nama = $_POST ['Nama'];
//Pengisytiharan Jantina yang diperolehi dari Borang DaftarAhli
$Jantina = $_POST ['Jantina'];
//Pengisytiharan Kodkelas yang diperolehi dari Borang DaftarAhli
$Kodkelas = $_POST ['Kodkelas'];

//Pengisytiharan dan Pengisian Data yang diperolehi ke dalam Pangakalan Data dalam SQL
$sqlPengguna = "INSERT INTO PENGGUNA (IDahli, KataLaluan, Nama) VALUES ('$IDahli','$KataLaluan','$Nama')";
$sqlAhli = "INSERT INTO AHLIKELAB (IDahli, Nama, Jantina, Kodkelas) VALUES ('$IDahli','$Nama','$Jantina','$Kodkelas')";

//Melakukan Perhubungan dan Query dalam Pangkalan Data SQL
$resultPengguna = mysqli_query($con,$sqlPengguna);
$resultAhli = mysqli_query($con,$sqlAhli);

//Jika Data berjaya dihubungkan
if ($resultPengguna && $resultAhli) {
    //Maklumkan Data Berjaya Diisi
    print "<script>alert('Pendaftaran anda berjaya!');</script>";
    //Menuju Pengguna ke Borang LogMasuk
    print "<script>window.location='LogMasuk.php';</script>";
} 
//Jika Data gagal dihubungkan
else {
    //Jika Data diisi sudah wujud seperti dalam Pangkalan Data
    if (mysqli_errno($con) == 1062) { 
        //Maklumkan Pengguna bahawa Data Sama Sudah Wujud
        print "<script>alert('Pendaftaran akaun baharu gagal! Pengguna yang sama telah Wujud!');</script>";
        //Menuju Pengguna ke Borang DaftarAhli
        print "<script>window.location='DaftarAhli.php';</script>";
    } 
    //Jika Data tidak Wujud dalam Pangkalan Data dan Masih Bermasalah
    else {
        //Maklumkan Pengguna Pendaftaran Bermasalah
        print "<script>alert('Pendaftaran akaun baharu gagal!');</script>";
        //Menuju PEngguna ke Borang DaftarAhli
        print "<script>window.location='DaftarAhli.php';</script>";
    }
}