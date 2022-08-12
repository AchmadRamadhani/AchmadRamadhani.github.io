<?php
    include 'db.php';
    if(isset($_GET['nama'])){
        $nama = $_GET['nama'];
        $query =mysqli_query($conn, "DELETE FROM tb_pesanan WHERE nama='$nama'"); 
        
        if($query){
            header('Location: pesanan-admin.php');
        }else{
            die("gagal menghapus...");
        }
    }else{
        die("akses dilarang...");
    }
?>