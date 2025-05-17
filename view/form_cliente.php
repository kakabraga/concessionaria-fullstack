<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Cliente</title>
</head>

<body>
    <form action="../Controller/ClienteDel.php" method="POST">
        <label for="">id</label>
        <input type="text" name="id_cliente" id="id_cliente">
        <!-- <label for="">cpf</label>
        <input type="text" name="cpf" id="cpf">
        <label for="">email</label>
        <input type="text" name="email" id="email"> -->
        <button type="submit" name="enviar">Enviar</button>
    </form>
</body>

</html>