<!DOCTYPE html>
<html>
  <head>
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap"
      rel="stylesheet"/>
    <link href="./css/main.css" rel="stylesheet" />
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
<form action="akhir.php" method="POST">
    <div class="v1_2">
      <div class="v1_24">
        <span class="v1_25">Pilih Jenis Laundry</span
            ><span class="v1_30">Nama</span>
            <span class="v1_31">Tanggal Pesan</span
            ><span class="v1_32">Alamat</span
            ><span class="v1_33">Pilih Jenis Layanan :</span>
            <div class="v1_26">
                <input type="text" name="nama" placeholder="Masukkan nama lengkap..." style="    width: 470px;
                height: 50px;
                padding: 20px;
                border: none;
                background-color: #a7bdc6;
                font-size: 16px;">
            </div>
            <div class="v1_27">
                <input type="date" name="tanggal" placeholder="Masukkan tanggal..." style="    width: 470px;
                height: 50px;
                padding: 20px;
                border: none;
                background-color: #a7bdc6;
                font-size: 16px;">
            </div>
            <div class="v1_28">
                <input type="text" name="alamat" placeholder="Masukkan alamat lengkap..." style="    width: 470px;
                height: 50px;
                padding: 20px;
                border: none;
                background-color: #a7bdc6;
                font-size: 16px;">
            </div>
            <div class="v1_29">
                <select name="pilihan2" class="form-control" style="width: 350px;
    height: 50px;
    padding: 10px;
    border: none;
    background-color: #a7bdc6;
    font-size: 16px;
    color: black;">
                    <option value="">Pilih Jenis Laundry 2</option>
                    <?php
                    // Menampilkan opsi jenis laundry
                    foreach ($laundryOptions as $jenis => $harga) {
                        echo "<option value='$jenis'>$jenis</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="v1_40">
            <select name="pilihan1" class="form-control" required style="width: 350px;
    height: 50px;
    padding: 10px;
    border: none;
    background-color: #a7bdc6;
    font-size: 16px;
    color: black;">
              <option value="">Pilih Jenis Laundry 1</option>
              <?php
              // Menampilkan opsi jenis laundry
              foreach ($laundryOptions as $jenis => $harga) {
                  echo "<option value='$jenis'>$jenis</option>";
              }
              ?>
            </select>
    </div>
            <div class="v1_34">
                <a href="../../imk/ABOUT-US.php" class="v1_36">Kembali</a>
            </div>
            <div class="v1_35">
                <button type="submit" class="v1_38">Kirim</button>
            </div>
      </div>
      </form>
    </div>
  </body>
</html>
