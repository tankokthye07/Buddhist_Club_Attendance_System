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
        <title>Sentient : Info Ahli</title>
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
                    <th><a class = "active" href = "AdminPage_Info_Ahli.php"> Info Ahli Kelab </a></th>
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
                            <img src = 'Buddhist_Logo.jpg' height = '600px' width = '500px' alt = "Buddhist Society">
                        </th>
                        <!--Pastikan Kelebaran Badan bersesuaian-->
                        <th width = 70%>
                            <table width = 100%>
                                <tr>         
                                    <th colspan = 4>
                                        <!--Tajuk Info Ahli-->
                                        <b><h1><center>Info Ahli Kelab</center></h1></b>
                                    </th>
                                </tr>
                                <tr><center>
                                    <th colspan = 3 style = "text-align: center;" >
                                        <?php
                                        //Menghubungkan dengan Pangkalan Data
                                        require('config.php');
                                        //Pengisytiharan Data dan Pengambilan Data daripada Pangkalan Data SQL
                                        $query1 = "SELECT AHLIKELAB.IDahli, AHLIKELAB.Nama, AHLIKELAB.Jantina, KODKELAS.Kelas FROM AHLIKELAB JOIN KODKELAS ON AHLIKELAB.Kodkelas = KODKELAS.Kodkelas;";
                                        $query2 = "SELECT KataLaluan FROM PENGGUNA";
                                         //Pengisytiharan pembolehubah dan menghubungkan query atas yang diperoleh dengan Pangkalan Data SQL
                                        $result1 = mysqli_query($con, $query1);
                                        $result2 = mysqli_query($con, $query2);
                                        //Jika Rekod disemak Benar dan wujud
                                        if ($result1 && $result2) {
                                            //Jika Kedua-dua Pemboleh-ubah mempunyai dan memulangkan nilai
                                            if (mysqli_num_rows($result1) > 0 && mysqli_num_rows($result2) > 0) {
                                                $bil = 1;
                                                //Menghasilkan 'Table' untuk mengisi data
                                                print "<center><table border = 1 cellpadding = 10 width = 80% height = 100%>";
                                                //Barisan Atasan Data Table
                                                print "<tr><th>Bil.</th><th>ID Ahli</th><th>Nama</th><th>Jantina</th><th>Kelas</th><th>Kata Laluan</th><th>Kemas Kini</th></tr></center>";
                                                //Ketika Rekod diambil adalah sama dengan barisan berdasarkan query di atas 
                                                while ($row1 = mysqli_fetch_assoc($result1) and $row2 = mysqli_fetch_assoc($result2)) {
                                                    //Pengisytiharan dan kongkongan pembolehubah untuk diikuti baris demi baris
                                                    $IDahli = $row1['IDahli'];
                                                    $link = "<a href = 'Kemaskini.php?IDahli=$IDahli'>UPDATE</a>"; 
                                                    //Barisan Badan yang akan diisi Data Baris demi Baris Mengikut Jenis Data
                                                    print "<tr>";
                                                    print "<td>".$bil."</td>";
                                                    print "<td>".$row1['IDahli']."</td>";
                                                    print "<td>".$row1['Nama']."</td>";
                                                    print "<td>".$row1['Jantina']."</td>";
                                                    print "<td>".$row1['Kelas']."</td>";
                                                    print "<td>".$row2['KataLaluan']."</td>";
                                                    print "<td>".$link."</td>";
                                                    print "</tr>";
                                                    $bil++;
                                                }
                                            //Penutup Table
                                            print "</table>";
                                            }
                                            //Jika Rekod tidak mempunyai nilai atau tidak memulangkan nilai
                                            else {
                                                //Maklumkan Pengguna bahawa Tiada rekod dijumpai
                                                print "Tiada rekod dijumpai.";
                                            }
                                        } 
                                        //Jika Rekod disemak Palsu dan tidak wujud
                                        else {
                                        print "Ada Masalah Info";
                                        }
                                        ?>
                                    </th>
                                </tr></center>
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

