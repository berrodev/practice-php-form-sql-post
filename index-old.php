<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form-sql-post</title>
</head>

<body>
    <main>
        <form action="insert.php" method="post">
            <label for="name">Nombre:</label>
            <input type="text" name="name" id="name" required>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required>
            <label for="phone">Teléfono:</label>
            <input type="tel" name="phone" id="phone" required>
            <input type="submit" value="Enviar">
        </form>
    </main>
</body>

</html>