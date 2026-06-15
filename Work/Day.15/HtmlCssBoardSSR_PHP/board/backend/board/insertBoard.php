<?php
    header("Content-Type:text/html; charset=utf-8");

    //글씨 데이터를 받자

    $title = $_POST['title'] ?? '';
    $writer = $_POST['writer'] ?? '';
    $password = $_POST['password'] ?? '';
    $content = $_POST['msg'] ?? '';

    
    $content= nl2br($content);
    $now= date('Y-m-d H:i:s'); // 게시글이 저장되는 날짜와 시간..


     //1. 접속
    $db= mysqli_connect('localhost', 'clmam10', 'a1s2d3f4!', 'clmam10');

    //2. 한글깨짐 방지요청
    mysqli_query($db, 'set names utf8');

    //3. 데이터 삽입을 요청하는 쿼리문 작성 및 실행
    $sql= "INSERT INTO Web_board(title, msg, writer, date, hits, password) VALUES('$title', '$content', '$writer', '$now', 0, '$password')";
    $result = mysqli_query($db, $sql);

    if($result){
        mysqli_close($db);
        header("Location: ../../../index.php");
        exit;
    }else{
        echo "게시글 저장에 실패했습니다. 다시 시도하세요. <br>";
        echo mysqli_error($db);
    }

    //4. 연결 종료
    mysqli_close($db);



?>