<!DOCTYPE html>
<html>
    <head>
        <title>Pesanan Admin</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="jamur.css">
        <style>
            h2 ,h3{
                color: #91080b;
                text-align: center;
                text-shadow: 1px 0px 0px #fff, -1px 0px 0px #fff, 0px 1px 0px #fff, 0px -1px 0px #fff, 1px 1px 2px #000;
            }
            hr{
                border:10px solid green;
                border-radius: 5px;
            }
            table{
                margin-left: auto;
                margin-right: auto;
                border-collapse: collapse;
            }
            table td, table th{
                border: 1px solid #ddd;
                padding: 8px;
            }
            table th{
                padding-top: 12px;
                padding-bottom: 12px;
                text-align: left;
                background-color: #04aa6d;
                color: white;
            }
            table tr:nth-child(even){
                background-color: #f2f2f2;
            }
            table td a.link{
                background-color: crimson;
                color: white;
                border: 2px solid crimson;
                padding: 10px 20px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
            }
            table td a.link:hover{
                background-color: green;
                border: 2px solid green;
            }
            p.selesai{
                font-style: italic;
            }
        </style>
    </head>
    <body>
    <nav>
            <ul class="topnav">
                <li><a href="home-admin.php">HOME</a></li>
                <li><a href="daftar-menu-admin.php">DAFTAR MENU</a></li>
                <li><a class="active" href="pesanan-admin.php">PESANAN</a></li>
                <li><a href="kontak-admin.php">KONTAK</a></li>
                <li><a href="keluar.php">LOGOUT</a></li>
                <li class="kanan"><a>JAMUR KOPRAL</a></li>
            </ul>
        </nav>

        <h2>Daftar Pesanan :</h2>
        <table>
            <tr>
                <th>Nama</th>
                <th>Nomor WhatsApp</th>
                <th>Email</th>
                <th>Alamat</th>
                <th>Pesan</th>
                <th>Nama Produk</th>
                <th>Jumlah Item</th>
                <th>Total Harga</th>
                <th>Opsi</th>
            </tr>
<?php
    include 'db.php';
    $query = mysqli_query($conn, "SELECT*FROM tb_pesanan");
    
        
        
        ?>

            
            <?php
    while($result = mysqli_fetch_array($query)){
        
        $nama = $result['nama'];
        $wa = $result['wa'];
        $email = $result['email'];
        $alamat = $result['alamat'];
        $pesan = $result['pesan'];
        $produk = $result['nama_produk'];
        $jumlah = $result['jumlah_item'];
        $total = $result['harga_total'];
?>
            <tr>
                <td><?php echo "$nama"; ?></td>
                <td><?php echo "$wa"; ?></td>
                <td><?php echo "$email"; ?></td>
                <td><?php echo "$alamat"; ?></td>
                <td><?php echo "$pesan"; ?></td>
                <td><?php echo "$produk"; ?></td>
                <td><?php echo "$jumlah"; ?></td>
                <td><?php echo "$total"; ?></td>
                <td>
                    <a class="link" href="delete.php?nama=<?=$result['nama']?>">Selesai</a>
                </td>
                
            </tr> 
            <?php } ?>
        </table><br><br>

        <h3>Jumlah Pesanan : <?php echo mysqli_num_rows($query); ?></h3>
        <p class="selesai">*jika pesanan sudah selesai maka click tombol "selesai"</p><br>
        <hr><br><br>

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
                        <li><a href="home-admin.php">Home</a></li>
                        <li><a href="">About</a></li>
                        <li><a href="">Contact</a></li>
                    </ul>
                </div>
            </div>
        </footer>
    </body>
</html>