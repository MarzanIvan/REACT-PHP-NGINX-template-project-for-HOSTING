<?php
    $host = 'mysql_db';      // Имя контейнера MySQL из docker-compose.yml
    $db   = 'USERSDB';    // Имя базы данных
    $user = 'root';           // Пользователь
    $pass = 'root';           // Пароль
    $charset = 'utf8mb4';
    
    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $e) {
    die(json_encode(['error' => $e->getMessage()]));
}
?>