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

$db = mysqli_connect('localhost', 'clmam10', 'a1s2d3f4!', 'clmam10');

if(!$db){
    echo "<script>
        alert('DB 연결 실패');
        history.back();
    </script>";
    exit;
}

mysqli_query($db, "set names utf8");

$top_sql = "SELECT * FROM project_posts ORDER BY likes DESC, views DESC LIMIT 3";
$top_result = mysqli_query($db, $top_sql);

$recent_sql = "SELECT * FROM project_posts ORDER BY no DESC LIMIT 6";
$recent_result = mysqli_query($db, $recent_sql);

?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>맛식당!_1</title>
    <link rel="stylesheet" href="../css/common.css">
    <link rel="stylesheet" href="../css/1_main.css">
    <!-- <script src="../js/1_main.js" defer></script> -->
</head>
<body>

    <div id="wrap">

        <header>
            <button id="back_btn" onclick="location.href='./0_1_login.php'"> ❮ </button>

            <img id="logo" src="../source/img/logo_b.png" alt="logo">

            <button id="profile_btn" onclick="location.href='./4_personal_info.php'" ><img src="<?= $profile_img ?>" alt="profile"></button>
            <!-- 프로필 누르면 개인정보 화면으로 이동 -->
        </header>

        <main>
            <div id="top3">
                <div id= "top_info">
                    <img src="../source/img/crown.png" alt="crown">
                    <h2>TOP 3 맛식당!</h2>
                </div>
                <div id="top_food">
                    <?php 
                    $rank = 1;
                    while($top = mysqli_fetch_array($top_result, MYSQLI_ASSOC)){ 
                    ?>
                        <div class="top" onclick="location.href='./2_1_content.php?no=<?= $top['no'] ?>'">
                            <span class="rank rank<?= $rank ?>"><?= $rank ?></span>

                            <img class="food" src="<?= $top['food_img'] ?>" alt="food">

                            <p><?= $top['food_name'] ?></p>

                            <div class="heart">
                                <img src="../source/img/heart.png" alt="heart">
                                <p><?= $top['likes'] ?></p>
                            </div>
                        </div>
                    <?php 
                        $rank++;
                    } 
                    ?>
                </div>

            </div>


            <div id="contents">
                <div id="contents_top">
                    <img src="../source/img/spoon.png" alt="spoon">
                    <h2>최근 여기 진짜 맛식당!</h2>
                </div>

                <div id="contents_menu">
                    <?php while($post = mysqli_fetch_array($recent_result, MYSQLI_ASSOC)){ ?>
                        <div class="content" onclick="location.href='./2_1_content.php?no=<?= $post['no'] ?>'">
                            <img class="food" src="<?= $post['food_img'] ?>" alt="food">

                            <p><?= $post['food_name'] ?></p>

                            <div class="heart">
                                <img src="../source/img/heart.png" alt="heart">
                                <p><?= $post['likes'] ?></p>
                            </div>
                        </div>
                    <?php } ?>
                </div>

            </div>

        </main>

        <nav>
            <button onclick="location.href='./2_contents_list.php'">맛식당 리스트</button>
            <button onclick="location.href='./2_contents_list.php'">맛식당 지도</button>
            <button id="upload" onclick="location.href='./2_2_upload.php'"> 
                <span class="plus">+</span>
                <span class="upload-text">맛식당 등록</span> 
            </button>
        </nav>
    </div>

    <footer>
        

    
    </footer>
    
    <?php mysqli_close($db); ?>
</body>
</html>