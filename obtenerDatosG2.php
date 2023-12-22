<?php
require_once 'bd_conexion.php';

function datosGrafico2() {
    $conexion = obtenerConexion();
    
    //Hace la consulta a la base de datos con los datos que quiero traer
    $res = $conexion->query('SELECT  c.categoriaNombre, SUM(p.stock) AS totalStockPorCategoria
    FROM categorias c
    LEFT JOIN productos p ON c.categoriaID = p.IDcategoria
    GROUP BY c.categoriaNombre;') or die(print($conexion->errorInfo()));

    //inicializa un array vacio para cargarlo luego con los datos
    $data = [];

    //Recorre el array recibido de la consulta y va llenando el array data con 
    //los datos que nos interesan
    while($item = $res->fetch(PDO::FETCH_OBJ)) {

        $data[] = [
            //'ID' => $item->productoID,
            'categoriaNombre' => $item->categoriaNombre,
            'totalStockPorCategoria' => $item->totalStockPorCategoria,
        ];

    }
    //a la respuesta que recibe (array de elementos en data) lo
    //convierte en json
    echo json_encode($data);
}
datosGrafico2();