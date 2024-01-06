<!DOCTYPE html>
<html>
<head>
    <title>Formulir Perpuskotamadiun</title>
</head>
<body>
    <h2>Formulir Perpuskotamadiun</h2>
    <form action="index.php" method="post">
        <label for="nama">Nama:</label>
        <input type="text" name="nama" required><br>

        <label for="email">Email:</label>
        <input type="email" name="email" required><br>

        <label for="alamat">Alamat:</label>
        <textarea name="alamat" required></textarea><br>

        <input type="submit" name="add" value="Tambah Data">
    </form>

    <?php
    // Koneksi ke database (ganti sesuai dengan informasi database Anda)
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "perpuskota";

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
            $email = $_POST['email'];
            $alamat = $_POST['alamat'];

            // Masukkan data ke database
            $query_add = "INSERT INTO data_perpuskotamadiun (nama, email, alamat) VALUES ('$nama', '$email', '$alamat')";

            if (mysqli_query($conn, $query_add)) {
                echo "Data berhasil ditambahkan ke database.";
            } else {
                echo "Error: " . $query_add . "<br>" . mysqli_error($conn);
            }
        } elseif (isset($_POST['update'])) {
            // Tangkap data dari formulir
            $id_update = $_POST['id_update'];
            $nama_update = $_POST['nama_update'];
            $email_update = $_POST['email_update'];
            $alamat_update = $_POST['alamat_update'];

            // Update data di database
            $query_update = "UPDATE data_perpuskotamadiun SET nama='$nama_update', email='$email_update', alamat='$alamat_update' WHERE id=$id_update";

            if (mysqli_query($conn, $query_update)) {
                echo "Data berhasil diupdate.";
            } else {
                echo "Error: " . $query_update . "<br>" . mysqli_error($conn);
            }
        } elseif (isset($_POST['delete'])) {
            // Tangkap data dari formulir
            $id_delete = $_POST['id_delete'];

            // Hapus data di database
            $query_delete = "DELETE FROM data_perpuskotamadiun WHERE id=$id_delete";

            if (mysqli_query($conn, $query_delete)) {
                echo "Data berhasil dihapus.";
            } else {
                echo "Error: " . $query_delete . "<br>" . mysqli_error($conn);
            }
        }
    }

    // Query untuk mengambil data dari tabel
    $query_select = "SELECT * FROM data_perpuskotamadiun";
    $result = mysqli_query($conn, $query_select);

    // Tampilkan data dalam tabel HTML
    echo "<h2>Data Perpuskotamadiun</h2>";
    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>Nama</th><th>Email</th><th>Alamat</th><th>Action</th></tr>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['nama'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "<td>" . $row['alamat'] . "</td>";
        echo "<td>
                <form method='post'>
                    <input type='hidden' name='id_update' value='" . $row['id'] . "'>
                    <input type='hidden' name='nama_update' value='" . $row['nama'] . "'>
                    <input type='hidden' name='email_update' value='" . $row['email'] . "'>
                    <input type='hidden' name='alamat_update' value='" . $row['alamat'] . "'>
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