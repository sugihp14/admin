<?php
$host = 'localhost'; // Nama hostnya
$username = 'root'; // Username
$password = ''; // Password (Isi jika menggunakan password)
$database = 'db_hazel'; // Nama databasenya
// Koneksi ke MySQL dengan PDO
$pdo = new PDO('mysql:host='.$host.';dbname='.$database, $username, $password);
?>