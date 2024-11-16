<?php 
session_start();
include('connection.php');

// if($_SESSION['level'] == ""){
//     header('Location:login.php?pesan=akses');
// }

$query = "SELECT * FROM tbl_konten ORDER BY id_konten DESC";
$result = mysqli_query($conn, $query);


$del    = $_GET['del'];
if(isset($del)){

        $sql = "SELECT * FROM tbl_konten WHERE id_konten = '$del'";
        $query = mysqli_query($conn, $sql);
    
        $delquery = mysqli_query($conn, "DELETE FROM tbl_konten WHERE id_konten = '$del'");
        if($delquery){
            echo "<script>alert('Konten berhasil dihapus!');</script>";
            header('Location:index.php');
        }
}

$username = $_SESSION['username'];
$check = "SELECT * FROM tbl_user INNER JOIN tbl_peserta ON tbl_user.username = tbl_peserta.username WHERE tbl_user.username = '$username'";
$checkQuery = mysqli_query($conn, $check);

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
        <nav>
            <ul>
            <a href="index.php" class="navbar-left">
                <li><img class="logo" id="logo" src="assets/images/logo.png"></li>
                <li><h4>Gamadhikari</h4></li>
            </a>
            </ul>
            <ul>
                <a href="#hero-section"><li>Beranda</li></a>
                <a href="#program-section"><li>Program Kerja</li></a>
                <a href="#article-section"><li>Artikel</li></a>
                <a href="#"><li>Kepanitiaan</li></a>
                <?php if(isset($_SESSION['username'])){
                    echo "<a href='dashboard.php' class='btn-login'><li>Account</li></a>";
                }else{
                    echo "<a href='login.php' class='btn-login'><li>Masuk</li></a>";
                }?>
            </ul>
        </nav>
        <div class="hero-section" id="hero-section">
            <div class="content">
                <h1><em>Gama</em>dhikari</h1>
                <p class="type">Suatu kabinet pada organisasi kemahasiswaan jurusan Informatika di Fakultas Teknik yang terintegrasi dengan Universitas Jenderal Soedirman.</p><br>
                <a href="#program-section" class="btn-learn">Selengkapnya</a>
            </div>
        </div>
        <div class="floating-bar">
            <div class="floating-content">
                <div class="floating-items">
                    <ul>
                        <li><img src="assets/images/logo.png" class="floating-image" alt="Jujutsu Kaisen Highschool"></li>
                        <li><p>Satu Informatika untuk satu Indonesia.</p></li>
                    </ul>
                    <a href="watch.php" class="button-floating">Selengkapnya</a>
                </div>
            </div>
        </div>
        
        
        <div class="program-section" id="program-section">
            <div class="program-content" id="program-section">
                <div class="program-items">
                    <h2>Gamadhikari <span> Himpunan Mahasiswa Informatika</span></h2>
                    <div class="item">
                        <ul>
                            <li><img src="assets/images/logo.png" class="logo" alt="Logo Gamadhikari"></li>
                            <li>
                                <h2>Himpunan Mahasiswa Informatika <em>(HMIF)</em></h2>
                                <p>Himpunan Mahasiswa Informatika Universitas Jenderal Soedirman adalah organisasi kemahasiswaan dilingkungan jurusan Informatika Fakultas Teknik Universitas Jenderal Soedirman yang merupakan bagian integral dari rakyat Indonesia.</p>
                                <p>Memiliki visi dalam mewujudkan mahasiswa yang bertakwa kepada Tuhan Yang Maha Esa, berwawasan luas, cendekia bermoral, berintefritas, berpikir kritis, berpribadian baik, bertanggung jawab serta berkepedulian sosial untuk terciptanya kehidupan kampus yang ilmiah dan bermanfaat dalam satu kesatuan organisasi yang terstruktur.</p><br>
                                <a href="https://hmifunsoed.or.id/" class="btn-learn">Selengkapnya</a>
                            </li>
                        </ul>
                    </div>
                    <div class="item" style="margin-top:30px">
                    <center>
                        <div class="divide-item">
                            <div class="divide-content">
                                <a href="#">
                                    <h2><span>Program Kerja</span>Soedirman Technophoria</h2>
                                    <img src="assets/images/soedirmantechnophoria.png" alt="Soedirman Technophoria">
                                    <a href="" class="btn-program">Daftar</a>
                                </a>
                            </div>
                        </div>
                        <div class="divide-item">
                            <div class="divide-content">
                                <a href="#">
                                <h2><span>Program Kerja</span>Lustrum Informatics 3.0</h2>
                                <img src="assets/images/lustrum.png" alt="Soedirman Technophoria">
                                <a href="" class="btn-program">Daftar</a>
                                </a>
                            </div>
                        </div>
                        <div class="divide-item">
                            <div class="divide-content">
                                <a href="#">
                                <h2><span>Program Kerja</span>Informatics Championship</h2>
                                <img src="assets/images/informaticschampionship.png" alt="Soedirman Technophoria">
                                <a href="" class="btn-program">Daftar</a>
                                </a>
                            </div>
                        </div>
                    </center>
                    </div>
                </div>
            </div>
        </div>
        <div class="article-section" id="article-section">
            <div class="article-content">
                <div class="article-items">
                    <h2><a href="article.php" style="text-decoration:none;color:white">Article </a><span> Himpunan Mahasiswa Informatika</span></h2>
                    <div class="article-list">
                        <?php 
                        $count = 0;
                        while($data = mysqli_fetch_array($result)){ 
                            if($count < 3){
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
                                $count++;
                            }else{
                                break;
                            }
                        } 
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer">
            &copy; Himpunan Mahasiswa Informatika. All rights reserved.
        </div>
        <script src="https://kit.fontawesome.com/d9b2e6872d.js" crossorigin="anonymous"></script>
    </body>
</html>