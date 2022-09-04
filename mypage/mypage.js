
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



   