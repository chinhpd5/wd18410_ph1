<?php
    session_start();
    include_once("./connect.php");

    if(isset($_SESSION["username"])){
        echo "Xin chào ".$_SESSION["username"];
        echo '<button><a href="logout.php" >Đăng xuất</a></button>';
    }else{
        echo '<button><a href="login.php" >Đăng nhập</a></button>';
    }

    $sql = "SELECT sinhvien.id, hoVaTen,khoa,ngaySinh,lopId, lop.tenLop
            FROM sinhvien INNER JOIN lop ON sinhvien.lopId = lop.id";

    $result = $conn->query($sql);
    $hang ='';
    if($result){
        $listSinhVien = $result->fetchAll(PDO::FETCH_ASSOC);
       
        // die();
        if($listSinhVien){
            echo "<pre>";
            // print_r($listSinhVien);

            foreach($listSinhVien as $key => $item){
                // print_r($item);
                // echo $item["ngaySinh"]."<br>";
                $dateObj = date_create($item["ngaySinh"]);
                $ntn = date_format($dateObj,'d-m-Y');
                $hang .= '
                    <tr>
                        <td>'.($key+1).'</td>
                        <td>'.$item["hoVaTen"].'</td>
                        <td>'.$item["khoa"].'</td>
                        <td>'.$ntn.'</td>
                        <td>'.$item["tenLop"].'</td>
                        <td><a href="edit.php?id='.$item["id"].'">Sửa</a></td>
                        <td><a href="delete.php?id='.$item["id"].'">Xóa</a></td>
                    </tr>
                ';
            }
        }

        //echo htmlspecialchars($hang);
    }
?>


<br>
<button><a href="add.php" style ="text-decoration: none">Thêm sinh viên</a></button>
<table border>
    <thead>
        <th>STT</th>
        <th>Họ và tên</th>
        <th>Khoa</th>
        <th>Ngày sinh</th>
        <th>Lớp</th>
        <th></th>
    </thead>
    <tbody>
        <?php echo $hang; ?>
    </tbody>
</table>