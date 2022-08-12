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
            .tbh{
                padding-bottom: 10px;
            }
            .tambah{
                padding: 8px 15px;
                background-color: crimson;
                color: white;
                border:none;
                border-radius: 10px;
                cursor: pointer;
            }
            .tambah:hover{
                background-color: green;
                transition-duration: 700ms;
                color: yellow;
            }
        </style>
    </head>
    <body>
        <nav>
            <ul class="topnav">
                <li><a href="home-admin.php">HOME</a></li>
                <li><a class="active" href="daftar-menu-admin.php">DAFTAR MENU</a></li>
                <li><a href="pesanan-admin.php">PESANAN</a></li>
                <li><a href="kontak-admin.php">KONTAK</a></li>
                <li><a href="keluar.php">LOGOUT</a></li>
                <li class="kanan"><a>JAMUR KOPRAL</a></li>
            </ul>
        </nav>

        
            <h2>Halaman Produk</h2>
            <p class="hp">Tambah jenis produk yang ingin di jual ?</p>
            
            <div class="row">
            <div class="tbh">
            <input href type="submit" name="submit" value="+ Tambah Produk" class="tambah" onclick="location.href='tambah-produk.php'">
            </div>
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
                <a class ="tombol beli" href="">Beli</a>
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
                    </ul>
                </div>
            </div>
        </footer>
    </body>
</html>