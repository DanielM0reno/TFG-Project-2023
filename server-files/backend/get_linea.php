<?php
include 'env.php';

try {
    //$conn = new PDO('mysql:host=proyecto-tfg.atic.green;dbname=proyecto-tfg',$user,$password);
    $conn = new PDO('mysql:host=localhost;dbname=proyecto-tfg',$user,$password);

} catch (PDOException $exception) {
    die($exception->getMessage());
}

$sql = "SELECT `detalle`,`product`.`name` AS `producto`,`cantidad`,`product`.`precio` FROM `linea`,`product` WHERE `id_product` = `product`.`id` AND `id_factura` = 2";
$st = $conn->query($sql);

if ($st) {
    $rs = $st->fetchAll(PDO::FETCH_FUNC, fn($detalle, $producto, $cantidad, $precio) => [$detalle, $producto, $cantidad, $precio] );
    echo json_encode([
        'data' => $rs,
    ]);
} else {
    var_dump($conn->errorInfo());
    die;
}