<?php

include('../include/DBlib.php');
error_reporting(E_ALL);
ini_set("display_errors",1);


if(isset($_POST['user_id']) && isset($_POST['user_nick'])   && isset($_POST['pass1']) && isset($_POST['pass2']) )
{
    // 보안 강화하기 위함.
  $user_id = mysqli_real_escape_string($db, $_POST['user_id']);
  $user_nick = mysqli_real_escape_string($db, $_POST['user_nick']);
 
  $pass1 = mysqli_real_escape_string($db, $_POST['pass1']);
  $pass2 = mysqli_real_escape_string($db, $_POST['pass2']);
  
  $xpass = password_hash($pass1, PASSWORD_DEFAULT);
  $sql_same = "SELECT * FROM member where mb_id ='$user_id' and mb_nick ='$user_nick'";

  $order = mysqli_query($db, $sql_same);
  //두개의 인자값을 받는다.(db에 접속해 , 그리고 쿼리문 실행해)
  
  


  $user_info="user_id=".$user_id."&user_nick=".$user_nick;


  if(empty($user_id))
  {
    header("location: join.php?error=아이디가 비어있어요&$user_info");
    exit();
    //   echo "<script>alert('아이디가 비어있어요');
    //   histoy.back();
      
    //   </script>";
      //history는 브라우저에 흔적을 남겨서 거기로 돌아간거 , location.replace는 흔적을 남기지 않고 그냥 페이지 이동한것.
  }
  else if(empty($user_nick))
  {
    header("location: join.php?error=닉네임이 비어있어요&$user_info");
    exit();
  }
 
  else if(mysqli_num_rows($order) > 0)
  {
    header("location: join.php?error=아이디 또는 닉네임이 이미 있어요.&$user_info");
    exit();
  }
  else if(empty($pass1))
  {
    header("location: join.php?error=비밀번호가 비어있어요&$user_info");
    exit();
  }
  else if(empty($pass2))
  {
    header("location: join.php?error=비밀번호 확인이 비어있어요&$user_info");
    exit();
  }
  else if($pass1 !== $pass2){
    header("location: join.php?error=비밀번호가 일치하지 않아요&$user_info");
    exit();
  }

  else{

    // 암호화하고 아이디 와 동시에 닉네임 중복체크하고 저장하는 순서로 진행하기.


      

        //에러가 없다면 insert into 삽입 시켜야 한다.
        $sql_save = "insert into member(mb_id, mb_nick, password) values('$user_id', '$user_nick','$xpass')";

        $result = mysqli_query($db, $sql_save);

        if($result){
        
            // header("location: ../index.php?success=성공적으로 가입이 되었습니다.");
            header("location: ../login/login_view.php");
        exit();
        }
        else{
            header("location: join.php?error= 가입에 실패하였습니다.&$user_info");
        exit();
        }
        //여기서 저장된 pass1은 암호화된 비밀번호이다. 
    

  }


}
else{
  error_reporting(E_ALL);
  ini_set("display_errors",1);
  
    header("location: join.php?error= 알 수 없는 오류가 발생하였습니다. ");
    exit();

}

?>