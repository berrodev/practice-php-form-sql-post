<?php
$serverName = "192.168.1.100,1433"; // Cambia por tu IP o localhost
$database = "usuarios";
$username = "berro";
$password = "Sql141414.";

try {
    $conn = new PDO("sqlsrv:server=$serverName;Database=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "✅ Conexión exitosa a MSSQL";
} catch (PDOException $e) {
    die("❌ Error de conexión: " . $e->getMessage());
}
?>