<html>
    <head>
        <title>Tugas String dan Tanggal</title>
    </head>
    <body>
        <form method="get" action="">
            Masukkan Nama, Email dan Password <br>
            Default Nama = belajar, Email = test@gmail.com dan Password = Madiun
            <br>
            Isian data : <br>
            Nama : <input type="text" name="nama"><br>
            Email : <input type="text" name="email"><br>
            Password : <input type="password" name="password"><br>
            <input type="submit" value="Cek">
        </form>
        <?php
            if (isset($_GET['email'])) {
                $email = $_GET['email'];
                if (empty($email)) {
                    print("Harap Mengisi Email <br/>\n");
                } else {
                    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        print("Alamat Email $email valid<br/>\n");
                    } else {
                        print("Alamat Email $email tidak valid <br/>\n");
                    }
                }
            }

            if (isset($_GET['password'])) {
                $nama = "belajar";
                $pass_valid = crypt("madiun", $nama);
                $enkripsi = crypt($_GET['password'], $nama);

                if ($pass_valid == $enkripsi) {
                    print("Password Valid");
                } else {
                    print("Password Salah");
                }
            }
        ?>
    </body>
</html>