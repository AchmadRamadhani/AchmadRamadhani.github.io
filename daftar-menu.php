<!DOCTYPE html>
<html>
    <head>
        <title>Daftar Menu</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="jamur.css">
        <style>
            h2, p.hp{
    color: #91080b;
    text-align: center;
    text-shadow: 1px 0px 0px #fff, -1px 0px 0px #fff, 0px 1px 0px #fff, 0px -1px 0px #fff, 1px 1px 2px #000;
}
        </style>
    </head>
    <body>
        <nav>
            <ul class="topnav">
                <li><a href="home.php">HOME</a></li>
                <li><a class="active" href="daftar-menu.php">DAFTAR MENU</a></li>
                <li><a href="pesanan.php">PESANAN</a></li>
                <li><a href="kontak.php">KONTAK</a></li>
                <li><a href="login.php">LOGIN</a></li>
                <li class="kanan"><a>JAMUR KOPRAL</a></li>
            </ul>
        </nav>

        
            <h2>Halaman Produk</h2>
            <p class="hp">Pilih produk yang anda inginkan</p>
            <div class="row">
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
                <h5>Rp <?php echo $result['harga'] ?></h5>
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
                        <li><a href="home.php">Home</a></li>
                        <li><a href="">About</a></li>
                        <li><a href="">Contact</a></li>
                    </ul>
                </div>
            </div>
        </footer>
    </body>
</html>