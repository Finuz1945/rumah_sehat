<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./src/Rumah Sehat.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script type="text/javascript" src="./js/jquery.js"></script>
    <link rel="stylesheet" href="./css/style.css">
    <title>Daftar</title>
</head>
<body>
<!-- Start Navbar -->
<header class="navbar-container">
    <div class="logo">
       <a href="index.php"><img src="./src/Rumah Sehat.png" alt="logo"></a>
    </div>

    <button class="menu-toggle" aria-label="Toggle menu">
        <i class="fas fa-bars"></i>
    </button>

    <nav class="nav-list" id="navList">
        <ul>
            <li><a href="index.php">Beranda</a></li>
            <li><a href="#">Artikel</a></li>
            <li><a href="#">Aplikasi</a></li>
            <li><a href="login.php">Login</a></li>
        </ul>
    </nav>
</header>
<!-- End Navbar -->

<!-- Start main content -->
<main>
    <div class="form-container">
        <form action="./pages/proses.php" method="post" class="warp">
            <label for="id">
                <span>NIK</span>
                <input type="text" name="id" id="id" placeholder="NIK . . .">
            </label>
            <label for="id">
                <span>Nama</span>
                <input type="text" name="nama" id="nama" placeholder="Nama . . .">
            </label>
            <label for="password">
                <span>Password</span>
                <input type="password" name="password" id="password" placeholder="Password . . .">
            </label>
            <label for="goldar">
                <span>Golongan Darah</span>
                <select name="goldar" id="goldar" class="goldar">
                    <option value="Tidak tahu">Tidak tahu</option>
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="AB">AB</option>
                    <option value="O">O</option>
                </select>
            </label>
            <div class="container-daftar">
                <label for="tempat">
                    <span>Tempat</span>
                    <input type="text" name="tempat" id="tempat" placeholder="Tempat lahir . . .">
                </label>
                <label for="tanggal">
                    <span>Tanggal lahir</span>
                    <input type="date" name="tanggal" id="tanggal" placeholder="Tanggal lahir . . .">
                </label>
            </div>
            <span>Jenis kelamin</span>
            <div class="opsi">
                <input type="radio" name="kelamin" id="kelamin" value="L" checked>
                <label for="kelamin">Laki - laki</label>
            </div>
            <div class="opsi">
                <input type="radio" name="kelamin" id="kelamin2" value="P"> 
                <label for="kelamin2">Perempuan</label>
            </div>
            <label for="alamat">
                <span>Alamat</span>
                <input type="text" name="alamat" id="alamat" placeholder="alamat . . .">
            </label>
            <input type="submit" value="daftar" name="daftar" class="tombol">
        </form>
    </div>
    <aside>
        <img src="./src/desain.png" alt="">
    </aside>
</main>
<!-- End main content -->

<footer>
    <p>&copy; Rumah Sehat, 2023. ALL RIGHTS RESERVED</p>
    <div class="social-media">
        <p>Follow kami di :</p>
            <ul>
                <li><a href="www.linkedin.com/in/firdaus-nuzula-nur-rosyid-228114166" aria-label="Linkedin"><i class="fab fa-linkedin"></i></a></li>
                <li><a href="#" aria-label="Facebook"><i class="fab fa-facebook"></i></a></li>
                <li><a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a></li>
                <li><a href="https://github.com/Finuz1945" aria-label="github"><i class="fab fa-github"></i></a></li>
            </ul>
        </div>
</footer>
<script type="text/javascript" src="./js/main.js"></script>
</body>
</html>