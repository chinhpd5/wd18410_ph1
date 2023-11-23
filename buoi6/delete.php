<?php
    include_once('connect.php');
    //lấy id trên URL
    if(isset($_GET["id"])){
        $id = $_GET["id"];
        //nhớ in ra id rồi mới làm tiếp
        // echo $id;
        if($id){
            // trước khi xóa cần kiểm tra sv có tồn tại
            $sql = "SELECT * FROM sinhvien WHERE id = $id";
            $result = $conn->query($sql);
            if($result){
                $sinhVien = $result->fetch(PDO::FETCH_ASSOC);
                // print_r($sinhVien);
                if($sinhVien){
                    //xóa sinh viên đó
                    $sql = "DELETE FROM sinhvien WHERE id  = ".$sinhVien["id"];
                    $result = $conn->query($sql);
                    if($result){
                        header('Location: index.php');
                    }else{
                        echo "Lỗi khi xóa";
                    }
                }
            }
        }
    }

?>