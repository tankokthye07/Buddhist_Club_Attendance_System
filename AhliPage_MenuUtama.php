<?php
//Mula Session
session_start();
//Jika 'noKPadmin' telah diisytiharkan dan memulangkan nilai DAN Data Session dipulangkan adalah benar
if (isset($_SESSION['noKPadmin']) && $_SESSION ['LogMasuk'] == true){
?>
<!DOCTYPE html>
<!--Menghubungkan Fail CSS dengan html ini untuk mendirikan Antara Muka yang Diingini-->
<link rel = "stylesheet" type = "text/css" href = "stylesheetAhli.css">
<!--Bermula html-->
<html>
    <!--Bahagian Tajuk html-->
    <head>
        <!--Menunujukkan Nama Sistem-->
        <title>Sentient</title>
    </head>
        <header>
            <!--Bermula Bahagian Atasan html-->
            <!--Membuat Penceraian kepada lebih banyak Divisi untuk menyesuaikan Antara Muka yang Berhemah-->
            <div class = "mainheader">
                <h1><center>Sentient</center></h1>
            </div>
            <br>
            <!--Membuat Penceraian kepada lebih banyak Divisi untuk menyesuaikan Antara Muka yang Berhemah-->
            <div class = "navbar">
            <center>
                <!--Menghasilkan 'Table' untuk membuat Bar Navigasi-->
                <table>
                    <!--Butang Navigasi ke Menu Utama -->
                    <th><a class = "active" href = "AhliPage_MenuUtama.php"> Menu Utama </a></th>
                    <!--Butang Navigasi ke Pengesahan Kehadiran-->
                    <th><a href = "AhliPage_Pengesahan.php"> Pengesahan Kehadiran </a></th>
                    <!--Butang Navigasi ke Log Keluar-->
                    <th><a href = "LogKeluar.php"> Log Keluar </a></th>
                </table>
            </center>
            </div>
        </header>
        <!--Bermula Bahagian Tengah html-->
        <body><center>
        <br>
        <!--Membuat Penceraian kepada lebih banyak Divisi untuk menyesuaikan Antara Muka yang Berhemah-->
        <div class = "showcase">
            <!--Menghasilkan 'Table' untuk membuat Pelarasan Badan-->
            <table>
                <tr>
                    <!--Pastikan Kelebaran Badan bersesuaian-->
                    <th width = 30%>
                        <!--Masukkan Imej Logo Kelab-->
                        <img src = 'Buddhist_Logo.jpg' height = 600px width = 500px alt = "Buddhist Society">
                    </th>
                    <!--Pastikan Kelebaran Badan bersesuaian-->
                    <th width = 50%>
                        <!--Pengenalan Kelab Agama Buddha-->
                        <p><h2>Selamat Datang Ke Kelab Agama Buddha</h2></p>
                        <p>Masyarakat Buddha menganut ajaran Buddha, memberi tumpuan kepada hikmah,</p>
                        <p>belas kasihan, dan kebebasan dari penderitaan.</p>
                        <p>Agama Buddha membentuk pelbagai aspek kehidupan, termasuk interaksi sosial,</p>
                        <p>pemerintahan, seni, dan pendidikan.</p>
                        <p>Nilai-nilai pusat termasuk belas kasihan dan keterhubungan, bertujuan untuk </p>
                        <p>harmoni dan mengurangkan penderitaan.</p>
                        <p>Dari komuniti biara kepada kehidupan seharian, masyarakat Buddha menyesuaikan diri</p>
                        <p>dengan zaman moden sambil mengekalkan ajaran tradisional, mereka tetap menjadi pusat</p>
                        <p>penyelidikan spiritual dan tindakan berbelas kasihan, memperkaya kehidupan secara global.</p>
                    </th>
                    <!--Pastikan Kelebaran Badan bersesuaian-->
                    <th width = 20%>
                        <!--Masukkan Imej Logo Sekolah-->
                        <img src = 'JitSin_Logo.jpeg' width = 100% height = 100%>
                    </th>
                </tr>
            </table>
        </div>
        <br>
    </body></center>
    <!--Bermula Bahagian Bawahan html-->
    <footer>
        <!--Hak Cipta-->
        <p><center>Hak Cipta @ Tan Kok Thye SPM 24/25</center></p>
    </footer>
</html>
<?php 
   } 
   //Jika Tidak diisytiharkan dan tidak memulangkan nilai DAN Data Session dipulangkan adalah palsu
   else {
    //Maklumkan Pengguna untuk Log Masuk Dahulu dan Menuju Pengguna ke Menu Utama Awam
    print "<script>alert('Sila Log Masuk Terlebih Dahulu');
    window.location.replace('Index.php');</script>";
   }
?>
