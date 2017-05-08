<?php
  require_once "MessageService.class.php";
  header("Content-Type:text/xml;charset=utf-8");

    $qunhao=$_POST["qunhao"];                           
    //$qunhao="580227";
    $messageservice=new MessageService(); 
    $result=$messageservice->getqunchengyuan($qunhao);      

    echo "<res>";
      for($i=0;$i<count($result);$i++){
        $res=$messageservice->gerenxinxi($result[$i]['qq']);
        //var_dump($res);
        echo "<mes>";
          echo "<nes>";
            echo $res['touxiang'];
          echo "</nes>";
          echo "<nes>";
            echo $res['wangming'];
          echo "</nes>";
          echo "<nes>";
            echo $res['online'];
          echo "</nes>";
        echo "</mes>";
      }
    echo "</res>";