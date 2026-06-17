<?php
header("Content-Type:text/html; charset=utf-8");

$user_id = $_POST['user_id'] ?? '';
$user_pw = $_POST['user_pw'] ?? '';

if($user_id == '' || $user_pw == ''){
    echo "<script>
        alert('아이디와 비밀번호를 모두 입력해주세요.');
        history.back();
    </script>";
    exit;
}

$db = mysqli_connect('localhost', 'clmam10', 'a1s2d3f4!', 'clmam10');
mysqli_query($db, "set names utf8");

if(!$db){
    echo "<script>
        alert('DB 연결 실패');
        history.back();
    </script>";
    exit;
}

/* 아이디 중복 확인 */
$sql_check = "SELECT * FROM project_users WHERE user_id='$user_id'";
$result_check = mysqli_query($db, $sql_check);

if(mysqli_num_rows($result_check) > 0){
    echo "<script>
        alert('이미 사용 중인 아이디입니다.');
        history.back();
    </script>";
    exit;
}

/* 프로필 이미지 업로드 */
$profile_img = '';

if(isset($_FILES['profile_img']) && $_FILES['profile_img']['error'] == 0){

    $upload_dir = "../uploads/profile/";

    if(!is_dir($upload_dir)){
        mkdir($upload_dir, 0777, true);
    }

    $file_name = $_FILES['profile_img']['name'];
    $tmp_name = $_FILES['profile_img']['tmp_name'];

    $ext = pathinfo($file_name, PATHINFO_EXTENSION);
    $new_name = time() . "_" . rand(1000, 9999) . "." . $ext;

    $save_path = $upload_dir . $new_name;

    move_uploaded_file($tmp_name, $save_path);

    $profile_img = $save_path;
}

/* 회원 정보 저장 */
$sql = "INSERT INTO project_users(user_id, user_pw, profile_img)
        VALUES('$user_id', '$user_pw', '$profile_img')";

$result = mysqli_query($db, $sql);

if($result){
    echo "<script>
        alert('회원가입이 완료되었습니다.');
        location.href='../html/0_login.html';
    </script>";
}else{
    echo "<script>
        alert('회원가입 실패');
        history.back();
    </script>";
}

mysqli_close($db);
?>