<?php
$host = 'mysql';
$user = 'user';
$pass = 'password';
$db   = 'absensi';

$mysqli = new mysqli($host, $user, $pass, $db);

if ($mysqli->connect_error) {
    die("Database connection failed: " . $mysqli->connect_error);
}
?>
