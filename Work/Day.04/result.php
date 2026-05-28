<?php

    header("Content-Type:text/html; charset=utf-8");

    $name= $_POST["name"];
    $tel= $_POST["tel"];
    $working= $_POST["working"];
    $why= $_POST["why"];

    $why= nl2br($why);

    echo "<p>이름 : $name</p>";
    echo "<p>전화번호 : $tel</p>";
    echo "<p>지원 분야 : $working</p>";
    echo "<p>지원 동기 : $why</p>";


    // MySQL 데이터베이스의 aaa 이라는 이름의 테이블(표)에 데이터를 저장

    //1. 접속
    $db= mysqli_connect('localhost', 'clmam12', 'a1s2d3f4!', 'clmam12');


    //2. 한글 깨짐 방지
    mysqli_query($db, 'set names utf8');

    //3. 데이터 삽입을 요청하는 쿼리문 작성 및 실행
    $sql= "INSERT INTO aaa(name, tel, working, why) VALUES('$name', '$tel', '$working', '$why')";
    $result= mysqli_query($db, $sql);
    
    if($result){
        echo "저장 완료<br>";
    }else{
        echo "저장 실패<br>";
    }

    //4. 연결 종료
    mysqli_close($db);

?>