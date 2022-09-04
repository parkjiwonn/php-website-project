<?php

include "../include/DBlib.php";



    $re_name = $_POST['dat_user'];
    $re_content = $_POST['re_content'];
    $re_regdate = $_POST['regdate'];
    $re_bno = $_GET['id'];
    $re_uid = $_POST['u_id'];

      

    $sql = "INSERT INTO answer (id, content, con_num, regdate, name, u_id) VALUES(null,'$re_content','$re_bno','$re_regdate','$re_name','$re_uid')";
    $result = mysqli_query($db, $sql);

    echo "<script>alert('답변이 작성되었습니다.'); 
    location.href='../qna/Qview.php?no=$re_bno';</script>";




?>