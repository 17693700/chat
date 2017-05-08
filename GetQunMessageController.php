<?php
  require_once "MessageService.class.php";
  header("Content-Type:text/xml;charset=utf-8");

    $x0=$_POST["qun0"];                             //我QQ
    $x1=$_POST["qun1"];                             
    //$x0="123";
    //$x1="580226";
    $messageservice=new MessageService(); 
    $ziliao0=$messageservice->gethaoyouziliao($x0);          //我的信息
    $ziliao1=$messageservice->getqunjilu($x1);               //群记录 

       echo "<res>";
         for($i=0;$i<count($ziliao1);$i++){
            echo "<mes>";
              if($ziliao1[$i]["qq"]==$x0){
                echo "<nes>";
                   echo $ziliao0[0]["wangming"];               
                echo "</nes>";    
                echo "<nes>";
                   echo $ziliao0[0]["touxiang"];     //echo "<br/>";          
                echo "</nes>";
                echo "<nes>";
                   echo $ziliao0[0]["qq"];     // echo "<br/>";         
                echo "</nes>";
              }
              else{
                echo "<nes>";
                   echo $ziliao1[$i]["wangming"];   // echo "<br/>";        
                echo "</nes>";
                echo "<nes>";
                   echo $ziliao1[$i]["touxiang"];    // echo "<br/>";    
                echo "</nes>";
                echo "<nes>";
                   echo $ziliao1[$i]["qq"];     // echo "<br/>";     
                echo "</nes>";
              }
               echo "<nes>";
                   echo $ziliao1[$i]["content"];     //echo "<br/>";        //4聊天内容    echo "<br/>";  
               echo "</nes>";
               echo "<nes>";
                   echo $ziliao1[$i]["shijian"];      //echo "<br/>";       //5信息发送时间
               echo "</nes>";
            echo "</mes>";
       }
       echo "</res>";