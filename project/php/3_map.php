<?php
session_start();

$user_id = $_SESSION['user_id'] ?? '';
$profile_img = $_SESSION['profile_img'] ?? '';

if($user_id == ''){
    echo "<script>
        alert('로그인이 필요합니다');
        location.href='../html/0_login.html';
    </script>";
    exit;
}

if($profile_img == ''){
    $profile_img = '../source/img/profile_default.png';
}

$no = $_GET['no'] ?? '';

if($no == ''){
    echo "<script>
        alert('잘못된 접근입니다');
        history.back();
    </script>";
    exit;
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

$sql = "SELECT restaurant_name, lat, lng, address 
        FROM project_posts 
        WHERE no = ?";

$stmt = mysqli_prepare($db, $sql);
mysqli_stmt_bind_param($stmt, "i", $no);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);
$post = mysqli_fetch_array($result, MYSQLI_ASSOC);

if(!$post){
    echo "<script>
        alert('식당 정보를 찾을 수 없습니다');
        history.back();
    </script>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>맛식당!3</title>
    <link rel="stylesheet" href="../css/common.css">
    <link rel="stylesheet" href="../css/3_map.css">
    <script src="https://dapi.kakao.com/v2/maps/sdk.js?appkey=8ca0785f755a41e7a594e16fbc7654f9&libraries=services"></script>

    <script>
        var restaurantName = <?= json_encode($post['restaurant_name']) ?>;
        var restaurantLat = Number(<?= json_encode($post['lat']) ?>);
        var restaurantLng = Number(<?= json_encode($post['lng']) ?>);
        var restaurantAddress = <?= json_encode($post['address']) ?>;
    </script>

    <script src="../js/3_map.js" defer></script>

</head>
<body>
    <div id="wrap">
        <header>

        <form id="search_bar">
            <div class="search_input_box">
                <input id="keyword" type="text" placeholder="맛식당 이름 검색">
                <button type="submit">
                    <img src="../source/img/arrow.png" alt="search">
                </button>
            </div>

            <ul id="search_result"></ul>
        </form>

        </header>



        <main>
            <div id="map"></div>

            <button id="upload" onclick="location.href='./2_2_upload.php'"> 
                <span class="plus">+</span>
                <span class="upload-text">맛식당 등록</span> 
            </button>

        </main>


        <footer>
            <div id="tool_bar">
            <button id="back_btn" onclick="location.href='./1_main.php'"> ❮ </button>

            <img id="logo" src="../source/img/logo_b.png" alt="logo">

            <button id="profile_btn" onclick="location.href='./4_personal_info.php'" ><img src="<?= $profile_img ?>" alt="profile"></button>

            </div>



        </footer>

    </div>
    
</body>
</html>