<?php
    include 'db.php';
    error_reporting(0);
    $kontak = mysqli_query($koneksi, "SELECT admin_telp, admin_email, admin_addres FROM tb_admin
    WHERE admin_id = 1");
    $a = mysqli_fetch_object($kontak);
    $produk = mysqli_query($koneksi, "SELECT * FROM tb_product WHERE product_id = '".$_GET['id']."' ");
    $p = mysqli_fetch_object($produk);
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
        <h1><a href="index.php">Toko Hijab</a></h1>
        <ul>
            <li><a href="produk.php">produk</a></li>
</ul>
</div>
</header>

<!--search-->
<div class="search">
    <div class="container">
        <form action="produk.php">
            <input type="text" name="search" placeholder="Cari Produk">;
            <input type="submit" name="cari" value="Cari Produk">
</form>
</div>
</div>

<!-- product detail -->
    <div class="section">
        <div class="Container">
           <h3> Detail Produk </h3>
            <div class="box">
                <div class="col-2">
                    <img src="produk/<?php echo $p->product_image ?>" width="80%">
</div>
<div class="col-2">
    <h4><?php echo $p->product_name ?></h4>
    <h4>Rp. <?php echo number_format($p->product_price) ?></h4>
    <p>Deskripsi :<br>
        <?php echo $p->product_description ?>
</p>
        <p><a href="https://api.whatsapp.com/send?phone=<?php echo $a->admin_telp ?>&text=Hai, saya tertarik dengan produk Anda.!" target="_blank">
        Hubungin via Whatsapp
        <img src="img/wa.png" width="30px"></a>
    </p>
</div>
</div>
</div>
</div>

            <!-- footer -->
            <div class="footer">
                <div class="container">
                    <h4>Alamat</h4>
                    <p><?php echo $a->admin_addres ?></p> 

                    <h4>Email</h4>
                    <p><?php echo $a->admin_email ?></p> 

                    <h4>Hp</h4>
                    <p><?php echo $a->admin_telp ?></p> 
                    <small>Copyright &copy; 2023 - Toko Hijab</small>
            </div>
            </div>
</body>
</html>