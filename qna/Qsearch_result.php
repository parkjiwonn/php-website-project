<?php
include_once "../include/header.php";
include "../include/DBlib.php";
$user_skey=$_POST['skey'];

// 검색할때 like 를 쓰면 해당 키워드가 포함되어 있는 것을 불러오는데 키워드뒤에 어떤 문자가 있어도 불러오는건 %가 있어야 한다.

$sql = "SELECT * FROM qna WHERE memo LIKE '%$user_skey%' ";
$result = mysqli_query($db, $sql);
$list = '';
//$result안에 있는 것을 배열로 가져와라 라는 뜻
// 리스트 안에 있는 아이템을 하나하나가져올꺼야 라는 뜻 배열안에 있는 갯수만큼만
//foreach 가 배열안에 있는 아이템을 value로 받아온다 비슷한 말.
// 배열 하나하나를 row로 받아온다. row는 배열이 된다.
// \"\" 은 순수한 링크 걸기위해서 역슬래시 거는 거 
//변수명 list 에 html태그가 생성된다.

?>
<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
            crossorigin="anonymous">
        
        <link rel="stylesheet" type="text/css" href="/css/style.css" />

        <title>Hello, world!</title>
        <style>
            #jb-container {
                width: 1400px;
                margin: 0 auto;
                padding: 20px;
                border: 1px solid #bcbcbc;
            }

            #jb-content {
                width: 1080px;
                padding: 10px;
                margin-bottom: 20px;
                float: left;
                border: 1px solid #bcbcbc;
            }
            #jb-sidebar {
                width: 260px;
                padding: 20px;
                margin-bottom: 20px;
                float: right;
                border: 1px solid #bcbcbc;
            }

            .width {
                width: 100px;
            }
        </style>
    </head>
    <body>
        <h3>Hello, world!</h3>
        <!-- <h1 text-aline = "center">공부법 공유</h1> -->

        <div id="jb-container">

            <div id="jb-content">

            <h3>검색 결과 입니다.</h3><br>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">작성자</th>
                            <th scope="col">제목</th>
                            <th scope="col">작성시간</th>
                            <th scope="col">조회수</th>
                            
                        </tr>
                    </thead>
                    <tbody>

                        <?
                            
                         
                            $i=1;                            

                            while($row = mysqli_fetch_array($result)){
                           
                         ?>

                        <tr>
                            
                            <th scope="row"><?=$i++?></th>
                            <td><?=$row['name']?></td>
                            <td style="DISPLAY: block"><a href ="Qview.php?no=<?=$row['no']?>"><?=$row['subject']?></td>
                            
                            
                            <td><?=$row['regdate']?></td>
                            <td><?=$row['hit']?></td>
                            
                        </tr>
                        
                    </tbody>
                    <?php      
                                }

                                
    
    ?>

                </table>

            

            </div>
            <div id="jb-sidebar">
                <h2>게시글 검색</h2>
                <form action ="Ssearch_result.php" method="post">

                    <p>
                        <input type="text" id="search" name="skey">
                        
                    </p>
                    <input type="submit" value="검색">
                    </form>
                    
                    <hr>
                
                <ul>
                    <li>댓글많은 게시물</li>
                    <li>Dolor</li>
                    <li>좋아요가 많은 게시물</li>
                    <li>Ipsum</li>
                </ul>
            </div>

        </div>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
            crossorigin="anonymous"></script>

    </body>
</html>