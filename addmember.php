<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>用户注册</title>
<link rel="stylesheet" type="text/css" href="css/style.css"/>
</head>
<script src="./js/jquery.min.js"></script>
<script src="./js/1.js"></script>
<script type="text/javascript">
  function panduan(){
        var qq=document.getElementById("qq");  
        var result=document.getElementById("shifounengyong");                
        var xmlhttp;
        if(window.XMLHttpRequest){
          xmlhttp=new XMLHttpRequest();
        }
        else{
          xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
        var url="addmemberAjax.php";
        var x="id="+qq.value;
        xmlhttp.open("post",url,true);
        xmlhttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
        xmlhttp.onreadystatechange=function(){
          if(xmlhttp.readyState==4&&xmlhttp.status==200){
  
              var mes=xmlhttp.responseXML.getElementsByTagName("mes"); 
              //alert(mes[0].childNodes[0].nodeValue);
              if(mes[0].childNodes[0].nodeValue==1){
                result.style.color="#34B956";
                result.innerHTML="可以使用！";
              }
              else{
                result.style.color="red";
                result.innerHTML="该帐号已被占用。";
              }
          }
        }
        xmlhttp.send(x);
  }
  function check(){
    
  }
  function tiaozhuan(){
    location.href="index.php";
  }
</script>
<body background="img/1.jpg">
<h1 class='welcome'>欢迎注册</h1>
  <form class="login" action="addmemberProcess.php" method="post" onsubmit="return check();">
    帐&nbsp;号：<input type="text" name="zhanghao" id="qq" onkeyup="panduan();"/><span id="shifounengyong"></span><br/>
    密&nbsp;码：<input type="password" name="mima"/><br/>
    昵&nbsp;称：<input type="text" name="mingzi"><br/><br/>
    性&nbsp;别：&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;男&nbsp;<input type="radio" name="xingbie" value="男" class="xingbie">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    女&nbsp;<input type="radio" name="xingbie" value="女" class="xingbie">
    <input id="Button1" type="submit" value="注册" class="tj1"/>
    <input type="button" value="返回" class="tj11" onclick="tiaozhuan();">
  </form>
</body>
</html>
