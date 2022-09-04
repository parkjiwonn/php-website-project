<?php

include "../include/DBlib.php";

//댓글의 인덱스
$id = $_GET['id'];
//게시글의 인덱스
$con_num = $_POST['con_num'];
$name = $_POST['dat_user'];
$content = $_POST['re_content'];
$regdate = date('Y-m-d H:i:s');
$url = "../study/Sview.php?id=$con_num";

// echo $id;
// echo $con_num;
// echo $name;
// echo $content;
// echo $regdate;
// 수정한 값들 잘 넘어오는거 확인함.

$sql = "UPDATE comment SET name='$name', content='$content', regdate='$regdate' WHERE id ='$id' and con_num ='$con_num' ";
$result = mysqli_query($db, $sql);

if($result === false){
    echo '수정하지 못했습니다.';
    error_log(mysqli_error($conn));//에러 로그 기록.
}
else{
    //echo '수정성공'
    ?>

    
    <script>
    opener.location.reload();
    alert("<?php echo "댓글이 수정되었습니다."?>");
    location.replace("<?php echo $url?>");
    window.close();
    </script>

    <?php
}


mysqli_close($db);


?>