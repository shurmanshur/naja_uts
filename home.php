<?php
session_start();
require 'functions.php';

if (!$_SESSION['username']) {
    echo "<script>alert('Silahkan login !');
        document.location.href= 'login.php';; 
        </script> ";
}

if (isset($_POST["addButton"])) {
    if (addData($_POST) > 0) {
        echo "<script>alert('Data masuk');
        document.location.href= 'index4.php';; 
        </script> ";
    } else {

        echo "<script>alert('Data gagal masuk');
        document.location.href= 'index4.php';; 
        </script> ";
    }
}

//query data mhs
$mahasiswa = query("SELECT * FROM mhs");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Home</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="home.php">Home</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="user.php">User</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="pasien.php">Pasien</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="dokter.php">Dokter</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="periksa.php">Periksa</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="logout.php">Logout</a>
            </li>
        </ul>
        </div>
    </div>
    </nav>
    <div class="container p-5 m-5">
        <h1>Selamat Datang, <?=  $_SESSION['username']; ?></h1>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>

</html>