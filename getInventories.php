<?php
$methodParams = '{}';
$apiParams = [
    "method" => "getInventories",
    "parameters" => $methodParams
];

$curl = curl_init("https://api.baselinker.com/connector.php");
curl_setopt($curl, CURLOPT_POST, 1);
curl_setopt($curl, CURLOPT_HTTPHEADER, ["X-BLToken: 2001325-2004269-W4ZO31ZQNSLN0NI8ITHJ3Q1R71L479QBKOGVABB9YBXJXF6BZZQPFOLMN7IT5BJV"]);
curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($apiParams));
$response = curl_exec($curl);


var_dump($response);

?>