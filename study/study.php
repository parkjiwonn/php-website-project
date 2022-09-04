<?php

include_once "../include/header.php"; // 레이아웃을 include 함 
session_start();

include "../include/DBlib.php";

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
        <link rel="stylesheet" type="text/css" href="study.css">
        
    </head>
    <body>
        <h5>Hello, world!</h5>
        <h5>Hello, world!</h5>
        <div style='text-align : center;'><h2>공부법 공유</h2></div>

        <div id="jb-container">

            <div id="jb-content">


                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">no</th>
                            <th scope="col">제목</th>
                            <th scope="col">작성자</th>
                            <th scope="col">작성시간</th>
                            <th scope="col">조회수</th>
                        </tr>
                    </thead>
                    

                        <?
                             
                            
                            if(isset($_GET['page']))
                            {
                                $page = $_GET['page'];
                            }else{
                                $page =1;
                            }

                            $sql3 = "select * from post";
                            $result3 = mysqli_query($db, $sql3);
                            $row_num = mysqli_num_rows($result3); //게시판 총 레코드 수
                            $list = 15; //한 페이지에 보여줄 개수
                            $block_ct = 5; //블록당 보여줄 페이지 개수

                            // 여기서 블록이란? 페이징한 번호들이 1,2,3,4,5 가 있을대 이 번호의 묶음을 말한다. 한 블록당 보여줄 페이지 개수를 5로 지정했다면 1,2,3,4,5까지 보이고 
                            // 이들이 블록 1이 되어서 6부터는 블록 2가 된다.

                            $block_num = ceil($page/$block_ct); // 현재 페이지 블록 구하기
                            // ceil은 올림 함수 , 만약 페이지 1 나누기 5했을때 0.2되는데 올림하면 1 그래서 페이지 1이 된다.
                            $block_start = (($block_num - 1) * $block_ct) + 1; // 블록의 시작번호
                            // 내가 보고있는 페이지의 블록 시작번호를 구하는 것. 내가 2 페이지를 보고 있으면 블록의 시작번호는 1이다. 왜냐면 블록당 페이지수를 5로 지정했기 때문임.
                            $block_end = $block_start + $block_ct - 1; //블록 마지막 번호

                            $total_page = ceil($row_num / $list); // 페이징한 페이지 수 구하기
                            // 게시글이 26개 있을때 25 / 5 = 5.2 되고 올림하면 5 즉 페이징되는 페이지가 6이 된다.

                            if($block_end > $total_page) 
                            {$block_end = $total_page;} //만약 블록의 마지박 번호가 페이지수보다 많다면 마지박번호는 페이지 수
                            $total_block = ceil($total_page/$block_ct); //블럭 총 개수
                            // 블록의 총개수 = ceil(페이징 한 페이지수/ 블록당 페이지 보여줄 개수)
                            $start_num = ($page-1) * $list; //시작번호 (page-1)에서 $list를 곱한다.
                            // 시작번호 구하기위한 변수 , 한 페이지에 보여줄 개수이다.

                            $sql2 = "select * from post order by id desc limit $start_num, $list";  
                            $result2 = mysqli_query($db, $sql2);

                            $sql = "select * from post order by id desc";
                            $result = mysqli_query($db, $sql);
                            $cnt=0;  
                            $total = mysqli_num_rows($result);
                            

                            while($board = mysqli_fetch_array($result2)){
                                $title=$board["title"]; 
                                if(strlen($title)>30)
                                { 
                                  $title=str_replace($board["title"],mb_substr($board["title"],0,30,"utf-8")."...",$board["title"]);
                                }
                                $del = 0;
                                $sql3="select * from comment where con_num=".$board['id']." and del=".$del."";
                                $result3=mysqli_query($db, $sql3);
                                
                                $rep_count=mysqli_num_rows($result3);

                         ?>

                        <tbody>
                        <tr>
                        <td ><?=($total-$cnt)-(($page-1)*$list)?> </td>
                        <td><a href='Sview.php?id=<?php echo $board["id"]; ?>'><?php echo $title; ?><span class="re_ct">[<?php echo $rep_count; ?>]</span></a></td>
                        <td ><?=$board['name']?></td>
                        <td ><?=$board['regdate']?></td>
                        <td ><?=$board['hit']; ?></td>
                        <?

                            $cnt++;

                            }?>
                        </tr>

                        
                        
                    </tbody>
                   
                </table>
                <div id="page_num">
                    <ul>
                        <?php
                        if($page <= 1)
                        { //만약 page가 1보다 크거나 같다면
                            echo "<li class='fo_re'>처음</li>"; //처음이라는 글자에 빨간색 표시 
                        }else{
                            echo "<li><a href='?page=1'>처음</a></li>"; //알니라면 처음글자에 1번페이지로 갈 수있게 링크
                        }
                        if($page <= 1)
                        { //만약 page가 1보다 크거나 같다면 빈값
                            
                        }else{
                        $pre = $page-1; //pre변수에 page-1을 해준다 만약 현재 페이지가 3인데 이전버튼을 누르면 2번페이지로 갈 수 있게 함
                            echo "<li><a href='?page=$pre'>이전</a></li>"; //이전글자에 pre변수를 링크한다. 이러면 이전버튼을 누를때마다 현재 페이지에서 -1하게 된다.
                        }
                        for($i=$block_start; $i<=$block_end; $i++){ 
                            //for문 반복문을 사용하여, 초기값을 블록의 시작번호를 조건으로 블록시작번호가 마지박블록보다 작거나 같을 때까지 $i를 반복시킨다
                            if($page == $i){ //만약 page가 $i와 같다면 
                            echo "<li class='fo_re'>[$i]</li>"; //현재 페이지에 해당하는 번호에 굵은 빨간색을 적용한다
                            }else{
                            echo "<li><a href='?page=$i'>[$i]</a></li>"; //아니라면 $i
                            }
                        }
                        if($block_num >= $total_block){ //만약 현재 블록이 블록 총개수보다 크거나 같다면 빈 값
                        }else{
                            $next = $page + 1; //next변수에 page + 1을 해준다.
                            echo "<li><a href='?page=$next'>다음</a></li>"; //다음글자에 next변수를 링크한다. 현재 4페이지에 있다면 +1하여 5페이지로 이동하게 된다.
                        }
                        if($page >= $total_page){ //만약 page가 페이지수보다 크거나 같다면
                            echo "<li class='fo_re'>마지막</li>"; //마지막 글자에 긁은 빨간색을 적용한다.
                        }else{
                            echo "<li><a href='?page=$total_page'>마지막</a></li>"; //아니라면 마지막글자에 total_page를 링크한다.
                        }
                        ?>
                    </ul>
                    </div>

                <div style='float : right;' >
                    <button
                        type="button"
                        class="btn btn-dark width"
                        onclick="location.href='../study/Swrite.php'">글 작성</button>

                </div>

            </div>
            <div id="jb-sidebar">
                <h2>게시글 검색</h2>
                <form action ="Ssearch_result.php" method="post">

                    
                    <div >
                        <input  style = "width : 200px;" type="text" id="search" name="skey" placeholder="키워드를 입력해주세요.">
                        
                    </div>
                    
                    <input type="submit" value="검색">
                    </form>
                    
                    <hr>
               
            </div>

        </div>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
            crossorigin="anonymous"></script>

    </body>
</html>