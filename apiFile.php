<?php

$url = ["https://reqres.in/api/users/1","https://reqres.in/api/users/3","https://reqres.in/api/users/10"];
$index = 0;
$output = '';
foreach($url as $_url){

    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url[$index]);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
    curl_setopt($ch,CURLOPT_CONNECTTIMEOUT, 4);
    $json = curl_exec($ch);
    if(!$json) {
        echo curl_error($ch);
    }
    curl_close($ch);
    $result = json_decode($json,true);
    $output .= $result['data']['email'];
    $output .= "<br>";
    $index++;
}
echo $output;

?>