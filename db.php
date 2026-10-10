<?php
declare(strict_types=1);
$config = require __DIR__ . '/config.php';
try {
    $pdo = new PDO('mysql:host='.$config['host'].';charset='.$config['charset'], $config['user'], $config['password'], [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ]);
    $dbName = str_replace('`', '``', $config['database']);
    $pdo->exec("CREATE DATABASE IF NOT EXISTS `$dbName` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");
    $pdo->exec("USE `$dbName`");
    $pdo->exec("CREATE TABLE IF NOT EXISTS pedidos (
        id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        direccion VARCHAR(255) NOT NULL,
        sencilla INT UNSIGNED NOT NULL DEFAULT 0,
        doble INT UNSIGNED NOT NULL DEFAULT 0,
        mixta INT UNSIGNED NOT NULL DEFAULT 0,
        estado ENUM('Preparando','Despacho') NOT NULL DEFAULT 'Preparando',
        creado_en TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
        actualizado_en TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        INDEX idx_estado (estado), INDEX idx_creado_en (creado_en)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci");
} catch (Throwable $e) {
    http_response_code(500);
    exit('<!doctype html><html lang="es"><meta charset="utf-8"><title>Error</title><body style="font-family:Arial;margin:40px"><h1>No se pudo preparar la base de datos</h1><p>Comprueba las credenciales y que el usuario MySQL tenga permisos para crear o usar la base de datos.</p><p><b>Detalle:</b> '.htmlspecialchars($e->getMessage(), ENT_QUOTES|ENT_SUBSTITUTE, 'UTF-8').'</p></body></html>');
}
