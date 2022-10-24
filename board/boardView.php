<?php
    include "../connect/connect.php";
    include "../connect/session.php";
    include "../connect/sessionCheck.php";
?>

<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>board</title>

    <!-- CSS -->
    <link rel="stylesheet" href="../html/assets/css/fonts.css">
    <link rel="stylesheet" href="../html/assets/css/common.css">
    <link rel="stylesheet" href="../html/assets/css/reset.css">
    <link rel="stylesheet" href="../html/assets/css/header.css">
    <link rel="stylesheet" href="../html/assets/css/footer.css">
    <link rel="stylesheet" href="../html/assets/css/board.css">

</head>

<body>
    <?php include "../include/header.php" ?>
    <!-- // header -->

    <main id="main">
        <section id="board" class="board__wrap container">
            <h2>게시판 보기 영역입니다.</h2>
            <div class="board__inner">
                <div class="board__title">
                    <h3>Free Board</h3>
                    <p>자유 게시판 게시글 보기입니다.</p>
                </div>
                <div class="board__view">
                    <!-- <h3>[공지] 2021년 겨울 공지사항입니다.</h3> -->
                    <div class="board__view__head">
                        <div class="prof"><img src="https://cdn.imweb.me/thumbnail/20220905/d0de34bf2fde8.jpg" alt=""></div>
                        <div class="viewinfo">
<?php
    $myBoardID = $_GET['myBoardID'];
                      
    $sql = "UPDATE myBoard SET boardView = boardView + 1 WHERE myBoardID = {$myBoardID}";
    $connect -> query($sql);

    $sql = "SELECT b.boardTitle, m.youName, b.regTime, b.boardView FROM myBoard b JOIN myBMember m ON(m.myMemberID = b.myMemberID) WHERE b.myBoardID = {$myBoardID}";
    $result = $connect -> query($sql);

    if($result){
        $info = $result -> fetch_array(MYSQLI_ASSOC);

        echo "<h3>".$info['boardTitle']."</h3>";
        echo "<span>".$info['youName']."</span>";
        // echo "<span>".$info['boardTitle']."</span>";
        echo "<span>".date('Y-m-d H:i', $info['regTime'])."</span>";
        echo "<span>조회수 ".$info['boardView']."</span>";
    }
?>
                        </div>
                        <!-- <img src="https://cdn.imweb.me/thumbnail/20220905/d0de34bf2fde8.jpg" alt="">
                        <p>또우너</p>
                        <span>Free Board</span>
                        <span>2021-11-08</span>
                        <span>조회수 444</span> -->
                    </div>
                    <div class="board__view__contents">
<?php
    // $myBoardID = $_GET['myBoardID'];

    $sql = "SELECT boardContents, boardLike FROM myBoard WHERE myBoardID = {$myBoardID}";
    $result = $connect -> query($sql);

    if($result){
        $info = $result -> fetch_array(MYSQLI_ASSOC);

        echo "<p>".$info['boardContents']."</p>";
        echo "<span class='likes'><a href='#'><img src='../html/assets/img/boardView_disLike@3x.png' alt=''></a>".$info['boardLike']."</span>";
    }
