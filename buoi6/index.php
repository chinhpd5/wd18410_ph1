<?php
    //include ("test.php");

    // require_once("./test.php");
    // require_once("./test.php");
    // require_once("./test.php");

    //require_once("./testtt.php");
   

    include_once("./connect.php");

    $sql = "SELECT * FROM sinhvien";

    $result = $conn->query($sql);
    $hang ='';
    if($result){
        $listSinhVien = $result->fetchAll(PDO::FETCH_ASSOC);
        if($listSinhVien){
            echo "<pre>";
            print_r($listSinhVien);

            foreach($listSinhVien as $key => $item){
                // print_r($item);
                $hang .= '
                    <tr>
                        <td>'.($key+1).'</td>
                        <td>'.$item["hoVaTen"].'</td>
                        <td>'.$item["khoa"].'</td>
                        <td>'.$item["ngaySinh"].'</td>
                        <td>'.$item["lopId"].'</td>
                    </tr>
                ';
            }
        }

        //echo htmlspecialchars($hang);
    }
?>

<table border>
    <thead>
        <th>STT</th>
        <th>Họ và tên</th>
        <th>Khoa</th>
        <th>Ngày sinh</th>
        <th>Lớp</th>
    </thead>
    <tbody>
        <?php echo $hang; ?>
    </tbody>
</table>