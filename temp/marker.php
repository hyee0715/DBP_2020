<?php 
//마커하나만
    $link = mysqli_connect('localhost', 'admin', 'admin', 'aptinfo');

    $filtered_id = array(
        '법정동' => mysqli_real_escape_string($link, $_GET['법정동']),
        '지번' => mysqli_real_escape_string($link, $_GET['지번']),
        '아파트' => mysqli_real_escape_string($link, $_GET['아파트'])
    );
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>부동산 지도</title>
</head>
<body>
    <h2><a href="index_a.php">돌아가기</a></h2>
    
    <!-- 지도 크기 설정 -->
    <div id="map" style="width:800px; height:600px;"></div>
    <script type="text/javascript"
        src="//dapi.kakao.com/v2/maps/sdk.js?appkey=2ee0eb182138378558cb4db1be2a8a3b&libraries=services">
    </script>

    <script type="text/javascript">
        var myAddress = ["<?php echo $filtered_id['법정동']." ".$filtered_id['지번']; ?>"]; // 주소
        var aptName= "<br><?php echo $filtered_id['아파트']?>"
       // 맵을 넣을 div 
        var container = document.getElementById('map');
        var options = {
            center: new kakao.maps.LatLng(35.95, 128.25),
            level: 1
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
        

        //주소로 좌표 검색
        function myMarker(number, address) {
            geocoder.addressSearch(address, function(result, status) {
                if (status === kakao.maps.services.Status.OK) {
                    var coords = new kakao.maps.LatLng(result[0].y, result[0].x);

                    var marker = new kakao.maps.Marker({
                        position: coords,
                        clickable: true
                    });

                    // 마커를 지도에 표시합니다. 
                    marker.setMap(map);
                    
                    // 인포윈도우로 장소에 대한 설명을 표시합니다
                    var infowindow = new kakao.maps.InfoWindow({
                        content: '<div style="width:150px;text-align:center;padding:6px 0;">' + myAddress + aptName + '</div>'
                    });
                    infowindow.open(map, marker);

                    map.setCenter(coords); //지도 중심 좌표 검색한 위치로 이동
                }
            });
        }

        //위치 이동
        for (i=0; i<myAddress.length; i++) {
            myMarker(i+1, myAddress[i]);
        }

    </script>
</body>
</html>