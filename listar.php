<?php

try {

    $conexion = new PDO("mysql:host=localhost;port=3306;dbname=prueba_bd", "root", "");
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

    $res = $conexion->query('SELECT * FROM usuarios') or die(print($conexion->errorInfo()));

    $data = [];

    while($item = $res->fetch(PDO::FETCH_OBJ)) {

        $data[] = [
            'id' => $item->id,
            'nombre' => $item->nombre,
            'cant_ventas' => $item->cant_ventas
        ];

    }

    echo json_encode($data);

} catch(PDOException $error) {
    echo json_encode(array("error" => $error->getMessage()));
    die();}