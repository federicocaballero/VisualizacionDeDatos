<?php
require_once 'bd_conexion.php';

function datosGrafico1() {
    $conexion = obtenerConexion();
    
    //Hace la consulta a la base de datos con los datos que quiero traer
    $res = $conexion->query('SELECT e.nombre, COUNT(o.OrderID) as cant_ventas
    FROM empleados e
    LEFT JOIN orden o ON e.empleadoID = o.IDempleado
    LEFT JOIN ordendetalle od ON o.OrderID = od.IDorden
    GROUP BY e.empleadoID, e.nombre') or die(print($conexion->errorInfo()));

    //inicializa un array vacio para cargarlo luego con los datos
    $data = [];

    //Recorre el array recibido de la consulta y va llenando el array data con 
    //los datos que nos interesan
    while($item = $res->fetch(PDO::FETCH_OBJ)) {

        $data[] = [
            //'ID' => $item->productoID,
            'nombre' => $item->nombre,
            'cant_ventas' => $item->cant_ventas,
        ];

    }
    //a la respuesta que recibe (array de elementos en data) lo
    //convierte en json
    echo json_encode($data);
    
}
datosGrafico1();
