<?php
	include 'env.php';

    try {
        //$conn = new PDO('mysql:host=proyecto-tfg.atic.green;dbname=proyecto-tfg',$user,$password);
        $conn = new PDO('mysql:host=localhost;dbname=proyecto-tfg',$user,$password);
    
    } catch (PDOException $exception) {
        die($exception->getMessage());
    }

    $data = json_decode(stripslashes($_POST['data']));

    foreach($data as $d){
        echo $d;
    }
    // Variables
	// $name=$_POST['name'];
	// $email=$_POST['email'];
	// $phone=$_POST['phone'];
	// $city=$_POST['city'];


	// $sql = "INSERT INTO `crud`( `name`, `email`, `phone`, `city`) 
	// VALUES ('$name','$email','$phone','$city')";
	// if (mysqli_query($conn, $sql)) {
	// 	echo json_encode(array("statusCode"=>200));
	// } 
	// else {
	// 	echo json_encode(array("statusCode"=>201));
	// }
	mysqli_close($conn);
?>