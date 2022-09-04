<?

include "../include/DBlib.php";

$id = $_GET['id'];
$url = "../mypage/mypage.php";


$unick = $_GET['unick'];

$sql = "UPDATE member SET mb_nick = '$unick' WHERE no= '$id' ";
$result = mysqli_query($db, $sql);

if($result === false){
    echo '수정하지 못했습니다.';
    error_log(mysqli_error($conn));//에러 로그 기록.
}
else{
    //echo '수정성공'
    ?>

    <script>
    alert("<?php echo "회원정보가 수정되었습니다."?>");
    location.replace("<?php echo $url?>");
    </script>

    <?php
}
?>
