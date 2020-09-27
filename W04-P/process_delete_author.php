<?php
  $link = mysqli_connect("localhost", "root", "rootroot", "dbp_homework");
  settype($_POST['id'], 'integer');
  $filtered = array(
    'id' => mysqli_real_escape_string($link, $_POST['id'])
  );
  $query = "
    DELETE
      FROM author
      WHERE id = '{$filtered['id']}'
  ";

  $result = mysqli_multi_query($link, $query);

  // 아래 주석처리한 코드는 저자를 삭제할 때 해당 저자가 남긴 글도 함께 삭제하는 기능을 구현한 코드입니다.

  /*$query = "
    DELETE
      FROM topic
      WHERE author_id = '{$filtered['id']}'
  ";

  $result = mysqli_multi_query($link, $query);*/


  if ($result == false) {
      echo '삭제하는 과정에서 문제가 발생했습니다. 관리자에게 문의해주세요.';
      error_log(mysql_error($link));
  } else {
      header('Location: author.php');
  }
