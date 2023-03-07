<?php

$conn = new mysqli("localhost", "root", "", "proyecto-tfg");

if ($conn->connect_error) {
    echo("Connection failed: " . $conn->connect_error);
} else {
    //----------------------------------------------------------------------------------------------
    //Clients - 100
    echo "<h2>Insertando 100 clientes</h1>";
    $n_insert = 0;

    for ($i=0; $i < 100; $i++) {
        // Valores aleatorios
        $phone = rand(10000000,99999999);
        $name = randomName();

        if($query = mysqli_query($conn, 
        "INSERT INTO `client` (`name`, `email`, `domicilio`, `telefono`) " .
        "VALUES ('" . $name . "', '" . $name . "@gmail.com','Calle falsa n º".$i."', '6".$phone."');")){
            $n_insert++;
        };
    }
    echo "<h2>Se ha insertado correctamente ".($n_insert)." clientes</h1>";
    //----------------------------------------------------------------------------------------------
    //Facturas - 10000
    echo "<h1>Insertando 10000 facturas</h1>";
    $n_insert = 0;
    for ($i=0; $i < 10000; $i++) {
        // Valores aleatorios
        $rand_day = rand(1,31);
        $rand_moth = rand(1,12);
        $rand_user = rand(1,5);
        $rand_client = rand(1,100);

        if($query = mysqli_query($conn, "INSERT INTO `factura` (`cabecera`, `fecha_creacion`, `estado`, `id_user`, `id_client`) " .
        "VALUES ('Factura nº" . $i . "', '".$rand_day."/".$rand_moth."/2022', 'a', '".$rand_user."', '".$rand_client."');")){
            $n_insert++;
        };
    }
    echo "<h1>Se ha insertado correctamente ".($n_insert)." facturas</h1>";
    //----------------------------------------------------------------------------------------------
    //Productos - 10000
    echo "<h2>Insertando 10000 productos</h1>";
    $n_insert = 0;

    for ($i=0; $i < 10000; $i++) {
        // Valores aleatorios
        $price = rand(1.0,999.9);
        //10 elementos
        $name = array('tornillo','llave','tuerca','neumatico','limpia','correa','aceite','multiusos','destornillador','taladro');
        $random = rand(0,9);

        if($query = mysqli_query($conn, 
        "INSERT INTO `product` (`name`, `precio`) " .
        "VALUES ('" . $name[$random] . "-".$i."', '" . $price ."');")){
            $n_insert++;
        };
    }
    echo "<h2>Se ha insertado correctamente ".($n_insert)." clientes</h1>";
    //----------------------------------------------------------------------------------------------
    //Lineas factura - 10000
    echo "<h2>Insertando 10000 Lineas de factura</h1>";
    $n_insert = 0;

    for ($i=0; $i < 10000; $i++) {
        //Numeros de lineas de facturas
        $random_cantidad = rand(1,9);
        $random_producto = rand(1,10000);
        $random_factura = rand(1,10000);

        if($query = mysqli_query($conn, 
        "INSERT INTO `linea` ( `detalle`, `cantidad`, `id_product`, `id_factura`) " .
        "VALUES ('Producto n" . $i ." detalles, bla, bla..','" . $random_cantidad . "','".$random_producto."','".$random_factura."');")){
            $n_insert++;
        };
    }
    echo "<h2>Se ha insertado correctamente ".($n_insert)." lineas de factura</h1>";
}

function randomName() {
    $firstname = array(
        'Johnathon',
        'Anthony',
        'Erasmo',
        'Raleigh',
        'Nancie',
        'Tama',
        'Camellia',
        'Augustine',
        'Christeen',
        'Luz',
        'Diego',
        'Lyndia',
        'Thomas',
        'Georgianna',
        'Leigha',
        'Alejandro',
        'Marquis',
        'Joan',
        'Stephania',
        'Elroy',
        'Zonia',
        'Buffy',
        'Sharie',
        'Blythe',
        'Gaylene',
        'Elida',
        'Randy',
        'Margarete',
        'Margarett',
        'Dion',
        'Tomi',
        'Arden',
        'Clora',
        'Laine',
        'Becki',
        'Margherita',
        'Bong',
        'Jeanice',
        'Qiana',
        'Lawanda',
        'Rebecka',
        'Maribel',
        'Tami',
        'Yuri',
        'Michele',
        'Rubi',
        'Larisa',
        'Lloyd',
        'Tyisha',
        'Samatha',
    );

    $lastname = array(
        'Mischke',
        'Serna',
        'Pingree',
        'Mcnaught',
        'Pepper',
        'Schildgen',
        'Mongold',
        'Wrona',
        'Geddes',
        'Lanz',
        'Fetzer',
        'Schroeder',
        'Block',
        'Mayoral',
        'Fleishman',
        'Roberie',
        'Latson',
        'Lupo',
        'Motsinger',
        'Drews',
        'Coby',
        'Redner',
        'Culton',
        'Howe',
        'Stoval',
        'Michaud',
        'Mote',
        'Menjivar',
        'Wiers',
        'Paris',
        'Grisby',
        'Noren',
        'Damron',
        'Kazmierczak',
        'Haslett',
        'Guillemette',
        'Buresh',
        'Center',
        'Kucera',
        'Catt',
        'Badon',
        'Grumbles',
        'Antes',
        'Byron',
        'Volkman',
        'Klemp',
        'Pekar',
        'Pecora',
        'Schewe',
        'Ramage',
    );

    $name = $firstname[rand ( 0 , count($firstname) -1)];
    $name .= ' ';
    $name .= $lastname[rand ( 0 , count($lastname) -1)];

    return $name;
}
?> 