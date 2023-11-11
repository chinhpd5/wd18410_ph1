<?php
    #while
    $i=0;
    while($i <= 10){//kiểm tra điều kiện, nếu thỏa mãn sẽ thực hiện code
        //echo "i = $i <br>";
        $i++;//bước nhảy, nếu k có thì nó sẽ lặp vô hạn
    }

    #do... while
    $a =0;
    $tong =0;
    do{
        echo "a = $a <br>";
        $tong+=$a;//$tong = $tong + $a
        $a++;
    }while($a <= 10);
    echo $tong.'<br>';

    $arr = [1,2,3,4,5,6,7,8,9,10];
    $tong =0;
    $tongChan =0;
    for($i =0 ; $i < count($arr);$i++){
        //echo $arr[$i]."<br>";
        $tong = $tong + $arr[$i];//tổng các phần tử 

        if($arr[$i] % 2 == 0){ //kiểm tra điều kiện
            $tongChan += $arr[$i];
        }

    }
    echo $tong.'<br>';
    echo $tongChan.'<br>';


    #foreach
    $array1 = [
        "name" => "Phí Đức Chính",
        "age" => 20,
        "khoa" => "Công nghệ thông tin",
        "gt" => false,
        "result" => [6,7.5,8.5,9]
    ];

    $thongTin ='';
    $thongTin .= 'Họ và tên: '. $array1["name"].'<br>';
    $thongTin .= 'Tuổi: '.$array1["age"]."<br>";
    $thongTin .= "Khoa: " .$array1["khoa"].'<br>';
    $thongTin .= "Giới tính: ". ( $array1["gt"] ? "Nam" : "Nữ" )."<br>";

    echo $thongTin;


    foreach($array1 as $key => $value){
        if(is_array($value)){//is_array để kiểm tra 1 biến có phải là array k
            print_r($value);
        }else{
            echo "key = $key và value = $value <br>";
        }
    }
    echo "<pre>";
    // print_r($array1["result"]);
    $tong =0;
    foreach($array1["result"] as $number){ //[6,7.5,8.5,9]
        //echo $k."<br>";
        $tong +=$number;
    }

    $arr2 =[
        'a'=> 7,
        'b' => 9,
        'c' => 4,
        'd' => 5,
        'e' =>2
    ];
    $tich = 1;
    //tính tích các số lẻ trong mảng arr2 sử dụng foreach
    foreach($arr2 as $num){
        //echo $num."<br>";
        if($num % 2 == 1){
            $tich *= $num;
        }
    }
    //echo $tich;



    $array2 =[
        [
            "name" => "Phí Đức Chính",
            "age" => 20,
            "khoa" => "Công nghệ thông tin",
            "gt" => true,
            "result" => [6,7.5,8.5,9]
        ],
        [
            "name" => "Đặng Thành Long",
            "age" => 21,
            "khoa" => "Ứng dụng phần mềm",
            "gt" => true,
            "result" => [5,9.5,10,9]
        ],
        [
            "name" => "Trần Thị Ngọc",
            "age" => 20,
            "khoa" => "Lập trình web",
            "gt" => false,
            "result" => [5,8.5,9,10]
        ],
        [
            "name" => "Đinh Ngọc Hồng",
            "age" => 22,
            "khoa" => "Ứng dụng phần mềm",
            "gt" => false,
            "result" => [4,6,8.5,10]
        ]
    ];





    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "<br>";
?>