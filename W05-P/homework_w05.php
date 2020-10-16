<?php
  $link = mysqli_connect("localhost", "admin", "admin", "dbp_homework");
  if (mysqli_connect_error($link)) {
	  echo "MariaDB connection Faild!!", "<br>";
	  echo "error: ", mysqli_connect_error();
  } else {
	  echo "MariaDB connection Success!!";
  }
  $query = "SELECT * FROM fruits";
  $result = mysqli_query($link, $query);

  while ($row = mysqli_fetch_array($result)) {
	 echo '<h3>'."The "; 
	 echo $row['name'];
 	 echo ' is '; 
	 echo $row['color'].'</h3>';
  }
?>

