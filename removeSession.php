<meta charset="utf8">
<?php  
  require_once "MessageService.class.php"; 
  session_start();
                    
  $messageservice=new MessageService();
  $messageservice->underline($qq);

  setcookie("zidong",$qq,time()-3600);
  $_SESSION["qq"]=""; 							 //清空session
  

  Header("Location:index.php");