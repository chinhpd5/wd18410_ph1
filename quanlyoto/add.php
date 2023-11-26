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

    $isCheck= true;
    

    if(isset($_POST["submit"])){
        $tenLoaiXe= trim($_POST["tenLoaiXe"]);
        $xuatXu= trim($_POST["xuatXu"]);
        $idDanhMuc = $_POST["idDanhMuc"];
        $mauSac= $_POST["mauSac"];
        $image = $_FILES["hinhAnh"];
        
        echo "<pre>";
        print_r([$tenLoaiXe, $xuatXu,$idDanhMuc,$mauSac,$image]);

        if($tenLoaiXe == ''){
            $isCheck =false;
            $errTenLoaiXe ="Cần nhập tên xe";
        }

        if($xuatXu == ''){
            $isCheck =false;
            $errXuatXu ="Cần nhập tên xe";
        }

        $filename = $image["name"];
        if($filename){
            $extension = pathinfo($filename,PATHINFO_EXTENSION);
            // echo $extension;
            $arrAllow =['png','jpg','jpeg'];
            //phủ định !
            if(!in_array($extension,$arrAllow)){
                $isCheck= false;
                $errImage ="Cần nhập file ảnh";
            }

        }else{
            $isCheck =false;
            $errImage ="Cần nhập 1 file";
        }

        if($isCheck){
            $filename = time().$filename;
            $dir = "uploads/$filename";
            if(move_uploaded_file($image["tmp_name"],$dir)){
                $sql = "INSERT INTO xe(tenLoaiXe,xuatXu,idDanhMuc,mauSac,hinhAnh)
                    VALUES ('$tenLoaiXe','$xuatXu','$idDanhMuc','$mauSac','$filename')";

                $result = $conn->query($sql);
                if($result){
                    header('Location: index.php');
                }else{
                    echo "thêm thất bại";
                }
            }
        }


    }

    

?>

<form action="add.php" method="post" enctype="multipart/form-data">
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
    <input type="file" name="hinhAnh" id="inputImage">
    <span style="color:red"><?= $errImage?></span> <br>
    <img src="" alt="" id="imgPreview" style="width:150px"> <br>

    <input type="submit" name ="submit" value ="Gửi">
</form>

<script>
    const inputText = document.getElementById('inputImage');
    const img = document.getElementById('imgPreview');
    inputText.addEventListener('change',function(event){
        const file = event.target.files[0];
        // console.log(file);
        const filename = file.name;

        const arr = filename.split('.');
        // console.log(arr);
        const extension = arr[arr.length - 1];
        // console.log(extension);

        const arrAllow =['png','jpg','jpeg'];

        if(arrAllow.includes(extension)){
            img.src = URL.createObjectURL(file);
        }

    })
</script>