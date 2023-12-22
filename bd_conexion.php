<?php
function obtenerConexion(){
    try {
        // Establece la conexión a la base de datos
        $conexion = new PDO("mysql:host=localhost;port=3306;dbname=cursograficos_db", "root", "");
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

        return $conexion;

    } catch (PDOException $error) {
        // Maneja el error (en un entorno de producción, esto puede necesitar un tratamiento diferente)
        die("Error de conexión: " . $error->getMessage());
    }
}