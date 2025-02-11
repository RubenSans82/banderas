<?php


header('Content-Type: application/json');


$datos = [
    "nombre"    => "Juan",
    "edad"      => 30,
    "profesion" => "Programador"
];

$json = json_encode($datos, JSON_PRETTY_PRINT);


echo $json;
?>