<?php
    $localhost = 'localhost';
    $databaseName = 'wd18410_db_thethao';
    $username ='root';
    $password ='';

    $conn = new PDO("mysql:host=$localhost;dbname=$databaseName", $username, $password);

    if($conn){
        // echo "Kết nối thành công";
    }else{
        echo "Bạn thất bại";
    }
?>