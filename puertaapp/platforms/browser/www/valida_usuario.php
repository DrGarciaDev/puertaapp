<?php
//recibimos las variables de index.html

//session_start();

$usuario = $_REQUEST["usuario"];
$password = $_REQUEST["password"];
//$vusuario = "adm";

//include('include/header.php');

//conectamos la base de datos
$server="localhost";
$user="id127413_mario";
$pass="mario";
$bd="id127413_datos";

$conexion = new mysqli($server,$user,$pass,$bd);
//creamos la sentencia a ejecutar
$sql_valida_usuario = "SELECT * FROM fraccionamiento where NoCasa = '".$usuario."'; ";
//"Select * FROM fraccionamiento where NoCasa= 'adm'";
$resultado = $conexion->query($sql_valida_usuario);

//if ($conexion->query($sql_valida_usuario) == TRUE) {
if ($resultado) {
    //echo "string";
    $count_casa = $resultado->num_rows;
    if ($count_casa > 0){
        $fila = $resultado->fetch_assoc();
        $contenido = "";
        //echo $fila['NoCasa'];

        if ($fila['NoCasa'] == 'adm'){
            $contenido = '1';
        }else{
            $contenido = '2'.'@'.$fila['NoCasa'].'@'.$fila['Password'].'@'.$fila['nombreP'].'@'.$fila['Adeudo'];
        }
    }else{
        $contenido = '0@noEncontrado'.'@prueba';
    }
    echo $contenido;
} else {
    //echo "<script>alert('Error updating record: ".$con->error."');</script>";
    echo '-1';
}
//echo "$count_casa + $sql";


//include('include/footer.php');

?>