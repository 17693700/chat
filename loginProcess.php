<meta charset="utf8">
<?php
  require_once "loginProcess.class.php";
  session_start();
  $qq=$_POST["qq"];
  $mima=$_POST["mima"];
  $loginprocess=new loginProcess();
  $arr=$loginprocess->panduanlogin($qq);

  if(!empty($_POST["jizhumima"])){
    setcookie("qq",$qq,time()+3600);
    setcookie("mima",$mima,time()+3600);
  }
  if(!empty($_POST["zidongdenglu"])){
    setcookie("zidong",$qq,time()+3600);
  }

  if($arr==false){
  	echo "<script>alert('该帐号尚未注册，请注册。');location.href='addmember.php';</script>";
  }
  else{
  	if($mima==$arr["mima"]){
  	  $_SESSION["qq"]=$qq;
  	  echo "<script>location.href='chatRoom.php';</script>";
    }
    else{
  	  echo "<script>alert('您的密码输入错误。');location.href='index.php';</script>";
    }
  }
  