<!DOCTYPE html>
<html>
    <head>
        <title>LATIHAN 7 PEMROGRAMAN WEB</title>
    </head>
    <body>
        <form method="get">
            <table>
                <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td><input type="text" name="nama"></td>
                </tr>
                <tr>
                    <td>NIM</td>
                    <td>:</td>
                    <td><input type="text" name="nim"></td>
                </tr>
                <tr align="center">
                <td colspan="3"><input type="submit" name="sumbit" value="Simpan"/>&nbsp;<input type="reset" name="Reset" value="Reset"/></td>
                </tr>
            </table>
        </form>
        <?php
            if(isset($_GET['submit'])){
                $nama = $_GET['nama'];
                $nim = $_GET['nim'];

                echo "<br/><br/>INI OUTPUT SESUAI INPUTAN DARI FORM DIATAS <br/>";
                echo "Nama : ".$nama."<br/>";
                echo "NIM : ".$nim."<br/>";
            }
        ?>
    </body>
</html>