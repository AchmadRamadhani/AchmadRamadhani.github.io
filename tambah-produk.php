<!DOCTYPE html>
<html>
    <head>
        <title>Tambah Produk</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="jamur.css">
        <style>
            h2{
                color: #91080b;
                text-align: center;
                text-shadow: 1px 0px 0px #fff, -1px 0px 0px #fff, 0px 1px 0px #fff, 0px -1px 0px #fff, 1px 1px 2px #000;
            }
        </style>
    </head>
    <body>
        <h2>Tambah Produk</h2>
        <div class="tp">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="tmp">
                    <div class="col-25">
                        <label for="idname">ID Produk</label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="idproduk" name="id-produk" placeholder="isi dengan angka">
                    </div>
                </div>
                <div class="tmp">
                    <div class="col-25">
                        <label for="lname">Nama</label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="nama" name="nama-produk" placeholder="nama produk...">
                    </div>
                </div>
                <div class="tmp">
                    <div class="col-25">
                        <label for="lname">Harga</label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="harga" name="harga-produk" placeholder="000.00">
                    </div>
                </div>
                <div class="tmp">
                    <div class="col-25">
                        <label for="lname">Berat</label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="berat" name="berat-produk" placeholder="... gram">
                    </div>
                </div>
                <div class="tmp">
                    <div class="col-25">
                        <label for="lname">Jenis</label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="jenis" name="jenis-produk" placeholder="contoh= 'makanan ringan'">
                    </div>
                </div>
                <div class="tmp">
                    <div class="col-25">
                        <label>Foto</label>
                    </div>
                    <div class="col-75">
                        <input type="file" name="foto">
                    </div>
                </div>
                <div class="tmp">
                    <div class="col-25">
                        <label for="subject">Deskripsi</label>
                    </div>
                    <div class="col-75">
                        <textarea id="subject" name="deskripsi" placeholder="Write something.." style="height:200px"></textarea>
                    </div>
                </div>
                <br>
                <div class="tmp">
                <input type="submit" value="Batal" name="keluar" id="kel">
                    <input type="submit" value="Tambah" name="submit" id="sub">
                </div>
            </form>
        </div>
<?php
include 'db.php';
session_start();
if(isset($_POST['keluar'])) {
    echo '<script>window.location="daftar-menu-admin.php"</script>';
}
    if(isset($_POST['submit'])) {
        $id_produk = $_POST['id-produk'];
        $nama = $_POST['nama-produk'];
        $harga = $_POST['harga-produk'];
        $berat = $_POST['berat-produk'];
        $jenis = $_POST['jenis-produk'];
        $deskripsi = $_POST['deskripsi'];
        $foto = $_FILES['foto']['name'];

        if($foto !=""){
            $ekstensi_diperbolehkan = array('png','jpg');
            $x =  explode('.', $foto);
            $ekstensi = strtolower(end($x));
            $file_tmp = $_FILES['foto']['tmp_name'];
            $angka_acak = rand(1,999);
            $nama_foto_baru = $angka_acak.'-'.$foto;
                if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
                    move_uploaded_file($file_tmp, 'images/'.$nama_foto_baru);
                    $query = "INSERT INTO tb_produk (id_produk, nama, harga, berat, jenis, deskripsi, foto) VALUES ('$id_produk', '$nama', '$harga', '$berat', '$jenis', '$deskripsi', '$nama_foto_baru')";
                    $result = mysqli_query($conn, $query);
                        if(!$result){
                            die ("Query gagal dijalankan: ".mysqli_errno($conn).
                                    "-".mysqli_error($conn));
                        } else{
                            echo "<script>alert('Data berhasil ditambah.');window.location='daftar-menu-admin.php';</script>";
                        }
                } else{
                    echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');window.location='tambah-produk.php';</script>";
                }
        } else{
            $query = "INSERT INTO tb_produk (id_produk, nama, harga, berat, jenis, deskripsi, foto) VALUES ('$id_produk', '$nama', '$harga', '$berat', '$jenis', '$deskripsi', null)";
            $result = mysqli_query($conn, $query);
            if(!$result){
                die ("Query gagal dijalankan: ".mysqli_errno($conn).
                        "-".mysqli_error($conn));
            } else{
                echo "<script>alert('Data berhasil ditambah.');window.location='daftar-menu-admin.php';</script>";
            }
        }
    }
?>
    </body>
</html>