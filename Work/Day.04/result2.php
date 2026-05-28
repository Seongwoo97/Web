<?php
    header("Content-Type:text/html; charset=utf-8");

    $name= $_POST['name'];
    $tel= $_POST['tel'];
    $email= $_POST['email'];


    echo "<p>이름 : $name</p>";
    echo "<p>전화 : $tel</p>";
    echo "<p>이메일 : $email</p>";


    $db= mysqli_connect('localhost','clmam12','a1s2d3f4!','clmam12');

    mysqli_query($db, "set names utf8");

    $sql= "INSERT INTO simple(name, tel, email) VALUES('$name', '$tel', '$email')";
    $result = mysqli_query($db, $sql);

    if($result){
        echo "저장 성공 <br>";
    }else{
        echo "저장 실패 <br>";
    }

    mysqli_close($db);
    



?>