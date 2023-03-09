<?php
include 'env.php';

$conn = new mysqli($host, $user, $password, $database);

if ($mysqli->connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli->connect_error;
  exit();
}

$sql = "SELECT cabecera, id_client FROM factura WHERE `estado` = 'a' AND `factura`.`id` = '".$factura."';";
$results = $mysqli->query($sql);
$row = $results->fetch_all(MYSQLI_ASSOC);
$results->free_result();
$mysqli->close();

echo $row;
?>
