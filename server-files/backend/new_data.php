<?php
	include 'env.php';

    try {
		$conn = new mysqli($host, $user, $password, $database);

    } catch (PDOException $exception) {
        die($exception->getMessage());
    }

    // Variables
	$client = $_POST['client'];
	$cabecera=$_POST['cabecera'];
	
	$data = json_decode(stripslashes($_POST['data']), true);

	$sql = "INSERT INTO `factura`( `cabecera`, `fecha_creacion`, `estado`, `id_user`, `id_client`) 
	VALUES ('".$cabecera."','".date('d-m-Y')."','a','1', '".$client."');";

	if (mysqli_query($conn, $sql)) {
		$last_id = mysqli_insert_id($conn);

		foreach($data as $d){
			$sql = "INSERT INTO `linea`(`detalle`, `cantidad`, `id_product`, `id_factura`) 
			VALUES ('".$d["detalle"]."','".$d["cantidad"]."','".$d["producto"]."','".$last_id."');";
			
			if (!mysqli_query($conn, $sql)) {
				echo json_encode(array("statusCode"=>201));
			}
		}
	} 
	else {
		echo json_encode(array("statusCode"=>201));
	}

	echo '<br> Last error: ', json_last_error_msg(), PHP_EOL, PHP_EOL;
	mysqli_close($conn);
?>