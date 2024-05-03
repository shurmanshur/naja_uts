<?php
require 'functions.php';

$id = $_GET['id'];
$data = query("SELECT * FROM periksa WHERE id = $id");

if (isset($_POST["editButton"])) {
    if (updatePeriksa($_POST) > 0) {
        echo "<script>alert('Data update');
        document.location.href= 'periksa.php';
        </script> ";
    } else {

        echo "<script>alert('Data gagal update');
        document.location.href= 'periksa.php';
        </script> ";
    }
}
$dokterData = query("SELECT * FROM dokter");
$pasienData = query("SELECT * FROM pasien");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Periksa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Edit Periksa</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
    </div>
    </nav>
    <div class="container p-5 m-5">
        <h1>Edit Periksa</h1>
        <?php foreach ($data as $d) : ?>
        <form action="" method="post">
        <input type="hidden" class="form-control" name="id" value="<?=$d['id']?>">
        <div class="mb-3">
        <label for="selectPasien" class="form-label">Pasien</label>
        <select id="selectPasien" class="form-select" name="id_pasien">
            <?php foreach ($pasienData as $m) :?>
            <option <?php if($m['id'] == $d['id_pasien']):?> selected <?php endif;?> value="<?= $m['id']?>"><?= $m['nama']?> - <?= $m['alamat']?></option>
            <?php endforeach;?>
        </select>
        </div>
        <div class="mb-3">
        <label for="selectDokter" class="form-label">Dokter</label>
        <select id="selectDokter" class="form-select" name="id_dokter">
            <?php foreach ($dokterData as $m) :?>
            <option <?php if($m['id'] == $d['id_dokter']):?> selected <?php endif;?>  value="<?= $m['id']?>"><?= $m['nama']?> - <?= $m['alamat']?></option>
            <?php endforeach;?>
        </select>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Tanggal Periksa</label>
            <input type="date" class="form-control" id="exampleInputEmail1" name="tgl_periksa" value="<?=$d['tgl_periksa']?>">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Catatan</label>
            <input type="text" class="form-control" id="exampleInputPassword1" name="catatan" value="<?=$d['catatan']?>">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Obat</label>
            <input type="text" class="form-control" id="exampleInputPassword1" name="obat" value="<?=$d['obat']?>">
        </div>
        <button type="submit" class="btn btn-primary" name="editButton">Update</button>
        </form>
        <?php endforeach; ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>

</html>