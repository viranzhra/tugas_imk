<?php
include("koneksi.php");

if(isset($_POST['register'])) {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "INSERT INTO registrasi VALUES('', '$nama','$email','$password')";
    if ($conn->query($sql) === TRUE) {
        $berhasil = "Registrasi berhasil!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Registrasi</title>
    <link rel="stylesheet" href="registrasi.css">
</head>
    <body>
        <div class="form-container">
        <form method="POST" action="registrasi.php">
            <div class="form-group">
            <h1>REGISTRASI</h1>
            <?php if (isset($berhasil)) {
                echo "<p style='color: white;
                background-color: #4ba64bd6;
                height: 25px;
                border-radius: 3px;
                text-align: center;
                width: 200px;
                margin-left: 50px;
                font-weight: bolder;
                font-family: monospace;
                font-size: 15px;'>$berhasil</p>";
            } ?>
    
            <label for="username">Nama : </label>
            <input type="text" id="username" placeholder="Masukkan username" name="nama" required><br><br>
    
            <label for="email">Email : </label>
            <input type="text" id="email" placeholder="Masukkan email" name="email" required><br><br>
    
            <label for="password">Password : </label>
            <input type="password" id="password" placeholder="Masukkan Password" name="password" required><br>
            <br>
    
            <input type="submit" name="register" value="Register">
            <div class="login">
                <a name="kembali" href="index.php">Kembali</a>
            </div>
            <br><br>
            <div class="register">
                Sudah punya akun? <a href="Login.php">Login</a>
            </div>
            </div>
        </div>
        </form>
        </div>
    </body>
</html>
