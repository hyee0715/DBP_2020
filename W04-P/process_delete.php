<?php
  $link = mysqli_connect("localhost", "root", "rootroot", "dbp_homework");
  settype($_POST['id'], 'integer');
  $filtered = array(
    'id' => mysqli_real_escape_string($link, $_POST['id'])
  );
  $query = "
    DELETE
      FROM topic
      WHERE id = '{$filtered['id']}'
  ";

  $result = mysqli_multi_query($link, $query);
  if ($result == false) {
      echo '삭제하는 과정에서 문제가 발생했습니다. 관리자에게 문의해주세요.';
      error_log(mysql_error($link));
  } else {
      echo '성공했습니다. <a href="index.php">돌아가기</a>';
  }