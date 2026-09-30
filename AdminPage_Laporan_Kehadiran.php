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
                    <th><a class = "active" href = "AdminPage_Laporan_Kehadiran.php"> Laporan Kehadiran </a></th>
                    <!--Butang Navigasi ke Butiran Aktiviti-->
                    <th><a href = "AdminPage_Butiran_Aktiviti.php"> Butiran Aktiviti </a></th>
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
                            <img src = 'Buddhist_Logo.jpg' height = '600px' width = '500px' alt=  "Buddhist Society">
                        </th>
                        <!--Pastikan Kelebaran Badan bersesuaian-->
                        <th width = 70%>
                            <table width = 100%>
                                <br><br><br>
                                <tr>
                                    <th colspan = 4>
                                        <!--Tajuk Laporan Kehadiran-->
                                        <b><h1><center>Laporan Kehadiran Ahli</center></h1></b>
                                    </th>
                                </tr>
                                <!--Borang untuk diisi Data dan dihantar ke Kod Fail ini yang sama untuk pemprosesan di bawah-->
                                <form method = "POST">
                                    <tr>
                                        <!--Tempat Pilih Jenis Data ID Aktiviti-->   
                                        <td colspan = 1><center>
                                            <p>Isih Aktiviti</p>
                                        </td></center>
                                        <td colspan = 1>
                                            <select name = 'CarianKehadiran1' width = 100px> 
                                                <?php
                                                //Menghubungkan dengan Pangkalan Data
                                                require('config.php');
                                                //Untuk Memaparkan Query ID Aktiviti
                                                $sqlSelectKehadiran1 = "SELECT * FROM INFOAKTIVITI";
                                                $data = $con->query($sqlSelectKehadiran1);
                                                print "<option>Pilih ID Aktiviti</option>";
                                                if($data->num_rows > 0){
                                                    while($row = $data->fetch_assoc()){  
                                                        echo "<option value ='".$row['IDaktiviti']."'>".$row['IDaktiviti']."</option>";
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </td>
                                        <!--Tempat Pilih Jenis Data ID Aktiviti-->
                                        <td colspan = 1><center>
                                            <p>Isih Kehadiran</p>
                                        </td></center>
                                        <td colspan = 1>
                                            <select name = 'CarianKehadiran2' width = 100px> 
                                                <option value = "" title = "Sila Pilih Kehadiran">Pilih Kehadiran</option>
                                                <option value = "YA">Hadir</option>
                                                <option value = "TIDAK">Tidak Hadir</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <!--Makluman kepada Pengguna untuk Buat Isihan-->
                                        <td colspan = 2>
                                            <p><h6>Sila Isih ID Aktiviti dan Status</h6></p>
                                        </td>
                                        <!--Butang Hantar Data ke Bahagian Pemprosesan-->
                                        <td colspan = 1>
                                            <input type = "submit" name = "Cari" value = "Cari" title = "Cari dengan Isihan">
                                        </td>
                                        <!--Butang Cetak Maklumat-->
                                        <td colspan = 1>
                                            <button onclick = "printFilteredRecords()" title = "Cetak Senarai yang diisih">CETAK</button>
                                        </td>
                                    </tr>

                                    <tr>
                                        <?php
                                        //Menghubungkan dengan Pangkalan Data
                                        require('config.php');
                                        //Jika pembolehubah CarianKehadiran1 dan Carian Kehadiran dua telah diisytiharkan dan memulangkan nilai seta bukan dibiarkan kosong
                                        if (isset($_POST['CarianKehadiran1']) && !empty($_POST['CarianKehadiran1']) && isset($_POST['CarianKehadiran2']) && !empty($_POST['CarianKehadiran2'])) {
                                            //Pengisytiharan Data CarianKehadiran1 dan CarianKehadiran2 yang diambil daripada borang tadi serta Pengambilan Data yang diperolehi ke dalam Pangakalan Data dalam SQL
                                            $CarianKehadiran1 = $_POST['CarianKehadiran1'];
                                            $CarianKehadiran2 = $_POST['CarianKehadiran2'];
                                            $query1 = "SELECT KEHADIRAN.IDahli, AHLIKELAB.Nama, KEHADIRAN.IDaktiviti, KEHADIRAN.status FROM KEHADIRAN INNER JOIN AHLIKELAB ON KEHADIRAN.IDahli = AHLIKELAB.IDahli WHERE IDaktiviti = '$CarianKehadiran1' AND `status` = '$CarianKehadiran2'";
                                        } 
                                        //Jika pembolehubah CarianKehadiran1 sahaja telah diisytiharkan dan memulangkan nilai seta bukan dibiarkan kosong
                                        else if(isset($_POST['CarianKehadiran1']) && !empty($_POST['CarianKehadiran1'])) {
                                            //Pengisytiharan Data CarianKehadiran1 yang diambil daripada borang tadi serta Pengambilan Data yang diperolehi ke dalam Pangakalan Data dalam SQL
                                            $CarianKehadiran1 = $_POST['CarianKehadiran1'];
                                            $query1 = "SELECT KEHADIRAN.IDahli, AHLIKELAB.Nama, KEHADIRAN.IDaktiviti, KEHADIRAN.status FROM KEHADIRAN INNER JOIN AHLIKELAB ON KEHADIRAN.IDahli = AHLIKELAB.IDahli WHERE IDaktiviti = '$CarianKehadiran1'";
                                        } 
                                        //Jika pembolehubah Carian Kehadiran dua sahaja telah diisytiharkan dan memulangkan nilai serta bukan dibiarkan kosong
                                        else if(isset($_POST['CarianKehadiran2']) && !empty($_POST['CarianKehadiran2'])) {
                                            //Pengisytiharan Data CarianKehadiran2 yang diambil daripada borang tadi serta Pengambilan Data yang diperolehi ke dalam Pangakalan Data dalam SQL
                                            $CarianKehadiran2 = $_POST['CarianKehadiran2'];
                                            $query1 = "SELECT KEHADIRAN.IDahli, AHLIKELAB.Nama, KEHADIRAN.IDaktiviti, KEHADIRAN.status FROM KEHADIRAN INNER JOIN AHLIKELAB ON KEHADIRAN.IDahli = AHLIKELAB.IDahli WHERE status = '$CarianKehadiran2'";
                                        } 
                                        //Jika pembolehubah CarianKehadiran1 dan Carian Kehadiran dua tidak diisytiharkan dan tidak memulangkan nilai serta bukan dibiarkan kosong
                                        else {
                                            //Pengambilan Data yang diperolehi ke dalam Pangakalan Data dalam SQL Data yang diambil daripada borang tadi
                                            $query1 = "SELECT KEHADIRAN.IDahli, AHLIKELAB.Nama, KEHADIRAN.IDaktiviti, KEHADIRAN.status FROM KEHADIRAN INNER JOIN AHLIKELAB ON KEHADIRAN.IDahli = AHLIKELAB.IDahli";
                                        }
                                        //Pengisytiharan pembolehubah dan menghubungkan query atas yang diperoleh dengan Pangkalan Data SQL
                                        $result1 = mysqli_query($con, $query1);
                                        //Jika Rekod disemak Benar dan wujud
                                        if(mysqli_num_rows($result1) > 0) {
                                            $bil = 1;
                                            //Menghasilkan 'Table' untuk mengisi data
                                            print "<center><table border = '1' width = '100%'id = 'Isihan'>";
                                            //Barisan Atasan Data Table
                                            print "<tr><th>Bil.</th><th>ID Ahli</th><th>Nama</th><th>ID Aktiviti</th><th>Status</th></tr></center>";
                                            //Ketika Rekod diambil adalah sama dengan barisan berdasarkan query di atas 
                                            while($row1 = mysqli_fetch_assoc($result1)) {
                                                //Barisan Badan yang akan diisi Data Baris demi Baris Mengikut Jenis Data
                                                print "<tr>";
                                                print "<td>".$bil."</td>";
                                                print "<td>".$row1['IDahli']."</td>";
                                                print "<td>".$row1['Nama']."</td>";
                                                print "<td>".$row1['IDaktiviti']."</td>";
                                                print "<td>".$row1['status']."</td>";
                                                print "</tr>";
                                                $bil++;
                                            }
                                            //Penutup Table
                                            print "</table>";
                                        } 
                                        //Jika Rekod disemak Palsu dan tidak wujud
                                        else {
                                            //Maklumkan Pengguna bahawa Tiada rekod dijumpai
                                            print "<td>Tiada Rekod dijumpai</td>";
                                        }
                                        ?>
                                    </tr>
                                <form>
                            </table>
                        </th>
                    </tr>
                </table>
            </div>
            <br>
            <!--Guna Fungsi JavaScript-->
            <script>
                //Fungsi Mencetak Rekod yang Diisih
                function printFilteredRecords() {
                    //Pengisytiharan Pembolehubah melalui Table yang IDnya 'Isihan'
                    var filteredTable = document.getElementById("Isihan");
                    //Jika Disemak bahawa semua pembolehubah terlibat wujud dan benar
                    if (filteredTable && filteredTable.rows.length > 1) { 
                        //Pengisytiharan Proses Cetakan dan membuka halaman baharu
                        var printWindow = window.open('', '_blank');
                        //gaya cetakan laporan
                        printWindow.document.write('<html><head><title>Rekod Diisih</title></head><body>');
                        printWindow.document.write('<h1><center>JADUAL KEHADIRAN MURID</center></h1>');
                        printWindow.document.write(filteredTable.outerHTML);
                        printWindow.document.write('</body></html>');
                        //Penyempurnaan Laman Cetak
                        printWindow.document.close();
                        //Meminta Cetakan dan membuat Fungsi "Pop-Up" untuk meminta keizinan serta ketetapan cetakan
                        printWindow.print();
                    }
                    //JikaDisemak bahawa semua pembolehubah terlibat tidak wujud atau palsu
                    else {
                    //Maklumkan dengan "Pop-Up" bahawa tiada rekod untuk dicetak
                    alert("Tiada Rekod yang boleh Dicetak.");
                    }
                }
            </script>
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
