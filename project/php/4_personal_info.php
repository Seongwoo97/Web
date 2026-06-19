<?php
session_start();

$user_id = $_SESSION['user_id'] ?? '';
$profile_img = $_SESSION['profile_img'] ?? '';

if($user_id == ''){
    echo "<script>
        alert('로그인이 필요합니다.');
        location.href='../html/0_login.html';
    </script>";
    exit;
}

if($profile_img == ''){
    $profile_img = '../source/img/profile_default.png';
}
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>맛식당!_4</title>
    <link rel="stylesheet" href="../css/common.css">
    <link rel="stylesheet" href="../css/4_personal_info.css">

</head>
<body>
    <div id="wrap">

         <header>
            <button id="back_btn" onclick="history.back()"> ❮ </button>

            <img id="logo" src="../source/img/logo_b.png" alt="logo">
        </header>


        <main>
            <img src="<?= $profile_img ?>" alt="profile.img">
            <p><strong><?= $user_id ?></strong>님의 공간입니다!</p>
        
        </main>

        <nav>
            <div class="category" onclick="location.href='./4_1_uploaded_contents.html'">
                <img src="../source/img/spoon.png" alt="make_contents">
                <div class="text">
                    <strong>내가 등록한 맛식당</strong>
                    <p>[5]개</p>
                </div>
                <button> ❯ </button>


            </div>

            <div class="category" onclick="location.href='./4_2_liked_contents.html'">
                <img src="../source/img/heart.png" alt="like_contents">
                <div class="text">
                    <strong>내가 좋아한 맛식당</strong>
                    <p>[16]개</p>
                </div>
                <button> ❯ </button>

            </div>

            <a href="../html/0_login.html">로그아웃</a>
        </nav>





    </div>
    
</body>
</html>