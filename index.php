

<!DOCTYPE html>
<html>
    <head>
        <title>home</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="jamur.css">
    </head>
    <body>
        <nav id="top">
            <ul class="topnav">
                <li><a class="active" href="home.php">HOME</a></li>
                <li><a href="daftar-menu.php">DAFTAR MENU</a></li>
                <li><a href="pesanan.php">PESANAN</a></li>
                <li><a href="kontak.php">KONTAK</a></li>
                <li><a href="login.php">LOGIN</a></li>
                <li class="kanan"><a>JAMUR KOPRAL</a></li>
            </ul>
        </nav>

        <div class="bgnav">
            <h2>JAMUR KOPRAL</h2>
            <img src="images/lokasi.png" alt="lokasi">
            <p>alamat</p>
        </div>
        
        <div class="row">
            <h2>Produk</h2>
            <?php
    include 'db.php';
    $no=0;
    $query =mysqli_query($conn,"SELECT * FROM tb_produk ORDER BY id_produk ASC");
    while($result =mysqli_fetch_array($query)){
        $no++
        ?>
            <div class="list">
                <img src="images/<?php echo $result['foto']; ?>">
                <h4><?php echo $result['nama'] ?></h4>
                <h5>RP <?php echo $result['harga'] ?></h5>
                <a class ="tombol detail" href="detail.php?nama=<?=$result['nama']?>">Detail</a>
                <a class ="tombol beli" href="beli.php?nama=<?=$result['nama']?>">Beli</a>
            </div>
            
<?php 
}
?>
        </div>

        <footer>
            <div class="footer-content">
                <h3>Jamur Kopral</h3>
                <p>Hubungi kami melalui :</p>
                <ul class="socials">
                    <li><a href="#"><img src="images/gmail.png" alt="gmail"></a></li>
                    <li><a href="#"><img src="images/wa.png" alt="whaatsapp"></a></li>
                    <li><a href="#"><img src="images/ig.png" alt="instargram"></a></li>
                </ul>
            </div>
            <div class="footer-bottom">
                <p>copyright &copy;2021 <a href="#">Jamurkopral</a>  </p>
                <div class="footer-menu">
                    <ul class="f-menu">
                        <li><a href="#top">Home</a></li>
                        <li><a href="">About</a></li>
                        <li><a href="">Contact</a></li>
                    </ul>
                </div>
            </div>
        </footer>

    </body>
</html>