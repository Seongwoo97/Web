<?php

    header("Content-Type:text/html; charset=utf-8");

    $id= $_POST["user_id"];
    $email= $_POST["user_email"];
    $pw= $_POST["user_pw"];
    $pw2= $_POST["user_pw2"];
    $how= $_POST["how"];
    $say= $_POST["say"];
    $mailing= $_POST["mailing"];

    $say= nl2br($say);

    echo "<p>유저 아이디 : $id</p>";
    echo "<p>유저 이메일 : $email</p>";
    echo "<p>유저 비밀번호 : $pw</p>";
    echo "<p>유저 비밀번호 확인 : $pw2</p>";
    echo "<p>유저 가입 경로 : $how</p>";
    echo "<p>유저 메모 : $say</p>";
    echo "<p>유저 메일 수신 확인 : $mailing</p>";

    if(isset($_POST["gift"])){
        $gift = $_POST["gift"];

        $num= count($gift);

        for($i=0; $i<$num; $i+=1){
        echo "<p>유저 혜택 선택 : $gift[$i]</p>";
        }
    }
    else{
        echo "<p>선택한 혜택 없음</p>";
    }



?>
