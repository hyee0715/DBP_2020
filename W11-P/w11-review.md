# 11주차 데이터베이스 프로그래밍 학습회고


## 테스트 동영상 링크
https://youtu.be/M2rfwY9eyUE


## 1. 새로 배운 내용
  * JDBC (Java Database Connectivity) : 자바와 데이터베이스를 연동할 수 있는 API.
    - DBMS S에 전달될 SQL 구문을 각 시스템(Oracle, MySQL 등)에 맞도록 JDBC API가 알아서 변경해준다.

  * 트랜잭션 (Oracle Transaction) : DB의 상태를 변환시키는 하나의 논리적 기능을 수행하기 위한 작업의 단위
    - 최종승인 : commit, 작업 취소 : rollback
    - 반드시 작업이 완성되거나, 아예 작업이 취소되어야 한다. 중간에 끊기는 경우가 발생하면 안된다.

  * 트랜잭션의 상태
    - 활동 active -> 부분완료 partially committed -> 완료 committed
    - 활동 active -> 실패 failed -> 철회 aborted

  * JDBC - SQL 쿼리 전송 인터페이스 (Statement, PreparedStatement, CallableStatement) : SQL 질의문을 전달하는 역할. 사용할 때 반드시 try catch 문 또는 throws 처리를 해야 한다.
    - Statement : Connection 클래스의 객체로 연결하고 미리 입력되어 있는 쿼리문을 처리할 수 있다.
    - PreparedStatement :  PreparedStatement 객체는 connection 객체의 prepareStatment() 메소드를 사용해서 생성할 수 있다. PreparedStatement 객체를 쓰면 sql 문장이 미리 컴파일 되고 실행시간 동안에 인수 값을 위한 공간을 확보할 수 있다. 그리고 위치 홀더를 이용해서 여러 개의 인수가 변할 때 유용하게 사용할 수 있다.
    - CallableStatement : sql에서 StoredProcedure를 사용할 때 이용하는 인터페이스이다.
    - Statement 객체는 SQL을 실행할 때마다 전달되니까 서버에서 분석 해야하는데, PreparedStatement 객체는 한 번 분석되고 나면 재사용할 수 있다는 장점이 있다. 따라서 미리 컴파일 되기 때문에 수행속도가 빠르다. 또한 PreparedStatement는 Statement보다 보안을 더 강화할 수 있다.


## 2. 문제가 발생하거나 고민한 내용 + 해결 과정
  * employee_id가 207번으로 insert 하는 과정에서 삽입된 행이 테이블의 가장 아래쪽에 들어가야 "select * from (select * from employees order by rownum DESC) where rownum = 1" 쿼리로 조회할 때 삽입한 행이 조회된다. 그런데 insert 하면 행이 계속 테이블 맨 앞에 삽입되어서 select 쿼리를 하면 삽입된 행이 정상적으로 조회되지 않았다.

  * 자동 생성되는 rownum에 문제가 있는 것 같아서 조회해보니 삽입한 행 뿐만 아니라 원래 있던 모든 행이 rownum = 1로 설정되어 있었다. 그래서 rownum으로 조회하지 않고 employee_id 속성을 이용해서 내림차순으로 정렬하여 조회하니까 정상적으로 프로그램이 실행되었다.

  * 사용한 쿼리 : select * from (select * from employees order by employee_id desc) where rownum = 1


## 3. 참고할만한 내용
  * executeQuery() 메소드 : 수행 결과로 ResultSet 객체의 값을 반환한다. select 구문을 수행할 때 사용된다.

  * executeUpdate() 메소드 : 수행 결과로 int 타입의 값을 반환한다. select 구문을 제외한 다른 구문을 수행할 때 사용된다.<br>
  (출처 : https://mozi.tistory.com/26)

  * printStackTrace() 메소드 : 에러 메세지의 발생 근원지를 찾아서 단계별로 에러를 출력한다.<br>
  (출처 : https://wwhite103.tistory.com/39)


## 4. 회고
  * 좋았던 점(+) : 본격적으로 자바를 이용한 데이터베이스를 배우게 되었다. 처음 보는 메소드들이 낯설지만 얼른 익숙해져서 자유자재로 다루고 싶다.

  * 아쉬웠던 점(-) : 실습을 따라하면서 중간중간 자꾸 오류가 생겼다. 오류를 해결하느라 시간을 많이 할애했다.

  * 새로 알게 된 것(!) : 오류가 자주 났던 이유 중에 하나가 데이터베이스를 변경하고 commit을 하지 않아서였는데, 중간중간 commit을 자주 해야 된다는 것을 깨달았다.
