<?php
    # Toán tử số học
    //Toán tứ ++ ,--
    $a = 3;
    //echo ++$a;
    // echo $a++;// 3
    // echo $a;// 4


    # Toán tử Gán
    $a = 10;
    $b = $a;
    $b += 20; // $b= $b + 20

    # Toán tử so sánh >,< ,>=,<=, ==,===, !==,...

    $a = 1; // number
    $b = '1';// string
    // var_dump($a == $b);     // true
    // var_dump($a === $b);    // false

    $x = 4;
    $y = 5;
    echo ++$x * $y-- + $x++ * --$y;
    echo "<br>";
    echo $x;
    echo "<br>";
    echo $y;


    # Toán tử logic : && , ||, !


    #
    $xyz = "abc";
    $$xyz = "đẹp trai";
    echo $abc;

    # Ép kiểu

    $a= "1";
    $number = (int) $a; //ép sang kiểu int
    var_dump($number);
    echo "<br>";
    $float = (float) $a;//ép sang kiểu số thực
    var_dump($float);
    echo "<br>";
    $bool = (bool) $a; //ép sang kiểu boolean
    var_dump($bool);
    echo "<br>";
    $string = (string) $number; // ép sang kiểu string

    #Mảng

    $arr = [1,2,3,4,5];
    echo "<pre>";
    print_r($arr);
    echo $arr[2];//3
    echo "<br>";

    //Tự định nghĩa ra các key
    $arr2 =[
        "a" => 1,
        "b" => 2,
        "c" => 3,
        "d" => 4,
    ];
    echo "<pre>";
    print_r($arr2);
    echo $arr2['c'];//3


    //Thêm vào mảng

    $arr[] = 6;// thêm vào cuối mảng
    array_push($arr,7);// thêm vào cuối mảng
    array_unshift($arr,0); // thêm vào đầu mảng
    array_splice($arr,3,0,"chinh");// thêm gt "chinh" vào sau vị trí thứ 3

    //Xóa giá trị trong mảng
    unset($arr[3]);
    array_pop($arr);//xóa đi phần tử cuối cùng trong mảng
    array_shift($arr);//xóa đi phần tử đầu tiên trong mảng
    array_splice($arr,3,2,"abc");// xóa đi 2 phần tử bắt từ vị trí thứ 3
    //và thêm giá trị "abc"

    echo "<pre>";
    print_r($arr);

    //Mảng đa chiều
    $arr3 =[
      "a" => [1,2,3,4],
      "b" => [5,6,7,8],
      "c" => [9,10,11,12]
    ];
    // echo "<pre>";
    // print_r($arr3);
    echo $arr3['b'][3];//8



    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "<br>";

?>