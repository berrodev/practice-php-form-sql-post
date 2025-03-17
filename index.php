<?php
$serverName = "mssql";
$connectionOptions = [
    "Database" => "your_database",
    "Uid" => "sa",
    "PWD" => "YourStrong!Passw0rd",
    "TrustServerCertificate" => true
];

$conn = sqlsrv_connect($serverName, $connectionOptions);

if ($conn === false) {
    die(print_r(sqlsrv_errors(), true));
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST["name"];
    $rut = $_POST["rut"];
    $gender = $_POST["gender"];

    $sql = "INSERT INTO users (name, rut, gender) VALUES (?, ?, ?)";
    $params = [$name, $rut, $gender];
    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
    } else {
        echo "Registro insertado con éxito.";
    }
}

sqlsrv_close($conn);
?>

<form method="POST">
    <input type="text" name="name" placeholder="Nombre" required>
    <input type="text" name="rut" placeholder="RUT" required>
    <select name="gender">
        <option value="M">Masculino</option>
        <option value="F">Femenino</option>
    </select>
    <button type="submit">Enviar</button>
</form>
