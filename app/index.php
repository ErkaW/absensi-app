<?php
// Set the log message with time and IP address
$log_message = "User accessed the app at " . date("Y-m-d H:i:s") . " from IP " . $_SERVER['REMOTE_ADDR'] . "\n";

// File paths for the logs (Ensure the path is inside the container's mounted directory)
$log_file = '/var/log/php/absensi_app.log';
$json_log_file = '/var/log/php/absensi_app.json';

// Write the log to a regular log file
file_put_contents($log_file, $log_message, FILE_APPEND);

// JSON formatted log for easier structured parsing by Filebeat/Logstash
$log_message_json = json_encode([
    'timestamp' => date("Y-m-d H:i:s"),
    'ip' => $_SERVER['REMOTE_ADDR'],
    'action' => 'accessed the app'
]);

// Write the structured JSON log to a separate file
file_put_contents($json_log_file, $log_message_json . "\n", FILE_APPEND);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Absensi Karyawan</title>
</head>
<body>
    <h1>Absensi Karyawan Harian</h1>
    <form action="absensi.php" method="POST">
        <label for="nama">Nama Karyawan:</label>
        <input type="text" id="nama" name="nama" required><br><br>

        <label for="keterangan">Keterangan:</label>
        <select id="keterangan" name="keterangan" required>
            <option value="Hadir">Hadir</option>
            <option value="Sakit">Sakit</option>
            <option value="Izin">Izin</option>
        </select><br><br>

        <button type="submit">Submit</button>
    </form>

    <h2>Data Absensi</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Tanggal</th>
            <th>Waktu</th>
            <th>Keterangan</th>
        </tr>
        <?php
        include 'config.php';
        $result = $mysqli->query("SELECT * FROM karyawan_absensi");
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>{$row['id']}</td><td>{$row['nama']}</td><td>{$row['tanggal']}</td><td>{$row['waktu']}</td><td>{$row['keterangan']}</td></tr>";
        }
        ?>
    </table>
</body>
</html>
