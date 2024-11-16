<?php 
session_start();
include('connection.php');

if($_SESSION['level'] == ""){
    header('Location:login.php?pesan=akses');
}

if(isset($_POST['submit'])){
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $email = $_POST['email'];
    $no_telp = $_POST['no_telp'];
    $lomba = $_POST['lomba'];
    $username = $_SESSION['username'];


    $sql = "INSERT INTO tbl_peserta(nama,nim,email,no_telp,lomba,status,username) VALUES ('$nama', '$nim', '$email', '$no_telp', '$lomba', 'Pending','$username')";
    $query = mysqli_query($conn, $sql);
    if($query){
        echo "<script>alert('Anda berhasil mendaftar!');</script>";
        header('Location:index.php');
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <title>Hackathon</title>
        <link rel="stylesheet" type="text/css" href="assets/css/style.css"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div class="container">
            <div class="sub-container">
                <div class="main-banner">
                    <div class="banner-text">                        
                        <h4><a href="index.php"><i class="fa-solid fa-arrow-left"></i></a> <em>Registration</em> Competition</h4>
                        <form name="register-competition" action="<?php $_SERVER['PHP_SELF'];?>" method="POST" class="register-competition">
                            <label>Nama</label>
                            <input type="text" name="nama" placeholder="Masukan nama .." required>
                            <label>NIM</label>
                            <input type="text" name="nim" placeholder="Masukan NIM .." required>
                            <label>Email</label>
                            <input type="text" name="email" placeholder="Masukan email .." required>
                            <label>Nomor Telepon</label>
                            <input type="text" name="no_telp" placeholder="Masukan email .." required>
                            <label>Lomba</label>
                            <select name="lomba" required>
                                <option value="ic">Informatics Championship</option>
                                <option value="stec">Soedirman Technophoria</option>
                                <option value="lustrum">Lustrum 5.0</option>
                            </select>
                            <input type="submit" name="submit" value="Kirim" style="float:right;">
                        </form>
                        <br>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://kit.fontawesome.com/d9b2e6872d.js" crossorigin="anonymous"></script>
    </body>
</html>