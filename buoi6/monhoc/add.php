<?php
    include_once('../connect.php');
    $tenMonHoc='';
    $maMonHoc ='';
    $thoiGianBatDau ='';
    $thoiGianKetThuc ='';
    $trangThai ='';

    $errTenMonHoc ='';
    $errMaMonHoc ='';
    $errThoiGianBatDau ='';
    $errThoiGianKetThuc ='';
    $errTrangThai ='';

    $isCheck =true;

    if(isset($_POST["submit"])){
        // echo "<pre>";
        $tenMonHoc= trim($_POST["tenMonHoc"]);
        $maMonHoc = trim($_POST["maMonHoc"]);
        $thoiGianBatDau = $_POST["thoiGianBatDau"];
        $thoiGianKetThuc = $_POST["thoiGianKetThuc"];
        $trangThai =$_POST["trangThai"];

        // print_r([$tenMonHoc,$maMonHoc,$thoiGianBatDau,$thoiGianKetThuc,$trangThai]);

        //validate
        if(empty($tenMonHoc)){
            $isCheck =false;
            $errTenMonHoc ="Cần nhập tên môn học";
        }

        if(empty($maMonHoc)){
            $isCheck =false;
            $errMaMonHoc ="Cần nhập mã môn học";
        }

        if(empty($thoiGianBatDau)){
            $isCheck =false;
            $errThoiGianBatDau ="Cần nhập thời gian bắt đầu";
        }

        if(empty($thoiGianKetThuc)){
            $isCheck =false;
            $errThoiGianKetThuc ="Cần nhập thời gian kết thúc";
        }

        if($trangThai == -1){
            $isCheck =false;
            $errTrangThai ="Cần nhập trạng thái";
        }


        if($isCheck){
            $sql ="INSERT INTO monhoc(tenMonHoc,maMonHoc,thoiGianBatDau,thoiGianKetThuc,trangThai)
                    VALUES ('$tenMonHoc','$maMonHoc','$thoiGianBatDau','$thoiGianKetThuc','$trangThai')";
            $result =$conn->query($sql);
            if($result){
                header('Location: index.php');
            }else{
                echo "Lỗi khi thêm";
            }
        }
    }

   
?>

<form action="add.php" method="post">
    <label for="">Tên môn hoc</label>
    <input type="text" name ="tenMonHoc" value="<?= $tenMonHoc ?>">
    <span style="color:red"><?= $errTenMonHoc?></span> <br>

    <label for="">Mã môn học</label>
    <input type="text" name ="maMonHoc" value="<?= $maMonHoc ?>">
    <span style="color:red"><?= $errMaMonHoc?></span> <br>

    <label for="">Thời gian bắt đầu</label>
    <input type="date" name ="thoiGianBatDau" value="<?= $thoiGianBatDau ?>">
    <span style="color:red"><?= $errThoiGianBatDau?></span> <br>

    <label for="">Thời gian kết thúc</label>
    <input type="date" name ="thoiGianKetThuc" value="<?= $thoiGianKetThuc ?>">
    <span style="color:red"><?= $errThoiGianKetThuc?></span> <br>
    <label for="">Trạng thái</label>
    <select name="trangThai" id="">
        <?php
            $options='<option value="-1">Hãy chọn giá trị</option>';
            $arr = ["Chưa bắt đầu","Đang hoạt động","Hoàn thành"];
            foreach($arr as $key=> $value){
                $options .= '<option value="'.$key.'">'.$value.'</option>';
            }
            echo $options;
        ?>
        
    </select>
    <span style="color:red"><?= $errTrangThai?></span> <br>

    <input type="submit" name="submit" value="Gửi">
</form>