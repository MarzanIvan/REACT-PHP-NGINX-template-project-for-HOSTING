<?php
header('Content-Type: application/json');
require_once 'db.php';

$stmt = $pdo->query("SELECT id, name FROM users ORDER BY id ASC");
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($users);
?>
