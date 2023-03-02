<?php
include 'env.php';

try {
    $conn = new PDO('mysql:host=proyecto-tfg.atic.green;dbname=proyecto-tfg',$user,$password);
} catch (PDOException $exception) {
    die($exception->getMessage());
}

$sql = "SELECT id,cabecera,detalle,fecha_creacion FROM factura WHERE `estado` = 'a';";
$st = $conn->query($sql);

if ($st) {
    $rs = $st->fetchAll(PDO::FETCH_FUNC, fn($id, $cabecera, $detalle, $fecha_creacion) => [$id, $cabecera, $detalle, $fecha_creacion] );
    echo json_encode([
        'data' => $rs,
    ]);
} else {
    var_dump($conn->errorInfo());
    die;
}