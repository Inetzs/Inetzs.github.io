<!DOCTYPE html>
<html>
    <head>
        <title>LATIHAN 8 PEMROGRAMAN WEB</title>
    </head>
    <body>
        <?php
            #cara pertama mendeklarasikan array 1 dimensi
            print ("CARA PETAMA MENDEKLARASIKAN ARRAY 1 DIMENSI <br/>");
            $kota[0] = "Yogyakarta";
            $kota[1] = "Jakarta";
            $kota[2] = "Malang";
            print ("Kota pilihanmu: $kota[2]"); //print adalah cara mencetak selain echo

            echo "<br/><br/><br/>";

            #cara kedua mendeklarasi array 2 dimensi
            print ("CARA KEDUA MENDEKLARASI ARRAY 1 DIMENSI <br/>");
            $kota2 = array(0 => "Jember",1 => "Bondowoso",2 => "Surabaya");
            print ("Kota pilihanmu: $kota2[0]");

            echo "<br/><br/><br/>";

            #cara ketiga mendeklarasi array 3 dimensi nilai index berupa teks, bukan angka
            print ("CARA KETIGA MENDEKLARASI ARRAY 1 DIMENSI: <br/>");
            $inisialkota = array ("JBR"=>"jember", "SDA"=>"Sidoarjo", "SBY"=>"Surabaya");
            echo "inisial JBR adalah kota : " .$inisialkota["JBR"]."";
        ?>
    </body>
</html>