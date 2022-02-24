<?php 


$request_body = file_get_contents('php://input');

$data = json_decode($request_body);

$dataArray = (array) $data[1];

var_dump($dataArray);
?>