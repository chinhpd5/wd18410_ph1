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

<form action="date.php" method="post">

    <label for="">UserName</label>
    <input type="text" name="userName"><br>

    <label for="">Password</label>
    <input type="password" name="password"><br>

    <label for="">Môn học</label>

    <select name="subject" id="">
        <?php echo $options; ?>
    </select><br>

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