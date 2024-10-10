<?php
// Koneksi ke database
require "db.php";

// Menambah data service
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_motor = $_POST['nama_motor'];
    $tanggal_service = $_POST['tanggal_service'];
    $riwayat_service = $_POST['riwayat_service'];
    $total_biaya = $_POST['total_biaya'];
    $db->exec("INSERT INTO services (nama_motor, tanggal_service, riwayat_service, total_biaya) VALUES ('$nama_motor', '$tanggal_service', '$riwayat_service', '$total_biaya')");
    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Tambah Catatan Service</title>
</head>
<body>
    <div class="container">
        <h1>Tambah Service Motor</h1>
        <form action="add_service.php" method="POST">
            <label for="nama_motor">Nama Motor:</label>
            <input type="text" name="nama_motor" id="nama_motor" required>
            
            <label for="tanggal_service">Tanggal Service:</label>
            <input type="date" name="tanggal_service" id="tanggal_service" required>
            
            <label for="riwayat_service">Riwayat Service:</label>
            <textarea name="riwayat_service" id="riwayat_service" required></textarea>

            <label for="tanggal_service">Total Biaya:</label>
            <input type="number" name="total_biaya" id="total_biaya" required>
            
            <button type="submit">Tambah</button>
        </form>
        <a href="index.php" >Kembali</a>
    </div>
</body>
</html>
