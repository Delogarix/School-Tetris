<?php

include_once(__DIR__ . "/struct/dbinfo.php");

try {

    $db_server = new PDO(
        'mysql:host=localhost;dbname=tetris;charset=utf8',
        'root',
        $db_passwd
    );

    $content = trim(file_get_contents("php://input"));
    $decoded = json_decode($content, true);

    $dbQuery = $db_server->prepare('SELECT id, score FROM LEADERBOARD ORDER BY score DESC');
    $dbQuery->execute();
    $dbContent = $dbQuery->fetchAll();


} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

//print_r($dbContent);

?>

<!DOCTYPE html>
<html lang="fr" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mini-Tetris</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
    <header class="d-flex justify-content-center py-3">
        <?php include_once(__DIR__ . "/struct/header.php") ?>
    </header>
    <main class="d-flex justify-content-center py-3">
        <div class="container">
            <table class="table border">
                <thead>
                    <tr>
                        <th scope="col" class="table-info"><p>Id :</p></th>
                        <th scope="col" class="table-info"><p> Score :</p></th>
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