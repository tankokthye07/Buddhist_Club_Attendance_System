<?php
//Mula Session
session_start();
//Jika 'noKPadmin' telah diisytiharkan dan memulangkan nilai DAN Data Session dipulangkan adalah benar
if (isset($_SESSION['noKPadmin']) && $_SESSION ['LogMasuk'] == true){
?>
<!DOCTYPE html>
<!--Menghubungkan Fail CSS dengan html ini untuk mendirikan Antara Muka yang Diingini-->
<link rel = "stylesheet" type = "text/css" href = "stylesheetAdmin.css">
<!--Bermula html-->
<html>
    <!--Bahagian Tajuk html-->
    <head>
        <!--Menunujukkan Nama Sistem-->
        <title>Sentient</title>
    </head>
    <!--Bermula Bahagian Atasan html-->
    <header>
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
                    <!--Butang Navigasi ke Menu Utama-->
                    <th><a href = "AdminPage_MenuUtama.php"> Menu Utama </a></th>
                    <!--Butang Navigasi ke Laporan Kehadiran-->
                    <th><a href = "AdminPage_Laporan_Kehadiran.php"> Laporan Kehadiran </a></th>
                    <!--Butang Navigasi ke Butiran Aktiviti-->
                    <th><a href = "AdminPage_Butiran_Aktiviti.php"> Butiran Aktiviti </a></th>
                    <!--Butang Navigasi ke Info Ahli-->
                    <th><a href = "AdminPage_Info_Ahli.php"> Info Ahli Kelab </a></th>
                    <!--Butang Navigasi ke Import Data-->
                    <th><a class = "active" href = "AdminPage_Import_Data.php"> Import Data </a></th>
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
                    <th width = 70%><center>
                        <b><h1>Borang Import Maklumat Kelas</h1></b>
                        <br>
                        <!--Borang untuk diisi Fail Data-->
                        <form method = "POST" enctype = 'multipart/form-data'>
                            <!--Menghasilkan 'Table' yang disesuaikan dengan data diperolehi-->
                            <table style = "width:fit-content;">
                            <tr>
                                <!--Tempat Mengimport Data-->
                                <td>Click to Import>>>
                                <input styles = "font-size:18;" type = 'file' name = 'KodKelas' title = "Pilih Fail untuk Diimport ke Pangkalan Data (Jenis Kelas Sahaja)" required>
                                </td>
                            </tr>
                            <td>
                                <p align = "left">Sila Pilih File Jenis CSV</p>
                            <td>
                                <!--Tempat Menghantar Fail-->
                                <td style = "text-align:right">
                                <input type = "submit" name = "import" value = "Import" title = "Teruskan Proses Import"></td>
                            </tr>
                            </table>
                        </form>
                        <?php
                        //Menghubungkan dengan Pangkalan Data
                        require('config.php');
                        //Jika Ruangan Mempunyai Fail
                        if(isset($_POST['import'])){
                            //Jika Fail nama didapati merupakan KodKelas
                            if($_FILES['KodKelas']['name']){
                                //Membuka File ini dan diisytiharkan
                                $arrFilename=explode('.',$_FILES['KodKelas']['name']);
                                //Jika File didapati ialah jenis CSV
                                if($arrFilename[1]=="csv"){
                                    //Membuka File ini dalam template tertentu
                                    $handle=fopen($_FILES['KodKelas']['tmp_name'],"r");
                                    //Ketika Fail jenis CSV yang didapati tiada Masalah dan berada dalam limitasi yang tertentu
                                    while(($data=fgetcsv($handle,1000,","))!==FALSE){
                                        //berhubung dengan Pangkalan Data untuk diimport ke dalam Jadual KODKELAS
                                        $item1=mysqli_real_escape_string($con,$data[0]);
                                        $item2=mysqli_real_escape_string($con,$data[1]);
                                        $import="INSERT INTO KodKelas VALUES('$item1','$item2')";
                                        mysqli_query($con,$import);
                                    }
                                //Tutup proses Pembukaan Fail 
                                fclose($handle);
                                //Maklumkan Data Kelas Berjaya diimport dan menuju Pengguna ke Halaman Import
                                print "<script>window.alert('Data Kelas Berjaya Diimport');
                                windows.location.href='AdminPage_Import_Data.php';</script>";
                                }
                            }
                        }
                        ?>
                    </th></center>
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
