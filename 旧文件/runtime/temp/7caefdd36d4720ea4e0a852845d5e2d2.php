<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:80:"D:\Apache\Apache24\htdocs\public/../kindergartion/index\view\index\userlist.html";i:1500697539;}*/ ?>
 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
    <title>明德幼儿园积分管理系统-用户列表</title>
    <script type="text/javascript" language="javascript" src="/static/kindergarten/js/tuo.js"></script>
    <link href="/static/kindergarten/css/tuo.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="/static/kindergarten/css/index.css">
    <script type="text/javascript" language="javascript" src="/static/kindergarten/js/My97DatePicker/WdatePicker.js"></script>
    <script type="text/javascript" language="javascript" src="/static/kindergarten/js/jquery-1.4.2.min.js"></script>

    <!-- <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script> -->
    <script type="text/javascript" src="/static/kindergarten/script/userlist.js"></script>
</head>
<body>
<div id="overlay"></div> 
<link rel="stylesheet" href="/static/kindergarten/css/index.css">


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
    
    <div class="list">
        <div class="listBtn">
            <h4>员工名单</h4>
            <a href="javascript:history.go(-1);" class="add home">返回</a>
                        <a href="javascript:show('addstu')" class="add">添加</a>
            <a href="./?c=index&a=userlist&state=1" class="add" id="z1">离职</a>
            <a href="./?c=index&a=userlist&state=0" class="add" id="z0">在职</a>
            <div class="rili home">
                <form action="./?c=index&a=userlist" method="post" onsubmit="return  checkselectform()">
                    <div><input type="text" name="keyword" id="keyword" value="" size="8" ></div>
                    <div class="rilisub"><input type="submit" value="搜索" class="add"  ></div>
                </form>
            </div>
                    </div>
        <div class="listTab">
            <table id="tab" border="0" cellspacing="0" cellpadding="0">
                <tr class="tr01"> 
                    <td>编号</td>
                    <td>姓名</td>
                    <td>性别</td>
                    <td>手机号</td>
                    <td>婚姻</td>
                    <td>生日</td>
                    <td>学历</td>
                    <td>资格证</td>
                    <td style="display:none">荣誉</td>
                    <td>职务</td>
                    <td>直属领导</td>
                    <td>入职时间</td>
                    <td>修改时间</td>
                    <td>操作</td>
                </tr>

                <tr>
                    <td align="center">1</td>
                    <td>王鑫玥</td>
                    <td>女</td>
                    <td>15030570809</td>
                    <td>未婚</td>  
                    <td>1998-09-29</td>         
                    <td>中专及以下</td>
                    <td>无</td>
                    <td  style="display:none">无</td>
                    <td>员工</td>
                    <td>班级主管</td>
                    <td>2016/08/08</td>
                    <td>  </td>
                    <td align="center">
                        <a href="javascript:upuser(10866)">修改</a> |
                        <a href="./?c=integral&a=details&uid=10866">记录</a>
                    </td>
                </tr>
                <?php if(is_array($list_user) || $list_user instanceof \think\Collection || $list_user instanceof \think\Paginator): $i = 0; $__LIST__ = $list_user;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$user_list): $mod = ($i % 2 );++$i;?> 
                <tr style="background-color:#f7f8f8">
                    <td colspan="14"><?php echo $key; ?></td>
                </tr>
                <?php if(is_array($user_list) || $user_list instanceof \think\Collection || $user_list instanceof \think\Paginator): $i = 0; $__LIST__ = $user_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$user): $mod = ($i % 2 );++$i;?> 
                <tr>
                    <td align="center"><?php echo $temp_i++; ?></td>
                    <td><?php echo $user['name']; ?></td>
                    <td><?php echo $user['sex']; ?></td>
                    <td><?php echo $user['tel']; ?></td>
                    <td><?php echo $user['marriage']; ?></td>  
                    <td><?php echo $user['birthday']; ?></td>         
                    <td><?php echo $user['education']; ?></td>
                    <td><?php echo $user['qualification']; ?></td>
                    <td  style="display:none">无</td>
                    <td><?php echo $user['post']; ?></td>
                    <td><?php echo $user['leader']; ?></td>
                    <td><?php echo $user['entry_time']; ?></td>
                    <td><?php echo $user['mod_time']; ?></td>
                    <td align="center">
                        <a href="javascript:upuser(<?php echo $user['id']; ?>)">修改</a> |
                        <a href="./?c=integral&a=details&uid=11134">记录</a>
                    </td>
                </tr>
                <?php endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; ?>
                <tr style="background-color:#f7f8f8">
                    <td colspan="14">G</td>
                </tr>
                <tr>
                    <td align="center">3</td>
                    <td>高艳军</td>
                    <td>女</td>
                    <td>15131598234</td>
                                    <td>已婚</td>  
                    <td>1984-03-08</td>         
                    <td>中专及以下</td>
                    <td>
                                            无
                                        </td>
                    <td  style="display:none">
                                            无
                                        </td>
                    <td>员工</td>
                    <td>后勤主管</td>
                    <td>2017/05/15</td>
                                                    <td>
                                            </td>
                    <td align="center">
                                                <a href="javascript:upuser(11595)">修改</a> |
                        <a href="./?c=integral&a=details&uid=11595">记录</a>
                                            </td>
                                </tr>
                                                <tr>
                    <td align="center">4</td>
                    <td>郭伟庭</td>
                    <td>女</td>
                    <td>18230247421</td>
                                    <td>未婚</td>  
                    <td>1996-12-24</td>         
                    <td>大专</td>
                    <td>
                                            无
                                        </td>
                    <td  style="display:none">
                                            无
                                        </td>
                    <td>员工</td>
                    <td>班级主管</td>
                    <td>2017/03/22</td>
                                                    <td>
                                            </td>
                    <td align="center">
                                                <a href="javascript:upuser(11141)">修改</a> |
                        <a href="./?c=integral&a=details&uid=11141">记录</a>
                                            </td>
                                </tr>
                                                <tr>
                    <td align="center">5</td>
                    <td>高韬</td>
                    <td>女</td>
                    <td>15033322851</td>
                                    <td>已婚</td>  
                    <td>1990-08-16</td>         
                    <td>大专</td>
                    <td>
                                            教师资格证
                                        </td>
                    <td  style="display:none">
                                            无
                                        </td>
                    <td>员工</td>
                    <td>后勤主管</td>
                    <td>2017/03/09</td>
                                                    <td>
                                                    2017/03/27
                                            </td>
                    <td align="center">
                                                <a href="javascript:upuser(10896)">修改</a> |
                        <a href="./?c=integral&a=details&uid=10896">记录</a>
                                            </td>
                                </tr>
                                                <tr style="background-color:#f7f8f8">
                    <td colspan="14">H</td>
                </tr>
                                <tr>
                    <td align="center">6</td>
                    <td>何允红</td>
                    <td>女</td>
                    <td>13703254051</td>
                                    <td>已婚</td>  
                    <td>1978-09-21</td>         
                    <td>中专及以下</td>
                    <td>
                                            无
                                        </td>
                    <td  style="display:none">
                                            无
                                        </td>
                    <td>员工</td>
                    <td>后勤主管</td>
                    <td>2015/09/28</td>
                                                    <td>
                                            </td>
                    <td align="center">
                                                <a href="javascript:upuser(11602)">修改</a> |
                        <a href="./?c=integral&a=details&uid=11602">记录</a>
                                            </td>
                                </tr>
                                                <tr>
                    <td align="center">7</td>
                    <td>胡瑞文</td>
                    <td>男</td>
                    <td>13231519284</td>
                                    <td>已婚</td>  
                    <td>1962-09-29</td>         
                    <td>中专及以下</td>
                    <td>
                                            无
                                        </td>
                    <td  style="display:none">
                                            无
                                        </td>
                    <td>员工</td>
                    <td>后勤主管</td>
                    <td>2015/08/02</td>
                                                    <td>
                                            </td>
                    <td align="center">
                                                <a href="javascript:upuser(11600)">修改</a> |
                        <a href="./?c=integral&a=details&uid=11600">记录</a>
                                            </td>
                                </tr>
                                                <tr>
                    <td align="center">8</td>
                    <td>黄鑫</td>
                    <td>女</td>
                    <td>18233567027</td>
                                    <td>未婚</td>  
                    <td>1994-12-19</td>         
                    <td>大专</td>
                    <td>
                                            教师资格证
                                        </td>
                    <td  style="display:none">
                                            无
                                        </td>
                    <td>员工</td>
                    <td>班级主管</td>
                    <td>2016/10/17</td>
                                                    <td>
                                                    2017/04/29
                                            </td>
                    <td align="center">
                                                <a href="javascript:upuser(10882)">修改</a> |
                        <a href="./?c=integral&a=details&uid=10882">记录</a>
                                            </td>
                                </tr>
                                                <tr style="background-color:#f7f8f8">
                    <td colspan="14">L</td>
                </tr>
                                <tr>
                    <td align="center">9</td>
                    <td>兰玉宏</td>
                    <td>女</td>
                    <td>18031531570</td>
                                    <td>已婚</td>  
                    <td>1973-05-02</td>         
                    <td>中专及以下</td>
                    <td>
                                            无
                                        </td>
                    <td  style="display:none">
                                            无
                                        </td>
                    <td>员工</td>
                    <td>后勤主管</td>
                    <td>2016/10/21</td>
                                                    <td>
                                            </td>
                    <td align="center">
                                                <a href="javascript:upuser(11603)">修改</a> |
                        <a href="./?c=integral&a=details&uid=11603">记录</a>
                                            </td>
                                </tr>
                                                <tr>
                    <td align="center">10</td>
                    <td>骆银婷</td>
                    <td>女</td>
                    <td>15930516768</td>
                                    <td>未婚</td>  
                    <td>1994-07-22</td>         
                    <td>大专</td>
                    <td>
                                            无
                                        </td>
                    <td  style="display:none">
                                            无
                                        </td>
                    <td>员工</td>
                    <td>班级主管</td>
                    <td>2017/03/17</td>
                                                    <td>
                                                    2017/03/27
                                            </td>
                    <td align="center">
                                                <a href="javascript:upuser(11138)">修改</a> |
                        <a href="./?c=integral&a=details&uid=11138">记录</a>
                                            </td>
                                </tr>
                                                <tr>
                    <td align="center">11</td>
                    <td>刘圆</td>
                    <td>女</td>
                    <td>18713529186</td>
                                    <td>未婚</td>  
                    <td>1995-03-22</td>         
                    <td>大专</td>
                    <td>
                                            无
                                        </td>
                    <td  style="display:none">
                                            无
                                        </td>
                    <td>员工</td>
                    <td>后勤主管</td>
                    <td>2016/06/20</td>
                                                    <td>
                                            </td>
                    <td align="center">
                                                <a href="javascript:upuser(11213)">修改</a> |
                        <a href="./?c=integral&a=details&uid=11213">记录</a>
                                            </td>
                                </tr>
                                                <tr>
                    <td align="center">12</td>
                    <td>李志刚</td>
                    <td>男</td>
                    <td>18632567392</td>
                                    <td>已婚</td>  
                    <td>1977-11-10</td>         
                    <td>中专及以下</td>
                    <td>
                                            无
                                        </td>
                    <td  style="display:none">
                                            无
                                        </td>
                    <td>员工</td>
                    <td>后勤主管</td>
                    <td>2015/08/21</td>
                                                    <td>
                                            </td>
                    <td align="center">
                                                <a href="javascript:upuser(11601)">修改</a> |
                        <a href="./?c=integral&a=details&uid=11601">记录</a>
                                            </td>
                                </tr>
                                                <tr>
                    <td align="center">13</td>
                    <td>刘国建</td>
                    <td>女</td>
                    <td>15027495252</td>
                                    <td>已婚</td>  
                    <td>1985-03-21</td>         
                    <td>中专及以下</td>
                    <td>
                                            无
                                        </td>
                    <td  style="display:none">
                                            无
                                        </td>
                    <td>员工</td>
                    <td>后勤主管</td>
                    <td>2016/08/10</td>
                                                    <td>
                                            </td>
                    <td align="center">
                                                <a href="javascript:upuser(10848)">修改</a> |
                        <a href="./?c=integral&a=details&uid=10848">记录</a>
                                            </td>
                                </tr>
                                                <tr>
                    <td align="center">14</td>
                    <td>李茜</td>
                    <td>女</td>
                    <td>15133946521</td>
                                    <td>已婚</td>  
                    <td>1986-02-24</td>         
                    <td>大专</td>
                    <td>
                                            无
                                        </td>
                    <td  style="display:none">
                                            无
                                        </td>
                    <td>员工</td>
                    <td>后勤主管</td>
                    <td>2016/09/05</td>
                                                    <td>
                                            </td>
                    <td align="center">
                                                <a href="javascript:upuser(10869)">修改</a> |
                        <a href="./?c=integral&a=details&uid=10869">记录</a>
                                            </td>
                                </tr>
                                                <tr>
                    <td align="center">15</td>
                    <td>李晶</td>
                    <td>女</td>
                    <td>15373159880</td>
                                    <td>已婚</td>  
                    <td>1989-04-07</td>         
                    <td>大专</td>
                    <td>
                                            教师资格证
                                        </td>
                    <td  style="display:none">
                                            无
                                        </td>
                    <td>班级主管</td>
                    <td></td>
                    <td>2016/02/29</td>
                                                    <td>
                                                    2017/03/24
                                            </td>
                    <td align="center">
                                                <a href="javascript:upuser(10750)">修改</a> |
                        <a href="./?c=integral&a=details&uid=10750">记录</a>
                                            </td>
                                </tr>
                                                <tr>
                    <td align="center">16</td>
                    <td>刘娜</td>
                    <td>女</td>
                    <td>18332656197</td>
                                    <td>未婚</td>  
                    <td>1996-07-15</td>         
                    <td>大专</td>
                    <td>
                                            教师资格证
                                        </td>
                    <td  style="display:none">
                                            无
                                        </td>
                    <td>员工</td>
                    <td>班级主管</td>
                    <td>2016/06/02</td>
                                                    <td>
                                                    2017/03/27
                                            </td>
                    <td align="center">
                                                <a href="javascript:upuser(10808)">修改</a> |
                        <a href="./?c=integral&a=details&uid=10808">记录</a>
                                            </td>
                                </tr>
                                                <tr>
                    <td align="center">17</td>
                    <td>刘颖</td>
                    <td>女</td>
                    <td>13383241527</td>
                                    <td>已婚</td>  
                    <td>1986-10-15</td>         
                    <td>中专及以下</td>
                    <td>
                                            无
                                        </td>
                    <td  style="display:none">
                                            无
                                        </td>
                    <td>员工</td>
                    <td>后勤主管</td>
                    <td>2015/05/16</td>
                                                    <td>
                                            </td>
                    <td align="center">
                                                <a href="javascript:upuser(10817)">修改</a> |
                        <a href="./?c=integral&a=details&uid=10817">记录</a>
                                            </td>
                                </tr>
                                                <tr style="background-color:#f7f8f8">
                    <td colspan="14">M</td>
                </tr>
                                <tr>
                    <td align="center">18</td>
                    <td>孟小洁</td>
                    <td>女</td>
                    <td>15176700675</td>
                                    <td>已婚</td>  
                    <td>1989-10-21</td>         
                    <td>大专</td>
                    <td>
                                            教师资格证
                                        </td>
                    <td  style="display:none">
                                            无
                                        </td>
                    <td>员工</td>
                    <td>班级主管</td>
                    <td>2015/10/08</td>
                                                    <td>
                                            </td>
                    <td align="center">
                                                <a href="javascript:upuser(10875)">修改</a> |
                        <a href="./?c=integral&a=details&uid=10875">记录</a>
                                            </td>
                                </tr>
                                                <tr style="background-color:#f7f8f8">
                    <td colspan="14">W</td>
                </tr>
                                <tr>
                    <td align="center">19</td>
                    <td>王顺兴</td>
                    <td>男</td>
                    <td>15832581190</td>
                                    <td>已婚</td>  
                    <td>1967-11-15</td>         
                    <td>中专及以下</td>
                    <td>
                                            无
                                        </td>
                    <td  style="display:none">
                                            无
                                        </td>
                    <td>员工</td>
                    <td>后勤主管</td>
                    <td>2017/04/01</td>
                                                    <td>
                                            </td>
                    <td align="center">
                                                <a href="javascript:upuser(11598)">修改</a> |
                        <a href="./?c=integral&a=details&uid=11598">记录</a>
                                            </td>
                                </tr>
                                                <tr>
                    <td align="center">20</td>
                    <td>王思铭</td>
                    <td>女</td>
                    <td>13933326235</td>
                                    <td>未婚</td>  
                    <td>2000-08-04</td>         
                    <td>中专及以下</td>
                    <td>
                                            无
                                        </td>
                    <td  style="display:none">
                                            无
                                        </td>
                    <td>员工</td>
                    <td>后勤主管</td>
                    <td>2017/02/06</td>
                                                    <td>
                                            </td>
                    <td align="center">
                                                <a href="javascript:upuser(10891)">修改</a> |
                        <a href="./?c=integral&a=details&uid=10891">记录</a>
                                            </td>
                                </tr>
                                                <tr>
                    <td align="center">21</td>
                    <td>王玉莹</td>
                    <td>女</td>
                    <td>15732518377</td>
                                    <td>未婚</td>  
                    <td>1995-08-30</td>         
                    <td>大专</td>
                    <td>
                                            无
                                        </td>
                    <td  style="display:none">
                                            无
                                        </td>
                    <td>员工</td>
                    <td>后勤主管</td>
                    <td>2017/04/06</td>
                                                    <td>
                                            </td>
                    <td align="center">
                                                <a href="javascript:upuser(11318)">修改</a> |
                        <a href="./?c=integral&a=details&uid=11318">记录</a>
                                            </td>
                                </tr>
                                                <tr>
                    <td align="center">22</td>
                    <td>王田甜</td>
                    <td>女</td>
                    <td>15175250730</td>
                                    <td>未婚</td>  
                    <td>1993-08-26</td>         
                    <td>大专</td>
                    <td>
                                            教师资格证
                                        </td>
                    <td  style="display:none">
                                            无
                                        </td>
                    <td>员工</td>
                    <td>班级主管</td>
                    <td>2016/08/22</td>
                                                    <td>
                                            </td>
                    <td align="center">
                                                <a href="javascript:upuser(10823)">修改</a> |
                        <a href="./?c=integral&a=details&uid=10823">记录</a>
                                            </td>
                                </tr>
                                                <tr>
                    <td align="center">23</td>
                    <td>王秀红</td>
                    <td>女</td>
                    <td>17713140443</td>
                                    <td>已婚</td>  
                    <td>1972-03-10</td>         
                    <td>大专</td>
                    <td>
                                            教师资格证
                                        </td>
                    <td  style="display:none">
                                            无
                                        </td>
                    <td>执行园长</td>
                    <td></td>
                    <td>2015/03/15</td>
                                                    <td>
                                                    2017/03/24
                                            </td>
                    <td align="center">
                                                <a href="javascript:upuser(10739)">修改</a> |
                        <a href="./?c=integral&a=details&uid=10739">记录</a>
                                            </td>
                                </tr>
                                                <tr style="background-color:#f7f8f8">
                    <td colspan="14">X</td>
                </tr>
                                <tr>
                    <td align="center">24</td>
                    <td>肖芳</td>
                    <td>女</td>
                    <td>15075510258</td>
                                    <td>已婚</td>  
                    <td>1988-10-25</td>         
                    <td>大专</td>
                    <td>
                                            无
                                        </td>
                    <td  style="display:none">
                                            无
                                        </td>
                    <td>员工</td>
                    <td>后勤主管</td>
                    <td>2016/05/11</td>
                                                    <td>
                                                    2017/03/27
                                            </td>
                    <td align="center">
                                                <a href="javascript:upuser(10871)">修改</a> |
                        <a href="./?c=integral&a=details&uid=10871">记录</a>
                                            </td>
                                </tr>
                                                <tr>
                    <td align="center">25</td>
                    <td>徐亚凤</td>
                    <td>女</td>
                    <td>13613150531</td>
                                    <td>已婚</td>  
                    <td>1984-10-17</td>         
                    <td>大专</td>
                    <td>
                                            无
                                        </td>
                    <td  style="display:none">
                                            无
                                        </td>
                    <td>员工</td>
                    <td>后勤主管</td>
                    <td>2016/08/19</td>
                                                    <td>
                                                    2017/03/27
                                            </td>
                    <td align="center">
                                                <a href="javascript:upuser(10786)">修改</a> |
                        <a href="./?c=integral&a=details&uid=10786">记录</a>
                                            </td>
                                </tr>
                                                <tr>
                    <td align="center">26</td>
                    <td>徐冬雪</td>
                    <td>女</td>
                    <td>17713113315</td>
                                    <td>未婚</td>  
                    <td>1994-12-24</td>         
                    <td>大专</td>
                    <td>
                                            教师资格证
                                        </td>
                    <td  style="display:none">
                                            无
                                        </td>
                    <td>员工</td>
                    <td>班级主管</td>
                    <td>2015/07/08</td>
                                                    <td>
                                                    2017/03/27
                                            </td>
                    <td align="center">
                                                <a href="javascript:upuser(10855)">修改</a> |
                        <a href="./?c=integral&a=details&uid=10855">记录</a>
                                            </td>
                                </tr>
                                                <tr style="background-color:#f7f8f8">
                    <td colspan="14">Y</td>
                </tr>
                                <tr>
                    <td align="center">27</td>
                    <td>杨金鑫</td>
                    <td>女</td>
                    <td>15176699822</td>
                                    <td>已婚</td>  
                    <td>1990-12-22</td>         
                    <td>中专及以下</td>
                    <td>
                                            无
                                        </td>
                    <td  style="display:none">
                                            无
                                        </td>
                    <td>员工</td>
                    <td>班级主管</td>
                    <td>2016/03/16</td>
                                                    <td>
                                            </td>
                    <td align="center">
                                                <a href="javascript:upuser(10759)">修改</a> |
                        <a href="./?c=integral&a=details&uid=10759">记录</a>
                                            </td>
                                </tr>
                                                <tr>
                    <td align="center">28</td>
                    <td>杨蕊</td>
                    <td>女</td>
                    <td>15613895783</td>
                                    <td>未婚</td>  
                    <td>1998-08-06</td>         
                    <td>中专及以下</td>
                    <td>
                                            无
                                        </td>
                    <td  style="display:none">
                                            无
                                        </td>
                    <td>员工</td>
                    <td>班级主管</td>
                    <td>2016/11/21</td>
                                                    <td>
                                            </td>
                    <td align="center">
                                                <a href="javascript:upuser(10884)">修改</a> |
                        <a href="./?c=integral&a=details&uid=10884">记录</a>
                                            </td>
                                </tr>
                                                <tr>
                    <td align="center">29</td>
                    <td>杨馨怡</td>
                    <td>女</td>
                    <td>18332643614</td>
                                    <td>未婚</td>  
                    <td>1999-05-01</td>         
                    <td>中专及以下</td>
                    <td>
                                            无
                                        </td>
                    <td  style="display:none">
                                            无
                                        </td>
                    <td>员工</td>
                    <td>班级主管</td>
                    <td>2017/02/16</td>
                                                    <td>
                                                    2017/03/31
                                            </td>
                    <td align="center">
                                                <a href="javascript:upuser(10888)">修改</a> |
                        <a href="./?c=integral&a=details&uid=10888">记录</a>
                                            </td>
                                </tr>
                                                <tr style="background-color:#f7f8f8">
                    <td colspan="14">Z</td>
                </tr>
                                <tr>
                    <td align="center">30</td>
                    <td>张小娜</td>
                    <td>女</td>
                    <td>18134052268</td>
                                    <td>已婚</td>  
                    <td>1986-12-10</td>         
                    <td>大专</td>
                    <td>
                                            无
                                        </td>
                    <td  style="display:none">
                                            无
                                        </td>
                    <td>员工</td>
                    <td>班级主管</td>
                    <td>2017/05/15</td>
                                                    <td>
                                            </td>
                    <td align="center">
                                                <a href="javascript:upuser(11597)">修改</a> |
                        <a href="./?c=integral&a=details&uid=11597">记录</a>
                                            </td>
                                </tr>
                                                <tr>
                    <td align="center">31</td>
                    <td>张宁</td>
                    <td>女</td>
                    <td>13393054905</td>
                                    <td>已婚</td>  
                    <td>1981-09-05</td>         
                    <td>大专</td>
                    <td>
                                            无
                                        </td>
                    <td  style="display:none">
                                            无
                                        </td>
                    <td>员工</td>
                    <td>班级主管</td>
                    <td>2017/05/15</td>
                                                    <td>
                                            </td>
                    <td align="center">
                                                <a href="javascript:upuser(11596)">修改</a> |
                        <a href="./?c=integral&a=details&uid=11596">记录</a>
                                            </td>
                                </tr>
                                                <tr>
                    <td align="center">32</td>
                    <td>张春利</td>
                    <td>男</td>
                    <td>15373577110</td>
                                    <td>已婚</td>  
                    <td>1969-07-21</td>         
                    <td>中专及以下</td>
                    <td>
                                            无
                                        </td>
                    <td  style="display:none">
                                            无
                                        </td>
                    <td>员工</td>
                    <td>后勤主管</td>
                    <td>2015/08/01</td>
                                                    <td>
                                            </td>
                    <td align="center">
                                                <a href="javascript:upuser(11599)">修改</a> |
                        <a href="./?c=integral&a=details&uid=11599">记录</a>
                                            </td>
                                </tr>
                                                <tr>
                    <td align="center">33</td>
                    <td>郑秀玉</td>
                    <td>女</td>
                    <td>15832532451</td>
                                    <td>已婚</td>  
                    <td>1988-03-28</td>         
                    <td>本科</td>
                    <td>
                                            无
                                        </td>
                    <td  style="display:none">
                                            无
                                        </td>
                    <td>员工</td>
                    <td>班级主管</td>
                    <td>2016/04/27</td>
                                                    <td>
                                                    2017/03/27
                                            </td>
                    <td align="center">
                                                <a href="javascript:upuser(10770)">修改</a> |
                        <a href="./?c=integral&a=details&uid=10770">记录</a>
                                            </td>
                                </tr>
                                                <tr>
                    <td align="center">34</td>
                    <td>张雪</td>
                    <td>女</td>
                    <td>18831311994</td>
                                    <td>未婚</td>  
                    <td>1994-05-22</td>         
                    <td>本科</td>
                    <td>
                                            无
                                        </td>
                    <td  style="display:none">
                                            无
                                        </td>
                    <td>员工</td>
                    <td>班级主管</td>
                    <td>2017/03/20</td>
                                                    <td>
                                            </td>
                    <td align="center">
                                                <a href="javascript:upuser(11140)">修改</a> |
                        <a href="./?c=integral&a=details&uid=11140">记录</a>
                                            </td>
                                </tr>
                                                <tr>
                    <td align="center">35</td>
                    <td>张兵杰</td>
                    <td>女</td>
                    <td>13292570656</td>
                                    <td>已婚</td>  
                    <td>1988-12-16</td>         
                    <td>本科</td>
                    <td>
                                            无
                                        </td>
                    <td  style="display:none">
                                            无
                                        </td>
                    <td>员工</td>
                    <td>班级主管</td>
                    <td>2016/08/15</td>
                                                    <td>
                                                    2017/03/27
                                            </td>
                    <td align="center">
                                                <a href="javascript:upuser(10791)">修改</a> |
                        <a href="./?c=integral&a=details&uid=10791">记录</a>
                                            </td>
                                </tr>
                                                <tr>
                    <td align="center">36</td>
                    <td>周秀蕊</td>
                    <td>女</td>
                    <td>17730507173</td>
                                    <td>未婚</td>  
                    <td>1989-08-25</td>         
                    <td>大专</td>
                    <td>
                                            教师资格证
                                        </td>
                    <td  style="display:none">
                                            无
                                        </td>
                    <td>员工</td>
                    <td>班级主管</td>
                    <td>2015/05/05</td>
                                                    <td>
                                            </td>
                    <td align="center">
                                                <a href="javascript:upuser(10801)">修改</a> |
                        <a href="./?c=integral&a=details&uid=10801">记录</a>
                                            </td>
                                </tr>
                                                <tr>
                    <td align="center">37</td>
                    <td>张婷婷</td>
                    <td>女</td>
                    <td>13343292226</td>
                                    <td>已婚</td>  
                    <td>1989-04-17</td>         
                    <td>中专及以下</td>
                    <td>
                                            无
                                        </td>
                    <td  style="display:none">
                                            无
                                        </td>
                    <td>员工</td>
                    <td>后勤主管</td>
                    <td>2016/10/07</td>
                                                    <td>
                                            </td>
                    <td align="center">
                                                <a href="javascript:upuser(10878)">修改</a> |
                        <a href="./?c=integral&a=details&uid=10878">记录</a>
                                            </td>
                                </tr>
                                                <tr>
                    <td align="center">38</td>
                    <td>赵莉</td>
                    <td>女</td>
                    <td>13363292981</td>
                                    <td>已婚</td>  
                    <td>1987-07-10</td>         
                    <td>大专</td>
                    <td>
                                            无
                                        </td>
                    <td  style="display:none">
                                            无
                                        </td>
                    <td>员工</td>
                    <td>后勤主管</td>
                    <td>2016/04/11</td>
                                                    <td>
                                            </td>
                    <td align="center">
                                                <a href="javascript:upuser(10862)">修改</a> |
                        <a href="./?c=integral&a=details&uid=10862">记录</a>
                                            </td>
                                </tr>
                                                <tr>
                    <td align="center">39</td>
                    <td>章健</td>
                    <td>女</td>
                    <td>15232733880</td>
                                    <td>已婚</td>  
                    <td>1989-03-07</td>         
                    <td>大专</td>
                    <td>
                                            教师资格证
                                        </td>
                    <td  style="display:none">
                                            无
                                        </td>
                    <td>员工</td>
                    <td>班级主管</td>
                    <td>2016/02/15</td>
                                                    <td>
                                            </td>
                    <td align="center">
                                                <a href="javascript:upuser(10860)">修改</a> |
                        <a href="./?c=integral&a=details&uid=10860">记录</a>
                                            </td>
                                </tr>
                                                <tr>
                    <td align="center">40</td>
                    <td>张月</td>
                    <td>女</td>
                    <td>18831591821</td>
                                    <td>未婚</td>  
                    <td>1995-12-30</td>         
                    <td>大专</td>
                    <td>
                                            无
                                        </td>
                    <td  style="display:none">
                                            无
                                        </td>
                    <td>员工</td>
                    <td>班级主管</td>
                    <td>2017/02/06</td>
                                                    <td>
                                            </td>
                    <td align="center">
                                                <a href="javascript:upuser(10835)">修改</a> |
                        <a href="./?c=integral&a=details&uid=10835">记录</a>
                                            </td>
                                </tr>
                                <!---->
                            </table>
        </div>
        <input type="hidden" id="parkstate" value="0" title="用于判断培训课时用户手机号多一位">
    </div>

