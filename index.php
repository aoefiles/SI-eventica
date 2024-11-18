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
                <li><img class="logo" id="logo" src="assets/images/eventica.png"></li>
                <li><h4>EVENTICA</h4></li>
            </a>
            </ul>
            <ul>
                <a href="#hero-section"><li>Beranda</li></a>
                <a href="#program-section"><li>Acara</li></a>
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
                <h1>EVENTICA</h1>
                <p class="type">Pusat informasi acara dan platform kontribusi dalam kegiatan di Universitas Jenderal Soedirman</p><br>
                <a href="#program-section" class="btn-learn">Selengkapnya</a>
            </div>
        </div>
        <div class="floating-bar">
            <div class="floating-content">
                <div class="floating-items">
                    <ul>
                        <li><img src="assets/images/eventica.png" class="floating-image" alt="Jujutsu Kaisen Highschool"></li>
                        <li><p>Ide Tumbuh, Momen Terwujud</p></li>
                    </ul>
                    <a href="https://blog.bem-unsoed.com/" class="button-floating">Selengkapnya</a>
                </div>
            </div>
        </div>
        
        
        <div class="program-section" id="program-section">
            <div class="program-content" id="program-section">
                <div class="program-items">
                    <h2>EVENTICA <span> Informasi Acara, Kolaborasi, dan Aktivitas Kampus</span></h2>
                    <div class="item">
                        <ul>
                            <li><img src="assets/images/eventica.png" class="logo" alt="Logo EVENTICA"></li>
                            <li>
                                <h2>EVENTICA</h2>
                                <p>Eventica adalah sebuah platform yang menghubungkan berbagai informasi mengenai acara dan kegiatan di Universitas Jenderal Soedirman hingga kesempatan untuk berpartisipasi di dalamnya.</p>
                                <p>Dengan tujuan untuk mendorong kolaborasi, Eventica mempermudah setiap individu untuk ikut serta dan berkontribusi dalam berbagai acara, seperti kegiatan unjuk minat dan bakat. Sebagai sumber utama informasi acara, Eventica menawarkan peluang bagi siapa saja yang ingin lebih terlibat dalam setiap momen penting di kampus, menjadikan setiap acara lebih berarti.</p><br>
                                <a href="https://blog.bem-unsoed.com/" class="btn-learn">Selengkapnya</a>
                            </li>
                        </ul>
                    </div>
                    <div class="item" style="margin-top:30px">
                    <center>
                        <div class="divide-item">
                            <div class="divide-content">
                                <a href="#">
                                    <h2><span>Acara</span>Soedirman Student Summit</h2>
                                    <img src="assets/images/S3.png" alt="Soedirman Student Summit">
                                    <a href="" class="btn-program">Daftar</a>
                                </a>
                            </div>
                        </div>
                        <div class="divide-item">
                            <div class="divide-content">
                                <a href="#">
                                <h2><span>Acara</span>Pekan Olahraga Soedirman</h2>
                                <img src="assets/images/porsoed.png" alt="Pekan Olahraga Soedirman">
                                <a href="" class="btn-program">Daftar</a>
                                </a>
                            </div>
                        </div>
                        <div class="divide-item">
                            <div class="divide-content">
                                <a href="#">
                                <h2><span>Acara</span>Soedirman Art Festival</h2>
                                <img src="assets/images/starfest.png" alt="Soedirman Art Festival">
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
                    <h2><a href="article.php" style="text-decoration:none;color:white">Article </a><span> EVENTICA</span></h2>
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
            &copy; EVENTICA. All rights reserved.
        </div>
        <script src="https://kit.fontawesome.com/d9b2e6872d.js" crossorigin="anonymous"></script>
    </body>
</html>
