<?php 
session_start();
include('connection.php');

if($_SESSION['level'] == ""){
    header('Location:login.php?pesan=akses');
}

$query = "SELECT * FROM tbl_konten ORDER BY id_konten DESC";
$result = mysqli_query($conn, $query);


$id    = $_GET['id-article'];
$sql = "SELECT * FROM tbl_konten WHERE id_konten = '$id'";
$query = mysqli_query($conn, $sql);
$data = mysqli_fetch_array($query);

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <title>Hackathon</title>
        <link rel="stylesheet" type="text/css" href="assets/css/style.css"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            nav{width: initial;padding: 26px 40px;left: initial;right: 0;}
            body{background-color: rgb(31, 31, 31);}
            select{margin: 4px 0px;}
            .dashboard-section{width: 100%;}
            .dashboard-content{width: 60%;margin: auto;}
            .article-image{border-radius: 14px;height: 200px;width: 200px;padding: 8px 0px;}
        </style>
    </head>
    <body>
        <div class="dashboard-section">
                <div class="article-content">
                    <div class="article-items">
                        <h2><a href="index.php" style="color:white;"><i class="fa-solid fa-arrow-left"></i></a>Article Details <span> Himpunan Mahasiswa Informatika</span></h2>
                        <img src="assets/images/articles/<?php echo $data['gambar'];?>" style="width:400px">
                        <h1 style="color:white"><?php echo $data['judul_konten'];?></h1>
                        <p style="color:white"><?php echo $data['isi_konten'];?></p>
                        <div class="article-list">
                        </div>
                    </div>
                </div>
        </div>
        <script src="assets/js/script.js"></script>
        <script src="https://kit.fontawesome.com/d9b2e6872d.js" crossorigin="anonymous"></script>
    </body>
</html><?php 
session_start();
include('connection.php');

 if($_SESSION['level'] == ""){
     header('Location:login.php?pesan=akses');
 }

$query = "SELECT * FROM tbl_konten ORDER BY id_konten DESC";
$result = mysqli_query($conn, $query);


$id    = $_GET['id-article'];
$sql = "SELECT * FROM tbl_konten WHERE id_konten = '$id'";
$query = mysqli_query($conn, $sql);
$data = mysqli_fetch_array($query);

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <title>Hackathon</title>
        <link rel="stylesheet" type="text/css" href="assets/css/style.css"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            nav{width: initial;padding: 26px 40px;left: initial;right: 0;}
            body{background-color: rgb(31, 31, 31);}
            select{margin: 4px 0px;}
            .dashboard-section{width: 100%;}
            .dashboard-content{width: 60%;margin: auto;}
            .article-image{border-radius: 14px;height: 200px;width: 200px;padding: 8px 0px;}
        </style>
    </head>
    <body>
        <div class="dashboard-section">
                <div class="article-content">
                    <div class="article-items">
                        <h2><a href="index.php" style="color:white;"><i class="fa-solid fa-arrow-left"></i></a>Article Details <span> Himpunan Mahasiswa Informatika</span></h2>
                        <img src="assets/images/articles/<?php echo $data['gambar'];?>" style="width:400px">
                        <h1 style="color:white"><?php echo $data['judul_konten'];?></h1>
                        <p style="color:white"><?php echo $data['isi_konten'];?></p>
                        <div class="article-list">
                        </div>
                    </div>
                </div>
        </div>
        <script src="assets/js/script.js"></script>
        <script src="https://kit.fontawesome.com/d9b2e6872d.js" crossorigin="anonymous"></script>
    </body>
</html>
