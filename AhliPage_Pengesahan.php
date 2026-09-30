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
                <!--Butang Navigasi ke Menu Utama Awam-->
                <table>
                    <!--Butang Navigasi ke Menu Utama Awam-->
                    <th><a href = "AhliPage_MenuUtama.php"> Menu Utama </a></th>
                    <!--Butang Navigasi ke Pengesahan Kehadiran-->
                    <th><a class = "active" href = "AhliPage_Pengesahan.php"> Pengesahan Kehadiran </a></th>
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
                        <img src = 'Buddhist_Logo.jpg' height = 600px width = 500px alt = "Buddhist Society">
                    </th>
                    <!--Pastikan Kelebaran Badan bersesuaian-->
                    <th width = 50%>
                        <!--Menghasilkan 'Table' untuk membuat Pelarasan Badan-->
                        <table>
                            <!--Borang untuk diisi Data dan dihantar ke Kehadiran-->
                            <form action = "Kehadiran.php" method = "POST">
                                <tr>
                                    <!--Tajuk Borang Pengesahan Kehadiran-->
                                    <th colspan = "2"><h1><center>Pengesahan Kehadiran Aktiviti<center></h1>
                                </tr>
                                <tr>
                                    <!--Tempat Isi Data IDahli-->
                                    <td><p align ="right">ID Ahli</p></td>
                                    <td><input name= "IDahli" size = "20" type = "text" placeholder = "ID Anda" 
                                        pattern = "([0-9]{5})||[A-Za-z]{5}" oninvalid = "setCustomValidity('Sila masukkan 5 digit nombor.')"
                                        oninput="setCustomValidity('')" title = "Sila Masukkan ID Ahli"></td>
                                </tr>
                                <tr>
                                    <!--Tempat Isi Data IDaktiviti-->
                                    <td><p align = "right">ID Aktiviti</p></td>
                                    <td><select name='IDaktiviti' title = "Pilih Tarikh Aktiviti">
                                        <?php
                                        require('config.php');
                                        //Untuk Memaparkan Query ID Aktiviti
                                        $sqlSelectaktiviti = "SELECT * FROM  INFOAKTIVITI";
                                        $data = $con->query($sqlSelectaktiviti);
                                        print "<option>Pilih ID Kehadiran</option>";
                                        if($data -> num_rows>0){
                                            while($row = $data -> fetch_assoc()){  
                                                echo "<option value ='".$row['IDaktiviti']."'>".$row['IDaktiviti']."</option>";
                                            }
                                        }                                    
                                        ?>
                                    </select>
                                    </td>
                                </tr>
                                <tr>
                                    <!--Tempat Isi Data Status-->
                                    <td><p align = "right">Status Kehadiran</p></td>
                                    <td><select id = "PilihanStatus" name = "Status" title = "Pilih Status Kehadiran">
                                        <option value = "">Pilih Status Kehadiran</option>
                                        <option value = "YA">YA</option>
                                        <option value = "TIDAK">TIDAK</option>
                                    </select>
                                    </td>
                                <tr>
                                    <!--Butang Reset-->
                                    <td><center><input name = "reset" value = "Reset" type = "reset"></center></td>
                                    <!--Butang Hantar Data Menuju ke Kehadiran-->
                                    <td><center><input name = "submit" value = "Sah Kehadiran" type = "submit"></center></td>
                                </tr>
                            </form>
                        </table>
                    </th>
                    <!--Pastikan Kelebaran Badan bersesuaian-->
                    <th width = 20%>
                        <!--Masukkan Imej Logo Sekolah-->
                        <img src = 'JitSin_Logo.jpeg' width = 100% height = 100% >
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

