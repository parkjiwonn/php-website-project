<?php
include "../include/DBlib.php";
include_once "../include/header.php";
$id = $_GET['no'];

//게시판 글 번호

$query = "SELECT * FROM qna WHERE no= $id";
$del = mysqli_query($db, $query);
$ck_del = mysqli_fetch_array($del);

if($_SESSION['no'] == 0){
    echo "<script> alert('로그인 후 이용해 주세요!'); </script>";
    echo "<script> window.history.back() </script>";
    exit();
}


$sql = "SELECT * FROM qna WHERE no= $id";
$result = mysqli_query($db, $sql);
$row = mysqli_fetch_array($result);

if($_SESSION['no']!==$row['u_id'])
{$sql= "update qna set hit=hit+1 where no='$id' ";
$result2 = mysqli_query($db, $sql);}




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

        <title>Hello, world!</title>
        <link rel="stylesheet" type="text/css" href="../css/study.css">
        
        <style>
                .contents_p {
                    word-wrap: break-word;

                }
        </style>

            <script>     
            function re_ask(num){
                if (confirm("답변을 삭제하시겠습니까?")) {
                    window.location = "../qna/ans_delete.php?re_id="+num;
                }
            }
            </script>

    </head>
    <body>
    <h5>Hello, world!</h5>
        <h5>Hello, world!</h5>
        <!-- <h1 text-aline = "center">공부법 공유</h1> -->

        <div id="jb-container">

            <div id="jb-content">

            

            <h3 align=center><?=$row['subject']?></h3>
            <table width=1050 >
           
            <tr>
                        <td class="view_id">작성자</td>
                        <td class="view_id2"><?=$row['name']?></td>
                        
                        <td class="view_hit">조회수</td>
                        <td class="view_hit2"><?=$row['hit']?></td>
                        <td class="view_hit">작성시간</td>
                        <td class="view_hit2"><?=$row['regdate']?></td>

            </tr>
            </table>
            
            <div>
                <p class="contents_p"><?=$row['memo']?></p>
            </div>
                  
                <!-- MODIFY & DELETE -->
                <div class="view_btn">
                    <button class="view_btn1" onclick="location.href='../qna/qna.php'">목록으로</button>
                    

                    <?

                        if($_SESSION['no']==$row['u_id']){
                        ?>
                        <button
                            class="view_btn1"
                            onclick="location.href='../qna/Qupdate.php?id=<?=$id?>'">수정</button>

                        <button
                                class="view_btn1"
                                onclick="location.href='../qna/Qdelete.php?id=<?=$id?>'">삭제</button>
                        <?}else{}?>
                     
                      

                            
                </div>
                <hr>
                        <?

                        if(isset($_GET['page']))
                        {
                            $page = $_GET['page'];
                            //echo $page;
                        }else{
                            $page =1;
                        } 
                       

                        $sql = "select * from answer where con_num = $id";
                        $result2 = mysqli_query($db, $sql);
                        $re_num = mysqli_fetch_array($result2);
                        $reply = mysqli_num_rows($result2);

                        if($reply > 0){
                        ?>
                        <h3>답변 목록</h3>
                        <hr>
                    
                        <?
                        }else{}
                        ?>
                        
                        <div>
                        <?
                        if(isset($_GET['page']))
                        {
                            $page = $_GET['page'];
                        }else{
                            $page =1;
                        } 
                        // 게시판 글의 고유번호를 column값으로 가지고 있는 답변 뽑아오기.
                        

                        $list = 5;
                        $start_num = ($page-1) * $list;

                        $sql3 = "select * from answer where con_num = $id";
                        $result3 = mysqli_query($db, $sql3);
                        $row_num = mysqli_num_rows($result3);
                        $total_page = ceil($row_num / $list); 
                        // 총 댓글 갯수를 5로 나눠서 페이지 수 구하기.
                       
                       
                        $sql2 = "select * from answer where con_num = $id order by id asc limit $start_num, $list";
                        $result = mysqli_query($db, $sql2);
                        while($ans = mysqli_fetch_array($result)){
                           ?>
                           <p>작성자 : <?=$ans['name']?></p>
                           <p class="contents_p">답변 : <?=$ans['content']?></p>
                           <p>작성 시간 : <?=$ans['regdate']?></p>
                           
                           
                           <?

                            if($_SESSION['no']==$ans['u_id']){
                            ?>
                                <button onclick="window.open('ans_update.php?re_id=<?=$ans['id']?>','window_name','width=800,height=200,location=no,status=no,scrollbars=yes');">수정</button>

                                <button type="submit" name="delete" onclick="re_ask(<?=$ans['id']?>);">삭제</button>
                                
                                
                            <?}else{}?>
                           <hr>
                           <?
                        }
                        ?>
                       
                        </div>
                        <?
                        echo $page ;
                        echo "/";
                        echo $total_page;
                        
                        if($page == 1)
                        {?>

                        <button onclick ="location.href='?no=<?=$id?>&page=<?=$page?>';"><</button>
                        <?}else{
                            ?>
                            <button onclick ="location.href='?no=<?=$id?>&page=<?=$page-1?>';"><</button>
                            <?
                        }

                        if($page == $total_page){
                        ?>
                        <button onclick ="location.href='?no=<?=$id?>&page=<? echo $page?>';">></button>
                        <?
                        }else{
                        ?>
                        <button onclick ="location.href='?no=<?=$id?>&page=<? echo $page+1?>';">></button>
                        <?
                        }?>
                        
                        <hr>

                <!--- 댓글 불러오기 -->
                <div class="reply_view">
                
	            <h5>질문에 대한 답변을 작성해주세요!</h5>
              
                
                        <!-- 댓글 입력 폼 -->
                        <hr>
                        <div class="dap_ins">
                            <form action="answer_ok.php?id=<?php echo $id; ?>" method="post">
                            <input type="hidden" name="dat_user" id="dat_user" value="<?=$_SESSION['mb_nick']?>">
                            <input type="hidden" name="u_id" id="u_id" value="<?=$_SESSION['no']?>">

                            <?
        
                            $dateToday = date('Y-m-d H:i:s'); 
                            
                            ?>
                            
                            <input type="hidden" name="regdate" id="regdate" value="<?=$dateToday?>">

                            <p><?=$_SESSION['name']?></p>
                         

                                <div   div style="margin-top:10px; ">
                                <textarea class="reply_content" name="re_content"  id="re_content" style="width : 600px;" placeholder="내용을 입력해주세요" ></textarea>
                                <button id="rep_bt" class="re_bt">답변 작성</button>
                                </div>
                            </form>
                        </div>
                    
              
                </div><!--- 댓글 불러오기 끝 -->
               
              
                
            </div>

         

        </div>


      

    




        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
            crossorigin="anonymous"></script>

    </body>
</html>