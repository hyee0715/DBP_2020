# 개발 환경 소개
  * 사용한 데이터베이스 : MariaDB<br>
    - MariaDB는 Mysql과 비교해서 애플리케이션 부분 속도가 약 4~5천배 정도 빠르고, 성능 면에서는 최고 70%의 향상을 보이고 있다고 하고, MariaDB는 Mysql과 호환이 되기 때문에 사용방법과 구조가 Mysql과 동일하여 사용하기 편하다.

    - 성능이 좋은 상업용을 쓰려면 사용료를 내야하는 Mysql과는 다르게 MariaDB는 그러한 개념 없이 모든 기능을 무료로 사용할 수 있고, 오픈소스와 친숙한 linux에서는 MariaDB를 표준으로 채택하고 있다. linux를 사용하여 웹 사이트를 만들 것이기 때문에 MariaDB를 선택했다.

  * 사용한 백엔드 서버 사이드 언어 : PHP

  * 사용한 프론트엔드 클라이언트 사이드 언어 : HTML과 CSS

  * 사용한 웹 서버 : Linux와 Apache Web Server<br>
    - 리눅스는 이식성과 확장성이 용이하고, 몇 가지의 명령어 실행만으로 파일 작업을 간편하게 수행할 수 있다는 장점이 있다. 그리고 오픈소스 소프트웨어 형태로 많은 프로그램을 사용할 수 있어 다양한 웹서비스를 구축할 수 있기 때문에 리눅스를 선택했다.

    - Apache Web Server는 리눅스 기반의 무료 오픈소스 웹서버 소프트웨어로, NCSA HTTPd를 리눅스에서도 돌리는 것을 목표로 만들어졌다. 따라서 리눅스 서버에서 지원이 더 잘 되기 때문에 Apache Web Server를 선택했다. 


# 사용한 데이터베이스

### Restaurant Data with Consumer Ratings (소비자 평가가 있는 레스토랑 데이터)
  * 캐글(kaggle)에서 다운로드한 데이터베이스로, 레스토랑에 관한 정보와 해당 레스토랑에 대한 고객의 평가, 그리고 고객의 정보가 테이블로 구성되어 있다.


# 사용한 테이블과 속성
  * 레스토랑 정보 관련 테이블
    + res_cuisine : 레스토랑의 주 요리 분야를 나타내는 테이블
      (속성 : placeID - 레스토랑 번호, Rcuisine - 주 요리 분야) 

    + res_hours : 레스토랑의 영업 시간과 영업 요일을 나타내는 테이블
      (속성 : placeID - 레스토랑 번호, hours - 영업 시간, days - 영업 요일)

    + res_location : 레스토랑의 위치와 주소를 비롯한 부수적인 정보를 나타내는 테이블
      (속성 : placeID - 레스토랑 번호, name - 레스토랑 이름, address - 레스토랑 주소, alcohol - 주류, smoking-area - 흡연구역, price - 가격대, Rambience - 분위기)

    + res_parking : 레스토랑의 주차 가능 여부를 나타내는 테이블
      (속성 : placeID - 레스토랑 번호, parking_lot - 주차)

    + res_payment : 레스토랑에서 가능한 결제 수단을 나타내는 테이블
      (속성 : placeID - 레스토랑 번호, Rpayment - 가능한 결제 수단)

  * 레스토랑 고객 평가 결과 관련 테이블
    + rating_final : 레스토랑에 따른 고객의 평가 결과를 나타내는 테이블
      (속성 : userID - 이용 고객 번호,  placeID - 레스토랑 번호, rating - 총 평가등급, food-rating - 음식 평가 등급, service_rating - 서비스 평가 등급)

  * 레스토랑 이용 고객 관련 테이블
    + user_cuisine : 고객의 음식 취향을 나타내는 테이블
      (속성 : userID - 이용 고객 번호, Ucuisine - 고객 음식 취향)

    + user_payment : 고객이 이용한 결제 수단을 나타내는 테이블
      (속성 :  userID - 이용 고객 번호, Upayment - 이용한 결제 수단)

    + user_profile : 고객의 종합적인 정보를 나타내는 테이블
      (속성 : userID - 이용 고객 번호, smoker - 흡연 여부, drink_level - 음주 선호도, transport - 이용 교통 수단, budget - 예산, birth_year - 생년, )

