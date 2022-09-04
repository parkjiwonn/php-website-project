<?php

include "include/DBlib.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<div align=center>
    <table width = 600 border =1>
        <tr>
            <td> no </td>
            <td> subject</td>
            <td> name</td>
            <td> date</td>
            <td> hit</td>
        </tr>

        <?
        $sql = "select * from qna order by top desc, level asc";
        // no 은 고유값에 대한 수
        // top 은 정렬에 관한 수
  
        $result2 = mysqli_query($db, $sql);
        
        $cnt=0;
        while($data = mysqli_fetch_array($result2)){

        ?>

        <tr>
            <?
                  $result = mysqli_query($db, $sql);

                  $total = mysqli_num_rows($result);

            ?>
        <td> <?=$total-$cnt?> </td>

       
            <td> 
            <? for($i=0; $i<$data['level']; $i++)
            {
            ?>
            [답글]
            <?
            }
            ?>
            <a href="view.php?id=<?=$data['id']?>&no=<?=$data['no']?>"> <?=$data['subject']?></a></td>
            <td> <?=$data['name']?></td>
            <td> <?=$data['regdate']?></td>
            <td><?=$data['hit']?></td>
            <?
            $cnt++;
            }?>
</tr>
</table>
<table>
    <td align=right>
        <a href=write.php> 글쓰기 </a>
</td>
</table>
</div>
    
</body>
</html>