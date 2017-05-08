<meta charset="utf8">
<?php
  require_once "MessageService.class.php";
  session_start();
  $qq=$_SESSION["qq"]; 
  if(!empty($_POST["tianjiafenzu"])){
  	$fenzuming=$_POST["tianjiafenzu"];                   			                 				
  	$messageservice=new MessageService(); 
  	$messageservice->addfenzu($qq,$fenzuming); 
 	 echo "<script>alert('添加成功！');location.href='chatRoom.php';</script>";
  }
  else if(!empty($_GET["id"])){
    $fenzuname=$_GET["id"];
    $messageservice=new MessageService(); 
    $messageservice->deletefenzu($qq,$fenzuname);
    echo "<script>location.href='chatRoom.php';</script>"; 
  }
  else if(!empty($_GET["shanchuqq"])){
    $friendqq=$_GET["shanchuqq"];
    $messageservice=new MessageService(); 
    $messageservice->deletehaoyou($qq,$friendqq);
    echo "<script>location.href='chatRoom.php';</script>"; 
  }
?>