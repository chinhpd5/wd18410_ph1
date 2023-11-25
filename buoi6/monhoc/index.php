<?php
    include_once('../connect.php');
    $hang ='';
    $sql = "SELECT * FROM monhoc";
    $result = $conn->query($sql);
   
    if($result){
        $listMonHoc = $result->fetchAll(PDO::FETCH_ASSOC);
        if($listMonHoc){
            // echo "<pre>";
            // print_r($listMonHoc);
            foreach($listMonHoc as $key =>$item){
                $dateBT = date_create($item["thoiGianBatDau"]);
                $stringDateBt = date_format($dateBT,'d-m-Y');

                $dateKT = date_create($item["thoiGianKetThuc"]);
                $stringDateKt = date_format($dateKT,'d-m-Y');

                //c1
                $trangThai = '';
                if($item["trangThai"] ==0){
                    $trangThai ="Chưa bắt đầu";
                }else if($item["trangThai"] == 1){
                    $trangThai ="Đang hoạt động";
                }else{
                    $trangThai ="Hoàn thành";
                }

                switch($item["trangThai"]){
                    case 0:
                        $trangThai ="Chưa bắt đầu";
                        break;
                    case 1:
                        $trangThai ="Đang hoạt động";
                        break;
                    case 2:
                        $trangThai ="Hoàn thành";
                        break;
                }

                $hang .= '
                    <tr>
                        <td>'. ($key+1) .'</td>
                        <td>'.$item["tenMonHoc"].'</td>
                        <td>'.$item["maMonHoc"].'</td>
                        <td>'.$stringDateBt.'</td>
                        <td>'.$stringDateKt.'</td>
                        <td>'.($item["trangThai"] == 0 ? "Chưa bắt đầu": ($item["trangThai"] == 1 ? "Đang hoạt đông" :"Hoàn thành" )).'</td>
                    </tr>
                ';
            }
        }
    }
?>

<table border>
    <thead>
        <th>STT</th>
        <th>Tên môn học </th>
        <th>Mã môn học </th>
        <th>Thời gian bắt đầu</th>
        <th>Thời gian kết thúc</th>
        <th>Trạng thái</th>
    </thead>
    <tbody>
        <?= $hang ?>
    </tbody>
</table>