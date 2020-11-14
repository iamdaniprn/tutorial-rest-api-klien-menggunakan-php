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
        if($id == 1){
            ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong>Sukses!</strong> Data Berhasil Ditambahkan
            </div>
            <?php
        }else if($id == 2){
            ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong>Sukses!</strong> Data Berhasil Diupdate
            </div>
            <?php
        }else if($id == 3){
            ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong>Sukses!</strong> Data Berhasil Dihapus
            </div>
            <?php
        }
        ?>
        <div>
            <a href="add_pasien.php" class="btn btn-primary">Tambah Pasien</a>
        </div>
        <br>
        <table id="example" class="table table-striped table-bordered table-sm" style="width:100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Nomedrek</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($data as $row) {
                    ?>
                    <tr>
                        <td><?php echo $row['id_pasien'] ?></td>
                        <td><?php echo $row['nama'] ?></td>
                        <td><?php echo $row['nomedrek'] ?></td>
                        <td style="width: 170px">
                            <a href="get_detail_pasien.php?id=<?php echo $row['id_pasien'] ?>" class="btn btn-info btn-sm">Detail</a>
                            <a href="edit_pasien.php?id=<?php echo $row['id_pasien'] ?>" class="btn btn-primary btn-sm">Edit</a>
                            <a href="delete_pasien.php?id=<?php echo $row['id_pasien'] ?>" class="btn btn-danger btn-sm">Hapus</a>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
        $('#example').DataTable();
    });
</script>
</html>

