<?php
    $localhost = 'localhost';
    $databaseName = 'wd18410_quanlyoto';
    $username ='root';
    $password ='';

    $conn = new PDO("mysql:host=$localhost;dbname=$databaseName", $username, $password);

    if($conn){
        //echo "Kết nối thành công";
    }else{
        echo "Bạn thất bại";
    }
?>