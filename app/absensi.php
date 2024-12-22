<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $keterangan = $_POST['keterangan'];  // New field
    $tanggal = date('Y-m-d');
    $waktu = date('H:i:s');

    // Insert data into the database
    $query = "INSERT INTO karyawan_absensi (nama, keterangan, tanggal, waktu) VALUES ('$nama', '$keterangan', '$tanggal', '$waktu')";
    if ($mysqli->query($query) === TRUE) {
        echo "Absensi berhasil disimpan!";
    } else {
        echo "Error: " . $query . "<br>" . $mysqli->error;
    }
}
?>

<html>
    <a href="./index.php"> Balik ke Home </a>
</html>