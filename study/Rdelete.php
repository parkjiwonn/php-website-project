<?php

include "../include/DBlib.php";



$re_id = $_GET['re_id'];

$sql2 = "select * from comment where id='$re_id'";
$result2 = mysqli_query($db, $sql2);
$re_num = mysqli_fetch_array($result2);

$prelevel = (int)$re_num['level'] -1;
$pretop = $re_num['top'];
// 부모 댓글은 자식댓글과 top은 같지만 level이 -1이 된다.
$con_num= $re_num['con_num'];

// echo $re_num['level'];
// echo "e";
// echo $pretop;
// echo "e";
// echo $prelevel;

$url = "../study/Sview.php?id=$con_num";

if($re_num['child'] >=1)
{
        $query = "update comment set del=del+1 where id ='$re_id'";
        mysqli_query($db,$query);

?>

<script>
        alert("댓글이 삭제되었습니다.");
        location.replace("<?php echo $url ?>");
</script>

<?
}else{

        if($re_num['level']!=1){
        //대댓글이 아니라면
        $sql = "DELETE FROM comment WHERE id = $re_id";

        mysqli_query($db, $sql);
        
        ?>
        
        <script>
        alert("댓글이 삭제되었습니다.");
        location.replace("<?php echo $url ?>");
       </script>

        <?
        }
        else{
        
        

        $query2 = "DELETE FROM comment WHERE id = $re_id";
        mysqli_query($db, $query2);

        
        $sql3 = "update comment set child=child-1 where top='$pretop' and level='$prelevel'";
        mysqli_query($db, $sql3);

        ?>
        
        <script>
        alert("댓글이 삭제되었습니다.");
        location.replace("<?php echo $url ?>");
       </script>

        <?

        }
}

?>