?>
                        <!-- <p>
                            <img src="https://cdn.imweb.me/upload/S20191121352905b2bd341/4e8a9280f8f32.png" alt=""
                                style="width:auto">
                            <br>
                            <br>
                            이 무언가는 한자어다. '無言歌' 라고 쓰며, '가사가 없는 노래', '말 없이 부르는 노래'라는 뜻이다. <br>
                            대중가요 중에도 무언가라는 이름의 곡들이 있다(가사가 있는건 함정). <br>
                            대개의 경우에는 피아노곡 중에 이런 이름을 붙이는데 대표적으로 멘델스존과 포레, 차이코프스키의 곡들이 있다. <br>
                            멘델스존은 평생에 걸쳐 무언가를 작곡했으며, 멘델스존의 무언가는 6곡씩 8권으로 묶은 48곡과 <br>
                            작품 번호 없이 출판된 1곡,
                            첼로와 피아노를 위한 무언가 1곡을 포함하여 총 50곡에 이른다. <br>
                            유명한 곡으로는 '사냥의 노래', '베네치아의 뱃노래'[1], '봄의 노래[2]' 정도가 있다. <br>
                            참고로 '사냥의 노래', '봄의 노래' 등의 각 곡에 붙은 표제들은 후세 사람들에 의해 붙여진 것들이 대부분이고  <br>멘델스존이 직접 표제를 붙인 곡은 3곡의
                            '베네치아의 뱃노래'(Op.19-6, Op.30-6, Op.62-5)와 '이중창'(Op.38-6) 4곡 뿐이다. <br>
                            포레의 무언가 중에 가장 유명한 것은 3개의 로망스 중 3번째 곡이다. 피아니스트 백건우의 연주로 들어보자. <br>
                            이 곡이 타이틀로 수록된 앨범이 발매된
                            이후 파리 어느 노천 카페에 앉아 있던 백건우에게 어느 노신사가 인사를 하며 <br>"당신이 연주한 포레를 듣기 위해 아직까지 살아있었나 봅니다"라고 말했다는
                            일화가 있다. <br>
                            참조.
                            이 외에도 뉴에이지 음악가인 앙드레 가뇽도 무언가를 1곡 남겼는데, 제목 그대로 '무언가'다. 가뇽의 곡답게 매우 서정적이고 슬픈 분위기가 난다.

                        </p>
                        <span><a href="#">❤️</a>7 </span>
                        <span><a href="#">💬</a>4 </span>
                        <span class="tool"><a href="#">🦿</a></span> -->
                    </div>
                    <!-- <div class="board__view__comment">
                        <div>
                            <img src="https://cdn.imweb.me/thumbnail/20220905/d0de34bf2fde8.jpg" alt="">
                        </div>
                        <div>
                            <div>
                                <span class="name">김성연</span>
                                <span>2021-11-08 20:14</span>
                            </div>
                            <div>
                                <p>와 열심히 할게요</p>

                            </div>
                            <div class="board__view__comment__modify">
                                <span>댓글 /</span>
                                <span>수정 /</span>
                                <span>지우기</span>
                            </div>
                        </div>
                    </div>
                    <div class="board__view__comment comment last">
                        <div class="bvcc">↪️</div>
                        <div>
                            <img src="https://cdn.imweb.me/thumbnail/20220905/d0de34bf2fde8.jpg" alt="">
                        </div>
                        <div>
                            <div>
                                <span class="name">열일하는 지아</span>
                                <span>2021-11-08 20:14</span>
                            </div>
                            <div>
                                <p>꺄~ 잘부탁드립니다</p>

                            </div>
                            <div class="board__view__comment__modify">
                                <span>댓글</span>
                            </div>
                        </div>
                    </div> -->

                    <!-- <div class="board__view__comment__write">
                        <input type="text" placeholder=" 이름">
                        <input type="password" placeholder=" 비밀번호">
                        <textarea title="댓글을 남겨주세요" placeholder="댓글을 남겨주세요" rows="1" name="body" id="comment_body" data-action="btn_c_p2021110885356b873902d" data-autosize-on="true" style="overflow: hidden; overflow-wrap: break-word;"></textarea>
                        </textarea>
                        <div class="board__view__comment__write__imging">🖼️</div>
                        <div class="board__view__comment__write__btn">작성</div>
                    </div> -->
                </div>
                <!-- <div class="board__view__updownlist">
                    <div><span>△</span> [공지] 멤버십 서비스 오픈안내</div>
                    <div><span>▽</span> 7기 우수 크루를 발표합니다.</div>
                </div> -->

                <div class="board__view__btn">
                    <a class="modify" href="boardModify.php?myBoardID=<?=$myBoardID?>">수정하기</a>
                    <a class="delete" href="boardRemove.php?myBoardID=<?=$myBoardID?>" onclick="async()">삭제하기</a>
                    <a class="list" href="board.php">목록보기</a>
                </div>
            </div>
        </section>
        <!-- //board -->


    </main>
    <!-- //main -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.10/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.10/dist/sweetalert2.min.js"></script>
    <script>

  
        
        function abc(async () => {
            const { value: getName } = await Swal.fire({
                title: '당신의 이름을 입력하세요.',
                text: '그냥 예시일 뿐입니다.',
                input: 'text',
                inputPlaceholder: '이름을 입력..'
            })
        
            // 이후 처리되는 내용.
            if (getName) {
                Swal.fire(`: ${getName}`)
            }
        });
    </script>
    <?php include "../include/footer.php" ?>
    <!-- // footer -->
</body>

</html>