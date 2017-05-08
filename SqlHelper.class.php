<?php 
  error_reporting(E_ALL ^ E_DEPRECATED);
  class SqlHelper{
    private $hostname="";
    private $username="";
    private $password="";
    private $dbname="";
    private $ut="";
    private $conn;
    function __construct(){
      $this->hostname="localhost";
      $this->username="root";
      $this->password="";
      $this->dbname="chat";
      $this->ut="utf8";
      $this->conn=mysql_connect($this->hostname,$this->username,$this->password) or die("连接数据库失败！");
      mysql_query("set names ".$this->ut) or die("设置编码格式失败！");
      mysql_select_db($this->dbname) or die("选择数据库失败！");;
    }
    function dml($sql){
      $result=mysql_query($sql,$this->conn) or die(mysql_error());
      if(!$result){
        return 0;
      }else{
        return 1;
      }
    }
    function dql($sql){
      $result=mysql_query($sql,$this->conn) or die(mysql_error());
      if(!$result){
        return 0;
      }
      else{
        $arr=array();
        while($row=mysql_fetch_assoc($result)){
        $arr[]=$row;
        }
        mysql_free_result($result);
        return $arr;
      }
    }
    function find($sql){
      $result=mysql_query($sql,$this->conn) or die(mysql_error());
      if(!$result){
        return 0;
      }
      else{
        $row=mysql_fetch_assoc($result);
        mysql_free_result($result);
        return $row;
      }
    }
    function getfenzu($sql){
      $result=mysql_query($sql,$this->conn) or die(mysql_error());
      if(!$result){
        return 0;
      }
      else{
        $arr=array();
        while($row=mysql_fetch_row($result)){
        $arr[]=$row[2];
        }
        mysql_free_result($result);
        return $arr;
      }
    }
    function gethaoyou($sql){
      $result=mysql_query($sql,$this->conn) or die(mysql_error());
      if(!$result){
        return 0;
      }
      else{
        $arr=array();
        while($row=mysql_fetch_assoc($result)){
        $arr[]=$row;
        }
        mysql_free_result($result);
        return $arr;
      }
    }










  }
