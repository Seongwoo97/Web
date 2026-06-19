<?php
session_start();

$user_id = $_SESSION['user_id'] ?? '';
$profile_img = $_SESSION['profile_img'] ?? '';

if($user_id == ''){
    echo"<script>
    alert('로그인이 필요합니다');
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

$sql = "SELECT * FROM project_posts ORDER BY no DESC";
$result = mysqli_query($db, $sql);
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>맛식당!_2</title>
    <link rel="stylesheet" href="../css/common.css">
    <link rel="stylesheet" href="../css/2_contents_list.css">
    <!-- <script src="../js/2_contents_list.js" defer></script> -->
</head>
<body>

<div id="wrap">
    <header>
        <button id="back_btn" onclick="location.href='./1_main.php'"> ❮ </button>

        <img id="logo" src="../source/img/logo_b.png" alt="logo">

        <button id="profile_btn" onclick="location.href='./4_personal_info.php'" ><img src="<?= $profile_img ?>" alt="profile"></button>

    </header>

    <main>
        <div class="search_bar">
            <input type="text" placeholder="맛식당 이름을 검색해 보세요">

        </div>

        <div id="contents">
            <div id="contents_menu">

                <?php while($post = mysqli_fetch_array($result, MYSQLI_ASSOC)){ ?>

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
                <!-- 여기 있는 거 전체 이제 데이터 별로 바뀔 수 있도록.. 무한생성 필요 -->
                <!-- 클릭하면 2-1로 넘어가야.. 아이고 -->

    </main>

    <div id="for_upload_btn">
        <button id="upload" onclick="location.href='./2_2_upload.php'"> 
                <span class="plus">+</span>
                <span class="upload-text">맛식당 등록</span> 
        </button>
    </div>
    

</div>

</body>
</html>

<?php mysqli_close($db); ?>