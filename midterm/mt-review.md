# 중간고사 과제 회고


## 1. 새로 배운 내용
  * Kaggle API 설치
    - pip install kaggle --upgrade

    - 캐글에 로그인 한 다음 My Account에 접속한다.<br>
      (http://www.kaggle.com/<username>/account)

    - Create New API Token을 눌러서 Token을 생성한다.
    
    - 다운로드 받은 kaggle.json 파일을 C:\Users\<Windows-username>\.kaggle\kaggle.json 에 저장한다.

  * 윈도우에서 우분투 서버로 파일 전송
    - scp C:윈도우/파일/경로 우분투계정@ip주소:/home/우분투계정

  * mariaDB에서 SQL 파일 실행 방법
    - $ sudo mysql -u root -p
    (비밀번호 입력)

    - 필요하다면 먼저 CREATE DATABASE 명령어로 데이터베이스 생성하기

    - mariaDB[(none)]> use 'DB이름'

    - mariaDB[(DB 이름)]> source 'sql파일 경로'

  
## 2. 문제가 발생하거나 고민한 내용 + 해결 과정
  * 처음에 윈도우에서 우분투 서버로 파일을 전송하려고 이것저것 알아보던 도중에 VMware tool을 설치하려고 시도했지만, 설치가 되지 않아 캐글 사용을 포기하고 있었다. 그러다가 콘솔창에서 scp 명령어로 바로 윈도우에서 우분투 서버로 전송하는 방법을 알게 되어서 문제를 해결하였다.

  * CSV 파일을 SQL로 변환하고 나서 mariaDB에 접속한 뒤에 SQL 파일을 실행했다. 분명 SQL 파일에 들어있던 명령문이 실행되었는데, 데이터베이스에 그 결과가 보이지 않아서 한참을 고전했다. 알고보니 내가 다운로드 받은 파일에는 CREATE TABLE과 INSERT문 자체만 들어있어서 테이블만 생성해주기 때문에, 사용할 DB를 먼저 생성하고 생성한 DB 안에 먼저 들어간 뒤에 SQL 파일을 실행해야 한다는 것을 깨달았다.


## 3. 참고할만한 내용
  * 캐글 (Kaggle) API 사용법
    - https://medium.com/@onestonk/%EB%A6%AC%EB%88%85%EC%8A%A4-%ED%99%98%EA%B2%BD%EC%97%90%EC%84%9C-%EC%BA%90%EA%B8%80-kaggle-%EB%8D%B0%EC%9D%B4%ED%84%B0-%EC%89%BD%EA%B2%8C-%EC%A0%80%EC%9E%A5-%EC%A0%9C%EC%B6%9C%ED%95%98%EB%8A%94-%EB%B2%95-80c7e3effd74

    - https://nomadcoder.tistory.com/entry/Kaggle-Kaggle-%EC%97%90%EC%84%9C-API%EB%A1%9C-%EB%8D%B0%EC%9D%B4%ED%84%B0%EC%85%8B-%EB%8B%A4%EC%9A%B4%EB%B0%9B%EA%B8%B0

    - https://teddylee777.github.io/kaggle/Kaggle-API-%EC%82%AC%EC%9A%A9%EB%B2%95

  * CSV 파일을 SQL 파일로 변환하는 사이트
    - https://www.convertcsv.com/csv-to-sql.htm

  * 윈도우에서 우분투 서버로 파일 전송
    - https://medium.com/@john_analyst/%EC%9C%88%EB%8F%84%EC%9A%B0%EC%97%90%EC%84%9C-%EC%9A%B0%EB%B6%84%ED%88%AC-%EC%84%9C%EB%B2%84%EB%A1%9C-%ED%8C%8C%EC%9D%BC-%EC%A0%84%EC%86%A1%ED%95%98%EA%B8%B0-57b7076adae9

  * CSS 관련 사이트 Bootstrap
    - https://getbootstrap.com/


## 4. 회고
  * 좋았던 점(+) : 캐글 사이트가 굉장히 낯설고 어려워서 캐글의 데이터를 가져와서 사용하는 데 어려움을 겪었으나, 구글링과 슬랙의 qna에서 좋은 질문과 답변 덕분에 여러가지 정보를 얻게 되었고 결국 잘 해결하였다.

  * 아쉬웠던 점(-) : 캐글 사이트 이용과 윈도우에서 우분투 서버로 파일을 전송하는 것에 어려움을 느껴서 처음에는 기본 데이터베이스를 사용하여 웹 사이트를 만들었다. 거의 다 만들었는데 꼭 캐글을 이용해보고 싶다는 마음이 갑자기 강하게 들어서 처음부터 다시 캐글로 만들게 되었다. 시간이 조금 낭비되었지만, 캐글 사용방법을 알게되어 경험을 쌓았다는 것에 의의를 두고싶다.

  * 새로 알게 된 것(!) : 외부에서 CSV 파일과 SQL 파일을 다운받아서 내가 사용하는 데이터베이스에 실행하면 그 파일들에 있던 데이터를 쓸 수 있다는 것이 굉장히 흥미로웠다. 그리고 우분투 서버에 파일을 전송하는 방법도 알게 되어서 원하는 파일을 보낼 수 있게 되었다. 이번 과제를 통해서 어려움을 많이 겪기도 했지만, 알게 된 것이 굉장히 많아서 뿌듯했다.