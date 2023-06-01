
<!DOCTYPE html>
<html>

<head>
    <title>Login Klien</title>
    <link rel="stylesheet" href="login.css">
</head>

    <body>

<?php
// untuk menyimpan informasi pengguna (user)
session_start();

// Koneksi ke database
include("koneksi.php");

// Cek apakah form login sudah disubmit
if(isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Query untuk mencari data pengguna dengan username dan password tertentu
    $query = "SELECT * FROM registrasi WHERE email='$email' AND password='$password'";

    // Eksekusi query
    $result = mysqli_query($conn, $query);

    // Cek apakah query berhasil dijalankan
    if (!$result) {
        die("Query error: " . mysqli_error($conn));
    }

    // Cek apakah data ditemukan
    if(mysqli_num_rows($result) == 1) {
        // Data ditemukan, simpan informasi pengguna ke dalam session
        $data = mysqli_fetch_assoc($result);
        $_SESSION['id'] = $data['id'];
        $_SESSION['email'] = $data['email'];

        // Redirect ke halaman dashboard atau halaman yang diinginkan
        header("Location: ABOUT-US.php");
        exit(); // Hentikan eksekusi kode setelah melakukan redirect
    } else {
        // Login gagal, tampilkan pesan kesalahan
        $error = "Username atau password salah!";
    }
}
?>
        <div class="form-container">
            <form method="POST" action="Login.php">
            <div class="form-group">
            <h1>Login Klien</h1>
            <?php if (isset($error)) {
                echo "<p style='    color: #ad1e1e;
                background-color: #d6a8a875;
                height: 25px;
                border-radius: 3px;
                text-align: center;
                width: 250px;
                margin-left: 25px;
                font-weight: bolder;
                font-family: monospace;
                font-size: 15px;'>$error</p>";
            } ?>
    
            <label for="email">Email : </label>
            <input type="text" id="email" placeholder="Masukkan email" name="email" required><br><br>
    
            <label for="password">Password : </label>
    
            <input type="password" id="password" placeholder="Masukkan Password" name="password" required><br>
            <br>
    
            <button type="submit" name="submit">Login</button>
            <a name="kembali" href="index.php">Kembali</a>

            <br><br>
            
            <div class="register">
                Belum punya akun? <a href="registrasi.php">Registrasi</a>
            </div>
            </div>
        </form>
        </div>
    </body>
</html>