<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:77:"D:\Apache\Apache24\htdocs\public/../kindergartion/index\view\index\right.html";i:1500252287;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
  	<meta charset="UTF-8">
  	<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
  	<title>明德幼儿园积分管理系统-管理系统</title>
  	<link rel="stylesheet" href="/static/kindergarten/css/index.css">
  	<script type="text/javascript" src="/static/kindergarten/js/jquery-1.7.2.min.js"></script>
</head>
<body>
<link rel="stylesheet" href="/static/kindergarten/css/index.css">
<script type="text/javascript" src="/static/kindergarten/js/jquery-1.7.2.min.js"></script>

<!-- pc端头部 begin -->
<div class="header_pc">
	<div class="hdIn">
		<div class="logo"><img src="/static/kindergarten/images/logo_pc.png" alt="" width="100"></div>
		<div class="hdright">
			<ul>
				<li class="home"><a href="./?c=index" target='right'>首页</a></li>
				<li class="home">欢迎您！河北省唐山市丰润区悦城明德幼儿园 王秀红</li>
				<li><a href="<?php echo url('touppwd'); ?>" target='right'>修改密码</a></li>
				<li><a href="./?c=index&a=logout" target='right'>退出</a></li>
			</ul>
		</div>
	</div>
</div>
<!-- pc端头部 end -->


<!-- 移动端头部 begin -->
<div class="header_yidong">
	<a href="#" class="hyd_l"><img src="/static/kindergarten/images/logo_yd.png" alt=""></a>
	<a href="#" class="hyd_r"><img src="/static/kindergarten/images/logoyd_r.png" alt=""></a>

</div>
<!-- 移动端头部 end -->
<!-- 轮播 begin -->
<div id="slider" class="swipe">
    <div class="swipe-wrap">
      	<!-- <figure>
      	        	<div class="wrap"><img src="/static/kindergarten/images/01.jpg"></div>
      	</figure> -->

      	<figure>
        	<div class="wrap"><img src="/static/kindergarten/images/02.jpg"></div>
      	</figure>
    </div>

   <!--  <ol id="circle">
   	<li class="current"></li>
   	<li></li>
   </ol> -->
</div>

<!-- 轮播 end -->
<!-- 幼儿园名称 begin -->
<div class="yr_tilte">
	<h3>河北省唐山市丰润区悦城明德幼儿园</h3>
	<span>——王秀红（园长）</span>
</div>
<!-- 幼儿园名称 end -->

<!-- 中间内容 begin -->
<div class="con">
	<div class="title">河北省唐山市丰润区悦城明德幼儿园</div>
	<div class="conIn" id="conW">
		<ul>
						<li>
				<a href="<?php echo url('userinfo'); ?>">
					<img src="/static/kindergarten/images/wodezh.png" alt="" >
					<p>个人信息</p>
				</a>
			</li>
									<li>
				<a href="<?php echo url('waitVerify'); ?>">
					<img src="/static/kindergarten/images/wait.png" alt="" >
					<p>等待审核</p>
				</a>
			</li>
			<li>
				<a href="<?php echo url('myVerify'); ?>">
					<img src="/static/kindergarten/images/wodesk.png" alt="" >
					<p>审核记录</p>
				</a>
			</li>
			<li>
				<a href="<?php echo url('myBack'); ?>">
					<img src="/static/kindergarten/images/back.png" alt="" >
					<p>驳回记录</p>
				</a>
			</li>
			<li>
				<a href="<?php echo url('executeList'); ?>">
					<img src="/static/kindergarten/images/jiangxd.png" alt="">
					<p>奖扣下达</p>
				</a>
			</li>
						<li>
				<a href="<?php echo url('ranking'); ?>">
					<img src="/static/kindergarten/images/yuedu.png" alt="">
					<p>月度排名</p>
				</a>
			</li>
			<li>
				<a href="<?php echo url('totalRanking'); ?>">
					<img src="/static/kindergarten/images/zongfen.png" alt="">
					<p>总分排名</p>
				</a>
			</li>
			<li>
				<a href="<?php echo url('teamRank'); ?>">
					<img src="/static/kindergarten/images/teamRank.png" alt="" >
					<p>团队排名</p>
				</a>
			</li>

			<li>
				<a href="<?php echo url('teamList'); ?>">
					<img src="/static/kindergarten/images/team.png" alt="" >
					<p>团队管理</p>
				</a>
			</li>
		
			<li>
				<a href="<?php echo url('userlist',array('temp'=>"2")); ?>">
					<img src="/static/kindergarten/images/laoshilb.png" alt="">
					<p>员工名单</p>
				</a>
			</li>
						<li>
				<a href="<?php echo url('delimitList'); ?>">
					<img src="/static/kindergarten/images/delimit.png" alt="" >
					<p>定义奖扣</p>
				</a>
			</li>
						<li style="display:none">
				<a href="<?php echo url('noticeList'); ?>">
					<img src="/static/kindergarten/images/notice.png" alt="" >
					<p>公告通知</p>
				</a>
			</li>
						<li >
				<a href="<?php echo url('setting'); ?>">
					<img src="/static/kindergarten/images/setting.png" alt="" >
					<p>系统设置</p>
				</a>
			</li>
					</ul>
	</div>
