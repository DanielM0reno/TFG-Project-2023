<?php
## Database connfiguration
include 'env.php';

try {
    //$conn = new PDO('mysql:host=proyecto-tfg.atic.green;dbname=proyecto-tfg',$user,$password);
    $conn = new mysqli($host, $user, $password, $database);

} catch (PDOException $exception) {
    die($exception->getMessage());
}

## Read value
$draw = $_POST['draw'];
$row = $_POST['start'];
$rowperpage = $_POST['length']; // Rows display per page
$columnIndex = $_POST['order'][0]['column']; // Column index
$columnName = $_POST['columns'][$columnIndex]['data']; // Column name
$columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
$searchValue = mysqli_real_escape_string($conn,$_POST['search']['value']); // Search value

//$sql = "SELECT `factura`.`id`, cabecera, fecha_creacion, `client`.`name` AS client 
//FROM factura, client WHERE `estado` = 'a' AND `factura`.`id_client` = `client`.`id`;";

## Search 
$searchQuery = " ";
if($searchValue != ''){
   $searchQuery = " and (`cabecera` like '%".$searchValue."%' or 
        `fecha_creacion` like '%".$searchValue."%' or 
        `factura`.`id` like '%".$searchValue."%' ) ";
}

## Total number of records without filtering
$sel = mysqli_query($conn,"select count(*) as allcount from factura");
$records = mysqli_fetch_assoc($sel);
$totalRecords = $records['allcount'];

## Total number of record with filtering
$sel = mysqli_query($conn,"select count(*) as allcount from factura WHERE 1 ".$searchQuery);
$records = mysqli_fetch_assoc($sel);
$totalRecordwithFilter = $records['allcount'];

## Fetch records
$empQuery = "SELECT `factura`.`id` AS factura, cabecera, fecha_creacion, `name`  
FROM factura, client WHERE `estado` = 'a' AND `factura`.`id_client` = `client`.`id` ".$searchQuery.
" order by ".$columnName." ".$columnSortOrder." limit ".$row.",".$rowperpage;

$empRecords = mysqli_query($conn, $empQuery);
$data = array();

while ($row = mysqli_fetch_assoc($empRecords)) {
   $data[] = array( 
      "factura"=>$row['factura'],
      "cabecera"=>$row['cabecera'],
      "fecha_creacion"=>$row['fecha_creacion'],
      "client"=>$row['name']
   );
}

## Response
$response = array(
  "draw" => intval($draw),
  "iTotalRecords" => $totalRecords,
  "iTotalDisplayRecords" => $totalRecordwithFilter,
  "aaData" => $data
);

echo json_encode($response);