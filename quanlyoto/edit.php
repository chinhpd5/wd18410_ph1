<?php
    include_once('connect.php');
    $id ='';
    $tenLoaiXe='';
    $xuatXu='';
    $idDanhMuc ='';
    $mauSac='';
    $image ='';
    //lấy id trên URL
    if(isset($_GET["id"])){
        $id = $_GET["id"];
        // echo $id;
        //lấy thông tin xe theo id
        $sql = "SELECT * FROM xe WHERE id = $id";
        $result = $conn->query($sql);
        if($result){
            $xe= $result->fetch(PDO::FETCH_ASSOC);
            if($xe){
                // echo "<pre>";
                // print_r($xe);
                $tenLoaiXe= $xe["tenLoaiXe"];
                $xuatXu= $xe["xuatXu"];
                $idDanhMuc =$xe["idDanhMuc"];
                $mauSac= $xe["mauSac"];
                $image = $xe["hinhAnh"];
            }
        }
    }
    
    if(isset($_POST["submit"])){
        $id = $_POST["id"];
        $tenLoaiXe=$_POST["tenLoaiXe"];
        $xuatXu=$_POST["xuatXu"];
        $idDanhMuc =$_POST["idDanhMuc"];
        $mauSac=$_POST["mauSac"];
        $image =$_FILES["hinhAnh"];


        // echo "<pre>";
        // print_r([$id,$tenLoaiXe,$xuatXu, $idDanhMuc,$mauSac, $image]);

        $filename = $image["name"];
        
        if($filename){
            //thêm thời gian vào tên file ảnh
            $filename = time().$filename;
            //đường dẫn
            $dir = "uploads/$filename";
            if(move_uploaded_file($image["tmp_name"],$dir)){
                 $sql = "UPDATE xe 
                    SET tenLoaiXe ='$tenLoaiXe', xuatXu='$xuatXu',idDanhMuc='$idDanhMuc',
                    mauSac='$mauSac',hinhAnh ='$filename' 
                    WHERE id ='$id'";
            }else{
                echo "thêm ảnh lên server lỗi";
            }
           
        }else{
            $sql = "UPDATE xe 
                    SET tenLoaiXe ='$tenLoaiXe', xuatXu='$xuatXu',idDanhMuc='$idDanhMuc',
                    mauSac='$mauSac' 
                    WHERE id ='$id'";
        }

        $result =$conn->query($sql);
        if($result){
            header('Location: index.php');
        }else{
            echo "Sửa lỗi";
        }

    }



?>

<form action="edit.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $id ?>">
    <label for="">Tên xe</label>
    <input type="text" name="tenLoaiXe" value="<?= $tenLoaiXe?>"><br>

    <label for="">Xuất xứ</label>
    <input type="text" name="xuatXu" value="<?= $xuatXu?>"><br>

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
                    $options .= ' <option '.($value["id"] ==$idDanhMuc ? 'selected': '' ).' value="'.$value["id"].'">'.$value["tenHangXe"].'</option>';
                }
            }
        }
        echo $options;
    ?>
    </select> <br>

    <label for="">Hình ảnh</label>
    <input type="file" name="hinhAnh" id="inputImage"><br>
    <img src="uploads/<?= $image ?>" alt="" style="width:200px">

    <input type="submit" name ="submit" value ="Gửi">
</form>