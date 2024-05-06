<!DOCTYPE html>
<html>
<head>
    <title>Penjualan Obat</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <div id="penjualan-obat"></div>

    <script>
    $(document).ready(function() {
        $.ajax({
            url: 'get_data.php',
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                // Proses dan tampilkan data dalam bentuk tabel
                var html = '<table border="1">';
                html += '<tr><th>ID</th><th>Penjualan Obat</th><th>Harga<th>Jumlah</th><th>Aksi</th></tr>';
                for (var i = 0; i < data.length; i++) {
                    html += '<tr>';
                    html += '<td>' + data[i].id + '</td>';
                    html += '<td>' + data[i].nama_obat + '</td>';
                    html += '<td>' + data[i].harga + '</td>';
                    html += '<td>' + data[i].jumlah + '</td>';
                    html += '<td><button class="delete-btn" data-id="' + data[i].id + '">Hapus</button></td>';
                    html += '</tr>';
                }
                html += '</table>';
                $('#penjualan-obat').html(html);
            }
        });
    });
    </script>
</body>
</html>