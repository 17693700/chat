<meta charset="utf8">
<?php
  require_once "SqlHelper.class.php";
  class loginProcess{
  	function panduanlogin($zh){
  	  $mysql=new SqlHelper();
  	  $sql="select * from user where qq='$zh'";
      return $mysql->find($sql);
  	}
  }