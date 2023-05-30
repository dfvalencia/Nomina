<?php 
require_once ("programa.php");
require "HTML.php";


// error_reporting(-E_ALL & ~E_WARNING);



$empleado2 = new Empleado(); 




setcookie('session');


if(isset($_POST['crear'])){
    
    $codigo=$_POST['codigo'];
    $nombre= $_POST['nombre'];
    $apellido=$_POST['apellido'];
    $apellido2=$_POST['apellido2'];
    $cargo= $_POST['cargo'];
    $sueldo=$_POST['sueldo'];
    $fecha=$_POST['fecha'];    

    $empleado2->guardarEmpleado($codigo,$nombre,$apellido,$apellido2,$cargo,$sueldo,$fecha);



}elseif (isset($_POST['eliminar'])) {
    $codigo=$_POST['codigo'];
    $empleado2 -> eliminar_empleado($codigo);
}elseif(isset($_POST['nomina'])){
    $codigo=$_POST['codigo'];
    $fecha1=$_POST['fecha1'];
    $fecha2=$_POST['fecha2'];
    $empleado2 -> calcularNomina($codigo,$fecha1,$fecha2);
}elseif(isset($_POST['consultar'])){
    $empleado2 -> mostrarEmpleados();


}









// $empleado2 -> calcularNomina(10,'2023-04-10');








?>