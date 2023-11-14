<?php
    # Hàm - Function

    function sayHello($name){
        echo "xin chào $name <br>";
    }

    $n= "chính";
    sayHello($n);


    function tinhTong($a, $b){
        return $a+$b;
    }

    $result = tinhTong(3,6);
    echo $result;


    function checkSNT($number){
        if($number < 2)
            return false;

        for($i =2;$i <= sqrt($number);$i++){
            if($number % $i == 0)
                return false;
        }
        return true;
    }
    echo "<br>";
    $arr =[1,2,3,4,5,6,7,8,9,10];

    foreach($arr as $value){
        if(checkSNT($value))
            echo $value."<br>";
    }


?>