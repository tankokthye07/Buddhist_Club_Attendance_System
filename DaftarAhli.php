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
    <!--Bermula Bahagian Tengah html-->
    <body><center>
        <br>
        <!--Membuat Penceraian kepada lebih banyak Divisi untuk menyesuaikan Antara Muka yang Berhemah-->
        <div class = "showcase">
            <!--Menghasilkan 'Table' untuk membuat Pelarasan Badan-->
            <table>
                <tr>
                    <!--Pastikan Kelebaran Data bersesuaian-->
                    <th width = 30%>
                        <!--Masukkan Imej Logo Kelab-->
                        <img src = 'Buddhist_Logo.jpg' height = '600px' width = '500px' alt=  "Buddhist Society">
                    </th>
                    <!--Badan Borang Pendaftaran Ahli-->
                    <!--Pastikan Kelebaran Badan bersesuaian-->
                    <th width = 45%>
                        <!--Membuat Borang untuk mengumpul Data dan Dihantar ke ProsesDaftar-->
                        <form action = "ProsesDaftar.php" method = "POST">
                            <!--Menghasilkan 'Table' untuk membuat Pelarasan Badan-->
                            <table border = 0>
                                <tr>
                                    <!--Tajuk Borang-->    
                                    <th colspan = "2"><h1><center>Pendaftaran Ahli Kelab Baharu<center></h1>
                                </tr>
                                <tr>
                                    <!--Tempat Isi Data IDahli-->
                                    <td><p align ="right">ID Ahli</p></td>
                                    <td><input name= "IDahli" size = "20" type = "text" placeholder = "ID Anda" title = "Masukkan ID Ahli Anda" pattern = "([0-9]{5})"
                                    = oninvalid = "setCustomValidity('Sila masukkan 5 digit nombor.')"oninput="setCustomValidity('')" required></td>
                                </tr>
                                <tr>
                                    <!--Tempat Isi Data Nama-->
                                    <td><p align ="right">Nama</p></td>
                                    <td><input name= "Nama" size = "20" type = "text" placeholder = "Nama Anda" title = "Masukkan Nama Anda" required></td>
                                </tr>
                                <tr>
                                    <!--Tempat Pilih Data Jantina-->
                                    <td><p align ="right">Jantina</p></td>
                                    <td><select id = "PilihanJantina" name = "Jantina" title = "Pilih Jantina Anda">
                                        <option value = "">Pilih Jantina</option>
                                        <option value = "Lelaki">Lelaki</option>
                                        <option value = "Perempuan">Perempuan</option>
                                    </select>
                                    </td>
                                </tr>
                                <tr>
                                    <!--Tempat Pilih Data KodKelas yang dipetik daripada Pangkalan Data SQL-->
                                    <td><p align ="right">Kod kelas</p></td>
                                    <td><select name='Kodkelas' title = "Pilih Kelas Anda">
                                        <?php
                                        require('config.php');
                                        //Untuk Memaparkan Query Kelas
                                        $sqlSelectKelas = "SELECT * FROM  Kodkelas";
                                        $data = $con->query($sqlSelectKelas);
                                        print "<option>Pilih Kelas</option>";
                                        if($data -> num_rows>0){
                                            while($row = $data -> fetch_assoc()){  
                                                echo "<option value ='".$row['Kodkelas']."'>".$row['Kelas']."</option>";
                                            }
                                        }                                    
                                        ?>
                                    </select>
                                    </td>
                                </tr>
                                <tr>
                                    <!--Tempat Isi Data KataLaluan-->
                                    <td><p align = "right">Kata Laluan</p></td>
                                    <td><input name = "KataLaluan" size = "20" type = "text" placeholder = "Kata Laluan Anda" title = "Masukkan Kata Laluan Anda">
                                </tr>
                                <tr>
                                    <!--Butang Reset-->
                                    <td><center><input name = "reset" value = "Reset" type = "reset"></center></td>
                                    <!--Butang Hantar Data menuju ke Borang ProsesDaftar-->
                                    <td><input name = "submit" value = "Daftar" type = "submit"></td>
                                </tr> 
                            </table>
                            <!--Pastikan Kelebaran Badan bersesuaian-->
                            <th width = "30%">
                                <!--Membuat Penceraian kepada lebih banyak Divisi untuk menyesuaikan Antara Muka yang Berhemah-->
                                <div class="JSLogo">
                                    <!--Masukkan Imej Logo Sekolah-->
                                    <img src='JitSin_Logo.jpeg' width='100%' height='100%'>
                                </div>
                            </th>
                        </form>
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

