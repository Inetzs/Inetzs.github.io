<!DOCTYPE html>
<html>
    <head>
        <title>Contoh Halaman Web PHP</title>
    </head>
    <body>
        <?php
            // Variabel string
            $nama = "John Doe";
            $pekerjaan = "Web Developer";

            // Variabel tanggal
            $tanggal_lahir = "1990-05-15";
            $tanggal_lahir_format = date("d F Y", strtotime($tanggal_lahir));

            // Menampilkan informasi
            echo "<h1>Selamat datang, $nama!</h1>";
            echo "<p>Anda adalah seorang $pekerjaan.</p>";
            echo "<p>Tanggal lahir Anda: $tanggal_lahir_format</p>";
        ?>
    </body>
</html>