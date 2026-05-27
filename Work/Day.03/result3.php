<?php
    header("Content-Type:text/html; charset=utf-8");

    $name= $_POST["name"];
    $address= $_POST["address"];
    $email= $_POST["email"];
    $gender= $_POST["gender"];

    echo "<p>이름 : $name</p>";
    echo "<p>주소 : $address</p>";
    echo "<p>메일 : $email</p>";
    echo "<p>성별 : $gender</p>";

?>
