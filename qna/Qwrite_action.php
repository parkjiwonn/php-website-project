<?php

include "../include/DBlib.php";
session_start();

$title = $_POST['title'];
$content = $_POST['txtContent'];
$date = date('Y-m-d h:i:s ');
// 시간 제대로 출력 안됨. 


$name = $_SESSION['mb_nick'];
$u_id = $_SESSION['no'];

$url = "../qna/qna.php";




// $sql = "INSERT INTO qna (no, subject, memo, regdate, name, u_id) VALUES(null,'$title','$content','$date','$name','$u_id')";
// $result = mysqli_query($db, $sql);

for ($i=0; $i<=10000; $i++) { 
    $sql = "INSERT INTO qna (no, subject, memo, regdate, name, u_id) VALUES(null,'$i','$i','$date','$name','$u_id')";
   $result = mysqli_query($db, $sql);
 } 


if($result === false){
    echo '저장하지 못했습니다.';
    error_log(mysqli_error($db));//에러 로그 기록.
}
else{
    //echo '저장성공'
    ?>

    
    <script>
    alert("<?php echo "글이 등록되었습니다."?>");
    location.replace("<?php echo $url?>");
    </script>

    <?php
}


mysqli_close($db);

?>