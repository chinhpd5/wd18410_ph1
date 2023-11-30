<?php
    if(isset($_COOKIE["username"])){
        //Xóa 1 cookie
        setcookie("username",'',time() - 60*60*24);
        // setcookie("username",'',0);
        header('Location: index.php');
    }
?>