<?php
$connectionStatus = include 'bd.php';

// Get data
$sql = "SELECT * FROM usuarios";
$result = sqlsrv_query($conn, $sql);
if ($result === false) {
    die(print_r(sqlsrv_errors(), true));
} 
echo "<table border='1'>
    <tr>
        <th>Nombre</th>
        <th>RUT</th>
        <th>Género</th>
    </tr>";
while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
    echo "<tr>
        <td>{$row['name']}</td>
        <td>{$row['rut']}</td>
        <td>{$row['genero']}</td>
    </tr>";
}
echo "</table>";

?>