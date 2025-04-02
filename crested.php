<!DOCTYPE html>
<html lang="pl-PL">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl.css">
    <title>Hodowla świnek morskich</title>
</head>
<body>
    <section class="baner">
        <h1>Hodowla świnek morskich - zamów świnkowe maluszki</h1>
    </section>

    <section><section class="prawy">
            <h3>Poznaj wszystkie rasy świnek morskich</h3>
                <ol>
                    <!-- skrypt 1 -->
                    <?php
                        $host = 'localhost';
                        $user = 'root';
                        $password = '';
                        $db = 'hodowla';

                        $con = mysqli_connect($host, $user, $password, $db);
                        $sql = 'select rasa from rasy;';

                        $wynik = mysqli_query($con, $sql);

                        while ($row = mysqli_fetch_array($wynik)){
                            echo '<li>' . $row['rasa'] . '</li>';
                        }
                    ?>
                </ol>
        </section>
        <section class="menu">
            <a href="peruwianka.php">Rasa Peruwianka</a>
            <a href="american.php">Rasa American</a>
            <a href="crested.php">Rasa Crested</a>
        </section>
        
        <section class="glowny">
            <img src="crested.jpg" alt="Świnka morska rasy crested">
            <!-- skrypt 2 -->
            <?php
                $host = 'localhost';
                $user = 'root';
                $password = '';
                $db = 'hodowla';

                $con = mysqli_connect($host, $user, $password, $db);
                $sql = 'select DISTINCT data_ur, miot, rasa from swinki INNER join rasy on rasy.id=swinki.rasy_id where rasy_id=7;';

                $wynik = mysqli_query($con, $sql);

                while ($row = mysqli_fetch_array($wynik)){
                    echo '<h2>Rasa:' . $row['rasa'] . '</h2>' ;
                    echo '<p>Data urodzenia: ' . $row['data_ur'] .'</p> ';
                    echo '<p>Oznaczenie miotu: ' . $row['miot'] . '</p> ' ;
                }
            ?>
            <hr>
            <h2>Świnki w tym miocie</h2>
            <!-- Skrypt 3 -->
            <?php
                $host = 'localhost';
                $user = 'root';
                $password = '';
                $db = 'hodowla';

                $con = mysqli_connect($host, $user, $password, $db);
                $sql = 'select imie, cena, opis from swinki where rasy_id=7;';

                $wynik = mysqli_query($con, $sql);

                while ($row = mysqli_fetch_array($wynik)){
                    echo '<h2>' . $row['imie'] . ' - ' . $row['cena'] . ' zł</h2>';
                    echo '<p>' . $row['opis'] . '</p>';
                }
                mysqli_close($con);
            ?>
        </section>
    </section>

    <section class="stopka">
        <p>Stronę wykonał: Artsiom Klimkovich</p>
    </section>
</body>
</html>