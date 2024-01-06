<!DOCTYPE html>
<html>
    <head>
        <title>LATIHAN 9 PEMROGRAMAN WEB</title>
    </head>
    <body>
        <?php
            #cara pertama mendeklarasi array multidimensi
            print ("CARA PERTAMA MENDEKLARASI ARRAY MULTIDIMENSI: <br/>");
            $buah1 = array (
                "Apel"=> array("Warna"=>"Merah", "Rasa"=>"Manis"),
                "Pisang"=> array("Warna"=>"Kuning", "Rasa"=>"Manis")
            );
            print "Warna Buah Apel Adalah ";
            print $buah1 ["Apel"] ["Warna"]. "<br/>";
            print "Rasa Buah Pisang Adalah ";
            print $buah1 ["Pisang"] ["Rasa"];

            echo "<br/><br/><br/>";

            #cara kedua mendeklarasi array multidimensi
            print ("CARA KEDUA MENDEKLARASI ARRAY MULTIDIMENSI: <br/>");
            $buah2 = array (
                array("Apel","Merah","Manis"),
                array("Pisang","Kuning","Manis")
            );

            echo $buah2[0][0]."Warna:" .$buah2[0][1]. "Rasa" .$buah2[0][2]. "<br/>";
            echo $buah2[1][0]."Warna:" .$buah2[1][1]. "Rasa" .$buah2[1][2]. "<br/>";
        ?>
    </body>
</html>