<!DOCTYPE html>
<html>
<head>
    <title>Formulir Klinik Sehat</title>
</head>
<body>
    <h2>Formulir Klinik Sehat</h2>
    <form action="proses_form.php" method="post">
        <label for="nama">Nama Pasien:</label>
        <input type="text" name="nama" required><br>

        <label for="usia">Usia:</label>
        <input type="number" name="usia" required><br>

        <label for="keluhan">Keluhan:</label>
        <textarea name="keluhan" required></textarea><br>

        <input type="submit" value="Submit">
    </form>

    <?php
    // Koneksi ke database (ganti sesuai dengan informasi database Anda)
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "KlinikSehat";

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
            $usia = $_POST['usia'];
            $keluhan = $_POST['keluhan'];

            // Masukkan data ke database
            $query_add = "INSERT INTO data_klinik_sehat (nama_pasien, usia, keluhan) 
                          VALUES ('$nama', $usia, '$keluhan')";

            if (mysqli_query($conn, $query_add)) {
                echo "Data berhasil disimpan ke database.";
            } else {
                echo "Error: " . $query_add . "<br>" . mysqli_error($conn);
            }
        } elseif (isset($_POST['update'])) {
            // Tangkap data dari formulir
            $id_update = $_POST['id_update'];
            $nama_update = $_POST['nama_update'];
            $usia_update = $_POST['usia_update'];
            $keluhan_update = $_POST['keluhan_update'];

            // Update data di database
            $query_update = "UPDATE data_klinik_sehat SET nama_pasien='$nama_update', usia=$usia_update, keluhan='$keluhan_update' WHERE id=$id_update";

            if (mysqli_query($conn, $query_update)) {
                echo "Data berhasil diupdate.";
            } else {
                echo "Error: " . $query_update . "<br>" . mysqli_error($conn);
            }
        } elseif (isset($_POST['delete'])) {
            // Tangkap data dari formulir
            $id_delete = $_POST['id_delete'];

            // Hapus data di database
            $query_delete = "DELETE FROM data_klinik_sehat WHERE id=$id_delete";

            if (mysqli_query($conn, $query_delete)) {
                echo "Data berhasil dihapus.";
            } else {
                echo "Error: " . $query_delete . "<br>" . mysqli_error($conn);
            }
        }
    }

    // Query untuk mengambil data dari tabel
    $query_select = "SELECT * FROM data_klinik_sehat";
    $result = mysqli_query($conn, $query_select);

    // Tampilkan data dalam tabel HTML
    echo "<h2>Data Klinik Sehat</h2>";
    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>Nama Pasien</th><th>Usia</th><th>Keluhan</th><th>Action</th></tr>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['nama_pasien'] . "</td>";
        echo "<td>" . $row['usia'] . "</td>";
        echo "<td>" . $row['keluhan'] . "</td>";
        echo "<td>
                <form method='post'>
                    <input type='hidden' name='id_update' value='" . $row['id'] . "'>
                    <input type='hidden' name='nama_update' value='" . $row['nama_pasien'] . "'>
                    <input type='hidden' name='usia_update' value='" . $row['usia'] . "'>
                    <input type='hidden' name='keluhan_update' value='" . $row['keluhan'] . "'>
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