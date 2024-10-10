<?php
    $db = new SQLite3('services.db');
  
if(!$db) {
    echo $db->lastErrorMsg();
  } else {
    // echo "Open database success...\n";
  } 

$createTableQuery = "
    CREATE TABLE IF NOT EXISTS services (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        nama_motor TEXT NOT NULL,
        tanggal_service TEXT NOT NULL,
        riwayat_service TEXT NOT NULL,
        total_biaya TEXT NOT NULL
    )";
    $db->query($createTableQuery);
 

?>
