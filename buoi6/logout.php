<?php
    // nhớ khai báo
    session_start();

    if(isset($_SESSION["username"])){
        //xóa 1 session
        unset($_SESSION["username"]);
        header('Location: index.php');
    }else{
        echo "Bạn chưa đăng nhập";
    }
?>