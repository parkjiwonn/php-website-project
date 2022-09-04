<?php

include "../include/DBlib.php";


$id = $_POST['id'];



$unick = $_POST['unick'];






    $sql_same = "SELECT * FROM member where mb_nick ='$unick'";
    $order = mysqli_query($db, $sql_same);

    if(mysqli_num_rows($order) > 0){

        echo "<script>alert('중복된 닉네임 입니다.');</script>";
        echo "<script>location.href='../mypage/Update_mypage.php'</script>";
        exit();
    }else{
    
        ?>
        
        <script>
            var check = confirm("사용가능한 닉네임입니다. 변경하시겠습니까?");

            if(check)
            {
                location.href='../mypage/update_final.php?unick=<?=$unick?>&id=<?=$id?>';

            }
            else{
                
                location.href='../mypage/Update_mypage.php';
            }
        </script>
        
        <?
        
        // exit();
    }
    
            

    

?>