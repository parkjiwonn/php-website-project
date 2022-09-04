<?php
session_start();
error_reporting(E_ALL);
ini_set("display_errors",1);

include('../include/DBlib.php');

if(isset($_POST['user_id']) && isset($_POST['pass1']) )
{
    // 보안 강화하기 위함.
  $user_id = mysqli_real_escape_string($db, $_POST['user_id']);
  $pass1 = mysqli_real_escape_string($db, $_POST['pass1']);
 

  if(empty($user_id))
  {
    header("location: login_view.php?error=아이디가 비어있어요");
    exit();
    //   echo "<script>alert('아이디가 비어있어요');
    //   histoy.back();
      
    //   </script>";
      //history는 브라우저에 흔적을 남겨서 거기로 돌아간거 , location.replace는 흔적을 남기지 않고 그냥 페이지 이동한것.
  }
  else if(empty($pass1))
  {
    header("location: login_view.php?error=비밀번호가 비어있어요");
    exit();
  }
  else
  { 
      $sql = "select * from member where mb_id = '$user_id'";
      $result = mysqli_query($db,$sql);

      if(mysqli_num_rows($result) === 1){
          //로그인 시키기

          //1. 해당 열을 가져왔다.
          //2. 배열의 형태로 가져온다.
          //3. print_r은 배열을 출력하는 함수.
          //4. echo는 쪼개서 가져올수 있다.
          //5. var_dump는 배열의 자세한 정보를 알 수있다.

          $row = mysqli_fetch_assoc($result);
          //fetch 가져와라는 함수 assoc 관계된 이라는 의미 관계된 무언가를 가져와라는 의미
          $hash=$row['password'];
          //echo로 db 접근해서 password 갖고오는 거 확인함.

          //유저가 입력한 비밀번호 받아옴.

          //password_hash는 암호화하는 것 verify는 복호화하는것 둘이 같이 와야함.
          //유저가 입력한 비밀번호와 복호화된 암호가 일치하는지 보는 것.
          if(password_verify($pass1, $hash))
          {

            // $id="id=".$row['no'];
            $_SESSION['mb_id']=$row['mb_id'];
            $_SESSION['mb_nick']=$row['mb_nick'];
            $_SESSION['no']=$row['no'];
            $_SESSION['name']=$row['name'];
            

            header("location:../index.php?");
            exit();

          }
          else{
            header("location: login_view.php?error=로그인에 실패하였습니다.");
            exit();
          }

    

      }
      else{
        header("location: login_view.php?error= 아이디가 잘못 입력되었습니다.");
        exit();

      }
  }


}
else{

    header("location: login_view.php?error= db 접속이 불안정합니다. ");
    exit();

}

?>