<?php
include "include/DBlib.php";

$top = $_POST['top'];
$level = $_POST['level'];
$title = $_POST['subject'];
$name = $_POST['name'];
$memo = $_POST['memo'];
$regdate = date('Y-m-d H:i:s');
$id = "test";

//top을 항상 기존의 수보다 큰값으로 넣어줘야 글이 제일 뒷글로 바뀌게 된다.
// if(!$top){
//     $query = "select max(top) from sing_board_data where id='$id'";
//     //top 이라는 filed에서 가장 큰 값을 구해 온다.
//     $result = mysqli_query($db, $query);
//     $data = mysqli_fetch_array($result);

//     $top = $data[0] +1;
// }


$sql = "insert into sing_board_data(id, subject,name,memo, regdate, top, level) values('$id', '$title', '$name', '$memo', '$regdate' ,'$top','$level')";
mysqli_query($db, $sql);

?>
<script>
    location.href='list.php';
    </script>