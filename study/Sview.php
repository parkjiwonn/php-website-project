<?php
include "../include/DBlib.php";

$id = $_GET['id']; //게시판 글 id 

//조회수 하루에 한번만 증가되게 하는거.
// $tmp='/$id/';

// if(preg_match($tmp, $post_hit))
// {
  
// }else{
//     $query = "update post set hit=hit+1 where id='$id' ";
//     $result = mysqli_query($db, $query);

//     $tmp = $tmp.$post_hit;
//     setcookie("post_hit", $tmp, time()+86400,"/");
// }

// echo $post_hit;


include_once "../include/header.php";


if(!isset($_SESSION['no'])){
    echo "<script> alert('로그인 후 이용해 주세요!'); </script>";
    echo "<script> window.history.back() </script>";
    exit();
}



$sql = "SELECT * FROM post WHERE id= $id";
$result = mysqli_query($db, $sql);
$row = mysqli_fetch_array($result);

// // 조회수 올리기.
// if($_SESSION['no']!==$row['u_id'])
// {$sql= "update post set hit=hit+1 where id='$id' ";
// $result2 = mysqli_query($db, $sql);}





$sql2="select * from comment where con_num=".$row['id']." order by top asc, level asc";
$result2=mysqli_query($db, $sql2);

$re_count=mysqli_num_rows($result2);
//$result3=mysqli_fetch_array($result2);
//mysqli_query 참조하는 부분에 대해서 다시 공부하기. result2를 한번 참조하면 
//쿼리를 불러올때 조건을 따로 주지 않아서 맨 위의 댓글 idx만 불러오는 문제가 있었음.

$del = 0;
$sql3="select * from comment where con_num=".$row['id']." and del=".$del."";
$result3=mysqli_query($db, $sql3);

$rep_count=mysqli_num_rows($result3);

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
            
        <script>     
            function re_ask(num){
                if (confirm("댓글을 삭제하시겠습니까?")) {
                    window.location = "../study/Rdelete.php?re_id="+num;
                }
            }
            </script>
            <style>
                .contents_p {
                    word-wrap: break-word;

                }
            </style>

    </head>
    <body>
    <h5>Hello, world!</h5>
        <h5>Hello, world!</h5>
        <!-- <h1 text-aline = "center">공부법 공유</h1> -->

        <div id="jb-container">

            <div id="jb-content">
            <h3 align=center><?=$row['title']?></h3>
            <table width=1050 >
           
            <tr>
                        <td class="view_id">작성자</td>
                        <td class="view_id2"><?=$row['name']?></td>
                        <td class="view_hit">댓글수</td>
                        <td class="view_hit2"><?=$rep_count?></td>
                        <td class="view_hit">조회수</td>
                        <td class="view_hit2"><?=$row['hit']?></td>
                        <td class="view_hit">작성시간</td>
                        <td class="view_hit2"><?=$row['regdate']?></td>

            </tr>
            </table>
            
            <div>
                <p class="contents_p"><?=$row['content']?></p>
            </div>
                      

                <!-- MODIFY & DELETE -->
                <div class="view_btn">
                    <button class="view_btn1" onclick="location.href='../study/study.php'">목록으로</button>

                    <?

                    if(($_SESSION['no']==$row['u_id'])){
                        
                    ?>
                    <button
                        class="view_btn1"
                        onclick="location.href='../study/Supdate.php?id=<?=$id?>'">수정</button>

                    <button
                            class="view_btn1"
                            onclick="location.href='../study/Sdelete.php?id=<?=$id?>'">삭제</button>
                    <?}else{?>
                        <?}?>    
                </div>               
                <!--- 댓글 불러오기 -->
                <div class="reply_view">
	            <h3>댓글목록</h3>
                <hr>
                <?
                   
                   if($re_count > 0)
                   {
                       $result2=mysqli_query($db,$sql2);
                       while($row2 = mysqli_fetch_array($result2))
                       {
                            if($row2['del'] ==0)
                            {
                                  for($i=0; $i<$row2['level']; $i++)
                                  {
                                ?>
                                <div style = "float : left; weight : 80px; height : 100px"><p>[RE]&nbsp;</div>
                                <?
                                  }
                                ?>
                                <div class="dap_lo">
                                <div><b><?=$row2['name']?></b></div>
                                <div class="dap_to comt_edit"><?=$row2['content']?></b></div>
                                <div class="rep_me dap_to"><?=$row2['regdate']?></b></div>
                                
                                <div class="rep_me rep_menu">
                                <?
                                if($row2['level'] < 1){

                                    $level = (int)$row2['level'] +1 ;
                                    ?>

                                    <button onclick="window.open('ReReply.php?bno=<?=$id?>&top=<?=$row2['top']?>&level=<?=$level?>&prelevel=<?=$row2['level']?>','window_name','width=800,height=200,location=no,status=no,scrollbars=yes');">답글 달기</button>
                                    
                                    <?
                                }else{

                                   ?>
                                   
                                   <?
                                }
                               
                                ?>
                                
                                <?
                                if($_SESSION['no'] == $row2['u_id'])
                                {
                                ?>

                                <button onclick="window.open('Update_reply.php?userid=<?=$row2['id']?>','window_name','width=800,height=200,location=no,status=no,scrollbars=yes');">수정</button>
                                <button type="submit" name="delete" onclick="re_ask(<?=$row2['id']?>);">삭제</button>
                                
                            
                                <? 
                            
                            }else{}?>
                            
                                </div>
                                <hr>
                       <?}else{
                           if($row2['child']>=1)
                           {
                            ?>
                            <div style=" background-color : gray; color : white; height : 30px;">삭제된 댓글입니다.</div>
                            <?}else
                            {
                            ?>
                            
                            <?
                            
                            }
                       }
                   }

                   }
                   else{
                     ?>
                     <p>댓글이 없습니다. 첫번째로 댓글을 남겨주세요!</p>
                     <?
                   }
                

              
                    ?>

                        <!-- 댓글 입력 폼 -->
                        <hr>
                        <div class="dap_ins">
                            <form action="reply_ok.php?id=<?php echo $id; ?>" method="post">
                            <input type="hidden" name="dat_user" id="dat_user" value="<?=$_SESSION['mb_nick']?>">
                            <input type="hidden" name="u_id" id="u_id" value="<?=$_SESSION['no']?>">

                            <?
        
                            $dateToday = date('Y-m-d H:i:s'); 
                            
                            ?>
                            
                            <input type="hidden" name="regdate" id="regdate" value="<?=$dateToday?>">

                            <p><?=$_SESSION['name']?></p>
                         

                                <div   div style="margin-top:10px; ">
                                <textarea class="reply_content" name="re_content"  id="re_content" style="width : 600px;" placeholder="내용을 입력해주세요" ></textarea>
                                <button id="rep_bt" class="re_bt">댓글 작성</button>
                                </div>
                            </form>
                        </div>
                   
              


             

               


                </div><!--- 댓글 불러오기 끝 -->

                <div id="foot_box"></div>
                
            </div>

        </div>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
            crossorigin="anonymous"></script>

    </body>
</html>