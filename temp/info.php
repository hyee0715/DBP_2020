<?php 
// 마커 여러 개 출력
// 데이터베이스에서 읽어서 주소와 인포윈도우 내용을 출력하는 함수 작성
function WriteAddress() { 
    
    $link = mysqli_connect('localhost', 'admin', 'admin', 'aptinfo');

    $filtered = array(
        'min_price' => mysqli_real_escape_string($link, $_POST['min_price']),
        'max_price' => mysqli_real_escape_string($link, $_POST['max_price']),
        'gu' => mysqli_real_escape_string($link, $_POST['gu']),
        'dong' => mysqli_real_escape_string($link, $_POST['dong']),
        'min_size' => mysqli_real_escape_string($link, $_POST['min_size']),
        'max_size' => mysqli_real_escape_string($link, $_POST['max_size'])
    );
    
    if($filtered['dong'] == "") {
        // 동 선택 안하고 구 까지만 선택했을 경우. 해당 구의 모든 동의 아파트 조회 (200개 조회)
        $query = "SELECT * FROM gangnam WHERE 지역코드 = {$filtered['gu']} AND 거래금액 >= {$filtered['min_price']} AND 거래금액 <= {$filtered['max_price']} AND 전용면적 >= {$filtered['min_size']} AND 전용면적 <= {$filtered['max_size']} limit 200;";
    } else {
        // 구-동까지 모두 선택했을 경우. 해당 구의 특정 동의 아파트 조회 (100개 조회)
        $query = "SELECT * FROM gangnam WHERE 지역코드 = {$filtered['gu']} AND 법정동 = '{$filtered['dong']}' AND 거래금액 >= {$filtered['min_price']} AND 거래금액 <= {$filtered['max_price']} AND 전용면적 >= {$filtered['min_size']} AND 전용면적 <= {$filtered['max_size']} limit 100;";
    }


    $result = mysqli_query($link, $query);
    
    $apt_address = '';
    $num1 = 0;
    while($row = mysqli_fetch_array($result)) {
        $num1 += 1;
        if (mysqli_num_rows($result) == $num1) {
            $apt_address .= '["'.$row['법정동'].' '.$row['지번'].'", "'.$row['아파트'].'"]';
        }
        else {
            $apt_address .= '["'.$row['법정동'].' '.$row['지번'].'", "'.$row['아파트'].'"], ';
        }
    }
    echo $apt_address;
    
    
} 
?>

<!doctype html>
<html lang="ko">

<head>
    <meta charset="utf-8">
    <title>부동산 지도</title>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1.0,user-scalable=no">

</head>

<body>
    <h2><a href="index.php">돌아가기</a></h2>
    <div id="map" style="width:800px; height:600px;"></div>
    <script type="text/javascript"
        src="//dapi.kakao.com/v2/maps/sdk.js?appkey=2ee0eb182138378558cb4db1be2a8a3b&libraries=services"></script>
    <script>
    var listData = [
        <?php 
     WriteAddress(); 
     ?>
    ];

    // 맵을 넣을 div 
    var container = document.getElementById('map');
    var options = {
        center: new kakao.maps.LatLng(35.95, 128.25),
        level: 5
    };

    // 맵 표시 
    var map = new kakao.maps.Map(container, options);

    // 일반 지도와 스카이뷰로 지도 타입을 전환할 수 있는 지도타입 컨트롤을 생성합니다 
    var mapTypeControl = new kakao.maps.MapTypeControl();
    map.addControl(mapTypeControl, kakao.maps.ControlPosition.TOPRIGHT);

    // 지도 확대 축소를 제어할 수 있는 줌 컨트롤을 생성합니다 
    var zoomControl = new kakao.maps.ZoomControl();
    map.addControl(zoomControl, kakao.maps.ControlPosition.RIGHT);

    // 주소 -> 좌표 변환 라이브러리 
    var geocoder = new kakao.maps.services.Geocoder();

    // foreach loop 
    listData.forEach(function(addr, index) {
        geocoder.addressSearch(addr[0], function(result, status) {
            if (status === kakao.maps.services.Status.OK) {
                var coords = new kakao.maps.LatLng(result[0].y, result[0].x);

                var marker = new kakao.maps.Marker({
                    position: coords,
                    clickable: true
                });

                // 마커를 지도에 표시합니다. 
                marker.setMap(map);

                // 인포윈도우를 생성합니다 
                var infowindow = new kakao.maps.InfoWindow({
                    content: '<div style="width:150px;text-align:center;padding:6px 0;">' +
                        addr[1] + '</div>',
                    removable: true
                });

                // 마커에 mouseover 이벤트와 mouseout 이벤트를 등록합니다
                // 이벤트 리스너로는 클로저를 만들어 등록합니다 
                // for문에서 클로저를 만들어 주지 않으면 마지막 마커에만 이벤트가 등록됩니다
                kakao.maps.event.addListener(marker, 'mouseover', makeOverListener(map, marker, infowindow));
                kakao.maps.event.addListener(marker, 'mouseout', makeOutListener(infowindow));

                map.setCenter(coords); //지도 중심 좌표 검색한 위치로 이동
            }
        });
    });

// 인포윈도우를 표시하는 클로저를 만드는 함수입니다 
function makeOverListener(map, marker, infowindow) {
    return function() {
        infowindow.open(map, marker);
    };
}

// 인포윈도우를 닫는 클로저를 만드는 함수입니다 
function makeOutListener(infowindow) {
    return function() {
        infowindow.close();
    };
}
    </script>
</body>

</html>