<?php

// Koneksi ke database
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'penjualan_obat';
$koneksi = new mysqli($host, $username, $password, $database);

// Periksa koneksi
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

// Query untuk mendapatkan data dari tabel penjualan_obat
$query = "SELECT * FROM penjualan_obat";
$result = $koneksi->query($query);

// Buat array untuk menampung data
$data = array();

// Ambil data dari hasil query dan tambahkan ke dalam array
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

// Tutup koneksi
$koneksi->close();

// Mengembalikan data dalam bentuk JSON
echo json_encode($data);

?>
