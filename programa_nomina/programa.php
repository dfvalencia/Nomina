
<?php
/**
 * CALCULAR NOMINA DE EMPLEADOS Y PODER CONSULTAR EN LA BASE DE DATOS! 
 * @Authors : GAES #2
 * FECHA    : 17/05/2023
 */
echo"<link rel='stylesheet' href='./estilos/style.css'>";
echo '<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">';
echo '<script src="https://kit.fontawesome.com/f718fec11f.js" crossorigin="anonymous"></script>';
ini_set('display',0);
    
class Empleado {
    private $codigo_empleado;
    private $nombre_empleado;
    private $apellido;
    private $apellido2;
    private $cargo;
    private $sueldo;
    private $fecha_ingreso;
 
    // creamos como atributo la variable donde va a ir instanciada la base de datos!
    private $db; 
    
    
    public function __construct() {
        $this -> codigo_empleado;
        $this -> nombre_empleado;
        $this -> apellido;
        $this -> apellido2;
        $this -> cargo;
        $this -> sueldo;
        $this -> fecha_ingreso;
       
        // Instanciamos la base de datos
        $this-> db= new mysqli('localhost','root','','empresa');
        // condicional para que nos muestre el error si no conecta a la base de datos
        if ($this->db->connect_errno){
            echo "No es posible conectarse a la base de datos, ERROR (". $this->db->connect_error.")";
        }
    }
    // Funcion para calcular la nomina de cada empleado!

    public function calcularNomina($codigo,$fecha1,$fechaPagar) {
        //consulta para traer el codigo del empleado y mas adelante compararlo
        $sql= "select codigo_empleado from empleados where codigo_empleado = $codigo";
        $r = $this->db->query($sql);
        $fila= $r ->fetch_assoc();

        //consulta para traer la fecha de ingreso del empleado
        $sql3 = "select FECHA_INGRESO from empleados where codigo_empleado = $codigo";
        $fechai = $this->db->query($sql3);
        $fila3= $fechai ->fetch_assoc();

        // consulta para traer el sueldo diario que se le paga a el empleado
        $sql1= "select sueldo from empleados where codigo_empleado = $codigo";

        // consulta para traer el nombre del empleado
        $sql2 = "select nombre_empleado from empleados where codigo_empleado = $codigo";
        $resultado1= $this ->db ->query($sql1);
        $resultado2 = $this->db->query($sql2);
        
            if ($resultado2->num_rows > 0) {
                
                // Traemos la fecha hasta donde el trabajó
                $fecha2 = date($fechaPagar);
                // Traemos la fecha de ingreso 
                $fecha= date($fecha1);
               

                // se hace la operacion para saber cuantos dias trabajó.
                $diferencia = strtotime($fecha2) - strtotime($fecha);
                
                $diasTranscurridos = floor($diferencia / (60 * 60 * 24))-4; // se convierten los segundos en dias. 
            
                $fila1 = $resultado1->fetch_assoc();
                // Traenos el sueldo que se le paga diario
                $sueldo = $fila1['sueldo'];
            

                // multiplicamos el sueldo diario por los dias transcurridos hasta el dia de pago
                $sueldo1 = $sueldo*$diasTranscurridos;
                
                $fila2 = $resultado2->fetch_assoc();
                $nombre= $fila2['nombre_empleado'];
                $salario_minimo = 1160000;
                // condicion para saber si el empleado está en la base de datos.
                if($fila != null){
                    // condicion para revisar si la fecha de ingreso es mayor o igual que la fecha de pago!!
                    if($fecha1 >= $fila3['FECHA_INGRESO']){
                        if($diasTranscurridos < 0){
                            echo"<center>";
                            echo" <p class='error'> <br><br>No se puede calcular la nomina, verifique los datos</p>"; 
                            echo"</center>";
                        }else{
                            //Condicion de descuento por ganar mas de 4 SMLMV! 
                            if ($sueldo1 > ($salario_minimo*4)){
                                $eps =  $sueldo1 *(0.04);
                                $pension = $sueldo1 *(0.04);
                                $descuento2 = $eps + $pension;
                                $descuento =$sueldo1 * 0.01 ;
                                $sueldofinal = $sueldo1 - $descuento;
                                $sueldo2 = $sueldofinal - $pension - $eps;
                                echo "<center>";
                                echo "<div class='b'>";
                                echo "<br><br>Tiene que pagar: ".$diasTranscurridos. " dias <br>";
                                echo " <br>El sueldo a pagar al empleado: ".strtoupper($nombre).' es: $'.$sueldofinal ;
                                echo "<br>----------------------------------------------------------------------------";
                                echo "<br> El descuento de Eps y pensión es: $".$descuento2;
                                echo "<br>----------------------------------------------------------------------------";
                                echo " <br> El total a pagar es: $".$sueldo2;
                                echo "</center>";
                                echo "</div>";
                            

                            // condicion para el auxilio de transporte
                            }elseif($sueldo1<($salario_minimo*2)){
                                $eps =  $sueldo1 *(0.04);
                                $pension = $sueldo1 *(0.04);
                                $descuento= $eps + $pension;
                                $boni =140000;
                                $sueldo2= $sueldo1  + $boni;
                                $sueldofinal = $sueldo2 - $descuento;
                                echo "<center>";

                                echo "<div class='b'>";
                                echo "<br><br>Tiene que pagar: ".$diasTranscurridos. " dias <br>";
                                echo " <br>El sueldo a pagar al empleado: ".strtoupper($nombre).' es: $'.$sueldo2 ;
                                echo "<br>----------------------------------------------------------------------------";
                                echo "<br> El descuento de Eps y pensión es: $".$descuento;
                                echo "<br>----------------------------------------------------------------------------";
                                echo " <br> El total a pagar es: $".$sueldofinal;
                                echo "</center>";
                                echo "</div>";
                            
                            }elseif($sueldo1 < 0){
                                echo "<br>ERROR";
                            }
                            else{
                                $eps =  $sueldo1 *(0.04);
                                $pension = $sueldo1 *(0.04);
                                $descuento= $eps + $pension;
                                $sueldo2= $sueldo1;
                                $sueldofinal = $sueldo2 - $descuento;
                                echo "<center>";

                                echo "<div class='b'>";
                                echo "<br><br>Tiene que pagar: ".$diasTranscurridos. " dias <br>";
                                echo " <br>El sueldo a pagar al empleado: ".strtoupper($nombre).' es: $'.$sueldo2 ;
                                echo "<br>----------------------------------------------------------------------------";
                                echo "<br> El descuento de Eps y pensión es: $".$descuento;
                                echo "<br>----------------------------------------------------------------------------";
                                echo " <br> El total a pagar es: $".$sueldofinal;
                                echo "</center>";
                                echo "</div>";
                            }
                        }
                    }else{
                        echo"<center>";
                        echo" <p class ='error'>NO ES POSIBLE HACER LA CONSULTA, VERIFIQUE QUE EL DATO INGRESADO ES CORRECTO!</p>";
                        echo "</center>";
                    }
                }
            }else{
            echo"<center>";
            echo "<p class = 'error'> <br>NO ES POSIBLE REALIZAR LA OPERACION, EL EMPLEADO NO EXISTE</p>";
            echo"</center>";
    }
    }