<!--修改-->
    <div id="editstu" style="display:none;" class="edit">
        <h2>修改信息<span id="editstuclose">×</span></h2>
        <form id="editf" action="<?php echo url('userlist',array('temp'=>"1")); ?>" method="get" onsubmit="return checkform('eidtf')">
            <input type="hidden" name="id" id="editid" value="">
            <input type="hidden" name="addtime" id="addtime" value="">
            <div class="jiaTab">
                <div class="jt">
                    <span>姓名：</span>
                    <div class="jtdiv"><input type="text" id="editname" name="name" value=""></div>
                </div>
                <div class="jt">
                    <span>手机：</span>
                    <div class="jtdiv"><input type="text" id="editusername" name="username" value=""></div>
                </div>
                <div class="jt">
                    <span>密码：</span>
                    <div class="jtdiv"><input type="password" id="editpwd" name="pwd" value=""></div><font color="red">不改密码不用填写</font>
                </div>
                <div class="jt">
                    <span>性别：</span>
                    <div class="jtdiv jtdiv1">
                        <input type="radio" name="sex" value="男"> 男
                        <input type="radio" name="sex" value="女" checked> 女
                    </div>
                </div>
                <div class="jt">
                    <span>婚姻：</span>
                    <div class="jtdiv jtdiv1">
                        <select name="marry" id="editmarry">
                            <option value="已婚">已婚</option>
                            <option value="未婚">未婚</option>
                        </select>
                    </div>
                </div>
                <div class="jt">
                    <span>生日：</span>
                    <div class="jtdiv">
                        <input type="text" id="editbirthday" name="birthday" value="" onclick="WdatePicker()"/>
                    </div>
                </div>
                <div class="jt">
                    <span>学历：</span>
                    <select name="educational_id" id="editeducation_id" >
                        <option value="3">中专及以下</option>
                        <option value="4">大专</option>
                        <option value="6">本科</option>
                        <option value="8">硕士</option>
                        <option value="9">博士</option>
                    </select>
                </div>
                <div class="jt">
                    <span>资格证：</span>
                    <select id="editpost_id" name="post_id" >
                        <option value="0">--资格证--</option>
                        <option value="5">教师资格证</option>
                        <option value="10">厨师资格证</option>
                        <option value="11">保育员资格证</option>
                        <option value="27">保健医资格证</option>
                    </select>
                </div>
                <div class="jt" style="display:none">
                    <span>荣誉：</span>
                    <select id="edithonor_id" name="honor_id" >
                        <option value="0">--荣誉级别--</option>
                        <option value="16">班组级别</option>
                        <option value="17">幼儿园级别</option>
                        <option value="18">市、区域</option>
                        <option value="19">省级</option>
                        <option value="20">国家级</option>
                    </select>
                </div>
                <div class="jt">
                    <span>职务：</span>
                    <select id="editposition_id" name="position_id" onchange="selectleader('edit',this.value)" > 
                        <option value="24,0">员工</option>
                        <option value="7,10">班级主管</option>
                        <option value="23,11">后勤主管</option>
                        <option value="25,50">园长助理</option>
                        <option value="26,50">招生主管</option>
                        <option value="14,100">执行园长</option>
                    </select>
                </div>
                 
                <div class="jt" id="editpiddiv">
                    <span>直属领导：</span>
                    <select id="editpid" name="pid">
                        <option value="7">班级主管</option>
                        <option value="23">后勤主管</option>
                    </select>
                </div> 
                <div class="jt">
                    <span>入职时间：</span>
                    <div class="jtdiv">
                        <input type="text" id="editentry_time" name="entry_time" value="" onclick="WdatePicker()">
                        <input type="hidden" id="old_time" name="old_time" value="">
                    </div>
                </div>
                <div class="jt">
                    <span>特长：</span>
                    <div class="jtdiv2">
                        <table width="200" id="spetb">
                            
                        </table>
                    </div>       
                </div>
                <div class="jt">
                    <span>状态：</span>
                    <select id="editstate" name="state" onchange="leavefun(this.value)">
                        <option value="0">正常</option>
                        <option value="1">禁用</option>
                    </select>
                </div>
                <div class="jt" style="display:none;" id="leavediv">
                    <span>离职时间：</span>
                    <div class="jtdiv">
                        <input type="text" name="leave_time" id="leave_time" onclick="WdatePicker()" value="2017-05-23">
                    </div>
                </div>
                <div class="jt">
                    <span>备注：</span>
                    <textarea rows="3" cols="25" id="editremark" name="remark"></textarea>
                </div>
            </div>
            <div align="center" class="k-dialog-bottom">
                <div class="btn5"><input type="submit" value="保存" onclick="checkform('edit')"></div>
                <div class="btn5"><input type="button" onclick="closewin('editstu')" value="取消"></div>
            </div>
        </form>
    </div>
