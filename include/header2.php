
<?php

session_start();
?>

<!doctype html>
<html lang="en" class="h-100">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.98.0">
    <title>Website</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/sticky-footer-navbar/">


<link href="/docs/5.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <!-- Favicons -->
<link rel="apple-touch-icon" href="/docs/5.2/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="/docs/5.2/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="/docs/5.2/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
<link rel="manifest" href="/docs/5.2/assets/img/favicons/manifest.json">
<link rel="mask-icon" href="/docs/5.2/assets/img/favicons/safari-pinned-tab.svg" color="#712cf9">
<link rel="icon" href="/docs/5.2/assets/img/favicons/favicon.ico">
<meta name="theme-color" content="#712cf9">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        height: 3rem;
        margin-right: 3px;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .margin{
        margin-right: 3px;
      }

      .margin-left{
          margin-left : 400px;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>


  <body class="d-flex flex-column h-100">
    
<header>

  <!-- Fixed navbar -->
  <nav class="navbar navbar-expand-sm navbar-dark fixed-top bg-dark">
      <!--navbar-expand-md : 네비바를 md 이상일대 펼친다는 의미이다. (xl, lg, md, sm 순) 
    navbar-dark : 네비바 글자색 , bg-dark는 네비바의 background-color의미함 
-->
    <div class="container-fluid">
      <a class="navbar-brand" href="../index.php">[ 영어회화 공부 커뮤니티 ]</a>

      <!--navbar-toggler : 토클역할을 한다는 뜻, data-toggle = "collapse"는 숨겨진다는 의미이다. -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
       <!--aria부분은 attribute 속성이며 시각장애인을 위한 속성이라 동작과는 상관이 없다. -->
        <span class="navbar-toggler-icon"></span>
        <!--navbar-toggler-icon 은 토글아이콘을 나타낸다.-->
      </button>

      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav me-auto mb-0 mb-md-0">
            <!--collapse navbar-collapse는 부모요소의 중단점에서 네비바의 요소를 묶어서 숨기는 기능
            id 는 위 토글 버튼과의 연결을 위함이고 오직 하나이기 때문에 id로 선언함. 토글버튼의 data-target과 같기만 한다면 이름은 상관없다.
        navbar-nav : 네비 메뉴의 요소를 나타낸다. -->
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
          </li>

          <li class="nav-item"> 
            <a class="nav-link active" aria-current="page" href="../study/study.php">공부법 공유</a>
          </li>

          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="../qna/qna.php">Q&A</a>
          </li>

          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="../mypage/mypage.php">MyPage</a>
          </li>

        
          <li class="nav-item">
            <?php if(isset($_GET['success'])){ ?>
           <div class="nav-link active margin-left"><?php echo $_GET['success']; ?> </div>
           <?php } ?>

          </li>

          


         

         

          <!--nav-link active : 하얀글씨
          nav-link : 회색 글씨, nav-link disabled : 거의 안보이는 글씨-->

  

        </ul>

   

        <!-- <?php if(isset($_SESSION['no'])){ ?>
          <button type="button" class="btn btn-outline-light margin" >로그아웃</button>
           <?php } else{?>

        <button type="button" class="btn btn-outline-light margin" onClick="location.href='../login2/login_view.php'">로그인</button>
              
        <button type="button" class="btn btn-outline-light" onClick="location.href='../login2/join.php'">회원가입</button>
        <? } ?>  -->


      </div>
    </div>
  </nav>
  
</header>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

      
  </body>
</html>
