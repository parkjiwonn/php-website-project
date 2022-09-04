<?php

include "../include/DBlib.php";

$url = "../qna/qna.php";

$id = $_GET['id'];


$query = "select * from qna where no= '$id' ";
$result= mysqli_query($db, $query);
$row = mysqli_fetch_array($result);



        $sql2="delete from qna where no='$id'";
        mysqli_query($db, $sql2);
        ?>
        <script>
        alert("게시글이 삭제되었습니다.");
        location.replace("<?php echo $url ?>");
        </script> 

        


