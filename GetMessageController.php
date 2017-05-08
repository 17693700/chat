<?php
  require_once "MessageService.class.php";
  header("Content-Type:text/xml;charset=utf-8");
  header("Cache-Control: no-cache");
  if($_POST["x0"]&&$_POST["x1"]){
    $x0=$_POST["x0"];                             //我QQ
    $x1=$_POST["x1"];                             //对方QQ
    //$x0="123";
    //$x1="1713823247";
    $messageservice=new MessageService(); 
    $arr=$messageservice->getxinxi($x0,$x1);                 //聊天记录
    $ziliao0=$messageservice->gethaoyouziliao($x0);          //我的信息
    $ziliao1=$messageservice->gethaoyouziliao($x1);          //对方信息

       echo "<res>";
         for($i=0;$i<count($arr);$i++){
            echo "<mes>";
              if($arr[$i]["sendqq"]==$ziliao0[0]["qq"]){
                echo "<nes>";
                   echo $ziliao0[0]["wangming"];               
                echo "</nes>";
                echo "<nes>";
                   echo $ziliao0[0]["touxiang"];              
                echo "</nes>";
                echo "<nes>";
                   echo $ziliao0[0]["qq"];              
                echo "</nes>";
              }else if($arr[$i]["sendqq"]==$ziliao1[0]["qq"]){
                echo "<nes>";
                   echo $ziliao1[0]["wangming"];           
                echo "</nes>";
                echo "<nes>";
                   echo $ziliao1[0]["touxiang"];        
                echo "</nes>";
                echo "<nes>";
                   echo $ziliao1[0]["qq"];          
                echo "</nes>";
              }
               echo "<nes>";
                   echo $arr[$i]["content"];                //4聊天内容     
               echo "</nes>";
               echo "<nes>";
                   echo $arr[$i]["shijian"];                //5信息发送时间
               echo "</nes>";
               echo "<nes>";
                   echo $arr[$i]["sendqq"];                 //6发送者qq
               echo "</nes>";
            echo "</mes>";
       }
       echo "</res>";
  }


