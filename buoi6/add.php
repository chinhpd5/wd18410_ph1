<?php
    include_once('./connect.php');
    $sql = "SELECT * FROM lop";
    $result = $conn->query($sql);
    $options ='';
    if($result){
        $listLop = $result->fetchAll(PDO::FETCH_ASSOC);
        echo "<pre>";
        // print_r($listLop);
        if($listLop){
            foreach($listLop as $item){
                // print_r($item);
                $options .='<option value="'.$item["id"].'">'.$item["tenLop"].'</option>';
            }
        }
        //echo htmlspecialchars($options);
    }

    if(isset($_POST["submit"])){
        //lấy thông tin người dùng nhập vào
        $hoVaTen = $_POST["hoVaTen"];
        $khoa = $_POST["khoa"];
        $ngaySinh = $_POST["ngaySinh"];
        $lopId = $_POST["lopId"];
        echo "<pre>";
        //in thông tin ra bên ngoài 
        //lưu ý có dấu []
        // print_r([$hoVaTen,$khoa,$ngaySinh,$lopId]);
    }
?>

<form action="add.php" method="post">
    <label for="">Họ và tên</label>
    <input type="text" name="hoVaTen"> <br>

    <label for="">Khoa</label>
    <input type="text" name="khoa"> <br>

    <label for="">Ngày sinh</label>
    <input type="date" name="ngaySinh"> <br>

    <label for="">Lớp</label>
    <select name="lopId" id="">
        <?php echo $options; ?>
    </select> <br>

    <input type="submit" value="Gửi" name="submit">

</form>