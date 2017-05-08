<?php   
  require_once "SqlHelper.class.php";
  class MessageService{ 
    function sendtouxiang($x0,$x1){
      $mysql=new SqlHelper();
      $sql="update user set touxiang='$x1' where qq='$x0'";
      return $mysql->dml($sql); 
    }
    function sendwangming($x0,$x1){
      $mysql=new SqlHelper();
      $sql="update user set wangming='$x1' where qq='$x0'";
      return $mysql->dml($sql); 
    }
    function sendqianming($x0,$x1){
      $mysql=new SqlHelper();
      $sql="update user set gexingqianming='$x1' where qq='$x0'";
      return $mysql->dml($sql); 
    }
    function gerenxinxi($zh){
      $mysql=new SqlHelper();
      $sql="select * from user where qq='$zh'";
      return $mysql->find($sql);
    }
  	function online($zh){
  	  $mysql=new SqlHelper();
  	  $sql="update user set online='1' where qq='$zh'";
  	  $mysql->dml($sql);
  	}
  	function panduanlogin($zh){
  	  $mysql=new SqlHelper();
  	  $sql="select * from user where qq='$zh'";
      return $mysql->find($sql);
  	}
  	function getfenzu($zh){
  	  $mysql=new SqlHelper();
  	  $sql="select * from fenzu where qq='$zh'";
      return $mysql->getfenzu($sql);
  	}
  	function gethaoyou($qq,$arr){
      $mysql=new SqlHelper();
      $arrr=array();
      for($i=0;$i<count($arr);$i++){
        $sql="select haoyouqq from fenzu where (qq='$qq' and fenzuname='$arr[$i]')";
        $arrr[]=$mysql->gethaoyou($sql);
      }
      return $arrr;
    }
    function gethaoyouziliao($a){
      $mysql=new SqlHelper();
      $sql="select * from user where qq='$a'";
      return $mysql->dql($sql);
    }
    function getqun($a){
      $mysql=new SqlHelper();
      $sql="select * from qun where qq='$a'";
      return $mysql->dql($sql);
    }
    function getqunhao($a){
      $mysql=new SqlHelper();
      $sql="select * from qun where qunhao='$a'";
      return $mysql->find($sql);
    }
    function getqunjilu($a){
      $mysql=new SqlHelper();
      $sql="select * from qunjilu where qunhao='$a'";
      return $mysql->dql($sql);
    }
    function getqunchengyuan($a){
      $mysql=new SqlHelper();
      $sql="select qq from qun where qunhao='$a'";
      return $mysql->dql($sql);
    }
    function sendxinxi($x0,$x1,$x2){
      $mysql=new SqlHelper();
      $sql="insert into jilu values(null,'$x0','$x1','$x2',now(),'1','1')";
      return $mysql->dml($sql); 
    }
    function sendqunxinxi($x0,$x1,$x2,$x3,$x4){
      $mysql=new SqlHelper();
      $sql="insert into qunjilu values(null,'$x0','$x1','$x2','$x3','$x4',now())";
      return $mysql->dml($sql); 
    }
    function getxinxi($x0,$x1){
      $mysql=new SqlHelper();
      $sql="select * from jilu where (sendqq='$x0' and getqq='$x1') or (sendqq='$x1' and getqq='$x0')";
      return $mysql->dql($sql); 
    }
    function isget($x0,$x1){
      $mysql=new SqlHelper();
      $sql="select * from jilu where (sendqq='$x0' and getqq='$x1') or (sendqq='$x1' and getqq='$x0') order by id desc limit 0,1";
      return $mysql->find($sql); 
    }
    function removeisget($shijian){
      $mysql=new SqlHelper();
      $sql="update jilu set isget='0' where shijian='$shijian'";
      return $mysql->dml($sql); 
    }
    function removeisget2($shijian){
      $mysql=new SqlHelper();
      $sql="update jilu set isget2='0' where shijian='$shijian'";
      return $mysql->dml($sql); 
    }
    function underline($zh){
      $mysql=new SqlHelper();
      $sql="update user set online='0' where qq='$zh'";
      $mysql->dml($sql);
    }
    function panduanonline($zh){
      $mysql=new SqlHelper();
      $sql="select online from user where qq='$zh'";
      return $mysql->find($sql);
    }
    function addmember($zh,$mm,$wm,$xb){
      $mysql=new SqlHelper();
      $sql="insert into user(qq,mima,wangming,xingbie) values('$zh','$mm','$wm','$xb')";
      return $mysql->dml($sql);
    }
    function addfenzu($qq,$fenzuname){
      $mysql=new SqlHelper();
      $sql="insert into fenzu values(null,'$qq','$fenzuname',null)";
      return $mysql->dml($sql);
    }
    function deletefenzu($qq,$fenzuname){
      $mysql=new SqlHelper();
      $sql="delete from fenzu where qq='$qq' and fenzuname='$fenzuname'";
      return $mysql->dml($sql);
    }
    function deletehaoyou($qq,$haoyouname){
      $mysql=new SqlHelper();
      $sql="delete from fenzu where qq='$qq' and haoyouqq='$haoyouname'";
      return $mysql->dml($sql);
    }
    function panduanfriend($qq,$friendqq){
      $mysql=new SqlHelper();
      $sql="select * from fenzu where (qq='$qq' and haoyouqq='$friendqq')";
      return $mysql->find($sql);
    }
    function addfriend($qq,$friendqq,$fenzu){
      $mysql=new SqlHelper();
      $sql="insert into fenzu values(null,'$qq','$fenzu','$friendqq')";
      $mysql->dml($sql);
      $sql2="insert into fenzu values(null,'$friendqq','$fenzu','$qq')";
      $mysql->dml($sql2);
    }
  }
