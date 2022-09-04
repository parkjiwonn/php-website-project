<?php
include "../include/DBlib.php";
session_start();

$top = $_POST['top'];
$level = $_POST['level'];
$prelevel = $_POST['prelevel'];

$title = $_POST['title'];
$memo = $_POST['txtContent'];
$regdate = date('Y-m-d H:i:s'); 

$name = $_SESSION['name'];
$u_id = $_SESSION['no'];

$url = "../qna/qna.php";




$sql = "insert into qna(u_id, subject,name,memo, regdate, top, level) values('$u_id', '$title', '$name', '$memo', '$regdate' ,'$top','$level')";
mysqli_query($db, $sql);



if($result === false){
    echo '저장하지 못했습니다.';
    error_log(mysqli_error($conn));//에러 로그 기록.
}
else{
    echo '저장성공';

    $sql2 = "update qna set child= child+1 where top='$top' and level='$prelevel' ";
    mysqli_query($db, $sql2); 

    ?>

    
    <script>
    alert("<?php echo "글이 등록되었습니다."?>");
    location.replace("<?php echo $url?>");
    </script>

    <?php
}


mysqli_close($db);

?>
