<?php
  $link = mysqli_connect('localhost', 'admin', 'admin', 'restaurant_data');

  $query = "SELECT res_payment.placeID, res_location.name, res_cuisine.Rcuisine, res_hours.days, 
  res_hours.hours, res_payment.Rpayment, res_location.address, res_parking.parking_lot, 
  res_location.alcohol, res_location.smoking_area, res_location.price, res_location.Rambience
  FROM res_location
  JOIN res_payment
  ON res_location.placeID = res_payment.placeID
  JOIN res_cuisine
  ON res_cuisine.placeID = res_location.placeID
  JOIN res_hours
  ON res_hours.placeID = res_location.placeID
  JOIN res_parking
  ON res_parking.placeID = res_location.placeID
  ORDER BY res_location.placeID";

  $result = mysqli_query($link, $query);
  $emp_info = '';
  while ($row = mysqli_fetch_array($result)) {
      $emp_info .= '<tr>';
      $emp_info .= '<td>'.$row['placeID'].'</td>';
      $emp_info .= '<td>'.$row['name'].'</td>';
      $emp_info .= '<td>'.$row['Rcuisine'].'</td>';
      $emp_info .= '<td>'.$row['days'].'</td>';
      $emp_info .= '<td>'.$row['hours'].'</td>';
      $emp_info .= '<td>'.$row['Rpayment'].'</td>';
      $emp_info .= '<td>'.$row['address'].'</td>';
      $emp_info .= '<td>'.$row['parking_lot'].'</td>';
      $emp_info .= '<td>'.$row['alcohol'].'</td>';
      $emp_info .= '<td>'.$row['smoking_area'].'</td>';
      $emp_info .= '<td>'.$row['price'].'</td>';
      $emp_info .= '<td>'.$row['Rambience'].'</td>';
      $emp_info .= '</tr>';
  }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <!-- CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title> 레스토랑 관련 데이터 조회 시스템 </title>
</head>
<body>
    <h2><a href="index.php"> 레스토랑 관련 데이터 조회 시스템 </a> - 레스토랑 정보</h2>

    <form action="restaurant_select.php" method="POST">
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
        <select name="price">
          <option value="">가격대</option>
          <option value="low">low</option>
          <option value="medium">medium</option>
          <option value="high">high</option>
        </select>
        <select name="drink">
          <option value="">주류</option>
          <option value="No_Alcohol_Served">No_Alcohol_Served</option>
          <option value="Full_Bar">Full_Bar</option>
          <option value="Wine-Beer">Wine-Beer</option>
        </select>
        <input type="submit" class="btn btn-outline-dark" value="Search">
      </form>

      <form action="restaurant_search.php" method="POST">
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
    <th>영업 요일</th>
    <th>영업 시간</th>
    <th>가능한 결제 수단</th>
    <th>주소</th>
    <th>주차</th>
    <th>주류</th>
    <th>흡연구역</th>
    <th>가격대</th>
    <th>분위기</th>
  </tr>
  <br>
  <?= $emp_info ?>
  </tbody>
</table>


</body>
</html>
