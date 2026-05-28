<?php
    header("Content-Type:text/html; charset=utf-8");

    // 1. 입장쓰
    $db= mysqli_connect('localhost', 'clmam12', 'a1s2d3f4!', 'clmam12');

    // 2. 한글 안 깨짐쓰
    mysqli_query($db, "set names utf8");

    // 3. 입력쓰
    $sql= "SELECT * FROM simple";
    $result_table= mysqli_query($db, $sql);

    if($result_table){
        $row_num= mysqli_num_rows($result_table);

        for($i = 0; $i < $row_num; $i += 1){
        $row= mysqli_fetch_array($result_table, MYSQLI_ASSOC);

        $name= $row['name'];
        $tel= $row['tel'];
        $email= $row['email'];


        echo "<fieldset style='border:3px solid blue'>";
        echo "<legend>회원 정보</legend>";
        echo "<h3>이름 : $name</h3>";
        echo "<h4>전화번호 : $tel</h4>";
        echo "<h4>이메일 : $email</h4>";
        echo "</fieldset>";
        
        }

    }else{
        echo "저장 안 됨";
    }



?>