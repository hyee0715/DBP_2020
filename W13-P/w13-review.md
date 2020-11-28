# 13주차 데이터베이스 프로그래밍 학습회고


## 테스트 동영상 링크
  https://youtu.be/AqDPVCsvH_s
  * index에서 정보 수정 링크를 누르고, 원하는 행의 '수정' 버튼을 눌러서 데이터를 수정하는 기능을 추가했다.


## 1. 새로 배운 내용
  * Eclipse 삭제 방법
    - C:/user/사용자이름경로 에서 '.eclipse / .p2 / eclipse / eclipse-workspace' 네가지 폴더를 삭제하면 된다.

  * JSP (Java Server Page) : HTML 내부에 java 코드를 입력하여, 웹 서버에서 동적으로 웹 브라우저를 관리하는 언어<br>
    - php가 html과 같이 쓰는 것 처럼 jsp도 java와 html을 같이 쓴다. 서블릿의 단점을 보완한 것이 jsp이다.
    - 컨트롤러의 역할로 서블릿을 사용하고, 보여지는 view에서는 jsp를 사용한다. 그 내부의 model 형태로는 javabeans를 사용해서 서버에서 이런것들을 통해서 웹 브라우저에게 보여주게 된다. 필요한 데이터베이스 연동은 javabeans에서 연동한다. jsp도 서블릿 형태로 컴파일 되어서 사용된다. jsp는 php처럼 html코드와 같이 자바코드를 써서 동적인 웹페이지를 만들 수 있다.

  * JSP 전용 태그 : 서블릿 생성 시 특정 자바 코드로 바뀌는 태그
    - Directives (지시자) : <%@ %>
    - Scriptlet Elements(스크립트릿) : <% %>
    - Declarations (선언문) : <%! %>
    - Expressions (표현식) : <%= %>

  * JSP 내장 객체 : JSP 기술 사양에 정의된 필수적인 9개의 객체
    - request, response, pageContext, session, application, config, out, page, exception

## 2. 문제가 발생하거나 고민한 내용 + 해결 과정
  * 이번 수업에도 포트 번호를 잘못 입력해서 오류를 바로잡는 데에 시간이 많이 걸렸다.

  * 아직 JSP를 다루는 데에 익숙하지 않아 수정/삭제 기능을 구현하는 것에 애를 먹었다. 구글링을 하면서 차차 익숙해졌다.

  * <a href 태그를 이용해서 링크를 잘 적었다고 생각했는데 페이지 이동이 잘 되지 않았다. 알고보니 파일의 대/소문자를 하나로 통일하지 않았다는 것을 뒤늦게 발견했다.

  * 수정 기능을 구현하려면 form 박스에 데이터를 하나씩 띄워야하는데, value에 어떻게 적어야 데이터를 띄울 수 있는지 잘 몰라서 헤맸다. value="<%=first_name%>" 이렇게 적으면 해결된다.


## 3. 참고할만한 내용
  * JSP와 DB 연동 3가지 방법<br>
  https://dgblog.tistory.com/114

  * JSP 회원 탈퇴, 회원 수정 구현<br>
  https://all-record.tistory.com/117


## 4. 회고
  * 좋았던 점(+) : 많이 쓰이는 JAVA로 데이터베이스를 다루게 되면 앞으로 프로젝트를 하는 데에 많은 도움이 될 것 같다.

  * 아쉬웠던 점(-) : 아직 익숙하지 않아서 CRUD 기능을 구현하는 것이 어려웠다.

  * 새로 알게 된 것(!) : 이클립스를 삭제하려면 4개의 폴더만 지우면 된다는 것..!
