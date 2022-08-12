<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="jamur.css">
    </head>
    <body id="bg-login">
        <div class="box-login">
            <h2>Login</h2>
            <form action="" method="POST">
                <input type="text" name="user" placeholder="Username" class="input-control">
                <input type="password" name="pass" placeholder="Password" class="input-control">
                <input type="submit" name="submit" value="Login" class="btn">
            </form>
            <?php
            if(isset($_POST['submit'])){
                session_start();
                include 'db.php';

                $user = $_POST['user'];
                $pass = $_POST['pass'];
                $cek = mysqli_query($conn, "SELECT * FROM tb_admin Where username = '" .$user. "' AND password = '" .$pass. "'");
                $tot = mysqli_num_rows($cek);
                $r= mysqli_fetch_array($cek);

                if($tot > 0){
                    $_SESSION['username'] = $user;
                    $_SESSION['password'] = $pass;
                    
                    if($r['username']==$user){
                    echo '<script>window.location="home-admin.php"</script>';
                    
                    } 
                    }
                    else{
                        echo '<script>alert("Username atau password Anda salah")</script>';
                    }
                }
                
            
            ?>
        </div>
    </body>
</html>