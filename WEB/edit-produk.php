<?php
session_start();
include 'db.php';
if($_SESSION['status_login'] != true){
echo '<script>window.location="login.php"</script>';
}

    $produk = mysqli_query($koneksi, "SELECT * FROM tb_product WHERE product_id = '".$_GET['id']. "' ");
    $p = mysqli_fetch_object($produk);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Toko Hijab</title>
    <link rel="stylesheet" type="text/css" href="css/style/css">
</head>
<body>
    <!--- header -->
    <header>
        <div class="container">
        <hl><a href="dashboard.php">Toko Hijab</a></h1>
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
        <h3>Edit Data produk</h3>
        <div class="box">
            <form action="" method="POST" enctype="multipart/form-data">
                <select class="input-control" name="kategori" required>
                    <option value="">--Pilih--</option>
                    <?php
                    $kategori = mysqli_query($koneksi, "SELECT * FROM tb_category ORDER BY category_id DESC");
                    while($r = mysqli_fetch_array($kategori)){
                        ?>
                         <option value="<?php echo $r['category_id'] ?>" <?php echo ($r['category_id'] == $p->category_id) ? 
                         'selected' : ''; ?>><?php echo $r['category_name']?></option>

                    <?php } ?>
</select>
                <input type="text" name="nama" class="input-control" placeholder="Nama Produk" value="<?php echo $p-> product_name?>"
                required>
                <input type="text" name="harga" class="input-control" placeholder="harga" value="<?php echo $p-> product_price?>"
                required>
                <img src="produk/<?php echo $p->product_image ?>"width="100px">
                <input type="hidden" name="foto" value="<?php echo $p->product_image ?>"> 
                <input type="file" name="gambar" class="input-control">
                <textarea class="input-control" name="deskripsi" placeholder="Deskripsi"><?php echo $p->product_description ?></textarea>
                <select name="status">
                    <option value="">--Pilih--</option>
                    <option value="1" <?php echo ($p->product_status == 1)? 'selected' : ''; ?>>Aktif</option>
                    <option value="0"<?php echo ($p->product_status == 0)? 'selected' : ''; ?>>Tidak Aktif</option>
                    </select>
                <input type="submit" name="submit" value="Submit" class="btn">
</form>
<?php
    if(isset($_POST['submit'])){
        
}
?>
</div>

</div>
</div>

<!-- footer -->
<footer>
    <div class="container">
        <small>Copyright &copy; 2023 - Toko Hijab</small>
</body>
</html>