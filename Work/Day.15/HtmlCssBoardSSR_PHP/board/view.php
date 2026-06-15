<?php
    header("Content-Type:text/html; charset=utf-8");

    $no= $_GET['no'];

    $db= mysqli_connect('localhost', 'clmam10', 'a1s2d3f4!', 'clmam10');
    mysqli_query($db, 'set names utf8');

    $sql= "SELECT * FROM Web_board WHERE no=$no";
    $result= mysqli_query($db, $sql);

    $board= mysqli_fetch_array($result, MYSQLI_ASSOC);

    $title= $board['title'];
    $writer= $board['writer'];
    $date= $board['date'];
    $hits= $board['hits'];
    $msg= $board['msg'];

    mysqli_close($db);
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>상세글 보기</title>

    <!-- 외부 스타일 시트 연결 -->
    <link rel="stylesheet" href="../Css/view.css">

</head>
 

<body>
    <!-- 콘텐츠 표시영역 -->

    <div class="board_wrap">
        <!-- 1. 제목 영역 -->
        <div class="board_title">
            <h2>자유 게시판 - 상세글 보기</h2>
            <p>자유롭게 게시글을 작성하며 이야기를 나누세요.</p>
        </div>


        <!-- 2. 상세글 보기 영역(글 보기 페이지, 버튼) -->
        <div class="board_view_wrap">
            <!-- 2.1 상세글 영역 -->
            <div class="board_view">
                <div class="title">
                    <!-- [원래라면 JS or php를 통한 데이터를 표시해야 함] -->
                    <?php echo $title ?>
                </div>

                <div class="info">
                    <!-- [JS or php를 통한 데이터 표시] -->
                    <dl>
                        <dt>번호</dt>
                        <dd><?php echo $no; ?></dd> 
                    </dl>

                    <dl>
                        <dt>글쓴이</dt>
                        <dd><?php echo $writer; ?></dd>    
                    </dl>

                    <dl>
                        <dt>작성일</dt>
                        <dd><?php echo $date; ?></dd>    
                    </dl>

                    <dl>
                        <dt>조회</dt>
                        <dd><?php echo $hits; ?></dd>    
                    </dl>
                    
                </div>

                <div class="content">
                    <?php echo $msg; ?>

                </div>

            </div>
           
            <!-- 2.2 버튼 영역 -->
            <div class="btn_wrap">
                <a href="../index.php">목록</a>
                <a href="./edit.php?no=<?php echo $no; ?>">수정</a>
            </div>


        </div>



    </div>
    
</body>
</html>