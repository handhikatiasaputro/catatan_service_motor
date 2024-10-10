<?php
// Koneksi ke database
require "db.php";

// Mendapatkan ID dan data service untuk diedit
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $service = $db->querySingle("SELECT * FROM services WHERE id = $id", true);
}

// Mengupdate data service
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_motor = $_POST['nama_motor'];
    $tanggal_service = $_POST['tanggal_service'];
    $riwayat_service = $_POST['riwayat_service'];
    $total_biaya = $_POST['total_biaya'];
    $db->query("UPDATE services SET nama_motor = '$nama_motor', tanggal_service = '$tanggal_service', riwayat_service = '$riwayat_service', total_biaya = '$total_biaya' WHERE id = $id");
    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Edit Catatan Service</title>
</head>
<body>
    <div class="container">
        <h1>Edit Service Motor</h1>
        <form action="edit_service.php?id=<?php echo $id; ?>" method="POST">
            <label for="nama_motor">Nama Motor:</label>
            <input type="text" name="nama_motor" id="nama_motor" value="<?php echo htmlspecialchars($service['nama_motor']); ?>" required>
            
            <label for="tanggal_service">Tanggal Service:</label>
            <input type="date" name="tanggal_service" id="tanggal_service" value="<?php echo htmlspecialchars($service['tanggal_service']); ?>" required>
            
            <label for="riwayat_service">Riwayat Service:</label>
            <textarea name="riwayat_service" id="riwayat_service" required><?php echo htmlspecialchars($service['riwayat_service']); ?></textarea>
            
            <label for="tanggal_service">Total Biaya:</label>
            <input type="number" name="total_biaya" id="total_biaya" value="<?php echo htmlspecialchars($service['total_biaya']);?>" required>

            <button type="submit">Update</button>
        </form>
        <a href="index.php" class="a">Kembali</a>
    </div>
</body>
</html>
