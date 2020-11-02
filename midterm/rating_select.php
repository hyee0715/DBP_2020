<?php
  $link = mysqli_connect('localhost', 'admin', 'admin', 'restaurant_data');
  $query = "SELECT rating_final.placeID, res_location.name, res_cuisine.Rcuisine, 
  rating_final.rating, rating_final.food_rating, 
  rating_final.service_rating, rating_final.userID, user_cuisine.Ucuisine
  FROM rating_final
  JOIN res_location
  ON rating_final.placeID = res_location.placeID
  JOIN res_cuisine
  ON rating_final.placeID = res_cuisine.placeID
  JOIN user_cuisine
  ON rating_final.userID = user_cuisine.userID";

  if ($_POST['cuisine'] == "" && $_POST['rating'] == "") {
    $query = "SELECT rating_final.placeID, res_location.name, res_cuisine.Rcuisine, 
        rating_final.rating, rating_final.food_rating, 
        rating_final.service_rating, rating_final.userID, user_cuisine.Ucuisine
        FROM rating_final
        JOIN res_location
        ON rating_final.placeID = res_location.placeID
        JOIN res_cuisine
        ON rating_final.placeID = res_cuisine.placeID
        JOIN user_cuisine
        ON rating_final.userID = user_cuisine.userID
        ";
  } elseif ($_POST['cuisine'] == "") {
    $filtered = array(
        'rating' => mysqli_real_escape_string($link, $_POST['rating'])
        );
    
        $query = "SELECT rating_final.placeID, res_location.name, res_cuisine.Rcuisine, 
        rating_final.rating, rating_final.food_rating, 
        rating_final.service_rating, rating_final.userID, user_cuisine.Ucuisine
        FROM rating_final
        JOIN res_location
        ON rating_final.placeID = res_location.placeID
        JOIN res_cuisine
        ON rating_final.placeID = res_cuisine.placeID
        JOIN user_cuisine
        ON rating_final.userID = user_cuisine.userID
        WHERE rating_final.rating = '{$filtered['rating']}'
        ";
  } elseif ($_POST['rating'] == "") {
    $filtered = array(
        'cuisine' => mysqli_real_escape_string($link, $_POST['cuisine'])
        );
    
        $query = "SELECT rating_final.placeID, res_location.name, res_cuisine.Rcuisine, 
        rating_final.rating, rating_final.food_rating, 
        rating_final.service_rating, rating_final.userID, user_cuisine.Ucuisine
        FROM rating_final
        JOIN res_location
        ON rating_final.placeID = res_location.placeID
        JOIN res_cuisine
        ON rating_final.placeID = res_cuisine.placeID
        JOIN user_cuisine
        ON rating_final.userID = user_cuisine.userID
        WHERE res_cuisine.Rcuisine = '{$filtered['cuisine']}'
        ";
  } else {
    $filtered = array(
        'cuisine' => mysqli_real_escape_string($link, $_POST['cuisine']),
        'rating' => mysqli_real_escape_string($link, $_POST['rating'])
        );

        $query = "SELECT rating_final.placeID, res_location.name, res_cuisine.Rcuisine, 
        rating_final.rating, rating_final.food_rating, 
        rating_final.service_rating, rating_final.userID, user_cuisine.Ucuisine
        FROM rating_final
        JOIN res_location
        ON rating_final.placeID = res_location.placeID
        JOIN res_cuisine
        ON rating_final.placeID = res_cuisine.placeID
        JOIN user_cuisine
        ON rating_final.userID = user_cuisine.userID
        WHERE res_cuisine.Rcuisine = '{$filtered['cuisine']}'
        AND rating_final.rating = '{$filtered['rating']}'
        ";
  }

  $result = mysqli_query($link, $query);
  $emp_info = '';
  while ($row = mysqli_fetch_array($result)) {
      $emp_info .= '<tr>';
      $emp_info .= '<td>'.$row['placeID'].'</td>';
      $emp_info .= '<td>'.$row['name'].'</td>';
      $emp_info .= '<td>'.$row['Rcuisine'].'</td>';
      $emp_info .= '<td>'.$row['rating'].'</td>';
      $emp_info .= '<td>'.$row['food_rating'].'</td>';
      $emp_info .= '<td>'.$row['service_rating'].'</td>';
      $emp_info .= '<td>'.$row['userID'].'</td>';
      $emp_info .= '<td>'.$row['Ucuisine'].'</td>';
      $emp_info .= '</tr>';
  }
?>

<!DOCTYPE html>
<html>
<head>
    <!-- CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title> 레스토랑 관련 데이터 조회 시스템 </title>
</head>
<body>
    <h2><a href="index.php"> 레스토랑 관련 데이터 조회 시스템 </a> - 레스토랑 고객 평가 결과</h2>
    <form action="rating_select.php" method="POST">
        레스토랑 분류 :
        <select name="cuisine">
          <option value="">주 요리 분야</option>
          <option value="Armenian">Armenian</option>
          <option value="Bakery">Bakery</option>
          <option value="Bar">Bar</option>
          <option value="Bar_Pub_Brewery">Bar_Pub_Brewery</option>
          <option value="Breakfast-Brunch">Breakfast-Brunch</option>
          <option value="Burgers">Burgers</option>
          <option value="Cafeteria">Cafeteria</option>
          <option value="Cafe-Coffee_Shop">Cafe-Coffee_Shop</option>
          <option value="Chinese">Chinese</option>
          <option value="Contemporary">Contemporary</option>
          <option value="Family">Family</option>
          <option value="Food">Fast-Food</option>
          <option value="International">International</option>
          <option value="Italian">Italian</option>
          <option value="Japanese">Japanese</option>
          <option value="Mexican">Mexican</option>
          <option value="Pizzeria">Pizzeria</option>
          <option value="Regional">Regional</option>
          <option value="Seafood">Seafood</option>
          <option value="Vietnamese">Vietnamese</option>
        </select>
        <select name="rating">
          <option value="">총 평가 등급</option>
          <option value="0">0</option>
          <option value="1">1</option>
          <option value="2">2</option>
        </select>
        
        <input type="submit" class="btn btn-outline-dark" value="Search">
      </form>
      <form action="rating_search.php" method="POST">
        레스토랑 검색 :
        <input type="text" name="restaurant_name" placeholder="레스토랑 이름">
        <input type="submit" class="btn btn-outline-dark" value="Search">
      </form>

      <table class="table">
        <thead class="thead-light">
          <tr>
            <th>레스토랑 번호</th>
            <th>레스토랑 이름</th>
            <th>주 요리 분야</th>
            <th>총 평가 등급</th>
            <th>음식 평가 등급</th>
            <th>서비스 평가 등급</th>
            <th>이용 고객 번호</th>
            <th>이용 고객 음식 취향</th>
          </tr>
          <br>
          <?= $emp_info ?>
        </tbody>
    </table>
</body>
</html>
