<?php
include "include/DBlib.php";

$title = $_POST['subject'];
$name = $_POST['name'];
$memo = $_POST['memo'];
$regdate = date('Y-m-d H:i:s');
$id = "test";

//top을 항상 기존의 수보다 큰값으로 넣어줘야 글이 제일 뒷글로 바뀌게 된다.

    $query = "select max(top) from sing_board_data where id='$id'";
    //top 이라는 filed에서 가장 큰 값을 구해 온다.
    $result = mysqli_query($db, $query);
    $data = mysqli_fetch_array($result);

    echo $data[0];
    // 8 출력되는거 학인.
    $top = $data[0] +1;
    echo $top;
    // 9가 출력되는거 확인.
    // 10을 추가했을때 9 , 10 출력되는거 확인
    // 11을 추가했을때 10, 11 이 출력되지 않고 9,10이 출력됨..
    

    $sql = "insert into sing_board_data(id, subject,name,memo, regdate, top) values('$id', '$title', '$name', '$memo', '$regdate' ,'$top')";
    mysqli_query($db, $sql);

?>
<script>
    location.href='list.php';
    </script>