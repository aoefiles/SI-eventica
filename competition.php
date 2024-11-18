<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8"/>
    <title>Competition Eventica</title>
    <link rel="stylesheet" type="text/css" href="assets/css/style.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <div class="container">
        <div class="sub-container">
            <div class="main-banner">
                <div class="banner-text"> 
                    <!-- Tambahkan logo -->
                    <div class="header-logo">
    <img src="assets/images/logo eventica.png" alt="Logo Eventica" class="logo">
    <h4><a href="index.php"><i class="fa-solid fa-arrow-left"></i></a> <em>Registration</em> Competition</h4>
</div>

                    <form name="register-competition" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="register-competition">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" id="nama" placeholder="Masukan nama .." required>
                        
                        <label for="nim">NIM</label>
                        <input type="text" name="nim" id="nim" placeholder="Masukan NIM .." required>
                        
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" placeholder="Masukan email .." required>
                        
                        <label for="no_telp">Nomor Telepon</label>
                        <input type="text" name="no_telp" id="no_telp" placeholder="Masukan nomor telepon .." required>
                        
                        <label for="lomba">Lomba</label>
                        <select name="lomba" id="lomba" required>
                            <option value="pkmrektor">PKM Rektor CUP</option>
                            <option value="porsoed">Porsoed</option>
                            <option value="starfest">Starfest</option>
                        </select>
                        
                        <input type="submit" name="submit" value="Kirim">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://kit.fontawesome.com/d9b2e6872d.js" crossorigin="anonymous"></script>
</body>
</html>
