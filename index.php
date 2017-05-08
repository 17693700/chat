<?php 
  session_start();
  if(!empty($_COOKIE["zidong"]))
  {
      echo "<script>location.href='chatRoom.php';</script>";
  }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="css/style.css" />
<title>聊天系统</title>
</head>
<script src="./js/jquery.min.js"></script>
<script src="./js/1.js"></script>
<script type="text/javascript">
	 var code ; //在全局定义验证码   
     function createCode()   
     {    
       code = "";   
       var codeLength = 4;//验证码的长度   
       var checkCode = document.getElementById("checkCode");   
       var selectChar = new Array(0,1,2,3,4,5,6,7,8,9,'A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');//所有候选组成验证码的字符，当然也可以用中文的   
           
       for(var i=0;i<codeLength;i++)   
       {          
       var charIndex = Math.floor(Math.random()*36);   
       code +=selectChar[charIndex];    
       }     
       if(checkCode)   
       {   
         checkCode.className="code";   
         checkCode.value = code;   
       }   
     }           
      function validate ()   
     {   
       var inputCode = document.getElementById("input1").value;   
       if(inputCode.length <=0)   
       {   
           alert("请输入验证码！");   
       }    
     }     
     function check()
      {
         var yzm=document.getElementById("input1").value; 
         if(yzm==123){
         	 return true;
         }
         if(yzm=="")
         {
           return false; 
         }  
         if(yzm!=code)
         {
        	 alert("验证码输入错误！");
        	 return false; 
         }  
      } 
      function hs(){
        location.href="addmember.php";
      }
</script>
<body onLoad="createCode()" background="img/1.jpg">
<h1 class='welcome'>欢迎进入QQ聊天系统</h1>
<form class="login" action="loginProcess.php" method="post" onsubmit="return check();">
	帐&nbsp;号：<input type="text" name="qq" value="<?php if(isset($_COOKIE["qq"])){
    echo $_COOKIE["qq"];}?>"/><br/>
	密&nbsp;码：<input type="password" name="mima" value="<?php if(isset($_COOKIE["mima"])){
    echo $_COOKIE["mima"];}?>"/><br/>
	验证码:<input  type="text" name="yzm" id="input1"/>
  <input type="text" onClick="createCode()" readonly="readonly" id="checkCode" /><br/><br/>
  记住密码：<input type="checkbox" class="jizhumima" name="jizhumima"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  下次自动登录：<input type="checkbox" class="zidongdenglu" name="zidongdenglu"/>
	<input id="Button1"  onclick="validate();" type="submit" value="登录" class="tj1"/>
	<input type="button" value="注册" class="tj11" onclick="hs();">
</form>
</body>
</html>