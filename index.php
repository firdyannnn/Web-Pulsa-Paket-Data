<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Topup</title>
    <link rel="stylesheet" type="text/css" href="index.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> 
    <style>
        .riwayat-container {
            display: none; 
        }
    </style>
</head>
<body>
    <div class="gambar">
        <img src="muhyi.jpg" alt="Gambar Muhyi" width="250" height="auto" />
    </div>
    <header>
        <h1 class="judul">MUHYI TOP UP</h1>
        <h3 class="deskripsi">Selamat datang di tempat top up terbaik dan terpercaya</h3>
    </header>
    <br/>
    <form method="post" action="tambah_aksi.php">
        <div class="content">
            <a href="menu.php">
                <img src="operator/axis.jpg" alt="Gambar Button" style="width: 150px; height: auto;">
            </a>
            <a href="menu.php">
                <img src="operator/tri.jpg" alt="Gambar Button" style="width: 150px; height: auto;">
            </a>
            <br/>
            <a href="menu.php">
                <img src="operator/indo.jpg" alt="Gambar Button" style="width: 150px; height: auto;">
            </a>
            <a href="menu.php">
                <img src="operator/xl.jpg" alt="Gambar Button" style="width: 150px; height: auto;">
            </a>
        </div>
    </form>

    <div class="menu">
        <ul>
            <li>
                <a href="#" onclick="toggleRiwayat()">Riwayat</a> 
            </li>
        </ul>
    </div>
    <div id="riwayat" class="riwayat-container">
        <?php
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
            switch ($page) {
                case 'riwayat':
                    if (file_exists("riwayat.php")) {
                        include "riwayat.php";
                    } else {
                        echo "<center><h3>File tidak ditemukan</h3></center>";
                    }
                    break;
                default:
                    echo "<center><h3>Maaf Halaman Tidak Ditemukan</h3></center>";
                    break;
            }
        } else {
            include "riwayat.php";
        }
        ?>
    </div>
    <script type="text/javascript">
        function toggleRiwayat() {
            console.log("Riwayat clicked!"); 
            var riwayat = $('#riwayat');
            
            if (riwayat.css('display') === 'none') {
                riwayat.show(); 
            } else {
                riwayat.hide(); 
            }
        }
    </script>
</body>
</html>
