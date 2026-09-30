<?php
//Menghubungkan dengan Pangkalan Data
require ('config.php');

//Pengisytiharan IDahli yang diperolehi dari Borang AhliPage_Pengesahan_Kehadiran
$IDahli = $_POST['IDahli'];
//Pengisytiharan IDaktiviti yang diperolehi dari Borang AhliPage_Pengesahan_Kehadiran
$IDaktiviti = $_POST['IDaktiviti'];
//Pengisytiharan Status yang diperolehi dari Borang AhliPage_Pengesahan_Kehadiran
$Status = $_POST['Status'];

//Pengisytiharan dan Pengambilan Data yang diperolehi ke dalam Pangakalan Data dalam SQL
$filter1 = mysqli_query($con, "SELECT * FROM AHLIKELAB WHERE IDahli = '$IDahli'");
$filter2 = mysqli_query($con, "SELECT * FROM INFOAKTIVITI WHERE IDaktiviti = '$IDaktiviti'");

//Menyemak Kedua-dua Rekod sama ada Benar atau Palsu
$test = mysqli_num_rows($filter1) && mysqli_num_rows($filter2);
//Jika Rekod disemak Benar dan sama seperti dalam Pangkalan Data
if ($test > 0) {
    //Pengisytiharan dan Pengisian Data yang diperolehi ke dalam Pangakalan Data dalam SQL
    $hadir = "INSERT INTO KEHADIRAN (IDahli, IDaktiviti, `status`) VALUES ('$IDahli', '$IDaktiviti', '$Status')";
        //Jika Rekod berhubung dengan Pangkalan Data dan berjaya diisi
        if (mysqli_query($con, $hadir)) {
            //Maklumkan Pengguna bahawa Kehadiran Berjaya direkod dan Menuju Pengguna ke Menu Utama
            print "<script>alert('Kehadiran Anda Telah Direkod!');</script>";
            print "<script>window.location='AhliPage_MenuUtama.php';</script>";
        }
        //Jika Rekod tidak berhubung dengan Pangkalan Data atau gagal diisi
        else {
            //Maklumkan Pengguna bahawa Kehadiran Gagal direkod dan Menuju Pengguna ke Borang Pengesahan Kehadiran Sekali lagi
            print "<script>alert('Ada Masalah Mengisi Maklumat Anda, Sila Cuba Nanti.');</script>";
            print "<script>window.location='AhliPage_Pengesahan.php';</script>";
        }
} 
//Jika Rekod disemak palsu 
else {
    echo "<script>alert('Maklumat Diisi Ada Kesalahan! Sila Cuba Lagi.');</script>";
    echo "<script>window.location='AhliPage_Pengesahan.php';</script>";
 }
?>