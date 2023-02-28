<?php
try {
    $conn = new PDO('mysql:host=localhost;dbname=db_muestra','root','');
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