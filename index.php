<?php


    //aggiungo il database
    require_once __DIR__ . "/database.php";

    //salvo in una variabile la query di MySql
    $sql = "SELECT * FROM `stanze`;";
    //  "conn->query" lo invio al database il quale restituisce un risultato

    $result = $conn->query($sql);

    $rooms = [];
    if($result && $result->num_rows > 0) { 
        while($row = $result->fetch_assoc()) {
            
            //pusha ogni riga in rooms[]
            $rooms[] = $row; 
        }
    }

    $conn->close();
    //chiude la connessione


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Database Hotel</title>
</head>


<body>
    <h1>Lista stanze</h1>

    <!-- Se l'array non è vuoto stampo la lista delle stanze -->
    <?php if(!empty($rooms)) { ?>
            <ul>
                <?php foreach($rooms as $room) { ?>
                    <li>
                        <div>Stanza n. <?php echo $room["room_number"] ?></div>
                        <div>Piano n. <?php echo $room["floor"] ?></div>
                        

                        <a href="room_info.php?id=<?php echo $room["id"] ?>"> Dettagli della stanza</a>
                    </li>
                <?php } ?>
            </ul>
    <?php } else { ?>
        <p>Lista stanze vuota!</p>
    <?php } ?>
</body>
</html>