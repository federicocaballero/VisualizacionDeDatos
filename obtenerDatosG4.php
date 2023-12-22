<?php
require_once 'bd_conexion.php';

function datosGrafico4() {
    $conexion = obtenerConexion();
    
    //Hace la consulta a la base de datos con los datos que quiero traer
    $res = $conexion->query('SELECT
            o.MesVenta as Mes,
            ROUND(SUM(od.precio * od.cantidad)) AS totalVentasPorMes
        FROM
            orden o
        JOIN
            ordendetalle od ON o.OrderID = od.IDorden
        WHERE
            o.anioVenta = 2023
        GROUP BY
        Mes;') or die(print($conexion->errorInfo()));


    
    //inicializa un array vacio para cargarlo luego con los datos
    $data = [];
 
    //Recorre el array recibido de la consulta y va llenando el array data con 
    //los datos que nos interesan
    while($item = $res->fetch(PDO::FETCH_OBJ)) {

        $data[] = [
            //'ID' => $item->productoID,
            'Mes' => $item->Mes,
            'totalVentasPorMes' => $item->totalVentasPorMes,
        ];

    }
    //a la respuesta que recibe (array de elementos en data) lo
    //convierte en json
    echo json_encode($data);
}
datosGrafico4();