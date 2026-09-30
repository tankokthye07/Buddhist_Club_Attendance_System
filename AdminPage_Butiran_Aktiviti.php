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
                    <th><a class = "active" href = "AdminPage_Butiran_Aktiviti.php"> Butiran Aktiviti </a></th>
                    <!--Butang Navigasi ke Info Ahli-->
                    <th><a href = "AdminPage_Info_Ahli.php"> Info Ahli Kelab </a></th>
                    <!--Butang Navigasi ke Import Data-->
                    <th><a href = "AdminPage_Import_Data.php"> Import Data </a></th>
                    <!--Butang Navigasi ke Log Keluar-->
                    <th><a href = "LogKeluar.php"> Log Keluar </a></th>
                </table>
            </center>
        </div>
    </header>
    <!--Bermula Bahagian Tengah html-->
    <body>
        <center>
            <br>
            <!--Membuat Penceraian kepada lebih banyak Divisi untuk menyesuaikan Antara Muka yang Berhemah-->
            <div class = "showcase">
                <!--Menghasilkan 'Table' untuk membuat Pelarasan Badan-->
                <table>
                    <tr>
                        <!--Pastikan Kelebaran Badan bersesuaian-->
                        <th width = 30%>
                            <!--Masukkan Imej Logo Kelab-->
                            <img src = 'Buddhist_Logo.jpg' height = '600px' width = '500px' alt=  "Buddhist Society" float = left>
                        </th>
                        <!--Pastikan Kelebaran Badan bersesuaian-->
                        <th width = 70%>
                            <!--Pastikan Kelebaran Badan bersesuaian-->
                            <table width = 100%>
                                <tr>
                                    <th colspan = 4>
                                        <b><h1><center>Butiran Aktiviti</center></h1></b>
                                    </th>
                                </tr>
                                <tr>
                                    <!--Borang untuk diisi Data dan dihantar ke Butiran-->
                                    <form method = "POST">
                                        <th colspan = 1 style = "text-align: right;"><center>
                                        </th></center>
                                        <th colspan = 3 style = "text-align: left;" >
                                        <?php
                                        //Menghubungkan dengan Pangkalan Data
                                        require('config.php');
                                        //Pengisytiharan Query dan Mengisih melalui pilihan semua data daripada INFOAKTIVITI
                                        $query = "SELECT * FROM INFOAKTIVITI";
                                        //Pengisytiharan pembolehubah dan menghubungkan query atasyang diperoleh dengan Pangkalan Data SQL
                                        $result = mysqli_query($con, $query);
                                        //Jika Rekod disemak Benar dan wujud
                                        if(mysqli_num_rows($result) > 0) {
                                            $bil = 1;
                                            //Menghasilkan 'Table' untuk mengisi data
                                            print "<center><table border='1' cellpadding='10' width = 80% height = 100%>";
                                            //Barisan Atasan Data Table
                                            print "<tr><th>Bil.</th><th>ID Aktiviti</th><th>Kod Aktiviti</th><th>Tempat Aktiviti</th><th>Tarikh</th></tr></center>";
                                            //Ketika Rekod diambil adalah sama dengan barisan berdasarkan query di atas 
                                            while($row = mysqli_fetch_assoc($result)) {
                                                //Barisan Badan yang akan diisi Data Baris demi Baris Mengikut Jenis Data
                                                print "<tr>";
                                                print "<td>".$bil."</td>";
                                                print "<td>".$row['IDaktiviti']."</td>";
                                                print "<td>".$row['Kodaktiviti']."</td>";
                                                print "<td>".$row['Tempat']."</td>";
                                                print "<td>".$row['Tarikh']."</td>";
                                                print "</tr>";
                                                $bil++;
                                            }
                                        //Penutup Table
                                        print "</table>";
                                        } 
                                        //Jika Rekod disemak Palsu dan tidak wujud
                                        else {
                                            //Maklumkan Pengguna bahawa Tiada rekod dijumpai
                                            print "Tiada rekod dijumpai.";
                                        }
                                        ?>
                                        <br><br>
                                        </th>
                                    </form>
                                    <tr>
                                        <th colspan = 2>
                                        <td>
                                        <!--Borang Tambah Aktiviti-->
                                        <form action = "Tambah_Butiran_Aktiviti.php" method = "POST">
                                            <!--Butang Hantar Data ke Proses Tambah Aktiviti-->
                                            <input type = "submit" name = "submit" value = "Tambah Aktiviti" title = "Ke Laman Menambah Aktiviti">
                                        </form>
                                        </td>
                                        </th>
                                    </tr>
                                </tr>
                            </table>
                        </th>
                    </tr>
                </table>
            </div>
            <br>
        </center>
    </body>
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

