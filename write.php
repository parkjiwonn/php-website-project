<?
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
        <form action= write_post.php method=post>
   

        <table width=600 border =1>
            <tr> 
                <td colspan=2 align=center> 글쓰기 </td>
            </tr>
            <tr> 
                <td> 제목</td>
                <td><input type = text name = subject size = 60></td>
            </tr>
            <tr> 
                <td> 이름</td>
                <td><input type = text name = name size = 60></td>
            </tr>
            <tr> 
                <td> 내용</td>
                <td><textarea type = text name = memo cols=70 rows=8></textarea></td>
            </tr>
            
            <tr> 
              
                <td colspan=2><input type = submit value ="글쓰기"></td>
            </tr>
</table>
</form>
</div>
</body>
</html>