<?php
    # Câu điều kiện
    $a = 20;
    if($a >50){ // && ||
        echo "$a lớn hơn 50";
    }else{
        echo "$a nhỏ hơn 50";
    }
    echo "<br>";
    //Kiểm tra 1 số có phải số chẵn hay không
    $so = 24344;
    if($so % 3 == 0){
        echo "$so là số chai hết cho 3";
    }else if($so % 3 == 1){
        echo "$so chia cho 3 dư 1";
    }else{
        echo "$so chia cho 3 dư 2";
    }
    //sử dụng if else để làm bài tập sau
    $age = 100;
    /*
        0 < age < 15 => thiếu nhi
        15 < age <23 => thiếu niên
        23 <age <40 =>thanh niên
        40 <age <60 => trung niên
        age > 60=> người già

        cách 1: sử dụng if else có kết hợp biểu thức điều kiện && ||
        cách 2: không được sử dụng biểu thức điều kiện
        làm với switch case

    */

        if($age < 0){
            echo "Lỗi tuổi";
        }else{
            if($age >0 && $age <15){
                echo "thiếu nhi";
            }else if($age >=15 && $age <23){
                echo "thiếu niên";
            }else if($age >=23 && $age <40 ){
                echo "thanh niên";
            }else if($age >=40 && $age <60){
                echo "trung niên";
            }else{
                echo "người già";
            }

        }
    $age =25;
    //Cách 2
    if($age < 15)
        echo "thiếu nhi";
    else if($age <23)
        echo "thiếu niên";
    else if($age <40)
        echo "thanh niên";
    else if($age <60)
        echo "trung niên";
    else
        echo "người già";
    //c3
    if($age >60)
        echo "người già";
    else if($age >40)
        echo "trung niên";
    else if($age >23)
        echo "thanh niên";
    else if($age >15)
        echo "thiếu niên";
    else 
        echo "thiếu nhi";

    #switch case
    echo "<br>";
    $day = 10;
    switch($day){
        case 2:
            echo "Thứ 2";
            break;
        case 3:
            echo "Thứ 3";
            break;
        case 4:
            echo "Thứ 4";
            break;
        case 5:
            echo "Thứ 5";
            break;
        case 6:
            echo "Thứ 6";
            break;
        case 7:
            echo "Thứ 7";
            break;
        default:
            echo "chủ nhật";
    }
    //age = (bool) 100 => true
    switch(true){
        case $age < 15: // true hoặc false so sánh true
            echo "thiếu nhi";
            break;
        case $age < 23:
            echo "thiếu niên"; 
            break;
        case $age < 40:
            echo "thanh niên";
            break;
        case $age < 60:
            echo "trung niên";
            break;
        default:
            echo "người già";
    }

?>