</div>
<!-- 中间内容 end -->

<!-- notice begin 
<div class="notice">
	<div class="no_tupian"><img src="/static/kindergarten/images/notice_yidong.png" alt=""></div>
	<div class="no_title">
		<ul>
			<li><a href="#">我是公告文字我是公告文字1</a></li>
			<li><a href="#">我是公告文字我是公告文字2</a></li>
			<li><a href="#">我是公告文字我是公告文字3</a></li>
		</ul>
	</div>
	<a href="" class="no_more" target="_blank">更多</a>
</div>
 notice end -->

<!--手机版的底部 begin-->
<div class="web">
    <div class="webIn">
        <ul>
            <li>
                <a href="index.html">
                    <img src="/static/kindergarten/images/nav_01_h.png" alt="">
                    <p>首页</p>
                </a>
            </li>
            <li>
                <a href="ranking.html">
                    <img src="/static/kindergarten/images/nav_02_h.png" alt="">
                    <p>月度排行</p>
                </a>
            </li>
            <li>
                <a href="userlist.html">
                    <img src="/static/kindergarten/images/nav_03_h.png" alt="" >
                    <p>员工名单</p>
                </a>
            </li>
            <li>
                <a href="userinfo.html">
                    <img src="/static/kindergarten/images/nav_04_h.png" alt="" >
                    <p>个人信息</p>
                </a>
            </li>
            <li>
                <a href="logout.html">
                    <img src="/static/kindergarten/images/nav_05_h.png" alt="" >
                    <p>退出</p>
                </a>
            </li>
        </ul>
    </div>
</div>
<!--手机版的底部 end-->

<!-- 版权 -->
<div id="bb" style="text-align:center;">
©1guanli.com 版权所有  京ICP备13049583号-6
</div>

<!--cnzz统计代码-->
<div style="display:none">
<script src="https://s4.cnzz.com/z_stat.php?id=1260562880&web_id=1260562880" language="JavaScript"></script>
</div>
<!--cnzz统计代码-->

<!--禁止查看源代码-->
<script> 
document.oncontextmenu=new Function("return false"); 
//document.onselectstart=new Function("return false"); 
event.ctrlKey = new Function("return false;");

//手机监听键盘事件
<!-- 
//平台、设备和操作系统
var system ={
win : false,
mac : false,
xll : false
};
//检测平台
var p = navigator.platform;
system.win = p.indexOf("Win") == 0;
system.mac = p.indexOf("Mac") == 0;
system.x11 = (p == "X11") || (p.indexOf("Linux") == 0);
//跳转语句，如果是手机访问就自动跳转到wap.baidu.com页面
if(system.win||system.mac||system.xll){
    
}else{
    var oldHeight = document.body.scrollHeight; 
    $(window).resize(function(){
        var newHeight = document.body.scrollHeight; 
        if(oldHeight<600 && newHeight<600)
        {
            if(oldHeight==newHeight)
            {
                $('.web').show();
            }
            else{
                $('.web').hide();
            }  
        }
    });
}
-->
</script>    

<!-- 幻灯 begin -->
 <script type="text/javascript" src="/static/kindergarten/js/swipe.js"></script>
<script type="text/javascript" src="/static/kindergarten/js/huandeng.js"></script>
<!-- 幻灯 end -->
<!-- noticejs begin -->
<!-- <script type="text/javascript" src="/static/kindergarten/js/notice.js"></script> -->
</body>
</html>
<script type="text/javascript">
function pcfun()
{
	var conliL = $('#conW li').length; 
	var conliLL = $('#conW li').length-1; 
	var conliW = $('#conW li').width();
	var conW = (conliW*conliL)+conliLL*55;
	if( conliL > 9 )
	{
		$('#conW').css('width',1000+'px');
		$('#conW ul').css('width',1100+'px');
	}
	else{
		$('#conW').css('width',conW+'px');
		$('#conW ul').css('width',conW+55+'px');
	}
	
}
if( $(window).width() > 999 )
{
	pcfun();
}
</script>