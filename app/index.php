<?php

if($_POST){
    echo "Hola mundo";
}

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