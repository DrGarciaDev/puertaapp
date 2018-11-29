<?php //codigo cambios

if (array_key_exists('numero', $_REQUEST)){
    $nocasa         = $_REQUEST['numero'];
    $password       = $_REQUEST['contra'];
    $propietario    = $_REQUEST['nombre'];
    $adeudo         = $_REQUEST['adeudo'];
    //script de agregar

    //conectamos la base de datos
    $server="localhost";
    $user="id6894656_mario";
    $pass="mario";
    $bd="id6894656_mario";

    $conexion = new mysqli($server,$user,$pass,$bd);

    //$con=mysqli_connect("localhost","id127413_mario","mario","id127413_datos");
    $sql="INSERT INTO fraccionamiento(NoCasa,Password,nombreP,Adeudo) 
    VALUES('$nocasa', '$password', '$propietario', '$adeudo')";
    $retval=(mysqli_query($conexion,$sql));

    if ($retval > 0) {
        //echo "<script>alert('Registro agregado con éxito');</script>";
        echo "1";
    }else {
        //echo "<script>alert('Registro NO agregado');</script>";
        echo "0";
    }
    mysqli_close($conexion);
}else{
    echo "0";
}
?>
