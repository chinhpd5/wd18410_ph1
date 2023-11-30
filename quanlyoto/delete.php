<?php
    include_once('connect.php');


    if(isset($_GET["id"])){
        $id = $_GET["id"];
        // echo $id;
        if($id){
            $sql ="SELECT * FROM xe WHERE id =$id";
            $result = $conn->query($sql);
            if($result){
                $xe = $result->fetch(PDO::FETCH_ASSOC);
                if($xe){
                    // print_r($xe);
                    $sql = "DELETE FROM xe WHERE id =".$xe["id"];

                    $result = $conn->query($sql);
                    if($result){
                        header('Location: index.php');
                    }else{
                        echo "xóa bị lỗi";
                    }
                }
            }
        }
    }
?>