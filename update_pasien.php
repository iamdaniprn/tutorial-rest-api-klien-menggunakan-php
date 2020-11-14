<?php
$id          = isset($_POST['id_pasien']) ? $_POST['id_pasien'] : '';
$nama        = isset($_POST['nama']) ? $_POST['nama'] : '';
$nomedrek    = isset($_POST['nomedrek']) ? $_POST['nomedrek'] : '';

// $data = array("nama" => "$nama", "nomedrek" => "$nomedrek");
$data_string = "nama=".$nama."&nomedrek=".$nomedrek;
// $data_string = json_encode($data);

$ch = curl_init('http://localhost/api_server/pasien?id='.$id);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Content-Length: ' . strlen($data_string))
);
curl_setopt($ch, CURLOPT_TIMEOUT, 5);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);

//execute post
$result = curl_exec($ch);

//close connection
curl_close($ch);

if($result){
  header("location: get_pasien.php?id=2");
}else{
  header("location: add_pasien.php?status=2");
}