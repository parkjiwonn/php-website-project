<?php

include "../include/DBlib.php";

$id = $_POST['id'];
$title = $_POST['title'];
$content = $_POST['txtContent'];
$regdate = date('Y-m-d H:i:s');
$url = "../qna/qna.php";


$sql = "UPDATE qna SET subject='$title', memo='$content', regdate='$regdate' WHERE no= '$id' ";
$result = mysqli_query($db, $sql);

if($result === false){
    echo '수정하지 못했습니다.';
    error_log(mysqli_error($conn));//에러 로그 기록.
}
else{
    //echo '수정성공'
    ?>

    
    <script>
    alert("<?php echo "글이 수정되었습니다."?>");
    location.replace("<?php echo $url?>");
    </script>

    <?php
}


mysqli_close($db);
?>