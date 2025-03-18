<?php
$connectionStatus = include 'bd.php';

if (!$connectionStatus) {
    die("Error de conexión a la base de datos.");
}

if($_POST){
    echo "Nombre: $name<br>";
    echo "RUT: $rut<br>";
    echo "Género: $gender<br>";
}

?>

<form method="POST">
    <input type="text" name="name" placeholder="Nombre" required>
    <input type="text" name="rut" placeholder="RUT" required>
    <select name="gender">
        <option value="1">Masculino</option>
        <option value="2">Femenino</option>
        <option value="3">Otro</option>
    </select>
    <button type="submit">Enviar</button>
</form>