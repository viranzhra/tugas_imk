
<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        .form {
            width: 350px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #2e2121;
            border-radius: 5px;
            background-color: #9fd4eb;
        }
        
        h2 {
            text-align: center;
            font-size: 24px;
            margin-bottom: 20px;
            font-family: monospace;
        }
        
        p {
            margin: 10px 0;
        }
        
        .total {
            font-weight: bold;
        }
        
        .label {
            display: inline-block;
            font-weight: bold;
            font-family: monospace;
            font-size: 15px;
        }
        
        .value {
            margin-left: 150px;
            position: relative;
            bottom: 35px;
        }
        
        .logo {
            text-align: center;
            margin-bottom: 20px;
        }
        
        .logo img {
            max-width: 100px;
        }

        #dateTimeContainer {
            display: flex;
            align-items: center;
        }

        #currentDate, #currentTime {
            margin-right: 10px;
        }

        a {
            background-color: #E3F2FD;
            margin-left: 150px;
            padding: 5px;
            text-decoration: none;
            color: black;
            border: 1px solid grey;
        }

        a:hover {
            background-color: #599ed0;
        }
    </style>
    <title>Document</title>
</head>
<body>
<?php
include ("../../imk/koneksi.php");

// Daftar jenis laundry beserta harga
$laundryOptions = array(
    'Karpet' => 9000,
    'Pakaian' => 6000,
    'Selimut' => 8000,
    'Boneka' => 7000,
);

// Inisialisasi variabel
$nama = "";
$tanggal = "";
$alamat = "";
$pilihan1 = "";
$pilihan2 = "";
$harga1 = 0;
$harga2 = 0;
$totalHarga = 0;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Mendapatkan data dari formulir
    $nama = $_POST['nama'];
    $tanggal = $_POST['tanggal'];
    $alamat = $_POST['alamat'];
    $pilihan1 = $_POST['pilihan1'];
    $pilihan2 = $_POST['pilihan2'];

    // Validasi pilihan jenis laundry 1
    if (isset($laundryOptions[$pilihan1])) {
        $harga1 = $laundryOptions[$pilihan1];
    }

    // Validasi pilihan jenis laundry 2
    if (isset($laundryOptions[$pilihan2])) {
        $harga2 = $laundryOptions[$pilihan2];
    }

    // Menghitung total harga
    $totalHarga = $harga1 + $harga2;

    $sql = "INSERT INTO orders VALUES ('','$nama', '$tanggal', '$alamat', '$pilihan1','$pilihan2', '$totalHarga')";
    if (mysqli_query($conn, $sql)) {
        $simpan = "Data berhasil disimpan";
    } 
    else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>
    <div class="form">
    <div class="logo">
        <h2>​Fresh & Clean Laundry</h2>
        <p>Jl. Pantura no. 01 kab. Indramayu</p>
        <p>Telp. 0987654321</p>
    </div>
    <hr style="border: 1px dashed #000;">
    <div id="dateTimeContainer">
        <span id="currentDate"></span>
        <span id="currentTime"></span>
    </div>
    <hr style="border: 1px dashed #000;">
    <p class="label">Nama &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $nama; ?></p> <br>
    <p class="label">Alamat &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $alamat; ?></p> <br>
    <p class="label">Jenis Laundry 1 : <?php echo $pilihan1; ?> (Harga: Rp <?php echo $harga1; ?>)</p><br>
    <p class="label">Jenis Laundry 2 : <?php echo $pilihan2; ?> (Harga: Rp <?php echo $harga2; ?>)</p><br>
    <p class="label">Total &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: Rp. <?php echo $totalHarga; ?></p><br>
    <hr style="border-color: black;">
    <?php echo $simpan; ?>
    <hr style="border-color: black;">
    <h2>Terimakasih <?php echo $nama; ?>!</h2>
    <a name="kembali" href="../../imk/ABOUT-US.php">Kembali</a>

    <script>
        function getCurrentDateTime() {
            const currentDate = new Date();
            const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
            const formattedDate = currentDate.toLocaleDateString('id-ID', options);
            const formattedTime = currentDate.toLocaleTimeString('id-ID');
            
            document.getElementById('currentDate').textContent = formattedDate;
            document.getElementById('currentTime').textContent = formattedTime;
        }

        setInterval(getCurrentDateTime, 1000);
    </script>
</div>
</body>
</html>
