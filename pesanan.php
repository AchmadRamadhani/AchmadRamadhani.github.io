<!DOCTYPE html>
<html>
    <head>
        <title>Pesanan</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="jamur.css">
        <style>
            h2{
                color: #91080b;
                text-align: center;
                text-shadow: 1px 0px 0px #fff, -1px 0px 0px #fff, 0px 1px 0px #fff, 0px -1px 0px #fff, 1px 1px 2px #000;
            }
            hr{
                border:10px solid green;
                border-radius: 5px;
            }
            input[type=text] {
                width: 300px;
                padding: 12px 20px;
                margin: 8px 0;
                box-sizing: border-box;
                border: 1px solid #555;
                outline: none;
            }

            input[type=text]:focus {
                background-color: lightblue;
            }
            .sss{
                width: 100%;
                display: flex;
                justify-content: center;
            }
            input[type=submit]#cek {
                
                background-color: #04AA6D;
                color: white;
                padding: 12px 20px;
                border: none;
                border-radius: 5px;
                cursor: pointer;
                
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
        </style>
    </head>
    <body>
    <nav>
            <ul class="topnav">
                <li><a href="home.php">HOME</a></li>
                <li><a href="daftar-menu.php">DAFTAR MENU</a></li>
                <li><a class="active" href="pesanan.php">PESANAN</a></li>
                <li><a href="kontak.php">KONTAK</a></li>
                <li><a href="login.php">LOGIN</a></li>
                <li class="kanan"><a>JAMUR KOPRAL</a></li>
            </ul>
        </nav>

        <h2>Masukkan Nama Anda</h2>
        <form action="" method="POST">
        <div class="sss">
            <input type="text" name="name" placeholder="Nama yang telah anda submit...">
        </div><br>
        <div class="sss"><br>
            <input type='submit' value='Cek Pesanan' name='cek' id='cek'>
        </div><br>
        </form>
<?php
    include 'db.php';
    if(isset($_POST['cek'])){
        $name = $_POST['name'];
        $query = mysqli_query($conn, "SELECT*FROM tb_pesanan WHERE nama='$name'");
        $result = mysqli_fetch_array($query);
        $nama = $result['nama'];
        $wa = $result['wa'];
        $email = $result['email'];
        $alamat = $result['alamat'];
        $pesan = $result['pesan'];
        $produk = $result['nama_produk'];
        $jumlah = $result['jumlah_item'];
        $total = $result['harga_total'];

        echo"
        <h2>Pesanan Anda :</h2>
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
            </tr>
            <tr>
                <td>$nama</td>
                <td>$wa</td>
                <td>$email</td>
                <td>$alamat</td>
                <td>$pesan</td>
                <td>$produk</td>
                <td>$jumlah</td>
                <td>$total</td>
            </tr> 
        </table><br><br>
        ";
    }
?>
        
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
                        <li><a href="home.php">Home</a></li>
                        <li><a href="">About</a></li>
                        <li><a href="">Contact</a></li>
                    </ul>
                </div>
            </div>
        </footer>
    </body>
</html>