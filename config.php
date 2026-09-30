<?php
//Koleksi sqli membawa semua definisi pembolehubah di atas ke phpaAdmin dalam xampp
$con = mysqli_connect("localhost","root","");

//jika tidak dapat menghubungkan dengan pangkalan data
if (!$con)
{
    //die-php menghapuskan fungsi pada masa itu jika tidak dapat membuat hubungan ke pangkalan data
    die ('Sambungan kepada Pangkalan Data Gagal'.mysqli_connect_error());
}
//menghubungkan pangkalan data
mysqli_select_db($con,"tankt070313070135");

?>