<!DOCTIYPE html>
    <html>

    <head>
        <meta charset="utf-8">
        <title> 직원 관리 시스템 </title>
    </head>

    <body>
        <h1>직원 관리 시스템</h1>
        <form action="emp_select.php" method="POST">
            (1) 직원 정보 조회
            <input type="text" name="search_count" placeholder="조회할 인원 수">
            <select name="order">
            <option value="">정렬 선택</option>
            <option value="ASC">오름차순</option>
            <option value="DESC">내림차순</option>
            </select>
            <select name="gender">
            <option value="">성별 모두</option>
            <option value="F">여자</option>
            <option value="M">남자</option>
            </select>
            <!-- <input type="text" name="order" placeholder="order"> -->
            <input type="submit" value="Search">
        </form>

        <a href="emp_insert.php">(2) 신규 직원 등록</a><br>
        <form action="emp_update.php" method="POST">
            (3) 직원 정보 수정:
            <input type="text" name="emp_no" placeholder="emp_no">
            <input type="submit" value="Search">
        </form>
        <form action="emp_delete.php" method="POST">
            (4) 직원 정보 삭제:
            <input type="text" name="emp_no" placeholder="emp_no">
            <input type="submit" value="Delete">
        </form>
        <form action="emp_search.php" method="POST">
            (5) 직원 정보 검색:
            <input type="text" name="first_name" placeholder="first_name">
            <input type="text" name="last_name" placeholder="last_name">
            <input type="submit" value="Search">
        </form>
    </body>

    </html>