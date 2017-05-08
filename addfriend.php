<meta charset="utf8">
<link rel="stylesheet" type="text/css" href="css/style.css"/>
<?php
  require_once "MessageService.class.php";
  $xinxi0=$_GET["xx"];
  $xinxi=explode("and",$xinxi0);  
  //var_dump($xinxi);
 
  $fenzu0=$_GET["zu"];
  $fenzu=explode("and",$fenzu0);                   //要显示的分组列表
?>
<body background="img/1.jpg">
  <div class="addfriend">
    <img src="<?php echo $xinxi[3]; ?>"/>
    <span class="wangming"><?php echo $xinxi[4]; ?></span>
    <span class="gexingqianming"><?php echo $xinxi[5]; ?></span>
    <span class="friendqq">帐号信息：<?php echo $xinxi[1]; ?></span>
    <a href="chatRoom.php" class="fanhui">返回</a>
  </div>
  
  <form action="addfriendProcess.php" method="post" class="formaddfriend">
    <input type="hidden" name="ycy" value="<?php echo $xinxi[1];?>">
  	<span>添加到：</span><select name="fenzuming">
  	<?php
      for($i=0;$i<count($fenzu);$i++){
        echo "<option value='$fenzu[$i]'>";
          echo $fenzu[$i];
        echo "</option>";
      }
    ?>
  	</select>
    <input type="submit" value="确认添加">
  </form>

</body>