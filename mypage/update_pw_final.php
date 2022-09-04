<?php
include "../include/DBlib.php";


$id = $_GET['userid'];
$url = "../login/login_view.php";


$pass = $_GET['pass'];

$sql = "UPDATE member SET password = '$pass' WHERE no= '$id' ";
$result = mysqli_query($db, $sql);

if($result === false){
    echo '수정하지 못했습니다.';
    error_log(mysqli_error($conn));//에러 로그 기록.
}
else{
    //echo '수정성공'
    ?>

    <script>

    alert("<?php echo "비밀번호가 수정되었습니다."?>");
    window.close();
    //
    console.log('통과1');
    opener.location.reload();
    console.log('통과2');
    location.href("<?php echo $url?>");
    console.log('통과3');
    

    </script>

    <?php
}
?>