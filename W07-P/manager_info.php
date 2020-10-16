<?php
    $link = mysqli_connect('localhost', 'admin', 'admin', 'employees');

    if(mysqli_connect_errno()) {
        echo "MariaDB 접속에 실패했습니다. 관리자에게 문의하세요.";
        echo "<br>";
        echo mysqli_connect_error();
        exit();
    }

    $filtered_number = mysqli_real_escape_string($link, $_GET['number']);

    $query = "
    SELECT dept_manager.dept_no, departments.dept_name, employees.first_name, employees.last_name, salaries.salary, employees.gender, employees.hire_date 
    FROM dept_manager 
    JOIN departments 
    ON dept_manager.dept_no = departments.dept_no  
    JOIN employees 
    ON dept_manager.emp_no=employees.emp_no 
    JOIN salaries 
    ON dept_manager.emp_no=salaries.emp_no 
    ORDER BY hire_date ASC LIMIT ".$filtered_number
    ;

    $result = mysqli_query($link, $query);

    $article ='';
    while($row = mysqli_fetch_array($result)){
        $article .= '<tr><td>';
        $article .= $row['dept_no'];
        $article .= '</td><td>';
        $article .= $row['dept_name'];
        $article .= '</td><td>';
        $article .= $row['first_name'];
        $article .= '</td><td>';
        $article .= $row['last_name'];
        $article .= '</td><td>';
        $article .= $row['salary'];
        $article .= '</td><td>';
        $article .= $row['gender'];
        $article .= '</td><td>';
        $article .= $row['hire_date'];
        $article .= '</td></tr>';
    }

    mysqli_free_result($result);
    mysqli_close($link);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title> 매니저 정보 조회 </title>
    <style>
        body{
            font-family: Consolas, monospace;
            font-family: 12px;
        }
        table{
            width: 100%;
        }
        th,td{
            padding: 10px;
            border-bottom: 1px solid #dadada;
        }
    </style>
</head>
<body>
        <h2><a href="index.php">직원 관리 시스템</a> | 매니저 정보 조회</h2>
        <table>
        <tr>
            <th>부서 번호</th>
            <th>부서 이름</th>
            <th>이름</th>
            <th>성</th>
            <th>급여</th>
            <th>성별</th>
            <th>고용일</th>
        </tr>
        <?= $article ?>
        </table>
</body>
</html>