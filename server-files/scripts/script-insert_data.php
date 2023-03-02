<?php
include '../backend/env.php';

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    echo("Connection failed: " . $conn->connect_error);
} else {

    $n_insert = 0;

    for ($i=0; $i < 1000; $i++) {
        // Valores aleatorios
        $rand_day = rand(1,31);
        $rand_moth = rand(1,12);
        $rand_user = rand(1,5);

        if($query = mysqli_query($conn, "INSERT INTO `factura` (`cabecera`, `detalle`, `fecha_creacion`, `estado`, `id_user`)" .
        "VALUES ('Factura nº" . $i . "', 'Descripcion de la factura nº" . $i . "', '".$rand_day."/".$rand_moth."/2022', 'a', '".$rand_user."');")){
            $n_insert++;
        };
    }
    echo "<h1>Se ha insertado correctamente ".($n_insert)." registros</h1>";
}?>