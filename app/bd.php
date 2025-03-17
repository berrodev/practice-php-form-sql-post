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
    return false;
}

return true;
?>
