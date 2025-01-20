<?php
session_start();
include 'db.php';
if($_SESSION['status_login'] != true){
echo '<script>window.location="login.php"</script>';
}
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
   <!-- header -->
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
    <div class="section">
        <div class="container">
            <h3>Data kategori</h3>
            <div class="box">
                <p><a href="tambah-kategori.php">Tambah Data</a></p>
                <table border="1" cellspacing="0" class="table">
                    <thead>
                        <tr>

                        <th widht="60px"No></th>
                        <th>Kategori</th>
                        <th width="150px">Aksi</th>
</tr>
</thead>
<tbody>
    <?php
    $no = 1;
    $kategori = mysqli_query($koneksi, "SELECT * FROM tb_category ORDER BY category_id DESC");
    while($row = mysqli_fetch_array($kategori)){
?>
    <tr>
    <td><?php echo $no++ ?></td>
                            <td><?php echo $row['category_name'] ?></td>
                            <td>
                            <a href="edit-kategori.php?id=<?php echo $row['category_id'] ?>">Edit</a> || <a href="
                                proses-hapus.php?idk=<?php echo $row['category_id'] ?>" onclick="return confirm('Yakin ingin hapus ?')">Hapus</a>
    </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- footer -->
    <footer>
        <div class="container">
            <small>Copyright; 2023 - Toko Hijab</small>
        </div>
    </footer>
</body>
</html>