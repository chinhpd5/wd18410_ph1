<?php
   # Date

//    $time = time();// trả về giá trị giây tính từ 1/1/1970
//    echo $time;
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $now = date('Y-m-d H:i:s');//trả về thời gian hiện tại
    echo $now.'<br>';

    $stringDate = '2023-11-14 17:45:19';//dữ liệu lấy từ database

    //cách 1:
    $day = new DateTime($stringDate);
    //cách 2:
    $day2 = date_create($stringDate);// khuyến khích
    //cả 2 cách đều trả về kiểu dữ liệu thời gian
    
    $ntn = date_format($day,'d-m-Y');//format về kiểu ngày tháng năm

    $ntn1 = date_format($day2,'H:i:s d-m-Y');// format về giờ phút giây, ngày tháng năm
    echo $ntn1;

    //cách lấy chi tiết thông tin h phút giây ngày tháng năm
    $arr= date_parse($stringDate);//trả về 1 array
    echo "<pre>";
    print_r($arr);
    echo $arr["year"];