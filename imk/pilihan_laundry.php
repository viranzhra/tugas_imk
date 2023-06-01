<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laundry</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        body {
            background-color: #f2f2f2;
        }

        h1 {
            width: 280px;
            margin: 0 auto;
            font-size: 30px;
            color: white;
            opacity: 0.8;
            border-radius: 0px;
            text-align: center;
            margin-bottom: 30px;
            font-family: sans-serif;
            font-weight: bold;
        }

        form {
            max-width: 1000px;
            margin: 0 auto;
            padding: 100px;
            background-color: #38a0e1;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
        }

        .form-group label {
            font-weight: bold;
            color: white;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ffffff;
            border-radius: 3px;
            color: #a19696;
            font-family: monospace;
        }

        .form-group .btn {
            margin-top: 10px;

        }
    </style>
</head>

<body>
    <?php

    include ("koneksi.php");
    // Daftar jenis laundry beserta harga
    $laundryOptions = array(
        'Karpet' => 9000,
        'Pakaian' => 6000,
        'Selimut' => 8000,
        'Boneka' => 7000,
    );
// ...
?>

    <form action="akhir.php" method="POST">
        <!-- Form input lainnya -->

        <div class="form-group">
            <h1>Pilih Jenis Laundry</h1>
        <div class="mb-3 row form-group">
            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
            <div class="col-sm-10">
                <input class="form-control" id="nama" type="text" placeholder="Masukkan Nama" name="nama" required>
            </div>
        </div>
        <div class="mb-3 row form-group">
            <label for="tanggal" class="col-sm-2 col-form-label">Tanggal Pesan</label>
            <div class="col-sm-10">
                <input class="form-control" type="date" placeholder="Masukkan Tanggal" name="tanggal">
            </div>
        </div>
        <div class="mb-3 row form-group">
            <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
            <div class="col-sm-10">
                <input class="form-control" type="text" placeholder="Masukkan Alamat" name="alamat">
            </div>
        </div>

        <div class="mb-3 form-group">
            <label for="jenis_laundry" class="form-label">Jenis Laundry</label>
            <select name="jenis_laundry" class="form-control" required>
                <option value="">Pilih Jenis Laundry</option>
                <?php
                // Menampilkan opsi jenis laundry
                foreach ($laundryOptions as $jenis => $harga) {
                    echo "<option value='$jenis'>$jenis</option>";
                }
                ?>
            </select>
        </div>

        <div class="col-12">
            <button type="submit" class="btn btn-success">Kirim</button>
            <a href="ABOUT-US.php" class="btn btn-secondary">Kembali</a>
        </div>
    </form>

    <!-- Script JavaScript lainnya -->

</body>

</html>
