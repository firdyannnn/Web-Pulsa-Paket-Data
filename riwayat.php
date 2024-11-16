<?php
include 'koneksi.php';

$sql_riwayat = "
    SELECT 
        r.id_riwayat,
        r.waktu,
        r.status,
        t.nama,
        t.nomor_hp,
        t.harga
    FROM riwayatt r
    JOIN transaksii t ON r.id_pengguna = t.id_pengguna
    ORDER BY r.waktu DESC";

$result = mysqli_query($koneksi, $sql_riwayat);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Transaksi</title>
    <link rel="stylesheet" href="riwayat.css"> 
</head>
<body>
    <h1>Riwayat Transaksi</h1>

    <?php if (mysqli_num_rows($result) > 0): ?>
        <table>
            <thead>
                <tr>
                    <th>Nomer</th>
                    <th>Nama</th>
                    <th>Nomor HP</th>
                    <th>Harga</th>
                    <th>Waktu</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?php echo $row['id_riwayat']; ?></td>
                        <td><?php echo $row['nama']; ?></td>
                        <td><?php echo $row['nomor_hp']; ?></td>
                        <td><?php echo $row['harga']; ?></td>
                        <td><?php echo $row['waktu']; ?></td>
                        <td><?php echo $row['status']; ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Tidak ada riwayat transaksi.</p>
    <?php endif; ?>

    <a href="index.php">Kembali ke Beranda</a>
</body>
</html>

<?php
mysqli_close($koneksi);
?>
