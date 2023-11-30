<?php
    session_start();

    if(isset($_POST["submit"])){
        $username = $_POST["username"];
        $password = $_POST["password"];

        if($username =="admin" && $password == "123456"){
            //khai báo 1 session
            $_SESSION["username"] = $username;
            header('Location: index.php');
        }else{
            echo "Sai tài khoản hoặc mật khẩu";
        }

    }

?>

<form action="login.php" method="post">
    <label for="">UserName</label>
    <input type="text" name ="username"><br>

    <label for="">Password</label>
    <input type="password" name ="password"><br>

    <input type="submit" name ="submit" value="Đăng nhập">
</form>