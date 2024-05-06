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

// Periksa apakah parameter id telah diterima
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Query untuk menghapus data berdasarkan id
    $query = "DELETE FROM penjualan_obat WHERE id=$id";

    if ($koneksi->query($query) === TRUE) {
        // Jika penghapusan berhasil, ambil data terbaru dan kirimkan kembali dalam bentuk JSON
        $query_select = "SELECT * FROM penjualan_obat";
        $result = $koneksi->query($query_select);
        $data = array();

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }

        // Tutup koneksi
        $koneksi->close();

        // Mengembalikan data terbaru dalam bentuk JSON
        echo json_encode($data);
    } else {
        echo "Error: " . $query . "<br>" . $koneksi->error;
    }
} else {
    echo "Parameter id tidak ditemukan";
}

?>
