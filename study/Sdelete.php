<?php

include "../include/DBlib.php";



$id = $_GET['id'];
$sql = "DELETE FROM post WHERE id = $id";
mysqli_query($db, $sql);

$url = "../study/study.php";
?>


<script>
        alert("게시글이 삭제되었습니다.");
        location.replace("<?php echo $url ?>");
</script>



