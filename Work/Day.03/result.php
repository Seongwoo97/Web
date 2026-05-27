<?php

    header("Content-Type:text/html; charset=utf-8");

    $name=$_POST["name"];
    $tel=$_POST["tel"];
    $working=$_POST["working"];
    $why=$_POST["why"];

    $why= nl2br($why);

    echo "<p>이름 : $name</p>";
    echo "<p>전화번호 : $tel</p>";
    echo "<p>지원 분야 : $working</p>";
    echo "<p>지원 동기 : $why</p>";

?>

