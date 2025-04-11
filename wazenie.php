<!DOCTYPE html>
<html lang="pl-PL">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ważenie samochodów ciężarowych</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header>
        <section id="goralewo">
            <h1>Ważenie pojazdów we Wrocławiu</h1>
        </section>
        <section id="goraprawo">
            <img src="obraz1.png" alt="waga">
        </section>
    </header>
    <main>
        <section id="lewy">
            <h2>Lokalizacje wag</h2>
            <ol>
                <?php

                    $PDO = new PDO('mysql:host=localhost;dbname=wazenietirow;charset=utf8;port=3306', 'root', '');

                    $stmt = $PDO->query('SELECT * FROM `lokalizacje`');

                    foreach($stmt as $row){

                        echo '<li>ulica ' . $row['ulica'] . '</li>';

                    }

                ?>
            </ol>
            <h2>Kontakt</h2>
            <a href="mailto:wazenie@wroclaw.pl">napisz</a>
        </section>
        <section id="srodkowy">
            <h2>Alerty</h2>
            <table>
                <tr><th>rejestracja</th><th>ulica</th><th>waga</th><th>dzień</th><th>czas</th></tr>
                <?php

                    $PDO = new PDO('mysql:host=localhost;dbname=wazenietirow;charset=utf8;port=3306', 'root', '');

                    $stmt = $PDO->query('SELECT `rejestracja`, `waga`, `dzien`, `czas`, `lokalizacje`.`ulica` FROM `wagi` INNER JOIN `lokalizacje` ON `wagi`.`lokalizacje_id` = `lokalizacje`.`id` WHERE `wagi`.`waga` > 5');

                    foreach($stmt as $row){

                        echo '<tr><td>' . $row['rejestracja'] . '</td><td>' . $row['ulica'] . '</td><td>' . $row['waga'] . '</td><td>' . $row['dzien'] . '</td><td>' . $row['czas'] . '</td></tr>';

                    }

                ?>
            </table>
        </section>
        <section id="prawy">
            <img src="obraz2.jpg" alt="tir" id="obraz2">
        </section>
    </main>
    <footer>
        <p>Strone wykonał: Warmowski Nikodem</p>
    </footer>
</body>
</html>
<?php

    $PDO = new PDO('mysql:host=localhost;dbname=wazenietirow;charset=utf8;port=3306', 'root', '');

    $stmt = $PDO->query('INSERT INTO `wagi`(`lokalizacje_id`, `waga`, `rejestracja`, `dzien`, `czas`) VALUES (5, FLOOR(1 + RAND() * (10 - 1 + 1)), "DW12345", CURRENT_DATE, CURRENT_TIME)');

    header('Refresh: 10');

    $PDO = NULL;

?>