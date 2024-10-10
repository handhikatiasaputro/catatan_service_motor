<?php
// Koneksi ke database
require "db.php";

// Menghapus service jika ada permintaan delete
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $db->exec("DELETE FROM services WHERE id = $id");
    header('Location: index.php');
}

// Mengambil semua data service
$result = $db->query("SELECT * FROM services ORDER BY tanggal_service DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>index</title>
</head>
<body>
    <div class="container">
        <h1>Catatan Service Motor</h1>
        <a href="add_service.php" class="button">Catatan Service</a>
        <table>
            <tr>
                <th>Nama Motor</th>
                <th>Tanggal Service</th>
                <th>Riwayat Service</th>
                <th>Total Biaya</th>
                <th>Aksi</th>
            </tr>
            <?php while ($row = $result->fetchArray()): ?>
            <tr>
                <td><?php echo htmlspecialchars($row['nama_motor']); ?></td>
                <td><?php echo htmlspecialchars(date('d-m-Y', strtotime($row['tanggal_service']))); ?></td>
                <td><?php echo htmlspecialchars($row['riwayat_service']); ?></td>
                <td>Rp<?php echo number_format($row['total_biaya']); ?></td>
                <td>
                    <a href="edit_service.php?id=<?php echo $row['id']; ?>" class="buttone">Edit</a>
                    <a href="index.php?delete=<?php echo $row['id']; ?>" class="button delete">Delete</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </table>
    </div>
    <!-- </footer>
    <div class="bawah">
        <p>&copy; 2024. project 1. Catatan Service Motor</p>
    </div> -->
</body>
</html>
