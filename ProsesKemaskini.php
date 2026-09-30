<?php
//Menghubungkan dengan Pangkalan Data
require('config.php');

//Pengisytiharan IDahli daripada Kemaskini
$IDahli = $_POST['IDahli'];
//Pengisytiharan Nama daripada Kemaskini
$Nama = $_POST['Nama'];
//Pengisytiharan Jantina daripada Kemaskini
$Jantina = $_POST['Jantina'];
//Pengisytiharan KodKElas daripada Kemaskini
$Kodkelas = $_POST['Kodkelas'];
//Pengisytiharan Kata Laluan daripada Kemaskini
$KataLaluan = $_POST['KataLaluan'];

//Membuat Pengemas Kinian Maklumat di Pangkalan Data SQL
$sql1 = "UPDATE AHLIKELAB SET Nama = '$Nama', Jantina = '$Jantina', Kodkelas = '$Kodkelas' WHERE IDahli = '$IDahli'";
$sql2 = "UPDATE PENGGUNA SET KataLaluan = '$KataLaluan' WHERE IDahli = '$IDahli'";
//Pengisytiharan pembolehubah dan membuat kemas kini yang diperoleh ke Pangkalan Data SQL
$result1 = mysqli_query($con, $sql1);
$result2 = mysqli_query($con, $sql2);
//Jika Kemas kini berjaya dibuat
if ($result1 && $result2) {
    //Maklumkan Kemas Kini Berjaya dibuat
    print "<script>alert('Kemas kini berjaya dibuat!');</script>";
    //Menuju Pengguna ke AdminPage_Info_Ahli
    print "<script>window.location = 'AdminPage_Info_Ahli.php'</script>";
} 
//Jika Kemas Kini Gagal Dibuat
else {
    //Maklumkan Kemas Kini Gagal Dibuat
    print "<script>alert('Ada Masalah Membuat Kemas Kini');</script>";
    //Menuju Pengguna ke AdminPage_Info_Ahli
    print "<script>window.location = 'AdminPage_Info_Ahli.php'</script>";
}
?>
