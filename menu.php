<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Topup</title>
    <link rel="stylesheet" type="text/css" href="menu.css">
    <script type="text/javascript" src="jquery.js"></script>
</head>
<body>
    <img src="muhyi.jpg" alt="Gambar Muhyi" width="200" height="auto" />
    <header>
        <h1 class="judul">MUHYI TOP UP</h1>
        <h3 class="deskripsi">Selamat datang di tempat top up terbaik dan terpercaya</h3>
    </header>
    <br/>
    <form method="post" action="tambah_aksi.php">
        <p>
            <label>Nama</label>
            <input type="text" id="nama" name="nama" required>
        </p>
        <p>
            <label>Nomor HP</label>
            <input type="text" id="nomor_hp" name="nomor_hp" required> <!-- Perbaiki 'requiredy' -->
        </p>
        <p>
            <label>Menu</label>
            <select name="nama_menu" id="menuSelect">
                <option value="">Pilih</option>
                <?php
                include "koneksi.php";
                $query = mysqli_query($koneksi, "SELECT id_pengguna, nama_menu, harga, jenis_produk, deskripsi FROM transaksii") or die(mysqli_error($koneksi));
                while ($data = mysqli_fetch_array($query)) {
                    echo "<option value='{$data['id_pengguna']}' data-harga='{$data['harga']}' data-jenis='{$data['jenis_produk']}' data-deskripsi='{$data['deskripsi']}'> {$data['nama_menu']} </option>";
                }
                ?>
            </select>
        </p>
        <p>
            <label>Harga</label>
            <input type="text" id="harga" name="harga" readonly>
        </p>
        <p>
            <label>Jenis Produk</label>
            <input type="text" id="jenis_produk" name="jenis_produk" readonly>
        </p>
        <p>
            <label>Deskripsi</label>
            <textarea id="deskripsi" name="deskripsi" readonly></textarea>
        </p>
        <p>
            <button type="submit">Konfirmasi</button>  
        </p>
    </form>
    <script type="text/javascript">
        document.getElementById('menuSelect').addEventListener('change', function() {
            var selectedOption = this.options[this.selectedIndex];
            var harga = selectedOption.getAttribute('data-harga');
            var jenis = selectedOption.getAttribute('data-jenis');
            var deskripsi = selectedOption.getAttribute('data-deskripsi');
            
            document.getElementById('harga').value = harga;
            document.getElementById('jenis_produk').value = jenis;
            document.getElementById('deskripsi').value = deskripsi; // Sesuaikan ID
        });
    </script>
</body>
</html>
