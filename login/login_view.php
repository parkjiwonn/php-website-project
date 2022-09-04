<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>로그인</title>
        <link rel="stylesheet" type="text/css" href="join_black.css">
    </head>
    <body>

        <form action="../login/login_server.php" method="post">

            <h2>로그인</h2>

            <?php if(isset($_GET['error'])){ ?>
            <p class="error"><?php echo $_GET['error']; ?>
            </p>
            <?php } ?>

            <?php if(isset($_GET['success'])){ ?>
            <p class="success"><?php echo $_GET['success']; ?>
            </p>
            <?php } ?>

            <label>아이디</label>
            <input type="text" placeholder="아이디.." name="user_id">

            <label>비밀번호</label>
            <input type="password" placeholder="비밀번호.." name="pass1">

            <button type="submit" name="login_btn">로그인</button>

            <a href="join.php" class="save">아직 회원이 아니신가요? (회원가입 페이지)
            </a>

        </form>

    </body>
</html>