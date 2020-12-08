<?php 
//임시 데이터 보여주는 페이지
    $link = mysqli_connect('localhost', 'admin', 'admin', 'aptinfo');

    $filtered = array(
        'min_price' => mysqli_real_escape_string($link, $_POST['min_price']),
        'max_price' => mysqli_real_escape_string($link, $_POST['max_price']),
        'gu' => mysqli_real_escape_string($link, $_POST['gu']),
        'dong' => mysqli_real_escape_string($link, $_POST['dong']),
        'min_size' => mysqli_real_escape_string($link, $_POST['min_size']),
        'max_size' => mysqli_real_escape_string($link, $_POST['max_size'])
    );

    $query = "SELECT * FROM gangnam WHERE 지역코드 = {$filtered['gu']} AND 법정동 = '{$filtered['dong']}' AND 거래금액 >= {$filtered['min_price']} AND 거래금액 <= {$filtered['max_price']} AND 전용면적 >= {$filtered['min_size']} AND 전용면적 <= {$filtered['max_size']} limit 50;";

    $result = mysqli_query($link, $query);  
    $apt_info = '';
    while($row = mysqli_fetch_array($result)) {
        $apt_info .= '<tr>';
        $apt_info .= '<td>'.$row['거래금액'].'</td>';
        $apt_info .= '<td>'.$row['건축년도'].'</td>';
        $apt_info .= '<td>'.$row['년'].'</td>';
        $apt_info .= '<td>'.$row['법정동'].'</td>';
        $apt_info .= '<td>'.$row['아파트'].'</td>';
        $apt_info .= '<td>'.$row['월'].'</td>';
        $apt_info .= '<td>'.$row['일'].'</td>';
        $apt_info .= '<td>'.$row['전용면적'].'</td>';
        $apt_info .= '<td>'.$row['지번'].'</td>';
        $apt_info .= '<td>'.$row['지역코드'].'</td>';
        $apt_info .= '<td>'.$row['층'].'</td>';
        $apt_info .= '<td><a href="marker.php?법정동='.$row['법정동'].'&지번='.$row['지번'].'&아파트='.$row['아파트'].'">지도</a></td>';
        $apt_info .= '</tr>';
    }  
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>아파트</title>
</head>

<body>
    <h2><a href="index.php">돌아가기</a> | 아파트 임시 정보</h2>
    <table border="1">
        <tr>
            <th>거래금액</th>
            <th>건축년도</th>
            <th>년</th>
            <th>법정동</th>
            <th>아파트</th>
            <th>월</th>
            <th>일</th>
            <th>전용면적</th>
            <th>지번</th>
            <!-- <form action="map.php" method="POST">
                <th>지번</th>
                <input type="text" name="지번" value="<?=$row['지번']?>"   placeholder="지번">
            </form> -->
            <th>지역코드</th>
            <th>층</th>
            <th>지도세부</th>
        </tr>
        <?= $apt_info ?>

    </table>
</body>

</html>