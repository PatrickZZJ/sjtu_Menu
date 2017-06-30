<!--

20170424 Allegro
	顺便学习html、css的产物。
	其他：
	1.做个logo？
	2.自适应浏览器大小
	3.增加字体样式

-->

<?php include('../php/logIn.php')?>

<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>顾客登录</title>
  
  <style type="text/css">
  .wrapper {
  margin-top: 240px;
  margin-bottom: 240px;
}

.form-1 {
  max-width: 1000px;
  padding: 60px 140px 180px;
  margin: 0 auto;
  background-color: #E0E0E0;
  border: 1px solid rgba(0, 0, 0, 0);
}
.form-1 .form-2 {
  position: relative;
  font-size: 42px;
  height: auto;
  padding: 36px;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
}

</style>
  
</head>

<body bgcolor="#E0E0E0">

    <div class="wrapper" align="center">
    
    <form class="form-1" action="home.php"> 
    <br>
    <img src=" " width="450" height="450" />
      <h1>一起用餐吧</h1>
      <br/><br/> <br/>
      <input  class="form-2" type="number" min="1" max="300" name="desknumber" placeholder="请输入桌号" />      
     <br><br>
      <button class="form-2" type="submit">开始点餐</button>   
    </form>
  </div>
  
<address>
<br />
Software Engineering, Group 9 <br />
</address>
 
</body>
</html>