<?php
  $link = mysqli_connect('localhost', 'admin', 'admin', 'restaurant_data');

  $query = "SELECT user_profile.userID, user_cuisine.Ucuisine, user_payment.Upayment, 
  user_profile.smoker, user_profile.drink_level, user_profile.transport, user_profile.budget, 
  user_profile.birth_year, res_location.name, res_cuisine.Rcuisine
  FROM user_profile
  JOIN user_cuisine
  ON user_profile.userID = user_cuisine.userID
  JOIN user_payment
  ON user_profile.userID = user_payment.userID
  JOIN rating_final
  ON user_profile.userID = rating_final.userID
  JOIN res_location
  ON rating_final.placeID = res_location.placeID
  JOIN res_cuisine
  ON res_location.placeID = res_cuisine.placeID";

  $result = mysqli_query($link, $query);
  $emp_info = '';
  while ($row = mysqli_fetch_array($result)) {
      $emp_info .= '<tr>';
      $emp_info .= '<td>'.$row['userID'].'</td>';
      $emp_info .= '<td>'.$row['Ucuisine'].'</td>';
      $emp_info .= '<td>'.$row['Upayment'].'</td>';
      $emp_info .= '<td>'.$row['smoker'].'</td>';
      $emp_info .= '<td>'.$row['drink_level'].'</td>';
      $emp_info .= '<td>'.$row['transport'].'</td>';
      $emp_info .= '<td>'.$row['budget'].'</td>';
      $emp_info .= '<td>'.$row['birth_year'].'</td>';
      $emp_info .= '<td>'.$row['name'].'</td>';
      $emp_info .= '<td>'.$row['Rcuisine'].'</td>';
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
    <h2><a href="index.php"> 레스토랑 관련 데이터 조회 시스템 </a> - 레스토랑 이용 고객 정보</h2>
    <form action="customer_select.php" method="POST">
        고객 분류 :
        <select name="cuisine">
          <option value="">고객 음식 취향</option>
          <option value="American">American</option>
          <option value="Bakery">Bakery</option>
          <option value="Bar">Bar</option>
          <option value="Barbecue">Barbecue</option>
          <option value="Cafeteria">Cafeteria</option>
          <option value="Cafe-Coffee_Shop">Cafe-Coffee_Shop</option>
          <option value="Chinese">Chinese</option>
          <option value="Diner">Diner</option>
          <option value="Family">Family</option>
          <option value="Game">Game</option>
          <option value="Japanese">Japanese</option>
          <option value="Latin_American">Latin_American</option>
          <option value="Mexican">Mexican</option>
          <option value="Middle_Eastern">Middle_Eastern</option>
          <option value="Organic-Healthy">Organic-Healthy</option>
          <option value="Pizzeria">Pizzeria</option>
          <option value="Regional">Regional</option>
          <option value="Tex-Mex">Tex-Mex</option>
          <option value="Turkish">Turkish</option>
        </select>
        <select name="drink">
          <option value="">음주 선호도</option>
          <option value="abstemious">abstemious</option>
          <option value="social_drinker">social_drinker</option>
          <option value="casual_drinker">casual_drinker</option>
        </select>
        <select name="transport">
          <option value="">이용 교통 수단</option>
          <option value="public">public</option>
          <option value="car_owner">car_owner</option>
          <option value="on_foot">on_foot</option>
        </select>
        <input type="submit" class="btn btn-outline-dark" value="Search">
      </form>
      
      <form action="customer_search.php" method="POST">
        고객 번호 검색 :
        <input type="text" name="customer_userID" placeholder="U0000">
        <input type="submit" class="btn btn-outline-dark" value="Search">
      </form>

  <table class="table">
  <thead class="thead-light">
  <tr>
    <th>고객 번호</th>
    <th>고객 음식 취향</th>
    <th>이용한 결제 수단</th>
    <th>흡연 여부</th>
    <th>음주 선호도</th>
    <th>이용 교통 수단</th>
    <th>예산</th>
    <th>생년</th>
    <th>방문한 가게 이름</th>
    <th>방문한 가게의 주 요리 분야</th>
    </tr>
    <br>
    <?= $emp_info ?>
  </tbody>
</table>
</body>
</html>
