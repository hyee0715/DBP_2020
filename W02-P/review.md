1. 새로 배운 내용

새로 배운 내용은 굉장히 많았다. MySQL을 직접 사용해 본 적은 없는데, MySQL 실행 방법부터 시작해서 PHP코드 작성방법, PHP와 MySQL을 연동하는 API, MySQL 로그 기록 설정 등 모든 것들을 새로 배웠다.

* mysqli_conncect로 PHP와 MySQL을 연결한다.

* mysqli_query로 PHP코드에서 데이터베이스로 데이터를 입력한다.

* mysqli_error로 PHP에서 오류메시지를 볼 수 있다.

* mysqli_fetch_array로 데이터베이스에 답겨있는 정보를 배열 형태로 가져온다.

* error_log()는 관리자가 볼 수 있는 내부의 로그 파일로 저장하는 기능을 한다.

* mysqli_fetch_array를 사용할 때 numeric arrary 뿐만 아니라 associative array를 사용할 수 있다.



2. 문제가 발생하거나 고민한 내용 + 해결과정

mysqli_query API를 사용하는 부분에서 데이터베이스에 원하는 정보를 써야하는데, 연동하는 부분에서 오류가 발생해서 id와 날짜만 생성되고 title과 description 데이터 부분은 생성되지 않아서 중간중간 데이터가 빠지는 오류가 발생했다.

이것은 title과 description만 따로 채우면 될 것 같아서,  UPDATE topic SET title = '오렌지 이즈 더 뉴 블랙' WHERE id = 2; 등의 UPDATE문으로 데이터베이스에서 title과 description의 데이터 수정을 따로 했다.

(구글에서 'mysql 테이블 데이터 수정'이라고 검색하여 https://extbrain.tistory.com/47 를 참고했다.)



3. 참고할만한 내용

강의자료에 링크로 연결되어 있던 PHP의 API관련 정보가 담겨있는 사이트가 굉장히 도움이 많이 되었다. API 사용 방법과 매개변수, 반환값은 어떻게 되는지 등 설명이 자세히 나와있어서 참고했다.
https://www.php.net/manual/en/book.mysqli.php



4. 회고

좋았던 점은 강의 내용이 어려워보였지만 차근차근 강의 흐름을 따라가면서 이해하고, 실제로 실습하며 웹사이트를 만들 수 있어서 좋았다. 아쉬웠던 점은 강의 내용들이 낯설어서 이해하는 데에 시간이 오래 걸렸다는 점이다. 새로 느낀 것은 PHP와 MYSQL이 mysqli_connect API만으로도 쉽게 연동이 가능하다는 것이었고, 이제 막 기초부터 시작하며 배우는 것 같아 좋았다.