<!--修改-->
 
<!--添加-->
    <div id="addstu" style="display:none;" class="edit">
        <h2>添加信息<span id="addstuclose">×</span></h2>
        <form action="<?php echo url('userlist',array('temp'=>"3")); ?>" method="get" id="addf" onsubmit="return checkform('add')">
        <input type="hidden" name="id" id="addid" value="">
        <div class="jiaTab">
            <div class="jt">
                <span>姓名：</span>
                <div class="jtdiv">
                    <input type="text" id="addname" name="name" value="">
                </div>
            </div>
            <div class="jt">
                <span>手机：</span>
                <div class="jtdiv"><input type="text" id="addusername" name="username" value=""></div>
            </div>
            <div class="jt">
                <span>性别：</span>
                <div class="jtdiv jtdiv1">
                    <input type="radio" name="sex" value="男"> 男
                    <input type="radio" name="sex" value="女" checked> 女
                </div>
            </div>
            <div class="jt">
                    <span>婚姻：</span>
                    <div class="jtdiv jtdiv1">
                        <select name="marry">
                            <option value="未婚">未婚</option>
                            <option value="已婚">已婚</option>
                        </select>
                    </div>
                </div>
            <div class="jt">
                <span>生日：</span>
                <div class="jtdiv">
                    <input type="text" id="addbirthday" name="birthday" value="" onclick="WdatePicker()"/>
                </div>
            </div>
            <div class="jt">
                <span>学历：</span>
                <select name="educational_id" id="addeducation_id">
                    <option value="0">--请选择--</option>
                    <option value="中专及以下">中专及以下</option>
                    <option value="大专">大专</option>
                    <option value="本科">本科</option>
                    <option value="硕士">硕士</option>
                    <option value="博士">博士</option>
                </select>
            </div>    
            <div class="jt">
                <span>资格证：</span>
                <select id="addpost_id" name="post_id">
                    <option value="0">--资格证--</option>
                    <option value="教师资格证">教师资格证</option>
                    <option value="厨师资格证">厨师资格证</option>
                    <option value="保育员资格证">保育员资格证</option>
                    <option value="保健医资格证">保健医资格证</option>
                </select>
            </div>    
            <div class="jt" style="display:none">
                <span>荣誉：</span>
                <select id="addhonor_id" name="honor_id">
                    <option value="0">--荣誉级别--</option>
                    <option value="班组级别">班组级别</option>
                    <option value="幼儿园级别">幼儿园级别</option>
                    <option value="市、区域">市、区域</option>
                    <option value="省级">省级</option>
                    <option value="国家级">国家级</option>
                </select>
            </div> 
            <div class="jt">
                <span>职务：</span>
                <select id="addposition_id" name="position_id" onchange="selectleader('add',this.value)" >
                    <option value="员工">员工</option>
                    <option value="班级主管">班级主管</option>
                    <option value="后勤主管">后勤主管</option>
                    <option value="园长助理">园长助理</option>
                    <option value="招生主管">招生主管</option>
                    <option value="执行园长">执行园长</option>
                 </select>
            </div> 
            
            <div class="jt" id="addpiddiv">
                <span>直属领导：</span>
                <select id="addpid" name="pid">
                    <option value="">--请选择--</option>
                    <option value="班级主管">班级主管</option>
                    <option value="后勤主管">后勤主管</option>
                </select>
            </div> 
            <div class="jt">
                <span>入职时间：</span>
                <div class="jtdiv">
                    <input type="text" id="addentry_time" name="entry_time" value="" onclick="WdatePicker()">
                </div>
            </div>    
            <div class="jt">
                <span>状态：</span>
                <select id="addstate" name="state">
                    <option value="0">正常</option>
                    <option value="1">禁用</option>
                </select>
            </div>
            <div class="jt">
                <span>备注：</span>
                <textarea rows="3" cols="25" id="addremark" name="remark"></textarea>
            </div>
        </div>
        <div align="center" class="k-dialog-bottom">
            <input type="submit" class="btn5" style="border:1px solid #f97e76;margin-right:10px;" value="保存">
            <input type="button" class="btn5" onclick="closewin('addstu')" value="取消">
        </div>
        </form>
    </div>
