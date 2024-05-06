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

// Periksa apakah metode yang digunakan adalah POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari formulir
    $nama_obat = $_POST['nama_obat'];
    $jumlah = $_POST['jumlah'];
    $harga = $_POST['harga'];

    // Query untuk menambahkan data baru ke dalam tabel
    $query = "INSERT INTO penjualan_obat (nama_obat, jumlah, harga) VALUES ('$nama_obat', '$jumlah', '$harga')";

    if ($koneksi->query($query) === TRUE) {
        // Jika data berhasil ditambahkan, kembalikan status berhasil
        http_response_code(200);
        echo json_encode(array("message" => "Data berhasil ditambahkan"));
    } else {
        // Jika terjadi kesalahan, kembalikan pesan error
        http_response_code(500);
        echo json_encode(array("message" => "Gagal menambahkan data: " . $koneksi->error));
    }

    // Tutup koneksi
    $koneksi->close();
} else {
    // Jika bukan metode POST, kembalikan pesan error
    http_response_code(405);
    echo json_encode(array("message" => "Metode tidak diizinkan"));
}
?>
