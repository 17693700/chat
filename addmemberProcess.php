<meta charset="utf-8">
<?php
  require_once "MessageService.class.php";
  session_start();
  $zh=$_POST["zhanghao"];
  $mm=$_POST["mima"];
  $wm=$_POST["mingzi"];
  $xb=$_POST["xingbie"];
  $messageservice=new MessageService();
  $messageservice->addmember($zh,$mm,$wm,$xb);
  $messageservice->addfenzu($zh,"我的好友");
  $_SESSION["qq"]=$zh;
  Header("Location:chatRoom.php");