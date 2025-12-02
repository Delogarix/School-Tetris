<?php
try {

    $db_server = new PDO(
        'mysql:host=localhost;dbname=tetris;charset=utf8',
        'root',
        '49zbHu'
    );

    $content = trim(file_get_contents("php://input"));
    $decoded = json_decode($content, true);

    $dbInsert = $db_server->prepare('INSERT INTO LEADERBOARD (score) VALUES (?)');
    $dbInsert->execute([$decoded['score']]);

} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
$bdd = "oldval";
header('Content-Type: application/json; charset=utf-8');
echo json_encode($decoded);
?>