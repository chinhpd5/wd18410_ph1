<?php
    include_once('connect.php');
    $id ='';
    $tenTheThao ='';
    $maTheThao='';
    $namRaDoi='';
    $id_NoiDung='';
    $isCheck= true;

    if(isset($_GET["id"])){
        $id = $_GET["id"];
        if($id){
            $sql ="SELECT * FROM thethao WHERE 	id_TheThao =$id";
            $result= $conn->query($sql);
            if($result){
                $theThao = $result->fetch(PDO::FETCH_ASSOC);
                if($theThao){
                    // echo "<pre>";
                    // print_r($theThao);
                    // echo "</pre>";

                    $tenTheThao =$theThao["tenTheThao"];
                    $maTheThao=$theThao["maTheThao"];
                    $namRaDoi=$theThao["namRaDoi"];
                    $id_NoiDung=$theThao["id_NoiDung"];
                }
            }
        }
    }

    if(isset($_POST["submit"])){

        //nhớ lấy id
        $id = $_POST["id"];

        $tenTheThao =$_POST["tenTheThao"];
        $maTheThao=$_POST["maTheThao"];
        $namRaDoi=$_POST["namRaDoi"];
        $id_NoiDung=$_POST["id_NoiDung"];
        $hinhAnh = $_FILES["hinhAnh"];

        echo "<pre>";
        print_r([$id,$tenTheThao,$maTheThao,$namRaDoi,$id_NoiDung,$hinhAnh]);
        echo "</pre>";
        if($isCheck){
            $sql;
            $filename = $hinhAnh["name"];

            if($filename){
                //đang có ảnh
                $filename = time().$filename;
                $dir ="uploads/$filename";
                if(move_uploaded_file($hinhAnh["tmp_name"],$dir)){
                    $sql ="UPDATE thethao 
                            SET tenTheThao='$tenTheThao', hinhAnh ='$filename',maTheThao='$maTheThao',
                            id_NoiDung ='$id_NoiDung',	namRaDoi='$namRaDoi' 
                            WHERE id_TheThao ='$id'";
                }

            }else{
                //Không có ảnh
                $sql ="UPDATE thethao 
                SET tenTheThao='$tenTheThao', maTheThao='$maTheThao',
                id_NoiDung ='$id_NoiDung',	namRaDoi='$namRaDoi' 
                WHERE id_TheThao ='$id'";
            }

            if($sql){
                // echo $sql;
                // die();
                $result = $conn->query($sql);
                if($result){
                    header('Location: index.php');
                }else{
                    echo "Sửa lỗi";
                }
            }

        }
    }

?>


<form action="edit.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $id?>">

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
                    $options .= '<option '.($id_NoiDung == $value["id_NoiDung"] ? 'selected': '').' value="'.$value["id_NoiDung"].'">'.$value["tenNoiDung"].'</option>';
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