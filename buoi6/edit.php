<?php
    include_once('connect.php');
    if(isset($_GET["id"])){
        $id = $_GET["id"];
        if($id){
            $sql = "SELECT * FROM sinhvien WHERE id = $id";
            $result = $conn->query($sql);
            if($result){
                $sinhVien = $result->fetch(PDO::FETCH_ASSOC);
                if($sinhVien){
                    echo "<pre>";
                    print_r($sinhVien);
                }
            }
        }


    }

?>


<form action="edit.php" method="post">
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