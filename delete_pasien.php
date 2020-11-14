<?php

$id = isset($_GET['id']) ? $_GET['id'] : '';

$ch = curl_init('http://localhost/api_server/pasien?id='.$id);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_TIMEOUT, 5);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);

//execute post
$result = curl_exec($ch);

//close connection
curl_close($ch);

if($result){
  header("location: get_pasien.php?id=3");
}