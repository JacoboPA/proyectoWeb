<?php
/**
 * Created by PhpStorm.
 * User: Jacobo
 * Date: 19/03/2018
 * Time: 18:03
 */

$ip_usuario = $_SERVER['REMOTE_ADDR'];//Con esta línea capturamos la dirección ip del usuario.
function conectar()
{
    $conexion = mysqli_connect("127.0.0.1", "homestead", "secret", "homestead");
    return $conexion;
}

function consulta()
{
    $usuario = $_GET['nombre'];

    $conexion = conectar();
    $consulta = $conexion->query("select name from users where name='" . $usuario . "'");

    return $consulta;
}

$archivos = consulta();
if($_GET['nombre']== ""){
    echo "";
}else{
    if($archivos->num_rows>0){
        echo "no disponible";
    }
    else{
        echo "disponible";
    }

}

