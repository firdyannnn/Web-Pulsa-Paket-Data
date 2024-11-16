<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $nomor_hp = $_POST['nomor_hp'];
    $nama_menu = $_POST['nama_menu']; 
    $harga = $_POST['harga'];
    $jenis_produk = $_POST['jenis_produk'];
    $deskripsi = $_POST['deskripsi'];

    $query = "INSERT INTO transaksii (nama, nomor_hp, nama_menu, harga, jenis_produk, deskripsi) 
              VALUES ('$nama', '$nomor_hp', '$nama_menu', '$harga', '$jenis_produk', '$deskripsi')";

    if (mysqli_query($koneksi, $query)) {
        $id_pengguna = mysqli_insert_id($koneksi); 

        $waktu = date("Y-m-d H:i:s");
        $status = "Berhasil";
        $riwayat_query = "INSERT INTO riwayatt (id_pengguna, waktu, status) VALUES ('$id_pengguna', '$waktu', '$status')";

        if (mysqli_query($koneksi, $riwayat_query)) {
            header("Location: riwayat.php");
            exit(); 
        } else {
            echo "Error menyimpan riwayat: " . mysqli_error($koneksi);
        }
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
} else {
    echo "Data tidak dikirim!";
}
?>
