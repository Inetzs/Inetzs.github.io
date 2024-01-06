<!DOCTYPE html>
<html>
<head>
    <title>Formulir Service Motor</title>
</head>
<body>
    <h2>Formulir Service Motor</h2>
    <form action="proses_form.php" method="post">
        <label for="nama">Nama Pemilik:</label>
        <input type="text" name="nama" required><br>

        <label for="merk">Merk Motor:</label>
        <input type="text" name="merk" required><br>

        <label for="jenis_service">Jenis Service:</label>
        <select name="jenis_service" required>
            <option value="Pemeliharaan Rutin">Pemeliharaan Rutin</option>
            <option value="Perbaikan Mesin">Perbaikan Mesin</option>
            <option value="Ganti Oli">Ganti Oli</option>
            <!-- Tambahkan opsi lain sesuai kebutuhan -->
        </select><br>

        <label for="keterangan">Keterangan:</label>
        <textarea name="keterangan"></textarea><br>

        <input type="submit" value="Submit">
    </form>

    <?php
    // Koneksi ke database (ganti sesuai dengan informasi database Anda)
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "ServiceMotor";

    $conn = mysqli_connect($host, $username, $password, $database);

    // Cek koneksi
    if (!$conn) {
        die("Koneksi gagal: " . mysqli_connect_error());
    }

    // Memeriksa apakah formulir add/update/delete telah dikirim
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['add'])) {
            // Tangkap data dari formulir
            $nama = $_POST['nama'];
            $merk = $_POST['merk'];
            $jenis_service = $_POST['jenis_service'];
            $keterangan = $_POST['keterangan'];

            // Masukkan data ke database
            $query_add = "INSERT INTO data_service_motor (nama_pemilik, merk_motor, jenis_service, keterangan) 
                          VALUES ('$nama', '$merk', '$jenis_service', '$keterangan')";

            if (mysqli_query($conn, $query_add)) {
                echo "Data berhasil disimpan ke database.";
            } else {
                echo "Error: " . $query_add . "<br>" . mysqli_error($conn);
            }
        } elseif (isset($_POST['update'])) {
            // Tangkap data dari formulir
            $id_update = $_POST['id_update'];
            $nama_update = $_POST['nama_update'];
            $merk_update = $_POST['merk_update'];
            $jenis_service_update = $_POST['jenis_service_update'];
            $keterangan_update = $_POST['keterangan_update'];

            // Update data di database
            $query_update = "UPDATE data_service_motor SET nama_pemilik='$nama_update', merk_motor='$merk_update', jenis_service='$jenis_service_update', keterangan='$keterangan_update' WHERE id=$id_update";

            if (mysqli_query($conn, $query_update)) {
                echo "Data berhasil diupdate.";
            } else {
                echo "Error: " . $query_update . "<br>" . mysqli_error($conn);
            }
        } elseif (isset($_POST['delete'])) {
            // Tangkap data dari formulir
            $id_delete = $_POST['id_delete'];

            // Hapus data di database
            $query_delete = "DELETE FROM data_service_motor WHERE id=$id_delete";

            if (mysqli_query($conn, $query_delete)) {
                echo "Data berhasil dihapus.";
            } else {
                echo "Error: " . $query_delete . "<br>" . mysqli_error($conn);
            }
        }
    }

    // Query untuk mengambil data dari tabel
    $query_select = "SELECT * FROM data_service_motor";
    $result = mysqli_query($conn, $query_select);

    // Tampilkan data dalam tabel HTML
    echo "<h2>Data Service Motor</h2>";
    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>Nama Pemilik</th><th>Merk Motor</th><th>Jenis Service</th><th>Keterangan</th><th>Action</th></tr>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['nama_pemilik'] . "</td>";
        echo "<td>" . $row['merk_motor'] . "</td>";
        echo "<td>" . $row['jenis_service'] . "</td>";
        echo "<td>" . $row['keterangan'] . "</td>";
        echo "<td>
                <form method='post'>
                    <input type='hidden' name='id_update' value='" . $row['id'] . "'>
                    <input type='hidden' name='nama_update' value='" . $row['nama_pemilik'] . "'>
                    <input type='hidden' name='merk_update' value='" . $row['merk_motor'] . "'>
                    <input type='hidden' name='jenis_service_update' value='" . $row['jenis_service'] . "'>
                    <input type='hidden' name='keterangan_update' value='" . $row['keterangan'] . "'>
                    <input type='submit' name='update' value='Update'>
                </form>
                <form method='post'>


                    <input type='hidden' name='id_delete' value='" . $row['id'] . "'>
                    <input type='submit' name='delete' value='Delete'>
                </form>
              </td>";
        echo "</tr>";
    }

    echo "</table>";

    // Tutup koneksi
    mysqli_close($conn);
    ?>
</body>
</html>