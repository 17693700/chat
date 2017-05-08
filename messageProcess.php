<meta charset="utf8"> 
<?php   
  require_once "MessageService.class.php";
  function gerenxinxi($qq){
    $messageservice=new MessageService();
    $xinxi=$messageservice->gerenxinxi($qq);
    return $xinxi;
  }
  function online($qq){
    $messageservice=new MessageService();
    $messageservice->online($qq);
  }
  function getfenzu($qq){
    $messageservice=new MessageService();
    $arr1=$messageservice->getfenzu($qq);
    $arr=array_unique($arr1);                    //分组列表的数组 
    sort($arr,SORT_REGULAR);
    return $arr;
  } 
  function gethaoyou($qq,$arr){
    $messageservice=new MessageService();
    $a=$messageservice->gethaoyou($qq,$arr);
    return $a;
  } 
  function gethaoyouziliao($a){
    $messageservice=new MessageService();
    $ziliao=$messageservice->gethaoyouziliao($a);
    return $ziliao;
  }
  function getqun($qq){
    $messageservice=new MessageService();
    $b=$messageservice->getqun($qq);
    return $b;
  }
?>