<?php
    $arrAction = [
        "swim" => "Bơi",
        "football" => "Đá bóng",
        "run" => "Chạy",
        "walk" => "Đi bộ"
    ];
    $options ='';
    foreach($arrAction as $key => $value){
        $options .= '<option value="'.$key.'">'.$value.'</option>';
    }
    echo htmlspecialchars($options);
?>

<form action="index.php" method="post">

    <label for="">UserName</label>
    <input type="text" name="userName"><br>

    <label for="">Password</label>
    <input type="password" name="password"><br>

    <label for="">Môn học</label>

    <select name="subject" id="">
        <?php echo $options; ?>
    </select><br>
    <hr>
    <label for="">Game</label> <br>
    <input type="checkbox" name="game[]" value="lol" id="">Liên minh <br> 
    <input type="checkbox" name="game[]" value="lq" id="" checked>Liên quân <br>
    <input type="checkbox" name="game[]" value="ff" id="">Lửa chùa <br>

    <hr>

    <label for="">money</label><br>
    <input type="radio" name="money" value="vnd" id="">VNĐ <br>
    <input type="radio" name="money" value="usd" id="">USD <br>
    <input type="radio" name="money" value="pound" id="">Bảng <br>
    <input type="radio" name="money" value="euro" id="">Euro <br>

    <input type="submit" name="submit" value="Gửi">

</form>


<?php
    #FORM
    if(isset($_POST["submit"])){
        $user = $_POST["userName"];
        echo $user.'<br>';

        $pass = $_POST['password'];
        echo $pass.'<br>';

        $subject = $_POST["subject"];
        echo $subject.'<br>';
        echo "<pre>";
        $game =$_POST["game"];
        print_r($game);

        $money =$_POST["money"];
        echo $money;
    }
    
   



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

    // foreach($arr as $value){
    //     if(checkSNT($value))
    //         echo $value."<br>";
    // }

    # FORM




?>