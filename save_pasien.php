<?php

$nama        = isset($_POST['nama']) ? $_POST['nama'] : '';
$nomedrek    = isset($_POST['nomedrek']) ? $_POST['nomedrek'] : '';

$url  = 'http://localhost/api_server/pasien';
$data = array("nama" => $nama, "nomedrek" => $nomedrek);

$postdata = json_encode($data);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
$result = curl_exec($ch);
curl_close($ch);

if($result){
  header("location: get_pasien.php?id=1");
}else{
  header("location: add_pasien.php?id=2");
}