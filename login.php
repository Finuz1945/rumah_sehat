<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./src/Rumah Sehat.png">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>Login</title>
</head>
<body>
<!-- Start Navbar -->
<header class="navbar-container">
    <div class="logo">
       <a href="index.php"><img src="./src/Rumah Sehat.png" alt="logo"></a>
    </div>
    <nav class="nav-list">
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
        <form action="./pages/cek_login.php" method="post" class="warp">
            <label for="id">
                <span>NIK/NIDN</span>
                <input type="text" name="id" id="id" placeholder="NIK/NIDN . . .">
            </label>
            <label for="password">
                <span>Password</span>
                <input type="password" name="password" id="password" placeholder="Password . . .">
            </label>
            <input type="submit" value="login" name="submit" class="tombol">
            <a href="daftar.php">Belum punya akun ?</a>
        </form>
    </div>
    <aside>
        <img src="./src/desain2.png" alt="" class="desain">
    </aside>
</main>
<!-- End main content -->

<!-- Start Footer -->
<footer>
    <p>&copy;Rumah Sehat, 2023. ALL RIGHTS RESERVED</p>
    <div class="social-media">
        <p>Follow kami di :</p>
        <ul>
          <li><a href="#"><i class="fab fa-twitter"></i></a></li>
          <li><a href="#"><i class="fab fa-facebook"></i></a></li>
          <li><a href="#"><i class="fab fa-instagram"></i></a></li>
          <li><a href="#"><i class="fab fa-youtube"></i></a></li>
        </ul>
      </div>
</footer>
  <!-- End Footer  -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script type="text/javascript" src="./js/main.js"></script>
</body>
</html>