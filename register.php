<?php
    session_start();
    include('connection.php');

    if(isset($_SESSION['username']) || isset($_SESSION['email'])){
        header('Location: dashboard.php');
        exit;
    }
    
    if (isset($_POST['submit'])) {
        $fullname = $_POST['fullname'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm-password'];

        $sql = "SELECT * FROM tbl_user WHERE username = '$username'";
        $result = mysqli_query($conn, $sql);
        
        if (mysqli_num_rows($result) > 0) {
            header('Location: register.php?message=exists');
        } else {
            if ($password == $confirm_password) {
                $password = password_hash($password, PASSWORD_DEFAULT);
                $insert = "INSERT INTO tbl_user (nama, username, password, email, level) VALUES ('$fullname','$username', '$password', '$email', 'Member')";
                $query = mysqli_query($conn, $insert);
                if ($query) {
                    header('Location: login.php?message=registered');
                } else {
                    header('Location: register.php?message=failure');
                }

            } else {
                header('Location: register.php?message=unsynchronized');
            }
        }
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Register</title>
        <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    </head>
    <body>
        <div class="container">
            <div class="login-container">
                <h2><a href="index.php" class="btn-add"><i class="fa-solid fa-arrow-left"></i></a> Register form!</h2><br>
                <?php 
                if(isset($_GET['message'])){
                    if($_GET['message'] == "failure"){
                        echo "Register gagal! Username atau password tidak sesuai!<br><br>";
                    }else if($_GET['message'] == "exist"){
                        echo "Username tidak tersedia! <br><br>";
                    }else if($_GET['message'] == "unsynchronized"){
                        echo "Konfirmasi password tidak sama! <br><br>";
                    }
                }
                ?>
                <form name="login-form" action="<?php $_SERVER['PHP_SELF'];?>" method="POST" class="login-form" >
                    <span>Nama Lengkap</span>
                    <input type="text" name="fullname" required>
                    <span>Username</span>
                    <input type="text" name="username" required>
                    <span>Email</span>
                    <input type="email" name="email" required>
                    <span>Kata Sandi</span>
                    <input type="password" name="password" required>
                    <span>Konfirmasi Kata Sandi</span>
                    <input type="password" name="confirm-password" required>
                    <span>Sudah memiliki akun? <a href="login.php">Masuk</a></span>
                    <br><input type="submit" name="submit" value="Masuk">
                </form>
            </div>
        </div>
        <script src="https://kit.fontawesome.com/d9b2e6872d.js" crossorigin="anonymous"></script>
    </body>
</html>