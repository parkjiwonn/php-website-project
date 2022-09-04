<?php
include "../include/DBlib.php";
//echo $_POST['id'];
$id = $_POST['id'];
$pass1 = $_POST['upass1'];
$pass2 = $_POST['upass2'];

if($pass1 !== $pass2)
{
    echo "<script>alert('비밀번호가 일치하지 않습니다.');</script>";
    echo "<script>location.href='../mypage/update_pw.php?userid=$id'</script>";
    exit();
}
else
{
    $xpass = password_hash($pass1, PASSWORD_DEFAULT);

    ?>
        
    <script>
        var check = confirm("변경가능한 비밀번호입니다. 변경하시겠습니까?");

        if(check)
        {

            location.href='../mypage/update_pw_final.php?userid=<?=$id?>&pass=<?=$xpass?>';
            

        }
        else{
            
            location.href='../mypage/update_pw.php?userid=<?=$id?>';
        }
    </script>
    
    <?
}


//비번 암호화



?>