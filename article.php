<?php 
session_start();
include('connection.php');

if($_SESSION['level'] == ""){
    header('Location:login.php?pesan=akses');
}

$query = "SELECT * FROM tbl_konten ORDER BY id_konten DESC";
$result = mysqli_query($conn, $query);

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <title>AricleEventica</title>
        <link rel="stylesheet" type="text/css" href="assets/css/style.css"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            nav{width: initial;padding: 26px 40px;left: initial;right: 0;}
            body{background-color: rgb(31, 31, 31);}
            select{margin: 4px 0px;}
            .dashboard-section{width: 100%;}
            .article-content{width: 100%;margin: auto;}
            .article-image{border-radius: 14px;height: 400px;width: 400px;padding: 8px 0px;}
        </style>
    </head>
    <body>
        <div class="dashboard-section">
                <div class="article-content">
                    <div class="article-items">
                        <h2><a href="index.php" style="color:white;"><i class="fa-solid fa-arrow-left"></i></a> Article <span> Himpunan Mahasiswa Informatika</span></h2>
                        <div class="article-list">
                            <?php 
                            $count = 0;
                            while($data = mysqli_fetch_array($result)){ 
                            ?>
                            <ul>
                                <li>
                                    <img src="assets/images/articles/<?php echo $data['gambar'];?>" class="article-image" alt="Article Image">
                                </li>
                                <li>
                                    <h3><?php echo mb_strimwidth($data['judul_konten'], 0, 78, " ...");?></h3>
                                    <span><?php echo date('l, d F Y', strtotime($data['tanggal']));?></span>
                                    <p><?php echo mb_strimwidth($data['isi_konten'], 0, 860, " ...");?> </p>
                                    <a href="article-details.php?id-article=<?php echo $data['id_konten'];?>">View More</a>
                                </li>
                            </ul>
                            <?php 
                            } 
                            ?>
                        </div>
                    </div>
                </div>
        </div>
        <script src="assets/js/script.js"></script>
        <script src="https://kit.fontawesome.com/d9b2e6872d.js" crossorigin="anonymous"></script>
    </body>
</html>
