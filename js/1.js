window.onload=function(){
  var gexingqianming=document.getElementById("gexingqianming");
  var x1=document.getElementById("dian1");
	var x2=document.getElementById("dian2");
	var x3=document.getElementById("dian3");
  var y1=document.getElementById("look1");
  var y2=document.getElementById("small_box");
  var y3=document.getElementById("qun");
	var guanbi=document.getElementById("guanbi");
	var input1=document.getElementById("input1");
	var div2=document.getElementById("div2");
	var qun1=document.getElementsByName("qun1");
	var div210=document.getElementById("div210");
	var div2100=document.getElementById("div2100");
  var div211=document.getElementById("div211");
  var div212=document.getElementById("div212");
  var nrqun=document.getElementById("nrqun");
  var bd1=document.getElementById("bd1");
  var hiddenqunqq=document.getElementById("hiddenqunqq");
  var divwenzi=document.getElementById("divwenzi");
  var qunchengyuan=document.getElementById("qunchengyuan");
  var divqunchengyuan=document.getElementById("divqunchengyuan");
  var friendqq=document.getElementById("friendqq");
  var tijiao=document.getElementById("tijiao");
  var tianjiafenzu=document.getElementById("tianjiafenzu");
    function getClass(class_name,tag_name){
        var checkChat;
        if (document.getElementsByClassName){
                checkChat = document.getElementsByClassName(class_name);
                return checkChat;
        }else{
                if(tag_name == null){tag_name = "*";}
                        var tags = document.getElementsByTagName(tag_name);
                        var checkChat = new Array();
                        for(var i=0,j=0; i<tags.length; i++){
                                var attr_class_name = " " + tags[i].className + " ";        //加上" "只是为了给原class属性值左右加上一个空格符
                                if(attr_class_name.indexOf(" " + class_name + " ") != -1){        //这里加上" "是为了让寻找的class是一个单独的class，避免出现找div3，却出现div345的现象。
                                        checkChat[j++] = tags[i];
                        }
                }
               // alert(checkChat.length);
                return checkChat;
        }
    }
    var checkChat = getClass("checkChats");


    divwenzi.scrollTop=divwenzi.scrollHeight;//默认显示滚动条最下面的内容


    gexingqianming.onblur=function(){
      tijiaoqianming();
    }

    g("mywangming").onblur=function(){
      tijiaowangming();
    }

    div210.onclick=function(){
      divwenzi.style.display="none";
      divqunchengyuan.style.display="block";
      div210.style.display="none";
      div2100.style.display="block";
      div211.innerHTML="群成员";
    }
    div2100.onclick=function(){
    	divwenzi.style.display="block";
      divqunchengyuan.style.display="none";
      div2100.style.display="none";
      div210.style.display="block";
      div211.innerHTML='群聊';
    }

    div212.onclick=function(){
       div2.style.display="none";
    }

	guanbi.onmouseover=function(){
      guanbi.style.background='url(img/close2.png)';   
	}
	guanbi.onclick=function(){
      location.href="removeSession.php";
          
	}
	guanbi.onmouseout=function(){
      guanbi.style.background='url(img/close.png)';   
	}
	input1.onfocus=function(){
    input1.value="";
  }
  input1.onblur=function(){
    input1.value="添加联系人，讨论组，群，企业";
  }
  tianjiafenzu.onfocus=function(){
    tianjiafenzu.value="";
  }
  tianjiafenzu.onblur=function(){
    tianjiafenzu.value="添加分组";
  }
	x1.onclick=function(){
	  y1.style.display='block';
	  y2.style.display='none';
	  y3.style.display='none';
    x1.className='tdclick';
    x2.className='';
    x3.className='';
	}
    x2.onclick=function(){
	  y2.style.display='block';
	  y1.style.display='none';
	  y3.style.display='none';
    x2.className='tdclick';
    x1.className='';
    x3.className='';
	}
	x3.onclick=function(){
	  y3.style.display='block';
	  y1.style.display='none';
	  y2.style.display='none';
    x3.className='tdclick';
    x1.className='';
    x2.className='';
	}
  for(var j=0;j<checkChat.length;j++){                 //循环在当前页面跟不同人聊天
      checkChat[j].onclick=function(){
      div211.innerHTML=this.childNodes[1].innerHTML;
      friendqq.value=this.childNodes[2].innerHTML;
      //sendmessage();
      //hiddenqunqq.value=0;

      getmessage(); 
    }
  }



}




                                    /*   ajax部分      */

      function tijiaowangming(){
        var qq=g("hiddensession"); 
        var wangming=g("mywangming");                               //我的QQ
        var xmlhttp;
        if(window.XMLHttpRequest){
          xmlhttp=new XMLHttpRequest();
        }
        else{
          xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
        var url="SendMessageController.php";
        var x="id00="+qq.value+"&id11="+wangming.value;
        xmlhttp.open("post",url,true);
        xmlhttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
        xmlhttp.send(x);
      }
                                    
      function tijiaoqianming(){
        var qq=g("hiddensession"); 
        var qianming=g("gexingqianming");                               //我的QQ
        var xmlhttp;
        if(window.XMLHttpRequest){
          xmlhttp=new XMLHttpRequest();
        }
        else{
          xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
        var url="SendMessageController.php";
        var x="id0="+qq.value+"&id1="+qianming.value;
        xmlhttp.open("post",url,true);
        xmlhttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
        xmlhttp.send(x);
      }

      function sendmessage(){
        var xinxi=g("xinxi");                      //content
        var qq=g("hiddensession");                 //my qq
        var friend=g("friendqq");                  //friend qq
        //alert(qq.value);                         //需要我QQ，对发QQ，发送的内容
        //alert(arr.length);
        var xmlhttp;
        if(window.XMLHttpRequest){
          xmlhttp=new XMLHttpRequest();
        }
        else{
          xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
        var url="SendMessageController.php";
        if(g("hiddenqunqq").value=="1"){
          var xx="qq="+qq.value+"&qunhao="+friend.value+"&xinxi="+xinxi.value;
          xmlhttp.open("post",url,true);
          xmlhttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
          xmlhttp.onreadystatechange=function(){
	          if(xmlhttp.readyState==4&&xmlhttp.status==200){
	              getqunmessage();
	          }
          }
          xmlhttp.send(xx);
          xinxi.value="";  
        }
        else if(g("hiddenqunqq").value=="2"){
          var xx="x0="+qq.value+"&x1="+friend.value+"&x2="+xinxi.value;
          xmlhttp.open("post",url,true);
          xmlhttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
          xmlhttp.onreadystatechange=function(){
	          if(xmlhttp.readyState==4&&xmlhttp.status==200){
	              getmessage();
	          }
          }



          xmlhttp.send(xx);
          xinxi.value=""; 
        }
        return false;
      }

      function getmessage(){
        var qq=g("hiddensession");                                //我的QQ
        var friend=g("friendqq");                                 //对方QQ
        var xianshi=g("divwenzi");                                //要被显示的div
        xianshi.innerHTML="";
        //alert(qq.value);                                        //需要传我的QQ和对方好友QQ
        var xmlhttp;
        if(window.XMLHttpRequest){
          xmlhttp=new XMLHttpRequest();
        }
        else{
          xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
        var url="GetMessageController.php";
        var x="x0="+qq.value+"&x1="+friend.value;
        xmlhttp.open("post",url,true);
        xmlhttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
        xmlhttp.onreadystatechange=function(){
          if(xmlhttp.readyState==4&&xmlhttp.status==200){
  
              var mes=xmlhttp.responseXML.getElementsByTagName("mes"); 
              //xianshi.innerHTML=mes[0].childNodes[4].childNodes[0].nodeValue;     //聊天信息
              for(var i=0;i<mes.length;i++){
                var son=document.createElement("div");                  //父标记divwenzikuai
                if(mes[i].childNodes[2].childNodes[0].nodeValue==qq.value){
                  son.className="divwenzikuai2"; 
                }
                else{
                  son.className="divwenzikuai"; 
                }
                var sonimg=document.createElement("img");               //创建头像标记
                sonimg.src=mes[i].childNodes[1].childNodes[0].nodeValue
                son.appendChild(sonimg);
               
                var name=document.createElement("span");                //创建网名标记
                name.className="divwenziname";
                var nr=document.createTextNode(mes[i].childNodes[0].childNodes[0].nodeValue);
                name.appendChild(nr);                                                          
                son.appendChild(name);

                var sonnr=document.createElement("div");                //创建内容标记
                sonnr.className="divwenzi1";
                var wenzi1nr=document.createTextNode(mes[i].childNodes[3].childNodes[0].nodeValue);
                sonnr.appendChild(wenzi1nr); 
                son.appendChild(sonnr);

                var sonshijian=document.createElement("div");           //创建时间标记
                sonshijian.className="divwenzi2";
                var wenzi2nr=document.createTextNode(mes[i].childNodes[4].childNodes[0].nodeValue);
                sonshijian.appendChild(wenzi2nr); 
                son.appendChild(sonshijian);

                xianshi.appendChild(son);
                //var nr=document.createTextNode(mes[i].childNodes[4].childNodes[0].nodeValue);
              }
              xianshi.scrollTop=xianshi.scrollHeight;//默认显示滚动条最下面的内容
          }
        }
        xmlhttp.send(x);
      }

      function getqunmessage(){
        var qq=g("hiddensession");                                //我的QQ
        var qunhao=g("friendqq");                                 //群号
        var xianshi=g("divwenzi");                                //要被显示的div
        xianshi.innerHTML="";
        var xmlhttp;
        if(window.XMLHttpRequest){
          xmlhttp=new XMLHttpRequest();
        }
        else{
          xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
        var url="GetQunMessageController.php";
        var x="qun0="+qq.value+"&qun1="+qunhao.value;
        xmlhttp.open("post",url,true);
        xmlhttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
        xmlhttp.onreadystatechange=function(){
          if(xmlhttp.readyState==4&&xmlhttp.status==200){
  
              var mes=xmlhttp.responseXML.getElementsByTagName("mes"); 
              //xianshi.innerHTML=mes[0].childNodes[4].childNodes[0].nodeValue;     //聊天信息
              for(var i=0;i<mes.length;i++){

                var son=document.createElement("div");                  //父标记divwenzikuai
                
                if(mes[i].childNodes[2].childNodes[0].nodeValue==qq.value){
                  son.className="divwenzikuai2"; 
                }
                else{
                  son.className="divwenzikuai"; 
                }

                var sonimg=document.createElement("img");               //创建头像标记
                sonimg.src=mes[i].childNodes[1].childNodes[0].nodeValue
                son.appendChild(sonimg);
               
                var name=document.createElement("span");                //创建网名标记
                name.className="divwenziname";
                var nr=document.createTextNode(mes[i].childNodes[0].childNodes[0].nodeValue);
                name.appendChild(nr);                                                          
                son.appendChild(name);

                var sonnr=document.createElement("div");                //创建内容标记
                sonnr.className="divwenzi1";
                var wenzi1nr=document.createTextNode(mes[i].childNodes[3].childNodes[0].nodeValue);
                sonnr.appendChild(wenzi1nr); 
                son.appendChild(sonnr);

                var sonshijian=document.createElement("div");           //创建时间标记
                sonshijian.className="divwenzi2";
                var wenzi2nr=document.createTextNode(mes[i].childNodes[4].childNodes[0].nodeValue);
                sonshijian.appendChild(wenzi2nr); 
                son.appendChild(sonshijian);

                xianshi.appendChild(son);

              }
              xianshi.scrollTop=xianshi.scrollHeight;//默认显示滚动条最下面的内容
          }
        }
        xmlhttp.send(x);
      }

      function isget(){
        var qq=g("hiddensession");                                //我的QQ
        var friend=g("friendqq");                                 //对方QQ
        //alert(qq.value);                                        //需要传我的QQ和对方好友QQ
        var xmlhttp;
        if(window.XMLHttpRequest){
          xmlhttp=new XMLHttpRequest();
        }
        else{
          xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
        var url="GetMessage.php";
        var x="x0="+qq.value+"&x1="+friend.value;
        xmlhttp.open("post",url,true);
        xmlhttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
        xmlhttp.onreadystatechange=function(){
          if(xmlhttp.readyState==4&&xmlhttp.status==200){
  
              var mes=xmlhttp.responseXML.getElementsByTagName("mes"); 
              //alert(mes[0].childNodes[0].nodeValue);
              if(mes[0].childNodes[0].nodeValue==1){
                 getmessage();
              }
          }
        }
        xmlhttp.send(x);
      }

      function getqunchengyuan(){
        var qunhao=g("friendqq");                                 //群号
        var xianshi=g("divqunchengyuan");                                //要被显示的div
        xianshi.innerHTML="";
        var xmlhttp;
        if(window.XMLHttpRequest){
          xmlhttp=new XMLHttpRequest();
        }
        else{
          xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
        var url="GetQunChengyuanController.php";
        var x="qunhao="+qunhao.value;
        xmlhttp.open("post",url,true);
        xmlhttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded");

        xmlhttp.onreadystatechange=function(){
          if(xmlhttp.readyState==4&&xmlhttp.status==200){
  
              var mes=xmlhttp.responseXML.getElementsByTagName("mes"); 
              //头像：mes[0].childNodes[0].childNodes[0].nodeValue
              //网名：mes[0].childNodes[1].childNodes[0].nodeValue
              //在线：mes[0].childNodes[2].childNodes[0].nodeValue
              var ull=document.createElement("ul");
              ull.className="ul3";

              /*var divv=document.createElement("div");
              divv.className="chengyuan";
              var nrr=document.createTextNode("群成员");
              divv.appendChild(nrr); 
              ull.appendChild(divv);*/

              for(var i=0;i<mes.length;i++){
                var lii=document.createElement("li");

                var sonimg=document.createElement("img");               //创建头像标记
                sonimg.src=mes[i].childNodes[0].childNodes[0].nodeValue;
                lii.appendChild(sonimg);

                var name=document.createElement("span");                //创建网名标记
                var nr=document.createTextNode(mes[i].childNodes[1].childNodes[0].nodeValue);
                name.appendChild(nr);  
                lii.appendChild(name);                                                          
                ull.appendChild(lii);
                xianshi.appendChild(ull);
              }



          }
          xianshi.scrollTop=xianshi.scrollHeight;//默认显示滚动条最下面的内容 
        }
        xmlhttp.send(x);
      }





      function g(x){
        return document.getElementById(x);
      }

      window.setInterval("isget()",3000); 











                                  /*      jquary部分      */
                                  

$(function(){

  $(".welcome").animate({
    opacity:1
  },0,'',function(){
    $(".welcome").animate({
      left:20
    },300)
  });

  $(".div1").slideDown();
  
	$("#small_box dt").addClass("xs");
	$("#small_box dd").hide();
	$("#small_box dt").click(function(){
	  $(this).toggleClass("xx").siblings("dd").removeClass("xx");
		$(this).parent().find('dd').removeClass("menu_chioce");
		$(".menu_chioce").slideUp(); 
		$(this).parent().find('dd').slideToggle(200);	
	});

  //$("#chancetouxiang").hide();
  $("#touxiang").click(function(){
      $("#divxinxi").fadeOut(200);
      $("#chancetouxiang").fadeIn(200);
  });
  $("#chancetouxiang img").click(function(){
      var img="img/touxiang"+$(this).index()+".png";
      var send_data={"t0":$("#hiddensession").val(),"t1":img};
      var xmlhttprequest=$.post("SendMessageController.php",send_data,function(data,textStatus){});
      $("#touxiang img").attr("src",img);
      $("#divxinxi").fadeIn(200);
      $("#chancetouxiang").fadeOut(200);
  });
  $("#small_box dd").click(function(){
    $("#div2").show();
    $("#hiddenqunqq").val(2);
  });
  $(".ulqun li").click(function(){
    $("#div2").show();
  });
  $(".ulqun li").click(function(){                     //循环在当前页面跟不同群聊天
    $("#div211").html($(this).find("span").text());
    $("#friendqq").val($(this).find("p").text());
    $("#hiddenqunqq").val(1);
    getqunmessage(); 
    getqunchengyuan();
  });





})