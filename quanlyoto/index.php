<?php
    include_once('connect.php');
    $hang ='';
    $sql = "SELECT xe.id,tenLoaiXe,xuatXu,idDanhMuc,mauSac,	hinhAnh, danhmuc.tenHangXe 
            FROM xe INNER JOIN danhmuc ON xe.idDanhMuc = danhmuc.id";

    $result= $conn->query($sql);
    if($result){
        $listXe =  $result->fetchAll(PDO::FETCH_ASSOC);
        if($listXe){
            // echo "<pre>";
            // print_r($listXe);
            foreach($listXe as $key =>$item){
                $hang .= '
                    <tr>
                        <td>'. ($key+1) .'</td>
                        <td>'.$item["tenLoaiXe"].'</td>
                        <td>'.$item["xuatXu"].'</td>
                        <td>'.$item["tenHangXe"].'</td>
                        <td><input type="color" value="'.$item["mauSac"].'"></td>
                        <td><img src="uploads/'.$item["hinhAnh"].'" alt="" style ="width:150px"></td>
                        <td><a href="edit.php?id='.$item["id"].'">Sửa</a></td>
                    </tr>
                ';
            }
        }
    }



?>

<button><a href="add.php">Thêm mới</a></button>
<table border>
    <thead>
        <th>STT</th>
        <th>Tên xe</th>
        <th>Xuất xứ</th>
        <th>Loại xe</th>
        <th>Màu sắc </th>
        <th>Hình ảnh</th>
        <th></th>
    </thead>
    <tbody>
        <?= $hang ?>
    </tbody>
</table>