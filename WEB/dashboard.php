<?php
session_start();
if($_SESSION['status_login'] != true){
echo '<script>window.location="login.php"</script>';
exit();
}
include 'db.php'; // Pastikan file db.php sudah diinclude dan koneksi ke database telah dilakukan}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Toko Hijab</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <!--- header -->
    <header>
        <div class="container">
        <h1><a href="dashboard.php">Toko Hijab</a></h1>
        <ul>
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="profil.php">Profil</a></li>
            <li><a href="data-kategori.php">Data Kategori</a></li>
            <li><a href="data-produk.php">Data Produk</a></li>
            <li><a href="keluar.php">Keluar</a></li>
</ul>
</div>
</header>
<!-- content -->
<div class="selection">
    <div class="container">
        <h3>Dashboard</h3>
        <div class="box">
            <h4>Selamat Datang <?php echo $_SESSION['a_global']->admin_name?> di Toko Online</h4>
</div>
</div>
</div>

<!-- footer -->
<footer>
    <div class="container">
        <small>Copyright &copy; 2023 - Toko Hijab</small>
</body>
</html>