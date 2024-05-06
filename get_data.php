<?php
// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$database = "Penjualan_obat";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Koneksi ke database error: " . $conn->connect_error);
}

//Query untuk mendapatkan semua data lowongan
$sql = "SELECT * FROM penjualan";
$result = $conn->query($sql);

$data = array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

//Mengembalikan data dalam format JSON
echo json_encode($data);

$conn->close();
?>