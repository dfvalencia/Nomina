<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/estilos/style1.css">
    <title>Nomina</title>
</head>
<body>
    <center>
        <h1 class="a"> CREAR NÓMINA </h1>
    <form action="index.php" method="post" class="nomina">
        <label for="codigo"> CODIGO</label>
        <input type="number" name="codigo" required>
        <br>
        <label for="fecha1">Ingresa desde cuando quieres pagar</label>
        <input type="date" name="fecha1" required>
        <br>
        <label for="fecha2">Ingresa hasta cuando quieres pagar</label>
        <input type="date" name="fecha2" required>
        <br>
        <input type="submit" name="nomina" value="Calcular">

    </form>
    </center>
</body>
</html>