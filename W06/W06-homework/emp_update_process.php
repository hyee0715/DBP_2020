<?php
    $link = mysqli_connect("localhost", "admin", "admin", "employees");
    $filtered = array(
        'emp_no' => mysqli_real_escape_string($link, $_POST['emp_no']),
        'birth_date' => mysqli_real_escape_string($link, $_POST['birth_date']),
        'first_name' => mysqli_real_escape_string($link, $_POST['first_name']),
        'last_name' => mysqli_real_escape_string($link, $_POST['last_name']),
        'gender' => mysqli_real_escape_string($link, $_POST['gender']),
        'hire_date' => mysqli_real_escape_string($link, $_POST['hire_date'])
    );
  
    $query = "
        UPDATE employees
        SET
            birth_date = '{$filtered['birth_date']}',
            first_name = '{$filtered['first_name']}', 
            last_name = '{$filtered['last_name']}', 
            gender = '{$filtered['gender']}', 
            hire_date = '{$filtered['hire_date']}'
        WHERE
            emp_no = '{$filtered['emp_no']}'
        ";
    //print_r($query);
    $result = mysqli_query($link, $query);
    if($result == false) {
        echo '수정하는 과정에서 문제가 생겼습니다. 관리자에게 문의해주세요.';
        error_log(mysqli_error($link));
    } else {
        echo '성공하였습니다. <a href="index.php">돌아가기</a>';
    }

    $emp_info = '';
    $emp_info .= '<tr>';
    $emp_info .= '<td>'.$filtered['emp_no'].'</td>';
    $emp_info .= '<td>'.$filtered['birth_date'].'</td>';
    $emp_info .= '<td>'.$filtered['first_name'].'</td>';
    $emp_info .= '<td>'.$filtered['last_name'].'</td>';
    $emp_info .= '<td>'.$filtered['gender'].'</td>';
    $emp_info .= '<td>'.$filtered['hire_date'].'</td>';
    $emp_info .= '</tr>';
?>

<!DOCTIYPE html>
    <html>

    <head>
        <meta charset="utf-8">
        <title>  </title>
    </head>

    <body>
        
        <table border="1">
            <tr>
                <th>emp_no</th>
                <th>birth_date</th>
                <th>first_name</th>
                <th>last_name</th>
                <th>gender</th>
                <th>hire_date</th>
            </tr>
            <?=$emp_info?>
        </table>
    </body>

    </html>