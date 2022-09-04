
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

    <script type="text/javascript" src="../mypage/mypage.js"></script>

 
  
    <!-- Custom styles for this template -->
    <link href="form-validation.css" rel="stylesheet">
  </head>
  <body class="bg-light">
    
<div class="container">
  <main>
    <div class="py-5 text-center">
    <h2>.....</h2>
      <h2>MY PAGE</h2>
       </div>

        <h4 class="mb-3" style="text-align:center">회원 정보 수정</h4>
        
        <?php if(isset($_GET['error'])){ ?>
            <p style="color:red;" class="error"><?php echo $_GET['error']; ?>
            </p>
            <?php } ?>

            <?php if(isset($_GET['success'])){ ?>
            <p style="color:blue;" class="success"><?php echo $_GET['success']; ?>
            </p>
            <?php } ?>


            <!-- <form class="needs-validation" enctype="multipart/form-data"  action="../mypage/Update_action.php"  method="post" >  -->

<input type="hidden" id="id" name="id" value="<?=$_SESSION['no']?>">

  <div class="row g-3">
  
  <?
  $no = $_SESSION['no'];
  $sql ="select * from member where no = $no";
  $result = mysqli_query($db, $sql);
  $data = mysqli_fetch_array($result);
  ?>


    <div class="width">
      <label for="firstName" class="form-label">닉네임</label>

      <input type="text" class="form-control" name="unick" id="unick" value="<?=$data['mb_nick']?>" >
      
      
      <button  >닉네임 수정</button> 
   
    </div>
    
    <!-- </form>     -->

   

    <div style="text-align:left">
    <button onclick="window.open('check_pw.php?userid=<?=$_SESSION['no']?>','window_name','width=500,height=200,location=no,status=no,scrollbars=yes');">비밀번호 변경</button> 
    </div>



    <form enctype="multipart/form-data" name="form" method="post" action="../mypage/upload_img.php">
    <input type="hidden" id="no" name="no" value="<?=$_SESSION['no']?>">
    <table>
       
        <tr>
          <td>이미지:</td>
          <td><input type="file" name="imageform" /></td>
        </tr>
        <tr>
          <td colspan="2">
            <input type="submit" value="프로필 사진 업로드" />
          </td>
        </tr>
        </table>
      </form>

      <form method="post" action="../mypage/delete_img.php" >
      <input type="hidden" id="no" name="no" value="<?=$_SESSION['no']?>">
      <input type="submit" value=" 프로필 사진 삭제" />
      </form>


  
  
  </div>

  <hr class="my-4">
      
    </div>
  </main>

  
</div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

      <script src="form-validation.js"></script>
  </body>
</html>
