<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Firma szkoleniowa</title>
</head>
<body>

    <nav>
        <img src="baner.jpg" alt="Szkolenia">
    </nav>

    <main>
        <section class="menu">
            <ul>
                <li><a href="index.html">Strona główna</a></li>
                <li><a href="szkolenia.php">Szkolenia</a></li>
            </ul>
        </section>

        <section class="glowny">
            <?php

                $dbhost = "localhost";
                $dbuser = "root";
                $dbpass = "";
                $dbname = "firma";

                $polaczenie = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);


                $zapytanie1 = "SELECT szkolenia.Data, szkolenia.Temat FROM szkolenia ORDER BY szkolenia.Data ASC;";
                $wynik1 = mysqli_query($polaczenie, $zapytanie1);

                $plik = fopen("harmonogram.txt", "w");

                while ($wiersz1 = mysqli_fetch_assoc($wynik1)) {
                    echo "<p>" . $wiersz1['Data'] . " " . $wiersz1['Temat'] . "</p><br>";
                    fwrite($plik, $wiersz1['Data'] . " " . $wiersz1['Temat'] . "\n");
                }

                fclose($plik);
                mysqli_close($polaczenie);
            ?>
        </section>
    </main>
    
    <footer>
        <h2>Firma szkoleniowa, ul. Główna 1, 23-456 Warszawa</h2>
        <p>Autor: 5i</p>
    </footer>

</body>
</html>