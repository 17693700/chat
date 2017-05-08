<meta charset="utf8">
<?php
  require_once "MessageService.class.php";
  header("Content-Type:text/xml;charset=utf-8");
  
  if($_POST["x0"]&&$_POST["x0"]&&$_POST["x0"]){
    $x0=$_POST["x0"];
    $x1=$_POST["x1"];
    $x2=$_POST["x2"];
    $messageservice=new MessageService();
    $messageservice->sendxinxi($x0,$x1,$x2);
  }

  if($_POST["qq"]&&$_POST["qunhao"]&&$_POST["xinxi"]){
    $qq=$_POST["qq"];
    $qunhao=$_POST["qunhao"];
    $xinxi=$_POST["xinxi"];
    $messageservice=new MessageService();
    $ziliao=$messageservice->gerenxinxi($qq);
    $messageservice->sendqunxinxi($qunhao,$qq,$ziliao["touxiang"],$ziliao["wangming"],$xinxi);

  }
 
  if($_POST["t0"]&&$_POST["t1"]){
    $qq=$_POST["t0"];
    $touxiang=$_POST["t1"];
    echo "<res><mes>Hey!</mes><mes>$touxiang</mes></res>";
    $messageservice=new MessageService();
    $messageservice->sendtouxiang($qq,$touxiang);
  }

  if($_POST["id0"]&&$_POST["id1"]){
    $qq=$_POST["id0"];
    $qianming=$_POST["id1"];
    $messageservice=new MessageService();
    $messageservice->sendqianming($qq,$qianming);
  }

  if($_POST["id00"]&&$_POST["id11"]){
    $qq=$_POST["id00"];
    $wangming=$_POST["id11"];
    $messageservice=new MessageService();
    $messageservice->sendwangming($qq,$wangming);
  }
  
  