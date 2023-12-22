<?php
require_once 'bd_conexion.php';
function datosGrafico3() {
    $conexion = obtenerConexion();
    
    //Hace la consulta a la base de datos con los datos que quiero traer
    $res = $conexion->query('SELECT o.anioVenta AS Ano, SUM(od.precio * od.cantidad) AS TotalVentas
    FROM orden o
    JOIN ordenDetalle od ON o.OrderID = od.IDorden
    GROUP BY o.anioVenta
    ORDER BY o.anioVenta;
    ') or die(print($conexion->errorInfo()));

    //inicializa un array vacio para cargarlo luego con los datos
    $data = [];
 
    //Recorre el array recibido de la consulta y va llenando el array data con 
    //los datos que nos interesan
    while($item = $res->fetch(PDO::FETCH_OBJ)) {

        $data[] = [
            //'ID' => $item->productoID,
            'Ano' => $item->Ano,
            'TotalVentas' => $item->TotalVentas,
        ];

    }
    //a la respuesta que recibe (array de elementos en data) lo
    //convierte en json
    echo json_encode($data);
}
datosGrafico3();