<?php
session_start();
include('connection.php');

if(isset($_POST['submit'])){
    $judul = $_POST['judul_konten'];
    $konten = $_POST['isi_konten'];

    $sql = "INSERT INTO tbl_konten(judul_konten,isi_konten) VALUES ('$judul','$konten')";
    $query = mysqli_query($conn, $sql);
    if($query){
        header('Location:index.php');
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    </head>
    <body>
        <div class="container">
            <div class="login-container">
                
                <h2><a href="index.php" class="btn-add"><i class="fa-solid fa-arrow-left"></i></a> Add Content!</h2><br>
                <form name="update-form" action="<?php $_SERVER['PHP_SELF'];?>" method="POST" class="login-form" >
                    <span>Content Title</span>
                    <input type="text" name="judul_konten" required>
                    <span>Fill Content</span>
                    <textarea name="isi_konten" class="textarea" required></textarea>
                    <br><input type="submit" name="submit">
                </form>
            </div>
        </div>
        <script src="https://kit.fontawesome.com/d9b2e6872d.js" crossorigin="anonymous"></script>
    </body>
</html>
