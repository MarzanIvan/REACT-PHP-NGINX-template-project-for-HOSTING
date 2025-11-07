<?php
header('Content-Type: application/json');
global$Server;
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');

    if ($name === '') {
        echo json_encode(['success' => false, 'error' => 'Пустое поле']);
        exit;
    }

    $stmt = $pdo->prepare("INSERT INTO users (name) VALUES (:name)");
    $stmt->execute(['name' => $name]);

    echo json_encode(['success' => true, 'id' => $pdo->lastInsertId()]);
}
?>
