<?php
    header("Contet-Type:text/html; charset=utf-8");

    // db에 있는 거 불러오기

    //1. 접속
    $db= mysqli_connect("localhost", "clmam12", "a1s2d3f4!", "clmam12");

    //2. 한글 깨짐 방지
    mysqli_query($db, "set names utf8");

    //3. aaa 테이블의 모든 게시글 데이터들을 가져오는 쿼리문 작성 및 요청
    $sql= "SELECT * FROM aaa";
    $result_table= mysqli_query($db, $sql);

    if($result_table){
        $row_num= mysqli_num_rows($result_table);

        for($i = 0; $i < $row_num; $i += 1){
            $row= mysqli_fetch_array($result_table, MYSQLI_ASSOC);


            $name= $row['name'];
            $tel= $row['tel'];
            $working= $row['working'];
            $why= $row['why'];


            $why = nl2br($why);

            echo "<h4> 이름: $name </h4>";
            echo "<h5> 전화번호: $tel <br> 지원 분야: $working </h5>";
            echo "<p> 지원 동기: $why </p>";

        }



    }else{
        echo "파일 저장에 실패했습니다.";
    }




?>