<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>상세글 보기</title>
</head>
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
                    글 제목 #1
                </div>

                <div class="info">
                    <!-- [JS or php를 통한 데이터 표시] -->
                    <dl>
                        <dt>번호</dt>
                        <dd>1</dd>    
                    </dl>

                    <dl>
                        <dt>글쓴이</dt>
                        <dd>sam</dd>    
                    </dl>

                    <dl>
                        <dt>작성일</dt>
                        <dd>2026.06.15</dd>    
                    </dl>

                    <dl>
                        <dt>조회</dt>
                        <dd>10</dd>    
                    </dl>
                    
                </div>

                <div class="content">
                    <!-- [JS or php를 통한 데이터 표시] -->
                     Hello world <br>
                     Nice to meet you <br>
                     안녕하세요 <br>

                </div>

            </div>
           
            <!-- 2.2 버튼 영역 -->
            <div class="btn_wrap">
                <a href="../index.html">목록</a>
                <a href="./edit.html">수정</a>
            </div>


        </div>



    </div>
    
</body>
</html>