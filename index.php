<?php

    # Comment

    // echo "hello world";
    // 1
    // 12
    // 3

    /*
        Dòng 1
        Dòng 2
    */


    # IN

    echo "WD18410 <br>";
    print "PHP1 <br>";

    # Biến

    $bien;
    $bien = "Đây là biến";
    $_a = 123;

    //$@abc; không thể bắt đầu bằng kí tự đặc biệt

    //$134a; Không thể bắt đầu bằng kí tứ số

    echo $bien.'<br>'; // sử dụng dấu chấm để nối 2 biến hoặc chuỗi
    echo "$_a <br>"; //có thể viết biến vào trong dấu nháy kép "

    #Number

    # int - số nguyên

    $a = 100;
    $soNguyen = '-123';

    echo $soNguyen."<br>";

    var_dump($soNguyen);
    echo "<br>";
    var_dump(is_int($soNguyen));

    #float - số thực

    $soThuc = 100.123;
    echo "<br>";
    is_float($soThuc);
    echo "<br>";
    var_dump($soThuc);
    echo "<br>";

    #Boolean: true || false
    $check = true;
    $isCheck = false;

    is_bool($check);
    echo "<br>";
    var_dump($check);
    echo "<br>";

    #string - chuỗi
    $b="chính";
    $chuoi = 'Đây là chuỗi 1: '.$b.' <br>'; // KO thể sử dụng biến
    $chuoi2 = "Đây là chuỗi 2: $b"; // có thể sử dụng biến
    echo $chuoi;
    echo $chuoi2;
    




?>