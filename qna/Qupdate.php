<?php

include_once "../include/header2.php"; // 레이아웃을 include 함 
include "../include/DBlib.php";
$dateToday = date('Y-m-d'); 

?>

<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <script type="text/javascript" src="../se2/js/service/HuskyEZCreator.js" charset="utf-8"></script>
     
		<style>

			.button{
				height : 50px;
				width: 70px;
			}

			</style>

    </head>
    <h5>Hello, world!</h5>
        <h5>Hello, world!</h5>
    <body>

    <?
    
    $id = $_GET['id'];
    $sql = "SELECT * FROM qna WHERE no = $id ";
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_array($result);
    
    
    ?>
        <form method="post" action="Qupdate_action.php">
        <input type="hidden" name="id" id="id" value="<?=$id?>">
        <table border="1" width="100%">
            <tr>
                <td style="text-align:center">
                    <b>제목</b>
                </td>
                <td><input type="text" id="title" name="title" style="width:100%;" value="<?=$row['subject']?>"></td>
            </tr>
            <tr>
                <td colspan="2">

                <textarea name="txtContent" id="txtContent" rows="20" cols="300" value="<?=$row['memo']?>"></textarea>
                    <script id="smartEditor" type="text/javascript">
                        var oEditors = [];
                        nhn.husky.EZCreator.createInIFrame({
                        oAppRef: oEditors,
                        elPlaceHolder: "txtContent",
                        sSkinURI: "../se2/SmartEditor2Skin.html",
                        fCreator: "createSEditor2"
                        });
                        </script>
                </td>
            </tr>
        </table>
        <div style="text-align:center"><input class="button" type="submit" onclick="save();" value="등록"></div>
        <script>

            function save(){
                oEditors.getById["txtContent"].exec("UPDATE_CONTENTS_FIELD", []);  
                        //스마트 에디터 값을 텍스트컨텐츠로 전달
                var content = document.getElementById("smartEditor").value;
                // alert(document.getElementById("txtContent").value); 
                //         // 값을 불러올 땐 document.get으로 받아오기
                return; 
            }

            </script>
        </form>
                    
    </body>
</html>