<?php

function http_request($url){
    // persiapkan curl
    $ch = curl_init(); 

    // set url 
    curl_setopt($ch, CURLOPT_URL, $url);
    
    // set user agent    
    curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');

    // return the transfer as a string 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 

    // $output contains the output string 
    $output = curl_exec($ch); 

    // tutup curl 
    curl_close($ch);      

    // mengembalikan hasil curl
    return $output;
}
$id        = isset($_GET['id']) ? $_GET['id'] : '';
$link_data = http_request("http://localhost/api_server/pasien?id=".$id);

// ubah string JSON menjadi array
$link_data = json_decode($link_data, TRUE);

// keluarkan data nya
$data      = $link_data['data']['0'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tes API Klien</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h3>Tes Rest API Klien</h3>
        <div class="jumbotron">
          <h1 class="display-4"><?php echo $data['nama'] ?></h1>
          <p class="lead"><?php echo $data['nomedrek'] ?></p>
          <hr class="my-4">
          <p>Belajar Membuat Detail Pasien Dengan Menggunakan Rest API Client</p>
          <p class="lead">
            <a class="btn btn-primary btn-lg" href="get_pasien.php" role="button">Semua Data</a>
          </p>
        </div>
    </div>
</body>
</html>

