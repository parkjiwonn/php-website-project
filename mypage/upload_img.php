<?
include "../include/DBlib.php";

$userNo = $_POST['no'];
$url = "../mypage/mypage.php";


//$url = "https://www.englishstudy.shop";
$path ="https://www.englishstudy.shop/img/";

$file = date("YmdHis").".jpg";
//$filename =  date("YmdHis").".jpg";
$filename = "/usr/local/apache2.4/htdocs/img/$file";



//echo $_FILES['imageform']['tmp_name'];
//echo $filename;
move_uploaded_file($_FILES['imageform']['tmp_name'], $filename);
//echo $_FILES['imageform']['tmp_name']."2";

$sql = "select * from image where userNo = $userNo";
$result2 = mysqli_query($db, $sql);
$image = mysqli_num_rows($result2);
//echo $image;

if($image > 0)
{
   $sql2 = "update image set filename = '$file' where userNo=$userNo";
   $result2 = mysqli_query($db, $sql2);

   if($result2 == false)
{
    // echo '저장하지 못했습니다.';
    // error_log(mysqli_error($conn));//에러 로그 기록.

}
else{
        
        //echo '저장성공'
        ?>

    
        <script>
        alert("<?php echo "프로필 사진이 수정되었습니다."?>");
        location.replace("<?php echo $url?>");
        </script>
    
        <?

}

}
else{
    $query2 = "insert into image (userNo,path,filename) values ('$userNo', '$path','$file')";
    $result = mysqli_query($db, $query2);

    

if($result == false)
{
    // echo '저장하지 못했습니다.';
    // error_log(mysqli_error($conn));//에러 로그 기록.

}
else{
        
        //echo '저장성공'
        ?>

    
        <script>
        alert("<?php echo "프로필 사진이 등록되었습니다."?>");
        location.replace("<?php echo $url?>");
        </script>
    
        <?

}

}






?>