    // Funcion para mostrar los empleados que estan en la Empresa!
    public function mostrarEmpleados(){

        $sql = "select * from empleados";
        $resultado=$this-> db ->query($sql);
        echo "<center>";
        echo "<div class='tabla'>";
        echo"<table>";
        echo"   <tr>";
        echo"       <td class='titulos'>ID</td>";
        echo"       <td class='titulos'>NOMBRE</td>";
        echo"       <td class='titulos'>APELLIDO</td>";
        echo"       <td class='titulos'>SUELDO</td>";
        echo"   </tr>";

        while($fila=$resultado->fetch_assoc()) {;

        echo"    <tr>";
        echo"        <td class='campos'>".$fila['codigo_empleado'] ."</td>";
        echo"        <td class='campos'>".$fila['nombre_empleado'] ."</td>";
        echo"        <td class='campos'>".$fila['apellido1'] ."</td>";
        echo"        <td class='campos'>".$fila['sueldo'] ."</td>";
        echo"        <td><i class='fa-solid fa-user-pen bg-success p-2 text-white rounded' data-toggle='tooltip'
                     title='Editar' aria-hidden='true'></i></td>";
        echo "       <td><i class='fa fa-trash bg-danger p-2 text-white rounded' data-toggle='tooltip'
                     title='Eliminar' aria-hidden='true'></i></td>";
                
        echo"    </tr>";

          }  
        echo"</table>";
        echo"</div>";
        echo "</center>";
        
     
    }   
    
    
    // Funcion para eliminar el empleado 
    public function eliminar_empleado($codigo){
        // consulta de sql para eliminar el empleado
        $sql1 = "select codigo_empleado from empleados where codigo_empleado = $codigo";
        $r = $this->db->query($sql1);
        $fila= $r ->fetch_assoc();
        $sql ="delete from empleados where codigo_empleado = $codigo";
         if($fila != NULL){
            if ($this->db->query($sql) === TRUE ) {
                echo strtoupper("Empleado eliminado correctamente");
            } else {
                
                echo "<p class = 'error'>Error al eliminar el empleado </p>" . 
                $this ->db->error;
            }
        }else{
            echo "<center>";
            echo "<p class='error'> <br>No se puede eliminar, ya que no existe ningun registro con este codigo </p>";
            echo "</center>";
        }
        

    }
    

    public function guardarEmpleado($codigo,$nombre,$apellido,$apellido2,$cargo,$sueldo,$fecha1) {
        $this -> codigo_empleado=$codigo;
        $this -> nombre_empleado =$nombre;
        $this -> apellido= $apellido;
        $this -> apellido2= $apellido2;
        $this -> cargo = $cargo;
        $this -> sueldo = $sueldo;
        $this -> fecha_ingreso = $fecha1;
        
        
        $sql = "insert into empleados (codigo_empleado,nombre_empleado,apellido1 ,apellido2,cargo,sueldo,fecha_ingreso) VALUES ($codigo,'$nombre','$apellido','$apellido2','$cargo', $sueldo,'$fecha1')";
        
        
        if ($this->db->query($sql) == TRUE) {
            echo'<div class="guardado">';
            echo "Empleado guardado correctamente";
            echo '</div>';
        } else {
            echo "Error al guardar el empleado: " . 
            $this-> db->execute_query($sql);
        }
    }


}



