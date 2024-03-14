<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>GastenBoek</title>
</head>
<body>

    <form method="post">

        <label for="naam">Naam:</label>
        <input type="text" name="naam">

        <br><br>

        <label for="bericht">Bericht:</label>
        <br>
        <textarea name="bericht"></textarea>

        <br><br>

        <button name="opslaan">Opslaan</button>

    </form>

    <?php

        include_once "function.php";

        echo '<br><br>';
        echo '<hr>';

        $users = $db->prepare("SELECT * FROM berichten WHERE id = (SELECT MAX(id) FROM berichten);");
        $users->execute();
        $result = $users->fetchAll(PDO::FETCH_ASSOC);

        echo "<div>";

            foreach ($result as $data) {
                echo "<h2>" . $data["naam"] . " - " . $data["datumtijd"] . "</h2>";
                echo "<h3>" . $data["bericht"] . "</h3>";
            }

        echo "</div>";

    ?>
</body>
</html>