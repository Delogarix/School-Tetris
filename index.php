<?php

try {

    $db_server = new PDO(
        'mysql:host=localhost;dbname=tetris;charset=utf8',
        'root',
        '3wrDPG'
    );

    $content = trim(file_get_contents("php://input"));
    $decoded = json_decode($content, true);

    $dbQuery = $db_server->prepare('SELECT id, score FROM LEADERBOARD ORDER BY score');
    $dbQuery->execute();
    $dbContent = $dbQuery->fetchAll();


} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

//print_r($dbContent);

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mini-Tetris</title>
</head>
<body>
    <header>
        <?php include_once(__DIR__ . "/struct/header.php") ?>
    </header>
    <main>
        <div id="board">
            <table>
                <thead>
                    <tr>
                        <td><p>Id :</p></td>
                        <td><p> Score :</p></td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if (isset($dbContent)) {
                            foreach ($dbContent as $dbrow) {
                                echo "<tr>";
                                echo "<td> {$dbrow['id']} </td>";
                                echo "<td> {$dbrow['score']} </td>";
                                echo "</tr>";
                            }
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </main>
</body>
</html>