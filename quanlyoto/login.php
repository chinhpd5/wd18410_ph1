<?php
    if(isset($_POST["submit"])){
        $username = $_POST["username"];
        $password = $_POST["password"];

        // print_r([$username,$password]);
        if($username =="admin" && $password ="123456"){
            // echo "Đăng nhập thành công";
            // Hàm tạo mới 1 cookie
            setcookie("username",$username,time() + 60*60*24);
            header("Location: index.php");
            // echo $_COOKIE["username"];
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