<?php 


$request_body = file_get_contents('php://input');

$data = json_decode($request_body);

$idData = $data[1];

$idData = json_decode($idData);

var_dump($idData);
?>