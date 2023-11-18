<?php
    include_once('./connect.php');
    $hoVaTen ='';
    $ngaySinh ='';
    $khoa ='';
    $lopId ='';

    $errHoVaten ='';
    $errKhoa = '';
    $errNgaySinh ='';
    $isCheck = true;

    

    if(isset($_POST["submit"])){
        //lấy thông tin người dùng nhập vào
        $hoVaTen = trim($_POST["hoVaTen"]);
        $khoa = trim($_POST["khoa"]);
        $ngaySinh = $_POST["ngaySinh"];
        $lopId = $_POST["lopId"];
        // echo "<pre>";
        //in thông tin ra bên ngoài 
        //lưu ý có dấu []
        // print_r([$hoVaTen,$khoa,$ngaySinh,$lopId]);

        //kiểm tra dữ liệu
        if(empty($hoVaTen)){
            $errHoVaten = "Cần nhập họ và tên";
            $isCheck = false;
        }
        if(empty($khoa)){
            $errKhoa ="Cần nhập khoa";
            $isCheck = false;
        }
        if(empty($ngaySinh)){
            $errNgaySinh ="Cần nhập ngày sinh";
            $isCheck = false;
        }


    }

    $sql = "SELECT * FROM lop";
    $result = $conn->query($sql);
    $options ='';
    if($result){
        $listLop = $result->fetchAll(PDO::FETCH_ASSOC);
        // echo "<pre>";
        // print_r($listLop);
        if($listLop){
            foreach($listLop as $item){
                // print_r($item);
                //kiểm tra id của thẻ lớp với id mà người lựa chọn trước đó
                $options .='<option '.($item["id"] == $lopId ? 'selected': '').' value="'.$item["id"].'">'.$item["tenLop"].'</option>';
            }
        }
        echo htmlspecialchars($options);
    }
?>

<form action="add.php" method="post">
    <label for="">Họ và tên</label>
    <input type="text" name="hoVaTen" value="<?= $hoVaTen;?>"> 
    <span style ="color:red"><?= $errHoVaten; ?></span> <br>

    <label for="">Khoa</label>
    <input type="text" name="khoa" value ="<?= $khoa; ?>">
    <span style ="color:red"><?= $errKhoa; ?></span> <br>

    <label for="">Ngày sinh</label>
    <input type="date" name="ngaySinh" value ="<?= $ngaySinh;?>">
    <span style ="color:red"><?= $errNgaySinh; ?></span> <br>

    <label for="">Lớp</label>
    <select name="lopId" id="">
        <?php echo $options; ?>
    </select> <br>

    <input type="submit" value="Gửi" name="submit">

</form>