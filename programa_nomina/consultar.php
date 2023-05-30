<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="/estilos/style1.css">
     <title>Consultar Empleado</title>
</head>
<body>
     <center>

     <h1 class='a'>CREAR EMPLEADO</h1>
<form action="index.php" method="post" class="crear">
     <label for="codigo"> codigo</label>
     <input type="number" name="codigo" required>
     <br>   
     <label for="nombre"> Nombre</label>
     <input type="text" name="nombre" required>
     <br>
     <label for="Apellido"> Apellido </label>
     <input type="text" name="apellido" required>
     <br>
     <label for="Apellido2"> Segundio Apellido</label>
     <input type="text" name="apellido2" placeholder="optional" >
     <br>
     <label for="cargo">Cargo</label>
     <input type="text" name="cargo" required>
     <br>
     <label for="sueldo"> Sueldo</label>
     <input type="number" name="sueldo" required>
     <br>
     <label for="fecha">Fecha Ingreso</label>
     <input type="date" name="fecha" required>
     <br>
     <input type="submit" name="crear" value="Crear">
     </form>
     </center>
</body>
</html>