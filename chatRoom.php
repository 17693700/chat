<meta charset="utf8"> 
<link rel="stylesheet" type="text/css" href="css/style.css"/>
<script src="./js/jquery.min.js"></script>
<script src="./js/1.js"></script>
<?php   
  require_once "messageProcess.php";
  session_start();
  if(isset($_COOKIE["zidong"])){
    $_SESSION["qq"]=$_COOKIE["zidong"];
  }
  $qq=$_SESSION["qq"];
  $xinxi=gerenxinxi($qq);
  online($qq);                                         //设置为在线
  $arr=getfenzu($qq);
  $a=gethaoyou($qq,$arr);  
  $qun=getqun($qq);
?>
<body background="img/1.jpg">
  <div class="div1" onclick="isonline();">
   <div id="divxinxi">
    <div class="guanbi" id="guanbi"></div>
    <div class="touxiang" id="touxiang"><img src="<?php echo $xinxi["touxiang"]; ?>"></div>
    <input type="text" class="name1" id="mywangming" value="<?php echo $xinxi["wangming"]; ?>"/>
	  <!--div class="name2"></div-->
    <input type="text" class="name2" id="gexingqianming" value="<?php echo $xinxi["gexingqianming"]; ?>"/>
   </div> 
  <div class="chancetouxiang" id="chancetouxiang">
        <img src="img/touxiang0.png">
        <img src="img/touxiang1.png">
        <img src="img/touxiang2.png">
        <img src="img/touxiang3.png">
        <img src="img/touxiang4.png">
        <img src="img/touxiang5.png">
        <img src="img/touxiang6.png">
        <img src="img/touxiang7.png">
        <img src="img/touxiang8.png">
        <img src="img/touxiang9.png">
        <img src="img/touxiang10.png">
        <img src="img/touxiang11.png">
  </div>
  <form class="bd" action="addfriendProcess.php" method="post">
	  <input class="input1" id="input1" type="text" name="rearch" width="100" value="添加联系人，讨论组，群，企业"/>
	  <input type="hidden" name="yc" id="hiddensession" value="<?php echo $qq; ?>">
    <input class="input2" type="submit" value=""/>
	</form>

	<table class="table1" cellpadding="0" cellpadding="0">
	  <tr>
	    <td id="dian1"><img src="img/huihua.png"></td>
		  <td id="dian2"><img src="img/huidanren.png"></td>
		  <td id="dian3"><img src="img/huiduoren.png"></td>
	  </tr>
	</table>
	<ul class="ul1" id="look1"> 
	    <li><img src="img/touxiang2.png"><span class="span1">小木偶</span><span class="span2">12:36</span><span class="span3">最近比较烦</span></li>
      <li><img src="img/touxiang3.png"><span class="span1">叔叔</span><span class="span2">1:36</span><span class="span3">最近比较烦</span></li>
      <li><img src="img/touxiang1.png"><span class="span1">爸爸</span><span class="span2">7:30</span><span class="span3">最近比较烦</span></li>
      <li><img src="img/touxiang4.png"><span class="span1">木偶哥哥</span><span class="span2">5:05</span><span class="span3">最近比较烦</span></li>
      <li><img src="img/touxiang3.png"><span class="span1">木偶姐姐</span><span class="span2">3:36</span><span class="span3">最近比较烦</span></li>
	</ul>
	<div id="small_box" class="small_box" >
    <?php 
       $friend=array();                                     //生成分组和好友列表
       for($ii=0;$ii<count($arr);$ii++){
           for($iii=0;$iii<count($a[$ii]);$iii++){
             $friend[]=$a[$ii][$iii]["haoyouqq"];
           }
       }
       for($ii=0;$ii<count($arr);$ii++){
         echo "<dl id='root'>";
           echo "<dt id='dt$ii'>$arr[$ii]<a href='fenzuProcess.php?id=$arr[$ii]'>×</a></dt>";
           for($iii=0;$iii<count($a[$ii]);$iii++){
             $ziliao=gethaoyouziliao($a[$ii][$iii]["haoyouqq"]);
             if($ziliao){
               echo "<dd class='checkChats'><img src=".$ziliao[0]['touxiang']." align='left' class='haoyouimg'>";
               
                if($ziliao[0]["online"]=="1"){
                  echo "<span class='wangming'>".$ziliao[0]["wangming"]."<span class='online'>（在线）<br/></span></span><span class='friendsqq'>".$ziliao[0]["qq"]."</span>";
                }
                else{
                  echo "<span class='wangming'>".$ziliao[0]["wangming"]."<span class='online'>（离线）<br/></span></span><span class='friendsqq'>".$ziliao[0]["qq"]."</span>"; 
                }
                echo "<span class='gexingqianming'>".$ziliao[0]["gexingqianming"]."</span>";
                //echo "<span class='wangming'>".$ziliao[0]["wangming"]."</span>";
                echo "<span class='hiddenqq'>".$ziliao[0]["qq"]."</span>";
                $haoyoukoukou=$ziliao[0]["qq"];
                echo "<a href='fenzuProcess.php?shanchuqq=$haoyoukoukou'>×</a>";
               echo "</dd>";
             }
           }
         echo "</dl>";
       }
    ?>
  </div>
  <div class="qun" id="qun">
    <ul class="ulqun">
    <?php
      for($j=0;$j<count($qun);$j++){
        echo "<li>";
          echo "<img src='".$qun[$j]['quntouxiang']."'/>";
          echo "<span>".$qun[$j]['qunmingchen']."</span>";
          echo "<p class='hiddenp'>".$qun[$j]['qunhao']."</p>";
        echo "</li>"; 
      }
    ?>
    </ul>
  </div>
  <form action="fenzuProcess.php" method="post">
    <input type="text" value="添加分组" class="tianjiafenzu" name="tianjiafenzu" id="tianjiafenzu"/>
    <input type="submit" class="tjfenzu" value=""/>
  </form>
  </div>




  <div class="div2" id="div2">
  	<div class="div21">
  	  <div class="div210" id="div210">

  	  </div>
  	  <div class="div2100" id="div2100">
  	    返回
  	  </div>
  	  <div class='div211' id='div211'>
  	    
  	  </div>
  	  <div class="div212" id="div212">

  	  </div>
  	</div>
  	<div class="divtouming">
      
    </div>
  	<div class="divwenzi" id="divwenzi">
  	    <!--                                              //显示聊天记录
  	     echo "<div class='divwenzikuai'>";
  	      echo "<img src='$hrr[2]' align='left'>";
  	      echo "&nbsp;&nbsp;".$hrr[3]."<br/><br/>";   
  	      echo "<div class='divwenzi1'>$hrr[5]</div>";
  	      echo "<div class='divwenzi2'>$hrr[4]</div>";
  	     echo "</div>";
  	    -->
  	</div>	
    <div class="divqunchengyuan" id="divqunchengyuan">












  	</div>
  	<div class="div22">
      <div class="div221">
      	<img src="img/touxiangtubiao.png">
      </div>
      <form action="" method="post" name="bd1" id="bd1" onsubmit="return sendmessage();">
        <input type="text" id="xinxi" class="input1"/>
        <input type="hidden" id="friendqq" value=""/>
        <input type="hidden" id="hiddenqunqq" value=""/>
        <input type="image" src="img/send.png" class="input2"/>
      </form>  	
  	</div>
  </div>
</body>