<!--添加-->

<!--手机版的底部 begin-->
<div class="web">
    <div class="webIn">
        <ul>
            <li>
                <a href="./?c=index">
                    <img src="/static/kindergarten/images/nav_01_h.png" alt="">
                    <p>首页</p>
                </a>
            </li>
            <li>
                <a href="./?c=ranking&a=ranking">
                    <img src="/static/kindergarten/images/nav_02_h.png" alt="">
                    <p>月度排行</p>
                </a>
            </li>
            <li>
                <a href="./?c=index&a=userlist">
                    <img src="/static/kindergarten/images/nav_03_h.png" alt="" >
                    <p>员工名单</p>
                </a>
            </li>
            <li>
                <a href="./?c=index&a=userinfo">
                    <img src="/static/kindergarten/images/nav_04_h.png" alt="" >
                    <p>个人信息</p>
                </a>
            </li>
            <li>
                <a href="./?c=index&a=logout">
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
</body>
</html>
<script type="text/javascript" src="/static/kindergarten/js/list.js"></script>
<script type="text/javascript">
var speoptions = "<option value='10'>10</option><option value='20'>20</option><option value='30'>30</option>";
//选择离职是判断添加离职时间
function leavefun(state)
{   
    if(state=='1')
    {
        $("#leavediv").show();
    }
    else{
        $("#leavediv").hide();
    }
}
</script>
