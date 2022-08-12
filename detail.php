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
        <title>Detail Produk</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="jamur.css">
        <style>
             h2{
                color: #91080b;
                text-align: center;
                text-shadow: 1px 0px 0px #fff, -1px 0px 0px #fff, 0px 1px 0px #fff, 0px -1px 0px #fff, 1px 1px 2px #000;
            }
            button{
                background-color: crimson;
                border: none;
                color: white;
                padding: 16px 32px;
                text-align: center;
                font-size:  16px;
                margin: 20px 4px;
                cursor: pointer
            }
            button:hover{
                color: yellow;
                border: 1px solid #333;
            }
            td{
               padding: 20px;
            }
            table{
                margin:10px;
                background:#ccc;
            }
        </style>
    </head>
    <body>
        <h2>Detail Produk :</h2>
        <table>
            <tr>
                <td>NO :</td>
                <td><?php echo $result['id_produk'] ?></td>
            </tr>
            <tr>
                <td>Nama :</td>
                <td><?php echo $result['nama'] ?></td>
            </tr>
            <tr>
                <td>Harga :</td>
                <td><?php echo $result['harga'] ?></td>
            </tr>
            <tr>
                <td>Berat :</td>
                <td><?php  echo $result['berat'] ?></td>
            </tr>
            <tr>
                <td>Jenis :</td>
                <td><?php echo $result['jenis'] ?></td>
            </tr>
            <tr>
                <td>Deskripsi :</td>
                <td><?php echo $result['deskripsi'] ?></td>
            </tr>
            <tr>
                <td><button onclick="location.href='home.php'">Kembali</button></td>
            </tr>
        </table>
    </body>
</html>