<?php
include 'env.php';

try {
    //$conn = new PDO('mysql:host=proyecto-tfg.atic.green;dbname=proyecto-tfg',$user,$password);
    $conn = new PDO('mysql:host=localhost;dbname=proyecto-tfg',$user,$password);

} catch (PDOException $exception) {
    die($exception->getMessage());
}

$sql = "SELECT `detalle`,`product`.`name` AS `Producto`,`cantidad`,`product`.`precio` FROM `linea`,`product` WHERE `id_product` = `product`.`id` AND `id_factura` = 2";
$st = $conn->query($sql);

if ($st) {
    $rs = $st->fetchAll(PDO::FETCH_FUNC, fn($id, $cabecera, $fecha_creacion, $client) => [$id, $cabecera, $fecha_creacion, $client] );
    echo json_encode([
        'data' => $rs,
    ]);
} else {
    var_dump($conn->errorInfo());
    die;
}