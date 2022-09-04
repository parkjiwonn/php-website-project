<?php

include "../include/DBlib.php";
$id = $_GET['userid'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script type="text/javascript" src="../mypage/mypage.js"></script>
</head>
<body>
    <form method="post" action="update_pw_action.php">
    <input type="hidden" name="id" id="id" value="<?=$id?>">

    <!-- <label>현재 비밀번호</label><br>
    <input type="password" id="now_pw" name="now_pw" style="width:50%;">
    <br> -->
    <label>변경 비밀번호 </label><br>
    <input type="password" id="upass1" name="upass1" style="width:50%;">
    <br>
    <label>변경 비밀번호 확인</label><br>
    <input type="password" id="upass2" name="upass2" style="width:50%;"><br>
    <input  type="submit" value="변경">
    </form>
    
</body>
</html>