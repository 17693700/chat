<meta charset="utf8">
<?php
  require_once "MessageService.class.php";
  session_start();
  $qq=$_SESSION["qq"];
  $messageservice=new MessageService();
  if(isset($_POST["rearch"])){
    //$qq=$_POST["yc"];
    $friendqq=$_POST["rearch"];
    $result=$messageservice->panduanfriend($qq,$friendqq);      //查看是否有此好友
    $arr1=$messageservice->getfenzu($qq);
    $xinxi0=$messageservice->gerenxinxi($friendqq);
    $arr=array_unique($arr1);                   
    sort($arr,SORT_REGULAR);                 //分组列表的数组 
    if(!empty($arr)){
      $fenzu=implode("and",$arr); 
    }
    if(!empty($xinxi0)){
      $xinxi=implode("and",$xinxi0);          
    }
    if(empty($xinxi)){
      $xinxi=0;
    }
    if($xinxi==0){
      echo "<script>alert('Sorry,该用户不存在。');location.href='chatRoom.php'</script>";
    }
    else if($result==true){
      echo "<script>alert('你们已经是好友了。');location.href='chatRoom.php'</script>";
    }
    else{
      echo "<script>location.href='addfriend.php?zu=$fenzu&xx=$xinxi';</script>";
    } 
  }

  if(isset($_POST["fenzuming"])){
    $friendqq=$_POST["ycy"];
    $fenzuming=$_POST["fenzuming"];
    //echo $friendqq."<br/>".$fenzuming;
    $messageservice->addfriend($qq,$friendqq,$fenzuming);
    echo "<script>alert('添加成功！');location.href='chatRoom.php';</script>";
  }
?>