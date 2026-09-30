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
    </header>
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
                            <img src = 'Buddhist_Logo.jpg' height = '600px' width = '500px' alt=  "Buddhist Society">
                        </th>
                        <!--Pastikan Kelebaran Badan bersesuaian-->
                        <th width = 50%>
                            <table width = 100%>
                                <tr>
                                    <th colspan = 4>
                                        <!--Tajuk Laporan Kehadiran-->
                                        <b><h1><center>Butiran Aktiviti</center></h1></b>
                                    </th>
                                </tr>
                                <tr>
                                <!--Borang untuk diisi Data dan dihantar ke Proses Tambah Aktiviti-->
                                <form action = "ProsesTambahAktiviti.php" method = "POST">
                                    <!--Menghasilkan 'Table' untuk membuat Pelarasan Badan-->
                                    <table border = "0">
                                        <tr>    
                                            <th colspan = "2"><h1><center>Penambahan Aktiviti Baharu<center></h1>
                                        </tr>
                                        <tr>
                                            <!--Tempat Isi Data ID Aktiviti-->
                                            <td><p align = "right">ID Aktiviti</p></td>
                                            <td><input name= "IDaktiviti" size = "20" type = "text" placeholder = "ID Aktiviti" title = "Masukkan ID Aktiviti" required>
                                        </tr>
                                        <tr>
                                            <!--Tempat Isi Data Jenis Aktiviti-->
                                            <td><p align = "right">Jenis Aktiviti</p></td>
                                            <td><select name='Kodaktiviti' title = "Pilih Jenis Aktiviti">
                                            <?php
                                            require('config.php');
                                            //Untuk Memaparkan Query JENISAKTIVITI
                                            $sqlSelectJenisAktiviti = "SELECT * FROM  JENISAKTIVITI";
                                            $data = $con->query($sqlSelectJenisAktiviti);
                                            print "<option>Pilih Jenis Aktiviti</option>";
                                            if($data -> num_rows>0){
                                                while($row = $data -> fetch_assoc()){  
                                                    echo "<option value ='".$row['Kodaktiviti']."'>".$row['Jenisaktiviti']."</option>";
                                                }
                                            }                                    
                                            ?>
                                            </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <!--Tempat Pilih Jenis Tempat-->
                                            <td><p align ="right">Tempat</p></td>
                                            <td><select id = "PilihanTempat" name = "Tempat" title = "Pilih Tempat">
                                                <option value = "">Pilih Tempat</option>
                                                <option value = "Kelas 1C">Kelas 1C</option>
                                                <option value = "Dewan">Dewan</option>
                                                <option value = "BG2">BG2</option>
                                            </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <!--Tempat Pilih Tarikh-->
                                            <td><p align ="right">Tarikh</p></td>
                                            <td><input name= "Tarikh" size = "20" type = "date" placeholder = "Tarikh" title = "Masukkan Tarikh">
                                        </tr>
                                        <tr>
                                            <!--Butang Reset-->
                                            <td><center><input name = "reset" value = "Reset" type = "reset"></center></td>
                                            <!--Butang Hantar dan Daftar Aktiviti-->
                                            <td><input name = "submit" value = "Daftar" type = "submit" title = "Daftar Aktiviti"></td>
                                        </tr>
                                </form>
                                </tr>
                            </table>
                        </th>
                        <!--Pastikan Kelebaran Badan bersesuaian-->
                        <th width = "20%">
                            <div class="JSLogo">
                                <!--Masukkan Imej Logo Sekolah-->
                                <img src='JitSin_Logo.jpeg' width='100%' height='100%'>
                            </div>
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
