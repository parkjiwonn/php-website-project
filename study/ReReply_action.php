<?php
include "../include/DBlib.php";
session_start();

$bno = $_POST['bno'];

$top = $_POST['top'];
$level = $_POST['level'];
$prelevel = $_POST['prelevel'];
$regdate = date('Y-m-d H:i:s'); 

$name = $_SESSION['mb_nick'];
$u_id = $_SESSION['no'];


$content = $_POST['content'];

$sql = "insert into comment(con_num, content, regdate, name, u_id, top, level) values('$bno', '$content', '$regdate', '$name', '$u_id' ,'$top','$level')";
$result = mysqli_query($db, $sql);

$url = "../study/Sview.php?id=$bno";

if($result === false){
    echo '저장하지 못했습니다.';
    error_log(mysqli_error($conn));//에러 로그 기록.
}
else{
    //echo '저장성공';

    $sql2 = "update comment set child= child+1 where top='$top' and level='$prelevel' ";
    mysqli_query($db, $sql2); 

    ?>

    
    <script>
    opener.location.reload();
    alert("<?php echo "대댓글이 생성되었습니다."?>");
    location.replace("<?php echo $url?>");
    window.close();
    </script>

    <?php
}


mysqli_close($db);



?>