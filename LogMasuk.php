<!DOCTYPE html>
<!--Menghubungkan Fail CSS dengan html ini untuk mendirikan Antara Muka yang Diingini-->
<link rel = "stylesheet" type = "text/css" href = "stylesheetAdmin.css">
<!--Bermula html-->
<html>
<style>
.tooltip {
  position: relative;
  display: inline-block;
  border-bottom: 1px dotted black;
}

.tooltip .tooltiptxt {
  visibility: hidden;
  width: 120px;
  background-color: black;
  color: #fff;
  text-align: center;
  border-radius: 6px;
  padding: 5px 0;
  position: absolute;
  z-index: 1;
  top: -5px;
  left: 110%;
}

.tooltip .tooltiptxt::after {
  content: "";
  position: absolute;
  top: 50%;
  right: 100%;
  margin-top: -5px;
  border-width: 5px;
  border-style: solid;
  border-color: transparent black transparent transparent;
}
.tooltip:hover .tooltiptxt {
  visibility: visible;
}
</style>
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
                    <!--Badan Borang Log Masuk Admin atau Ahli-->
                    <!--Pastikan Kelebaran Data bersesuaian-->
                    <th width = 45%>
                        <!--Membuat Borang untuk mengumpul Data dan Dihantar ke ProsesLogMasuk-->
                        <form action = "ProsesLogMasuk.php" method = "POST">
                            <!--Menghasilkan 'Table' untuk membuat Pelarasan Badan-->
                            <table border = 0>
                                <tr>
                                    <!--Tajuk Borang-->    
                                    <th colspan = "2"><h1><center>Log Masuk ke Sistem</center></h1>
                                </tr>
                                <tr>
                                    <!--Tempat Isi Data IDahli-->
                                    <td align="center"><p align = "center">ID Ahli</p></td>
                                    <td class="tooltip"><input name="IDahli" size="20" type="text" placeholder="ID Anda"
                                     title="Masukkan ID Anda" class="tooltip" pattern="([0-9]{5})||(" oninvalid="setCustomValidity
                                     ('Sila masukkan 5 digit nombor.')" oninput="setCustomValidity('')" style="height: 30px;" required>
                                    <span class="tooltiptxt">Masukkan ID Anda</span>
                                    </td>
                                </tr>
                                <tr>
                                    <!--Tempat Isi Data KataLaluan-->
                                    <td><p align = "center">Kata Laluan</p></td>
                                    <td class = "tooltip"><input name = "KataLaluan" size="20" type="password"
                                     placeholder="ID Anda" title="Masukkan Password" class="tooltip" style="height: 30px;" required>
                                    <span class = "tooltiptxt">Masukkan Password</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <!--Hyperlink ke Borang DaftarAhli-->
                                        <a href = "DaftarAhli.php">Tiada Akaun?</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <!--Membuat Ruangan yang tidak kelihatan-->
                                        <p>&#32;</p>
                                    </td>
                                </tr>
                                <tr>
                                    <!--Butang Reset-->
                                    <td><center><input name = "reset" value = "Reset" type = "reset"></center></td>
                                    <!--Butang Hantar Data Menuju ke ProsesLogMasuk-->
                                    <td><input name = "submit" value = "Log Masuk" type = "Submit"></td>
                                </tr>
                            </table>
                            <!--Menghasilkan 'Table' untuk membuat Pelarasan Badan-->
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
    <!--Bahagian Bawahan html Bermula-->
    <footer>
        <!--Hak Cipta-->
        <p><center>Hak Cipta @ Tan Kok Thye SPM 24/25</center></p>
    </footer>
</html>





                



                        