<?php

include "../include/DBlib.php";



if(isset($_POST['dat_user']) &&  isset($_GET['id']) && isset($_POST['re_content']) && isset($_POST['regdate']) && isset($_POST['u_id']))
{
    // 댓글 입력한 값들 넘어와지는거 확인함.
    // echo $_POST['dat_user'];
    // echo $_POST['re_content'];
    // echo $_POST['regdate'];
    // echo $bno;

    $re_name = mysqli_real_escape_string($db, $_POST['dat_user']);
    $re_content = mysqli_real_escape_string($db, $_POST['re_content']);
    $re_regdate = mysqli_real_escape_string($db, $_POST['regdate']);
    $re_bno = mysqli_real_escape_string($db, $_GET['id']);
    $re_uid = mysqli_real_escape_string($db, $_POST['u_id']);

    $query = "select max(top) from comment ";
    $result2 = mysqli_query($db, $query);
    $data = mysqli_fetch_array($result2);
    $top = $data[0]+1;
      

    $sql = "INSERT INTO comment (id, content, con_num, regdate, name, u_id, top) VALUES(null,'$re_content','$re_bno','$re_regdate','$re_name','$re_uid','$top')";
    $result = mysqli_query($db, $sql);

    echo "<script>alert('댓글이 작성되었습니다.'); 
    location.href='../study/Sview.php?id=$re_bno';</script>";



}
else{
    error_reporting(E_ALL);
    ini_set("display_errors",1);
    
      header("location: ../study/Sview.php?error= 알 수 없는 오류가 발생하였습니다. ");
      exit();
  
  }


?>