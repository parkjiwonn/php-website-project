<?php

include "../include/DBlib.php";
$id = $_POST['id'];
$now_pw = $_POST['now_pw'];

$sql = "select * from member where no = '$id'";
$result = mysqli_query($db,$sql);

$row = mysqli_fetch_assoc($result);
$hash=$row['password'];

if(password_verify($now_pw, $hash))
{
    echo "<script>alert('비밀번호가 일치합니다.');</script>";
    echo "<script>location.href='../mypage/update_pw.php?userid=$id'</script>";
}
else{
    echo "<script>alert('비밀번호가 일치하지 않습니다.');</script>";
    echo "<script>location.href='../mypage/check_pw.php?userid=$id'</script>";
}

?>