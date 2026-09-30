<?php
//Menghubungkan dengan Pangkalan Data
require ('config.php');

//Pengisytiharan IDaktiviti daripada Borang Tambah Aktiviti
$IDaktiviti = $_POST ['IDaktiviti'];
//Pengisytiharan Kodaktiviti daripada Borang Tambah Aktiviti
$Kodaktiviti = $_POST ['Kodaktiviti'];
//Pengisytiharan Tempat daripada Borang Tambah Aktiviti
$Tempat = $_POST ['Tempat'];
//Pengisytiharan Tarikh daripada Borang Tambah Aktiviti
$Tarikh = $_POST ['Tarikh'];

//Pengisytiharan dan Pengisian Data ke dalam PAngkalan Data
$sqlButiran = "INSERT INTO INFOAKTIVITI (IDaktiviti, Kodaktiviti, Tempat, Tarikh) VALUES ('$IDaktiviti','$Kodaktiviti','$Tempat','$Tarikh')";
//Membuat perhubungan dan menyemak sama ada fungsi disiapkan
$result = mysqli_query($con,$sqlButiran);
//Jika Perhubungan Berjaya
if ($result) {
    //Maklumkan Perhubungan berjaya
    print "<script>alert('Penambahan Aktiviti anda berjaya!');</script>";
    //Menuju Pengguna ke Halaman Butiran Aktiviti
    print "<script>window.location='AdminPage_Butiran_Aktiviti.php';</script>";
} 
//Jika Perhubungan Gagal
else {
    //Jika Aktiviti yang sama telah wujud
    if (mysqli_errno($con) == 1062) { 
        //Maklumkan Pengguna Aktiviti sama sudah wujud
        print "<script>alert('Penambahan Aktiviti baharu gagal! Aktiviti yang sama telah Wujud!');</script>";
    } 
    //Jika Bukan Persamaan Aktiviti
    else {
        //Maklumkan Pengguna Aktiviti tidak dapat didaftar
        print "<script>alert('Penambahan Aktiviti baharu gagal!');</script>";
    }
}
?>
