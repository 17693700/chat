<?php
  require_once "MessageService.class.php";
  header("Content-Type:text/xml;charset=utf-8");
  header("Cache-Control: no-cache");
  $qq=$_POST["id"];
  $messageservice=new MessageService();
  $result=$messageservice->gerenxinxi($qq);
  $result1=$messageservice->getqunhao($qq);
  if($result==0&&$result1==0){
  	echo "<res><mes>1</mes></res>";
  }
  else{
  	echo "<res><mes>0</mes></res>";
  } 