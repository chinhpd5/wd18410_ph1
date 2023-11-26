<?php
    include_once('connect.php');
    $tenLoaiXe='';
    $xuatXu='';
    $idDanhMuc ='';
    $mauSac='';
    $image ='';

    $errTenLoaiXe ='';
    $errXuatXu ='';
    $errImage ='';

?>

<form action="add.php" method="post">
    <label for="">Tên xe</label>
    <input type="text" name="tenLoaiXe" value="<?= $tenLoaiXe?>">
    <span style="color:red"><?= $errTenLoaiXe?></span> <br>

    <label for="">Xuất xứ</label>
    <input type="text" name="xuatXu" value="<?= $xuatXu?>">
    <span style="color:red"><?= $errXuatXu?></span> <br>

    <label for="">Màu sắc</label>
    <input type="color" name="mauSac" value="<?= $mauSac?>"> <br>

    <label for="">Danh mục</label>
    
    <select name="idDanhMuc" id="">
    <?php
        $options ='';
        $sql ="SELECT * FROM danhmuc";
        $result =$conn->query($sql);
        if($result){
            $listDM = $result->fetchAll(PDO::FETCH_ASSOC);
            if($listDM){
                // print_r($listDM);
                foreach($listDM as $value){
                    $options .= ' <option value="'.$value["id"].'">'.$value["tenHangXe"].'</option>';
                }
            }
        }
        echo $options;
    ?>
    </select> <br>

    <label for="">Hình ảnh</label>
    <input type="file" name="hinhAnh">
    <span style="color:red"><?= $errImage?></span> <br>

    <input type="submit" name ="submit" value ="Gửi">
</form>