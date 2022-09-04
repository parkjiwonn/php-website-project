<?php

include "../include/DBlib.php";
session_start();
$id = $_GET['re_id'];
$sql="select * from answer where id =$id";
$result = mysqli_query($db, $sql);
$row = mysqli_fetch_array($result);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

   

</head>
<body>
    
<div class="dap_ins">
	<form action="ans_update_action.php?id=<?php echo $id; ?>" method="post">
    <input type="hidden" name="con_num" id="con_num" value="<?=$row['con_num']?>">

	<p><?=$_SESSION['mb_nick']?></p>

	<?
    
    $dateToday = date('Y-m-d H:i:s'); 
   
    ?>
    <input type="hidden" name="regdate" id="regdate" value="<?=$dateToday?>">
    <input type="hidden" name="dat_user" id="dat_user" value="<?=$_SESSION['mb_nick']?>">

	<div   div style="margin-top:10px; ">

    <?php
    $content = $row['content'];
    ?>
	<input class="reply_content" name="re_content"  id="re_content" style="width : 600px; height : 100px;" value ="<? echo $content?>" placeholder="내용을 입력해주세요" ></input>
  
	<button id="rep_bt" class="re_bt" >수정하기.</button>
	</div>
	</form>
	</div>
    </div><!--- 댓글 불러오기 끝 -->
    <div id="foot_box"></div>

</body>
</html>