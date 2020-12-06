<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title> 아파트 매매 정보 제공 </title>
</head>
<body>
    <h1> 아파트 정보 (마커 여러 개) </h1>
    <form action="info.php" method="POST">
        (1) 예산
        <input type="int" name="price" placeholder="최대 예산 입력(숫자만)">
        <br>
        (2) 지역
        <select name="gu">
            <option value="">지역명(구) 입력</option>
            <option value="11680">강남구</option>
        </select>

        <select name="dong">
            <option value="">지역명(동) 입력</option>
            <option value="대치동">대치동</option>
            <option value="도곡동">도곡동</option>
            <option value="신사동">신사동</option>
            <option value="압구정동">압구정동</option>
            <option value="개포동">개포동</option>
            <option value="청담동">청담동</option>
            <option value="논현동">논현동</option>
        </select>
        <br>
        (3) 평수
        <input type="int" name="size" placeholder="평수 입력(숫자만)">
        <br>
        <input type="submit" value="Search">
    </form>

    <h1> 아파트 정보 (마커 한 개 자세히) </h1>
    <form action="detail.php" method="POST">
        (1) 예산
        <input type="int" name="price" placeholder="최대 예산 입력(숫자만)">
        <br>
        (2) 지역
        <select name="gu">
            <option value="">지역명(구) 입력</option>
            <option value="11680">강남구</option>
        </select>

        <select name="dong">
            <option value="">지역명(동) 입력</option>
            <option value="대치동">대치동</option>
            <option value="도곡동">도곡동</option>
            <option value="신사동">신사동</option>
            <option value="압구정동">압구정동</option>
            <option value="개포동">개포동</option>
            <option value="청담동">청담동</option>
            <option value="논현동">논현동</option>
        </select>
        <br>
        (3) 평수
        <input type="int" name="size" placeholder="평수 입력(숫자만)">
        <br>
        <input type="submit" value="Search">
    </form>
</body>
</html>