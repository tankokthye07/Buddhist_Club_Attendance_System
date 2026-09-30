<?php
//Mula Session
session_start();
//Jika 'noKPadmin' telah diisytiharkan dan memulangkan nilai DAN Data Session dipulangkan adalah benar
if (isset($_SESSION['noKPadmin']) && $_SESSION ['LogMasuk'] == true){
?>
<!DOCTYPE html>
<!--Menghubungkan Fail CSS dengan html ini untuk mendirikan Antara Muka yang Diingini-->
<link rel="stylesheet" type="text/css" href="stylesheetAdmin.css">
<!--Bermula html-->
<html>
    <!--Bahagian Tajuk html-->
    <head>
        <!--Menunujukkan Nama Sistem-->
        <title>Sentient - Kemaskini Info Ahli </title> 
    </head>
    <!--Bermula Bahagian Atasan html-->
    <header>
        <!--Membuat Penceraian kepada lebih banyak Divisi untuk menyesuaikan Antara Muka yang Berhemah-->
        <div class = "mainheader">
            <h1><center>Sentient</center></h1>
        </div>
    </header>
    <body>
        <center>
            <!--Membuat Penceraian kepada lebih banyak Divisi untuk menyesuaikan Antara Muka yang Berhemah-->
            <div class="showcase">
                <h1>Kemas Kini Info Ahli</h1>
                <?php
                //Menghubungkan dengan Pangkalan Data
                require('config.php');
                //Pengisytiharan IDahli yang didapati daripada Link UPDATE di Info Ahli Kelab
                $IDahli = $_GET['IDahli'];
                //Pengisytiharan Data dan membuat query berdasarkan Pangkalan Data SQL
                $sql1 = "SELECT * FROM AHLIKELAB WHERE IDahli = '$IDahli'";
                $sql2 = "SELECT KataLaluan FROM PENGGUNA WHERE IDahli = '$IDahli'";
                //Pengisytiharan pembolehubah dan menghubungkan query atas yang diperoleh dengan Pangkalan Data SQL
                $result1 = mysqli_query($con, $sql1);
                $result2 = mysqli_query($con, $sql2);
                //Pengambilan Data daripada Pangkalan Data
                $row1 = mysqli_fetch_array($result1);
                $row2 = mysqli_fetch_array($result2);
                //Pengisytiharan untuk memaparkan maklumat barisan demi barisan
                $Nama = htmlspecialchars($row1['Nama'], ENT_QUOTES);
                $Jantina = $row1['Jantina'];
                $Kodkelas = $row1['Kodkelas'];
                $KataLaluan = $row2['KataLaluan'];
                ?>
                <!--Borang untuk mengemas kini maklumat dan dihantar ke ProsesKemasKini-->
                <form action="ProsesKemaskini.php" method="POST">
                    <!--Menghasilkan 'Table' untuk membuat Pelarasan Badan-->
                    <table><center>
                        <!--Tempat Kemas Kini ID Ahli-->
                        <p>ID Ahli : <b><?php print $IDahli; ?></b></p>
                        <input type = "hidden" name = "IDahli" value = "<?php print $IDahli; ?>" title = "Masukkan ID Ahli">
                        <!--Tempat Kemas Kini  Nama-->
                        <p>Nama : <input name="Nama" type="text" size="30" value="<?php print $Nama; ?>" title = "Masukkan Nama"></p>
                        <!--Tempat Kemas Kini Jantina-->
                        <p>Jantina :<select id = "PilihanJantina" name = "Jantina" title = "Pilih Jantina">
                                <option value = "">Pilih Jantina</option>
                                <option value = "Lelaki">Lelaki</option>
                                <option value = "Perempuan">Perempuan</option>
                            </select></p>
                        <!--Tempat Kemas Kini Kelas-->
                        <p>Kelas :<select id="PilihanKelas" name='Kodkelas' width="100px" title = "Pilih Kelas"> 
                            <?php
                            require('config.php');
                            //Untuk Memaparkan Query KODKELAS
                            $sqlSelectKelas = "SELECT * FROM KODKELAS";
                            $data = $con->query($sqlSelectKelas);
                            print "<option value=''>Pilih Kelas</option>";
                            if($data->num_rows > 0){
                                while($row = $data->fetch_assoc()){  
                                    print "<option value='".$row['Kodkelas']."'>".$row['Kelas']."</option>";
                                }
                             }
                             ?>
                            </select></p>
                        <!--Tempat Kemas Kini Kata Laluan-->
                        <p>Kata Laluan : <input name = "KataLaluan" type = "text" size = "20" value = "<?php print $KataLaluan; ?>"></p>
                        <!--Butang Hantar untuk dikemas kini-->
                        <p><input type = "submit" value = "Kemas Kini" title = "Laku Kemas Kini"></p>
                    </table></center>
                </form>
            </div>
        </center>
    <!--Bermula Bahagian Bawahan html-->
    <footer>
        <!--Hak Cipta-->
        <p><center>Hak Cipta @ Tan Kok Thye SPM 24/25</center></p>
    </footer>
</body>
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