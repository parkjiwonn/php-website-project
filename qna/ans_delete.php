<?php

include "../include/DBlib.php";

$re_id = $_GET['re_id'];



$sql2 = "select * from answer where id=$re_id";
$result2= mysqli_query($db,$sql2);
$row = mysqli_fetch_array($result2);
$con_num = $row['con_num'];
//echo $con_num;

$sql = "DELETE FROM answer WHERE id = $re_id";
$result=mysqli_query($db, $sql);

$url = "../qna/Qview.php?no=$con_num";
?>

<script>
alert("답변이 삭제되었습니다.");
location.replace("<?php echo $url ?>");
</script>
<?

if($result = true)
{
    ?>
        <script>
        alert("답변이 삭제되었습니다.");
        location.replace("<?php echo $url ?>");
       </script>
    <?
}
        
        ?>
        
        
    


