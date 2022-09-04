<?php



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
    <form method="post" action="check_pw_action.php">
    <input type="hidden" name="id" id="id" value="<?=$id?>">

    <label>현재 비밀번호</label><br>
    <input type="password" id="now_pw" name="now_pw" style="width:50%;">
    <input type="submit" value="확인">
    </form>
    <br>
    
</body>
</html>