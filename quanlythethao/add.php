<?php
    include_once('connect.php');
    $tenTheThao ='';
    $maTheThao='';
    $namRaDoi='';
    $id_NoiDung='';
    $isCheck= true;

    if(isset($_POST["submit"])){
        // print_r($_POST);
        $tenTheThao =$_POST["tenTheThao"];
        $maTheThao=$_POST["maTheThao"];
        $namRaDoi=$_POST["namRaDoi"];
        $id_NoiDung=$_POST["id_NoiDung"];
        $hinhAnh = $_FILES["hinhAnh"];

        // echo "<pre>";
        // print_r([$tenTheThao,$maTheThao,$namRaDoi,$id_NoiDung,$hinhAnh]);
        // echo "</pre>";

        //nhớ để trong post submit
        if($isCheck){
            //thêm mới

            $filename = $hinhAnh["name"];
            $filename = time().$filename;

            $dir = "uploads/$filename";
            if(move_uploaded_file($hinhAnh["tmp_name"],$dir)){
                $sql="INSERT INTO thethao(tenTheThao,hinhAnh,maTheThao,id_NoiDung,namRaDoi) 
                    VALUES ('$tenTheThao','$filename','$maTheThao','$id_NoiDung','$namRaDoi')";
                $result = $conn->query($sql);
                if($result){
                    header('Location: index.php');
                }else{
                    echo "thêm lỗi";
                }
            }

        }
    }

   
?>

<form action="add.php" method="post" enctype="multipart/form-data">

    <label for="">Tên thể thao </label>
    <input type="text" name="tenTheThao" value="<?= $tenTheThao ?>"> <br>

    <label for="">Mã thể thao </label>
    <input type="text" name="maTheThao" value="<?= $maTheThao ?>"> <br>

    

    <label for="">Nội dung </label>
    <select name="id_NoiDung" id="">
    <?php
        $options='';
        $sql = "SELECT * FROM noidung";
        $result =$conn->query($sql);
        if($result){
            $listND = $result->fetchAll(PDO::FETCH_ASSOC);
            if($listND){
                echo "<pre>";
                print_r($listND);
                echo "</pre>";
                foreach($listND as $value){
                    $options .= '<option value="'.$value["id_NoiDung"].'">'.$value["tenNoiDung"].'</option>';
                }
                // echo htmlspecialchars($options);
                echo $options;
            }
        }
    ?>
    </select> <br>

    <label for="">Hình ảnh</label>
    <input type="file" name="hinhAnh"> <br>

    <label for="">Năm ra đời</label>
    <input type="text" name="namRaDoi" value="<?= $namRaDoi ?>"> <br>
    <input type="submit" name="submit">

</form>