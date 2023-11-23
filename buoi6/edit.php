<?php
    include_once('connect.php');
    $id ='';
    $hoVaTen ='';
    $ngaySinh ='';
    $khoa ='';
    $lopId ='';

    $errHoVaten ='';
    $errKhoa = '';
    $errNgaySinh ='';

    $isCheck = true;
    //lấy id trên URL và lấy thông tin sinh viên theo id đó
    if(isset($_GET["id"])){
        $id = $_GET["id"];
        if($id){
            $sql = "SELECT * FROM sinhvien WHERE id = $id";
            $result = $conn->query($sql);
            if($result){
                $sinhVien = $result->fetch(PDO::FETCH_ASSOC);
                if($sinhVien){
                    // echo "<pre>";
                    // print_r($sinhVien);

                    $hoVaTen = $sinhVien["hoVaTen"];
                    $khoa = $sinhVien["khoa"];
                    $ngaySinh = $sinhVien["ngaySinh"];
                    $lopId = $sinhVien["lopId"];
                }
            }
        }


    }

    if(isset($_POST["submit"])){
        // print_r($_POST);
        $id = $_POST["id"];
        $hoVaTen =$_POST["hoVaTen"];
        $khoa = $_POST["khoa"];
        $ngaySinh = $_POST["ngaySinh"];
        $lopId = $_POST["lopId"];
        
        // echo "<pre>";
        // print_r([$id,$hoVaTen,$khoa,$ngaySinh,$lopId]);
        // echo "</pre>";
        // die();

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

        if($isCheck){
            $sql = "UPDATE sinhvien 
                    SET hoVaTen = '$hoVaTen', khoa = '$khoa', ngaySinh ='$ngaySinh', lopId =$lopId
                    WHERE id = $id";

            // echo $sql;
            $result = $conn->query($sql);
            if($result){
                // echo "thành công";
                header('Location: index.php');
            }else{
                echo "Sửa thất bại";
            }
        }


    }

    // lấy danh sách lớp và để vào trong thẻ select
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
        //echo htmlspecialchars($options);
    }

?>


<form action="edit.php" method="post">

    <input type="hidden" name="id" value ="<?= $id ?>">

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