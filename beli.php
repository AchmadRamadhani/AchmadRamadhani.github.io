<?php
 include 'db.php';
 if(isset($_GET['nama'])){
    $id_produk = $_GET['nama'];
 } else{
    die ("Error. No ID Selected!");
 }

 $query = mysqli_query($conn, "SELECT*FROM tb_produk WHERE nama='$id_produk'");
 $result = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Pembelian</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="jamur.css">
        <style>
            hr{
                border:10px solid green;
                border-radius: 5px;
            }
            h2, p.st{
                color: #91080b;
                text-align: center;
                text-shadow: 1px 0px 0px #fff, -1px 0px 0px #fff, 0px 1px 0px #fff, 0px -1px 0px #fff, 1px 1px 2px #000;
            }
            form{
                font-family: Arial,Helvetica, sans-serif;
                padding: 12px;
                color: #333;
                text-shadow: 1px 1px 0px #fff;
                background-color: #eaebec;
                border: #ccc 1px solid;              
            }
            .sty{
                font-family: Arial,Helvetica, sans-serif;
                padding: 12px;
                color: #333;
                text-shadow: 1px 1px 0px #fff;
                background-color: #eaebec;
                border: #ccc 1px solid;
            }
        </style>
    </head>
    <body>
        <h2>Produk</h2>
        <p class="st">Isi form pesanan dengan benar</p>
        <form action="" method="POST">
            <table>
                <tr>
                    <td>Nama Anda :</td>
                    <td><input type="text" name="nama-order" placeholder="Nama lengkap anda..."></td>
                </tr>
                <tr>
                    <td>Nomor WhatsApp :</td>
                    <td><input type="text" name="wa-order" placeholder="Nomor WhatsApp anda..."></td>
                </tr>
                <tr>
                    <td>Email :</td>
                    <td><input type="text" name="email-order" placeholder="Email anda..."></td>
                </tr>
                <tr>
                    <td>Alamat :</td>
                    <td><textarea name="alamat-order" id="" cols="40" rows="5" placeholder="Alamat lengkap anda..."></textarea></td>
                </tr>
                <tr>
                    <td>Pesan :</td>
                    <td><textarea name="pesan-order" id="" cols="40" rows="5" placeholder="..."></textarea></td>
                </tr>
                <tr>
                    <td>Nama Produk :</td>
                    <td><input type="text" name="nama-produk" value="<?php echo $result['nama']?>" readonly></td>
                </tr>
                <tr>
                    <td>Harga :</td>
                    <td><input type="text" name="harga" value="Rp <?php echo $result['harga']?>" readonly></td>
                </tr>
                <tr>
                    <td>Jumlah Item Produk :</td>
                    <td>
                        <select name="jumlah-order">
                            <option value="">Jumlah -</option>
                            <?php
                                for($x=1;$x<=50;$x++){
                            ?>
                            <option value="<?php echo $x; ?>"><?php echo $x; ?></option>
                            <?php
                                }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td><div class='tmp'>
                    <input type='submit' value='Batal' id='kel' name='keluar'>
                    <input type='submit' value='Pesan Sekarang' name='Submit' id='sub'>
                </div></td>
                </tr>
            </table>
        </form><br>
        <hr><br><br><br>
<?php
if(isset($_POST['Submit'])){
    $nama = $_POST['nama-order'];
    $wa = $_POST['wa-order'];
    $email = $_POST['email-order'];
    $alamat = $_POST['alamat-order'];
    $pesan = $_POST['pesan-order'];
    $produk = $_POST['nama-produk'];
    $jumlah = $_POST['jumlah-order'];
    $total = 15000*$jumlah;
    $submit = "INSERT INTO tb_pesanan (nama, wa, email, alamat, pesan, nama_produk, jumlah_item, harga_total) VALUES ('$nama', '$wa', '$email', '$alamat', '$pesan', '$produk', '$jumlah', '$total')";
    $bom = mysqli_query($conn,$submit);
    $penerima = "jamurcrispy3107@gmail.com";
    $isi = "Pesanan baru = Nama: $nama, Nomor WhatsApp: $wa, Alamat pembeli: $alamat, Nama Produk: $produk, Jumlah yang dibeli: $jumlah, total harga: $total. ";
    $subyek = wordwrap($isi,70);
    $header="From: no-reply$email\r\n";
    $header.="MIME-Version: 0\r\n";
    $header.="Content-Type: text/html; charset=ISO-8859-1\r\n";
    $kirim = mail($penerima,$pesan,$isi,$header);
    if($kirim){
        echo "Pesan email berhasil dikirim.";
     }else{
        echo "Pesan email gagal dikirim.";
     }

    if(!$bom){
        die ("Query gagal dijalankan: ".mysqli_errno($conn).
                "-".mysqli_error($conn));
    } else{
        echo "<script>alert('Pesanan Anda Berhasil.');window.location='pesanan.php';</script>";
    }
}
    if(isset($_POST['keluar'])) {
        echo '<script>window.location="home.php"</script>';
    } 
?>

<br><br><br><br>
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