<!DOCTYPE html>
<html>
    <head>
        <title>Kontak Admin</title>
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
                <li><a href="pesanan.php">PESANAN</a></li>
                <li><a class="active" href="kontak-admin.php">KONTAK</a></li>
                <li><a href="keluar.php">LOGOUT</a></li>
                <li class="kanan"><a>JAMUR KOPRAL</a></li>
            </ul>
        </nav>

        <h2>Daftar Kontak</h2>
            <table>
                <tr>
                    <th>NO</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Email</th>
                    <th>WhatsApp</th>
                    <th>Pesan</th>
                </tr>
                              
<?php
    include 'db.php';
    $query = mysqli_query($conn, "SELECT*FROM tb_kontak");
    while($result = mysqli_fetch_array($query)){
        $id = $result['id'];
        $nama = $result['nama'];
        $alamat = $result['alamat'];
        $email = $result['email'];
        $wa = $result['wa'];
        $pesan = $result['pesan'];
    
?>
                    <tr>
                        <td><?php echo"$id";?></td>
                        <td><?php echo"$nama";?></td>
                        <td><?php echo"$alamat";?></td>
                        <td><?php echo"$email";?></td>
                        <td><?php echo"$wa";?></td>
                        <td><?php echo"$pesan";?></td>
                    </tr>
                    <?php } ?>
            </table><br><br>
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