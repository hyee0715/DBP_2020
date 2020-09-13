<?php
  $link = mysqli_connect('localhost','root','rootroot','dbp_w02_practice');
  $query = "SELECT * FROM topic";
  $result = mysqli_query($link, $query);
  $list = '';
  while($row = mysqli_fetch_array($result)) {
    $list = $list."<li><a href=\"index.php?id={$row['id']}\">{$row['title']}</a></li>";
  }

  $article = array(
    'title' => 'Welcome',
    'description' => 'NetFlix Original Programs'
  );

  if(isset($_GET['id'])) {
    $query = "SELECT * FROM topic WHERE id={$_GET['id']}";
    $result = mysqli_query($link, $query);
    $row = mysqli_fetch_array($result);
    $article = array(
      'title' => $row['title'],
      'description' => $row['description']
    );
  }
 ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title> Netflix Original Programs </title>
</head>
<body>
  <h1><a href="index.php"> 넷플릭스 오리지널 프로그램 소개 </a></h1>
  <ol> <?= $list ?> </ol>
  <a href="create.php">create</a>
  <h2> <?= $article['title'] ?> </h2>
  <?= $article['description'] ?>
</body>
</html>
