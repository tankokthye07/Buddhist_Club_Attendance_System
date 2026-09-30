<!DOCTYPE html>
<!--Menghubungkan Fail CSS dengan html ini untuk mendirikan Antara Muka yang Diingini-->
<link rel = "stylesheet" type = "text/css" href = "stylesheetAwam.css">
<!--Bermula html-->
<html>
    <!--Bahagian Tajuk html-->
    <head>
        <!--Menunujukkan Nama Sistem-->
        <title>Sentient</title>
        <!--Penambahan corak CSS ke Antara Muka-->
        <style>
        body {
            transition: background-color 0.5s ease;
            text-align: center;
            font-family: Arial, sans-serif;
        }
        button {   
        padding: 10px 10px;
        font-size: 16px;
        outline: 2px;
        background-color: default;
        color: black;
        border-radius: 5px;
        }
        </style>
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
                    <!--Butang Navigasi ke Menu Utama Awam-->
                    <th><a class = "active" href = "Menu_Utama_Awam.php"> Menu Utama </a></th>
                    <!--Butang Navigasi ke Menu Utama Awam-->
                    <th><a href = "LogMasuk.php"> Log Masuk </a></th>
                </table>
            </center>
            </div>
        </header>
        <!--Bermula Bahagian Tengah html-->
        <body><center>
        <br>
        <!--Membuat Penceraian kepada lebih banyak Divisi untuk menyesuaikan Antara Muka yang Berhemah-->
        <div class = "showcase">
            <!--Menghasilkan 'Table' untuk membuat Pelarasan Badan --> 
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
        <!--Menghasilkan 'Table' untuk Memberi Pilihan kepada Pengguna untuk Memilih Warna Halaman Belakang-->
        <table>
            <!--Butang menukar Warna Halaman Belakang ke Merah-->
            <th float = right><button onclick="document.body.style.backgroundColor = 'lightcoral'" style="background-color: lightcoral;">Merah</button>
            <!--Butang menukar Warna Halaman Belakang ke Kuning-->
            <th float = right><button onclick="document.body.style.backgroundColor = 'gold'" style="background-color: gold;">Kuning</button>
            <!--Butang menukar Warna Halaman Belakang ke Biru-->
            <th float = right><button onclick="document.body.style.backgroundColor = 'lightblue'" style="background-color: lightblue;">Biru</button>
            <!--Butang menukar Warna Halaman Belakang ke Hijau-->
            <th float = right><button onclick="document.body.style.backgroundColor = 'limegreen'" style="background-color: limegreen;">Hijau</button>
            <!--Butang menukar Warna Halaman Belakang ke Putih-->
            <th float = right><button onclick="document.body.style.backgroundColor = 'whitesmoke'" style="background-color: whitesmoke;">Putih</button>
        </table>
        <br>
    </body></center>
    <!--Bermula Bahagian Bawahan html-->
    <footer>
        <!--Hak Cipta-->
        <p><center>Hak Cipta @ Tan Kok Thye SPM 24/25</center></p>
    </footer>
</html>
