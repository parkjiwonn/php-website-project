<?php

    include "../include/DBlib.php";

   
    if(isset($_GET['userid']) )

    {
        $uid= $_GET["userid"];  //GET으로 넘긴 userid
       
    $sql= "SELECT * FROM member where mb_id ='$uid'";
    $result = mysqli_fetch_array(mysqli_query($db, $sql));

    if(!$result){
        echo "<span style='color:blue;'>$uid</span> 는 사용 가능한 아이디입니다.";
       ?><p><input type=button value="이 ID 사용" onclick="opener.parent.decide();  window.close();"></p>
        
    <?php
    } else {
        echo "<span style='color:red;'>$uid</span> 는 중복된 아이디입니다.";
        ?><p><input type=button value="다른 ID 사용" onclick="opener.parent.change(); WinClose();"></p>
    <?php
    }
    }


    else if(isset($_GET['usernick'])){
        $unick=$_GET["usernick"];  

        $sql= "SELECT * FROM member where mb_nick ='$unick'";
        $result = mysqli_fetch_array(mysqli_query($db, $sql));
    
        if(!$result){
            echo "<span style='color:blue;'>$unick</span> 는 사용 가능한 닉네임입니다.";
           ?><p><input type=button value="이 닉네임 사용" onclick="opener.parent.decide2();  window.close();"></p>
            
        <?php
        } else {
            echo "<span style='color:red;'>$unick</span> 는 중복된 닉네임입니다.";
            ?><p><input type=button value="다른 닉네임 사용" onclick="opener.parent.change2(); WinClose();"></p>
        <?php
        }
        
      

        
    }

  

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<script>

function WinClose()
{

   console.log("dsjlf")
   window.open('','_self').close();     

}
</script>
<body>
    
</body>
</html>