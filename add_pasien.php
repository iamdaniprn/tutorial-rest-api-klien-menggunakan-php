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

$link_data = http_request("http://localhost/api_server/pasien");

// ubah string JSON menjadi array
$link_data = json_decode($link_data, TRUE);

// keluarkan data nya
$data      = $link_data['data'];

?>

<!DOCTYPE html>
<html>
<head>
    <title>Tes API Klien</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
</head>
<body>
    <div class="container">
        <h3>Tes Rest API Klien</h3>
        <?php
        $id = isset($_GET['id']) ? $_GET['id'] : '';
        if($id == 2){
            ?>
            <div class="alert alert-warning" role="alert">
              Data Gagal Ditambahkan
            </div>
            <?php
        }
        ?>
        <div class="jumbotron">
          <form action="save_pasien.php" method="POST">
          <div class="form-group">
            <label>Masukkan Nama Lengkap</label>
            <input type="email" class="form-control" name="nama" required>
          </div>
          <div class="form-group">
            <label>Masukkan Nomedrek</label>
            <input type="text" class="form-control" name="nomedrek" required>
          </div>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
        </div>
    </div>
</body>

<script type="text/javascript">
    $('#example').DataTable();
</script>
<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
</html>

