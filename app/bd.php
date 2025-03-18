<?php
$serverName = "mssql";
$connectionOptions = [
    "Uid" => "sa",
    "PWD" => "YourStrong!Passw0rd",
    "TrustServerCertificate" => true
];

$conn = sqlsrv_connect($serverName, $connectionOptions);

if ($conn === false) {
    return false;
}
// query para crear base de dato si no existe usuarios
$sql = "IF NOT EXISTS (SELECT * FROM sys.databases WHERE name = 'usuarios')
    CREATE DATABASE usuarios";

sqlsrv_query($conn, $sql);

// Create table if not exists
$sql = "USE usuarios
    IF NOT EXISTS (SELECT * FROM sys.tables WHERE name = 'usuarios')
    CREATE TABLE usuarios (
        name VARCHAR(100) NOT NULL,
        rut VARCHAR(12) NOT NULL PRIMARY KEY,
        genero CHAR(1) NOT NULL
    )";

sqlsrv_query($conn, $sql);


// Insert data
if ($_POST) {
    $name = $_POST['name'];
    $rut = $_POST['rut'];
    $gender = $_POST['gender'];
    $sql = "USE usuarios
        INSERT INTO usuarios (name, rut, genero) VALUES ('$name', '$rut', '$gender')";
    sqlsrv_query($conn, $sql);
}

// Inser Dummy data for testing 3 records

$sql = "USE usuarios
    INSERT INTO usuarios (name, rut, genero) VALUES ('Juan Perez', '12345678-9', 'M'),
    ('Maria Perez', '12345678-0', 'F'),
    ('Pedro Perez', '12345678-1', 'M')";
sqlsrv_query($conn, $sql);






return true;
?>
