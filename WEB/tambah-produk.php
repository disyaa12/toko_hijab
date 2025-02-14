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
        <h3>Tambah Data produk</h3>
        <div class="box">
            <form action="" method="POST" enctype="multipart/form-data">
                <select class="input-control" name="kategori" required>
                    <option value="">--Pilih--</option>
                    <?php
                    $kategori = mysqli_query($koneksi, "SELECT * FROM tb_category ORDER BY category_id DESC");
                    while($r = mysqli_fetch_array($kategori)){
                        ?>
                         <option value="<?php echo $r['category_id'] ?>"><?php echo $r['category_name']?></option>
                    <?php } ?>
</select>
                <input type="text" name="nama" class="input-control" placeholder="Nama Produk" required>
                <input type="text" name="harga" class="input-control" placeholder="harga" required>
                <input type="file" name="gambar" class="input-control" required>
                <textarea class="input-control" name="deskripsi" placeholder="Deskripsi"></textarea>
                <select name="status">
                    <option value="">--Pilih--</option>
                    <option value="1">Aktif</option>
                    <option value="0">Tidak Aktif</option>
                    </select>
                <input type="submit" name="submit" value="Submit" class="btn">
</form>
<?php
    if(isset($_POST['submit'])){

       // print r($_FILES['gambar']);
       // menampung inputan dari form
       $kategori = $_POST['kategori'];
       $nama = $_POST['nama'];
       $harga = $_POST['harga'];
       $deskripsi = $_POST['deskripsi'];
       $status = $_POST['status'];

       //menampung data file yang di upload
        $filename = $_FILES['gambar']['name'];
        $tmp_name = $_FILES['gambar']['tmp_name'];

        $type1 = explode('.',$filename);
        $type2 = $type1[1];

        $newname ='produk'.time().'.'.$type2;

       //menampung data format file yang diizinkan
       $tipe_diizinkan = array('jpg', 'jpeg', 'png', 'gif');

       //validasi format file
       if(!in_array($type2, $tipe_diizinkan)) {
        //jika format file tidak ada di dalam tipe diizinkan 
            echo '<script>alert("format file tidak diizinkan")</script>';
       }else{

        $targetDirectory = 'produk/'; // Direktori tujuan
if (!file_exists($targetDirectory)) {
    mkdir($targetDirectory, 0755, true); // Membuat direktori jika belum ada
}
       // jika format file sesuai dengan yang ada di dalam array tipe diizinkan
       //proses upload file sekaligus insert ke database
       move_uploaded_file($tmp_name, './produk/' .$newname);

       $insert = mysqli_query($koneksi, "INSERT INTO tb_product VALUES (
                            null,
                            '".$kategori."',
                            '".$nama."',
                            '".$harga."',
                            '".$deskripsi."',
                            '".$newname."',
                            '".$status."',
                            null
                            )");
                if($insert){
                    echo'<script>alert("simpan data berhasil")</script>';
                    echo '<script>window.location="data-produk.php"</script>';
                }else{
                    echo 'gagal' .mysqli_error($koneksi);
                }
    }
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