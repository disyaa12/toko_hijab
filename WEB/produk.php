<?php
    include 'db.php';
    error_reporting(0);
    $kontak = mysqli_query($koneksi, "SELECT admin_telp, admin_email, admin_addres FROM tb_admin
    WHERE admin_id = 1");
    $a = mysqli_fetch_object($kontak);
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

<!-- new product -->
<div class="section">
    <div class="container">
        <h3>Produk</h3>
        <div class="box">
            <?php
                if ($_GET['search'] != '' || $_GET['kat'] != '') {
                    $where = "AND product_name LIKE '%" . $_GET['search'] . "%' AND category_id LIKE '%" . $_GET['kat'] . "%' ";
                }
                
                $produk = mysqli_query($koneksi, "SELECT * FROM tb_product WHERE product_status = 1 $where ORDER BY product_id DESC");
                if(mysqli_num_rows($produk) > 0){
                    while($p = mysqli_fetch_array($produk)){
            ?>
            <a href="detail-produk.php?id=<?php echo $p['product_id']?>">
            <div class="col-4">
                <img src="produk/<?php echo $p['product_image']?>" width="100px"></td>
                <p class="nama"><?php echo $p['product_name']?></p>
                <p class="harga">Rp. <?php echo number_format ($p['product_price']) ?></p>
            </div>
                    </a>
            <?php }}else{ ?>
                <p>Produk tidak ada</p>
          <?php  } ?>
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