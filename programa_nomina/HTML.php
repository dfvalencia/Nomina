<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="./estilos/style.css">
    <title>NOMINA!</title>
</head>
<body>
    <div class="a" >
        <h1>RESULTADOS DE NÓMINA</h1>
    </div>
    <header class="botones">
        <a href="/consultar.php" class ="boton">CREAR</a>
        <a href="/eliminar.php" class="boton">ELIMINAR</a>
        <a href="/crearNomina.php" class="boton">CREAR NÓMINA </a>
        <form action="index.php" method="post">

            <input type="submit" name="consultar" class="boton" value="CONSULTAR" >
        </form>
        <!-- <div class= "consultar" ><a href="index.php" class='b'style="text-decoration:none" >CONSULTAR EMPLEADOS!</a></div>   -->

    </header>
 
</body>
</html>