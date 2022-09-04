<?
include "../include/DBlib.php";

$userNo = $_POST['no'];
//echo $userNo;
$url = "../mypage/mypage.php";


$sql = "DELETE FROM image WHERE userNo = $userNo";
mysqli_query($db, $sql);


?>


<script>
        alert("프로필 사진이 삭제되었습니다.");
        location.replace("<?php echo $url ?>");
</script>

?>