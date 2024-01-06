<html>
    <head>
        <title>Praktikum String dan Tanggal</title>
    </head>
    <body>
        <?php
            $kalimat = "universitas PGRI Madiun";

            printf("Hasil Strlen : %s<br>\n", strlen($kalimat));
            printf("Hasil Strtoupper : %s<br>\n", strtoupper($kalimat));
            printf("Hasil Strtolower : %s<br>\n", strtolower($kalimat));
            printf("Hasil Ucfirst : %s<br>\n", ucfirst($kalimat));
            printf("Hasil Ucwords : %s<br>\n", ucwords($kalimat));
            printf("Aslinya : $kalimat<br>\n");

            printf("Tanggal Sekarang : %s ",Date("d F Y")); echo "<br/>"
        ?>
    </body>
</html>