# 발견한 정보 3개 소개
  * 메인 화면<br>
  ---------------
    - 가장 처음에 나타나는 메인화면이다.

    <img width="960" alt="index" src="https://user-images.githubusercontent.com/59169881/97833566-0201ea80-1d19-11eb-8169-692f3ff65b96.PNG">


  * 레스토랑 정보<br>
    - res_payment, res_cuisine, res_hours, res_parking, res_location 테이블을 모두 조인하여 레스토랑 번호, 레스토랑 이름, 주 요리 분야, 영업 요일, 영업 시간, 가능한 결제 수단, 주소, 주차, 주류, 흡연구역, 가격대, 분위기를 출력하였다.

    - 추가적으로 주 요리분야 / 가격대 / 주류 옵션 중에 원하는 속성을 골라 분류해서 레스토랑 정보를 조회할 수 있고, 레스토랑을 검색해볼 수도 있다.

    - 사용된 쿼리문은 다음과 같다.

    ```sql
    SELECT res_payment.placeID, res_location.name, res_cuisine.Rcuisine, res_hours.days, 
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
    ORDER BY res_location.placeID;
    ```

    - 출력된 화면은 다음과 같다.

    <img width="960" alt="레스토랑 정보" src="https://user-images.githubusercontent.com/59169881/97833690-48efe000-1d19-11eb-8456-fa5843fa6924.PNG">



  * 레스토랑 고객 평가 결과<br>
    - rating_final, res_location, res_cuisine, user_cuisine 테이블을 모두 조인하여 레스토랑 번호, 레스토랑 이름, 주 요리 분야, 총 평가 등급, 음식 평가 등급, 서비스 평가 등급, 이용 고객 번호, 이용 고객 음식 취향을 출력하였다.

    - 추가적으로 주 요리분야 / 총 평가 등급 옵션 중에 원하는 속성을 골라 분류해서 레스토랑별 고객 평가 결과를 조회할 수 있고, 원하는 레스토랑의 평과 결과를 검색해볼 수도 있다.

    - 사용된 쿼리문은 다음과 같다.

    ```sql
    SELECT rating_final.placeID, res_location.name, res_cuisine.Rcuisine, 
    rating_final.rating, rating_final.food_rating, rating_final.service_rating, 
    rating_final.userID, user_cuisine.Ucuisine
    FROM rating_final
    JOIN res_location
    ON rating_final.placeID = res_location.placeID
    JOIN res_cuisine
    ON rating_final.placeID = res_cuisine.placeID
    JOIN user_cuisine
    ON rating_final.userID = user_cuisine.userID;
    ```

    - 출력된 화면은 다음과 같다.

    <img width="960" alt="고객 평가" src="https://user-images.githubusercontent.com/59169881/97833716-5dcc7380-1d19-11eb-9ec6-fd338b1d300b.PNG">


  * 레스토랑 이용 고객 정보<br>
    - user_profile, user_cuisine, user_payment, res_location, res_cuisine 테이블을 모두 조인하여 고객 번호, 고객 음식 취향, 이용한 결제 수단, 흡연 여부, 음주 선호도, 이용 교통 수단, 예산, 생년, 방문한 가게 이름, 방문한 가게의 주 요리 분야를 출력하였다.

    - 추가적으로 고객 음식 취향 / 음주 선호도 / 이용 교통 수단 옵션 중에 원하는 속성을 골라 분류해서 고객의 정보를 조회할 수 있고, 고객의 번호로 검색해볼 수도 있다.

    - 사용된 쿼리문은 다음과 같다.

    ```sql
    SELECT user_profile.userID, user_cuisine.Ucuisine, user_payment.Upayment, 
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
    ON res_location.placeID = res_cuisine.placeID;
    ```

    - 출력된 화면은 다음과 같다.

    <img width="960" alt="이용 고객 정보" src="https://user-images.githubusercontent.com/59169881/97833728-68870880-1d19-11eb-8d53-73359bc1d34e.PNG">


# 동작 화면 소개 영상