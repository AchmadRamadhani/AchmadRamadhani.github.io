<!DOCTYPE html>
<html>
    <head>
        <title>Kontak</title>
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
                <li><a href="daftar-menu.php">DAFTAR MENU</a></li>
                <li><a href="pesanan.php">PESANAN</a></li>
                <li><a class="active" href="kontak.php">KONTAK</a></li>
                <li><a href="login.php">LOGIN</a></li>
                <li class="kanan"><a>JAMUR KOPRAL</a></li>
            </ul>
        </nav>

        <h2>Contact Form</h2>
        <p class="hp">Hubungi kami dengan mengisi isian dibawah :</p>
        <form method="POST" action="">
            <table>
                <tr>
                    <td><label for="nama">Nama :</label></td>
                    <td><input type="text" name="nama" id="Name" /></td>
                </tr>
                <tr>
                    <td><label for="Alamat">Alamat :</label></td>
                    <td><input type="text" name="alamat" id="Alamat" /></td>
                </tr>
                <tr>
                    <td><label for="Email">Email :</label></td>
                    <td><input type="text" name="email" id="Email" /></td>
                </tr>
                <tr>
                    <td><label for="Telp">WhatsApp :</label></td>
                    <td><input type="text" name="wa" id="Telp" /></td>
                    <tr>
                        <td><label for="Pesan">Pesan :</label></td>
                        <td><textarea name="pesan" rows="8" cols="5" id="pesan"></textarea></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                        <input type="submit" name="submit" value="Submit" id="sub"/>
                        </td>
                    </tr>
                </tr>
            </table>              
        </form>
<?php
    include 'db.php';
    if(isset($_POST['submit'])){
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $email = $_POST['email'];
        $wa = $_POST['wa'];
        $pesan = $_POST['pesan'];
        $submit = "INSERT INTO tb_kontak (nama, alamat, email, wa, pesan) VALUES ('$nama', '$alamat', '$email', '$wa', '$pesan')";
        $bom = mysqli_query($conn, $submit);

        if(!$bom){
            die ("Query gagal dijalankan: ".mysqli_errno($conn).
                    "-".mysqli_error($conn));
        } else{
            echo "<script>alert('Anda telah mengirim pesan.');window.location='kontak.php';</script>";
        }
    }
?>

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