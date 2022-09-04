<?php

include "../include/header.php";

session_start();

include "../include/DBlib.php";


?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.98.0">
    <title>Checkout example · Bootstrap v5.2</title>
    <link rel="stylesheet" type="text/css" href="mypage.css">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/checkout/">



    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

        <!-- Favicons -->
    <link rel="apple-touch-icon" href="/docs/5.2/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
    <link rel="icon" href="/docs/5.2/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="/docs/5.2/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
    <link rel="manifest" href="/docs/5.2/assets/img/favicons/manifest.json">
    <link rel="mask-icon" href="/docs/5.2/assets/img/favicons/safari-pinned-tab.svg" color="#712cf9">
    <link rel="icon" href="/docs/5.2/assets/img/favicons/favicon.ico">
    <meta name="theme-color" content="#712cf9">


    <style>
      .width{
        width : 700px;
      }
    </style>

    <!-- Custom styles for this template -->
    <link href="form-validation.css" rel="stylesheet">

    <script>

        function check_pw(){
    
    var pw = document.getElementById('upass1').value;

    if(document.getElementById('upass1').value !='' && document.getElementById('uPass2').value!=''){
        if(document.getElementById('upass1').value==document.getElementById('uPass2').value){
            document.getElementById('check').innerHTML='비밀번호가 일치합니다.'
            document.getElementById('check').style.color='blue';
        }
        else{
            document.getElementById('check').innerHTML='비밀번호 일치하지 않음.';
            document.getElementById('check').style.color='red';
        }
    }
    }
    </script>

  </head>
  <body class="bg-light">
    
<div class="container">
  <main>
    <div class="py-5 text-center">
      
      <h2>.....</h2>
      <h2>MY PAGE</h2>
      

      <?
      if(!isset($_SESSION['no'])){
      ?>
      <h1>로그인 한 후 마이페이지 이용해주세요.</h1>
      <?
      }else{
      ?>
    
       </div>

        <h4 class="mb-3" style="text-align:center">회원 정보</h4>
        <hr class="my-4">
        <form class="needs-validation" action="../mypage/Update_mypage.php" method="post">

        <?
        $no = $_SESSION['no'];
        $sql = "select * from member where no = $no";
        $result = mysqli_query($db, $sql);
        $data = mysqli_fetch_array($result);

        ?>

          <div align=center>
  
          <div>
              <?
              $query = "select * from image where userNo = $no";
              $result2 = mysqli_query($db, $query);
              $row = mysqli_num_rows($result2);
              $img = mysqli_fetch_array($result2);
              
              
              
              if($row > 0)
              {
                $path = $img['path'];
                $filename = $img['filename'];
                //echo $path.$filename;
                ?>
               
                <img id="frontImg" src="<?=$path.$filename;?>"  width="200" height="200">
                <?
              }else{
              ?>
            <img id="frontImg" src="../img/index.png" alt="profile" width="200" height="200">
             <?}?>

            </div>
            <!--세션 전역변수를 사용할 페이지의 상단부에 배치하면 된다.-->
            <br>
            <div class="width" >
            <h3>[아이디]</h3>
            <p><?=$data['mb_id'] ?></p>
           
            </div>

            <div class="width" >
              <h3>[닉네임]</h3>
              <p><?=$data['mb_nick']?></p>
              
          
            </div>


         
            

            <hr class="my-4">
          </div>

          

          <div style="text-align:center">
          <button class="w-10 btn btn-dark btn-lg" type="submit" >수정하기.</button>
    </div>
        </form>
      
    </div>
    <?}?>
  </main>

  
</div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

      <script src="form-validation.js"></script>
  </body>
</html>
