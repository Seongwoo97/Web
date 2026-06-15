<?php
    header("Content-Type:text/html; charset=utf-8");

    $no= $_GET['no'] ?? '';

    if($no == ''){
    echo "잘못된 접근입니다. 게시글 번호가 없습니다.";
    exit;
    }

    $db= mysqli_connect('localhost', 'clmam10', 'a1s2d3f4!', 'clmam10');
    mysqli_query($db, 'set names utf8');

    $sql= "SELECT * FROM Web_board WHERE no=$no";
    $result= mysqli_query($db, $sql);

    $board= mysqli_fetch_array($result, MYSQLI_ASSOC);

    if(!$board){
    echo "존재하지 않는 게시글입니다.";
    exit;
    }

    $title= $board['title'];
    $writer= $board['writer'];
    $date= $board['date'];
    $hits= $board['hits'];
    $msg= $board['msg'];
    $password= $board['password'];

    mysqli_close($db);
?>


<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>글 수정</title>

    <!-- 외부 스타일 시트 연결 -->
    <link rel="stylesheet" href="../Css/write.css">
</head>
<body>
     <!-- 콘텐츠 표시영역 -->

    <div class="board_wrap">
        <!-- 1. 제목 영역 -->
        <div class="board_title">
            <h2>자유 게시판 - 게시글 수정</h2>
            <p>자유롭게 게시글을 작성하며 이야기를 나누세요.</p>
            

        </div>


        <!-- 2. 게시글 작성 영역(글작성, 버튼) -->
        <div class="board_write_wrap">

            <!-- 작성한 글을 서버에 전송해야 하기에 form 요소 사용 -->
             <form action="./backend/board/updateBoard.php" method="post">
                <input type="hidden" name="no" value="<?php echo $no; ?>">

                <!-- [원래는 JS or php 로 데이터 적용 필요] -->
                <!-- 2.1 게시글 작성 영역 -->
                <div class="board_write">
                    <!-- 2.1.1 제목 작성 영역 -->
                    <div class="title">
                        <div class="col_label">제목</div>
                        <div class="col_input"><input type="text" placeholder="제목입력" value="<?php echo $title; ?>" name="title"></div>

                    </div>

                    <!-- 2.1.2 글쓴이 / 비밀번호 -->
                    <div class="info">

                        <div class="writer">
                            <div class="col_label">글쓴이</div>
                            <div class="col_input"><input type="text" placeholder="글쓴이 입력" value="<?php echo $writer; ?>" name="writer"></div>
                        </div>

                        <div class="password">
                            <div class="col_label">비밀번호</div>
                            <div class="col_input"><input type="password" placeholder="비밀번호 입력" value="<?php echo $password; ?>" name="password"></div>
                        </div>

                    </div>

                    <!-- 2.1.3 글 내용 입력 영역 -->
                     <div class="content">
                        <!-- [원래는 JS or php 로 데이터 적용 필요] -->
                        <textarea name="msg" placeholder="내용 입력"><?php echo $msg; ?></textarea>

                     </div>


                </div>

                <!-- 2.2 새 글 저장/취소 버튼 영역 -->
                 <div class="btn_wrap">
                    <input type="submit" value="수정완료">
                    <input type="button" value="취소" onclick="history.back()">
                 </div>


             </form>


        </div>



    </div>
    
</body>
</html>