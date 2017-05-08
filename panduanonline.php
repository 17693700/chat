<?php
  require_once "MessageService.class.php";
  header("Content-Type:text/xml;charset=utf-8");
  header("Cache-Control: no-cache");
  $friendsqq=$_POST["id"];
  $messageservice=new MessageService(); 
  for($i=0;$i<count($friendsqq);$i++){
     $online=$messageservice->panduanonline($friendsqq[$i]);  
     return $online;
  }