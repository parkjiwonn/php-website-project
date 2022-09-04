<?php
include "../include/DBlib.php";
session_start();


$bno = $_GET['bno'];
$top = $_GET['top'];
$level = $_GET['level'];
$prelevel = $_GET['prelevel'];



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
	<form action="ReReply_action.php" method="post">

    <input type="hidden" name="bno" id="bno" value="<?=$bno?>">
    
    <input type="hidden" name="top" id="top" value="<?=$top?>">
    <input type="hidden" name="level" id="level" value="<?=$level?>">
    <input type="hidden" name="prelevel" id="prelevel" value="<?=$prelevel?>">

	<p><?=$_SESSION['mb_nick']?></p>



	<div   div style="margin-top:10px; ">

	<input  class="reply_content" name="content"  id="content" style="width : 600px;"  placeholder="내용을 입력해주세요" ></input>
  
	<button id="rep_bt" class="re_bt" >답글달기</button>
	</div>
	</form>
	</div>
    
    
</body>
</html>