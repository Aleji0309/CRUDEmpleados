<?php

    // Definir los datos de conexión 

    $servidor = 'localhost';
    $usuario = 'root';
    $clave = '';
    $basedatos = 'empleados_app';

    // Crear la conexión con la base de datos 
    $conexion =  new mysqli($servidor, $usuario, $clave, $basedatos) ;

    // Mensaje de error si la conexi+pn falla
    if($conexion->connect_error){
        //echo "Error al conectar base de datos: " , $conexion -> connect_error ;
    } else {
        //echo "Conexión Exitosa";
    }

    
?>