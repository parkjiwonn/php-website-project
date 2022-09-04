<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <style>
        .div2 {
        border: 1px solid;
        width: 100px;
        height: 50px;
        display: flex;
        align-items: center;
        justify-content: center;
      }

      .clicked {
        color: gold;
      }
    </style>
         
 
  </head>
  <body>
    
    <div class="div1">
      <div class="div2" onclick="location.href='../study/study.php'">div2_1</div>
      <div class="div2">div2_2</div>
      <div class="div2">div2_3</div>
      <div class="div2">div2_4</div>
      <div class="div2">div2_5</div>
      <div class="div2">div2_6</div>
      <div class="div2">div2_7</div>
      <div class="div2">div2_8</div>
      <div class="div2">div2_9</div>
      <div class="div2">div2_10</div>
    </div>
    
  </body>
  <script>
     var div2 = document.getElementsByClassName("div2");

function handleClick(event) {
  console.log(event.target);
  // console.log(this);
  // 콘솔창을 보면 둘다 동일한 값이 나온다

  console.log(event.target.classList);

  if (event.target.classList[1] === "clicked") {
    event.target.classList.remove("clicked");
  } else {
    for (var i = 0; i < div2.length; i++) {
      div2[i].classList.remove("clicked");
    }

    event.target.classList.add("clicked");
  }
}

function init() {
  for (var i = 0; i < div2.length; i++) {
    div2[i].addEventListener("click", handleClick);
  }
}

init();
    </script>
</html>