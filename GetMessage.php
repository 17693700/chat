<?php
  require_once "MessageService.class.php";
  header("Content-Type:text/xml;charset=utf-8");
  header("Cache-Control: no-cache");
  $x0=$_POST["x0"];                   			 		//我QQ
  $x1=$_POST["x1"];                    					//对方QQ
  //$x0="123";
  //$x1="1713823247";
  $messageservice=new MessageService(); 
  $isget=$messageservice->isget($x0,$x1);                 //聊天记录
  //file_put_contents("d:\my.log",$isget["isget"],FILE_APPEND);
  //var_dump($isget);
  if($isget["getqq"]==$x0&&$isget["isget2"]=="1"){
    echo "<res><mes>1</mes></res>";
    $messageservice->removeisget2($isget["shijian"]); 
  }
  else{
  	echo "<res><mes>0</mes></res>";
  }
