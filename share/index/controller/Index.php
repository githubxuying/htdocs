<?php
namespace app\index\controller;

use \think\Controller;
use \think\Db;
use \think\Request;
    
class Index extends Controller
{
    public function index()
    {


        
        return  $this->fetch();
    }
    public function header()
    {
        
        return $this->fetch('header');
    }
    public function footer()
    {
        
        return $this->fetch('footer');
    }
    public function left()
    {
        
        return $this->fetch('left');
    }
    
    public function userinfo()
    {
        
        return $this->fetch();
    }
    public function touppwd()
    {
        
        return $this->fetch();
    }
    
    public function waitVerify()
    {
        
        return $this->fetch();
    }
    public function myVerify()
    {
        
        return $this->fetch();
    }
    public function myBack()
    {
        
        return $this->fetch();
    }
    public function executeList()
    {
        
        return $this->fetch();
    }
    public function toexecute()
    {
        
        return $this->fetch();
    }
    public function ranking()
    {
        
        return $this->fetch();
    }
    public function totalRanking()
    {
        
        return $this->fetch();
    }
    public function teamRank()
    {
        
        return $this->fetch();
    }
    public function teamList()
    {
        
        return $this->fetch();
    }
    public function userlist_ajax()
    {
  
           //$uid = input('request.uid');             //获取方法二
         $uid=Request::instance()->get('uid');    //获取方法三
         //$uid=Request::instance()->param('uid');  //获取方法四
           $result=Db::name('user_list')
           ->field('id,account')
           ->where('id', 7)
           ->select();
        //echo json_encode($result);
         //dump($uid);
         $test = 2;
         dump($test);
           return json($result);
    }


    public function delimitList()
    {
        
        return $this->fetch();
    }
    public function noticeList()
    {
        
        return $this->fetch();
    }
    public function setting()
    {
        
        return $this->fetch();
    }




    public function welcome()
    {

        $result=Db::execute('select * from goods_type  ');
        //$result=Db::execute('insert into goods_type (id,name,pid,path,level) values (13,"男鞋",1,"0,1,13",1) ');
        dump($result);
        $data=Db::name('goods_type')->find();
        print_r($data);
        
        /* 	$result=Db::query('select * from goods_type');
			dump($result); */
        //Db::table('goods_type')->insert(['id'=>14,'name'=>'女鞋','pid'=>1,'path'=>'0,1,14','level'=>1]);
            
        /* 	$list=Db::table('goods_type')->select();
		
		dump($list);
		 */
         $result=Db::name('goods_type')->where('id', 'like', ['%2'])->select();
         dump($result);
         
        return  $this->fetch();
    }
    public function gr()
    {
        //$result=input('?get.louhao');
        //$louhao=Request::instance()->get('louhao');
        //$danyuan=Request::instance()->get('danyuan');
        //$menpai=Request::instance()->get('menpai');
        //$jiashu=Request::instance()->get('jiashu');
        //$temp = '011010102';
        $temp=$_GET['jiashu'];
        $this->assign('temp', $temp);
        if ($temp=="03") {
            $temp_jt=$_GET['louhao'].$_GET['danyuan'].$_GET['menpai'];
            $temp_hz1=$temp_jt."03";
            $temp_hz2=$temp_jt."04";
            $temp_hz3=$temp_jt."05";
            $count = Db::name('personal_integral')->where('card_num', '=', $temp_hz1)->count();
        
            if ($count>0) {
                $list_hz1=Db::table('personal_integral')->where('card_num', '=', $temp_hz1)->select();
            } else {
                $list_hz1=array (
                  'card_num' =>0,
                  'integral_total' =>0
                );
            }
            $count = Db::name('personal_integral')->where('card_num', '=', $temp_hz2)->count();
            if ($count>0) {
                $list_hz2=Db::table('personal_integral')->where('card_num', '=', $temp_hz2)->select();
            } else {
                $list_hz2=array (
                  'card_num' =>0,
                  'integral_total' =>0
                );
            }
            $count = Db::name('personal_integral')->where('card_num', '=', $temp_hz3)->count();
            if ($count>0) {
                $list_hz3=Db::table('personal_integral')->where('card_num', '=', $temp_hz3)->select();
            } else {
                $list_hz3=array (
                  'card_num' =>0,
                  'integral_total' =>0
                );
            }
         
            $this->assign('list_hz1', $list_hz1);
            $this->assign('list_hz2', $list_hz2);
            $this->assign('list_hz3', $list_hz3);
        } else {
            $temp_gr=$_GET['louhao'].$_GET['danyuan'].$_GET['menpai'].$_GET['jiashu'];
           // dump($temp_gr);
                //$list_gr=Db::table('personal_integral')->where('card_num','=',$temp_gr)->select();
        
            $count = Db::name('personal_integral')->where('card_num', '=', $temp_gr)->count();
            if ($count>0) {
                $list_gr=Db::table('personal_integral')->where('card_num', '=', $temp_gr)->select();
            } else {
                $list_gr=array (
                  'card_num' =>0,
                  'integral_total' =>0
                );
            }
        
        //dump($list_gr);
            $this->assign('list_gr', $list_gr);
        }
        
        $temp_jt=$_GET['louhao'].$_GET['danyuan'].$_GET['menpai'];
    
        //$list_jt=Db::table('family_integral')->where('card_num','=',$temp_jt) ->field('integral_total')->select();
        
        $count = Db::name('family_integral')->where('card_num', '=', $temp_jt)->count();
        if ($count>0) {
            $list_jt=Db::table('family_integral')->where('card_num', '=', $temp_jt)->select();
        } else {
            $list_jt=array (
            'card_num' =>0,
            'integral_total' =>0
            );
        }
         
        //$list=Db::table('personal_integral')->where('card_num','exp',"= CONCAT('"$temp"','1','0101','02')")->select();
        
        //dump($list_jt);
   
        $this->assign('list_jt', $list_jt);
        return $this->fetch();
    }
    public function time_gr()
    {
        
        
        return $this->fetch();
    }
    public function jt()
    {
        
         $temp_jt=$_GET['louhao'].$_GET['danyuan'].$_GET['menpai'];
         $temp_bb=$temp_jt."01";
         $temp_mm=$temp_jt."02";
         $temp_hz1=$temp_jt."03";
         $temp_hz2=$temp_jt."04";
         $temp_hz3=$temp_jt."05";
         $temp_yy=$temp_jt."06";
         $temp_nn=$temp_jt."07";
         $temp_wg=$temp_jt."08";
         $temp_wp=$temp_jt."09";
         
             $count = Db::name('personal_integral')->where('card_num', '=', $temp_bb)->count();
        if ($count>0) {
            $list_bb=Db::table('personal_integral')->where('card_num', '=', $temp_bb)->select();
        } else {
            $list_bb=array (
            'card_num' =>0,
            'integral_total' =>0
            );
        }
         $count = Db::name('personal_integral')->where('card_num', '=', $temp_mm)->count();
        if ($count>0) {
            $list_mm=Db::table('personal_integral')->where('card_num', '=', $temp_mm)->select();
        } else {
            $list_mm=array (
            'card_num' =>0,
            'integral_total' =>0
            );
        }
        $count = Db::name('personal_integral')->where('card_num', '=', $temp_hz1)->count();
        if ($count>0) {
            $list_hz1=Db::table('personal_integral')->where('card_num', '=', $temp_hz1)->select();
        } else {
            $list_hz1=array (
            'card_num' =>0,
            'integral_total' =>0
            );
        }
         $count = Db::name('personal_integral')->where('card_num', '=', $temp_hz2)->count();
        if ($count>0) {
            $list_hz2=Db::table('personal_integral')->where('card_num', '=', $temp_hz2)->select();
        } else {
            $list_hz2=array (
            'card_num' =>0,
            'integral_total' =>0
            );
        }
         $count = Db::name('personal_integral')->where('card_num', '=', $temp_hz3)->count();
        if ($count>0) {
            $list_hz3=Db::table('personal_integral')->where('card_num', '=', $temp_hz3)->select();
        } else {
            $list_hz3=array (
            'card_num' =>0,
            'integral_total' =>0
            );
        }
        $count = Db::name('personal_integral')->where('card_num', '=', $temp_yy)->count();
        if ($count>0) {
            $list_yy=Db::table('personal_integral')->where('card_num', '=', $temp_yy)->select();
        } else {
            $list_yy=array (
            'card_num' =>0,
            'integral_total' =>0
            );
        }
         $count = Db::name('personal_integral')->where('card_num', '=', $temp_nn)->count();
        if ($count>0) {
            $list_nn=Db::table('personal_integral')->where('card_num', '=', $temp_nn)->select();
        } else {
            $list_nn=array (
            'card_num' =>0,
            'integral_total' =>0
            );
        }
          $count = Db::name('personal_integral')->where('card_num', '=', $temp_wg)->count();
        if ($count>0) {
            $list_wg=Db::table('personal_integral')->where('card_num', '=', $temp_wg)->select();
        } else {
            $list_wg=array (
            'card_num' =>0,
            'integral_total' =>0
            );
        }
         $count = Db::name('personal_integral')->where('card_num', '=', $temp_wp)->count();
        if ($count>0) {
            $list_wp=Db::table('personal_integral')->where('card_num', '=', $temp_wp)->select();
        } else {
            $list_wp=array (
            'card_num' =>0,
            'integral_total' =>0
            );
        }
        // $list_hz1=Db::table('personal_integral')->where('card_num','=',$temp_hz1)->select();
        
        
                 $count = Db::name('family_integral')->where('card_num', '=', $temp_jt)->count();
        if ($count>0) {
            $list_jt=Db::table('family_integral')->where('card_num', '=', $temp_jt) ->field('integral_total')->select();
        } else {
            $list_jt=array (
            'card_num' =>0,
            'integral_total' =>0
            );
        }
         //dump($temp_jt);
         //dump($temp_bb);
         
         
            
        $this->assign('list_bb', $list_bb);
        $this->assign('list_mm', $list_mm);
        $this->assign('list_hz1', $list_hz1);
        $this->assign('list_hz2', $list_hz2);
        $this->assign('list_hz3', $list_hz3);
        $this->assign('list_yy', $list_yy);
        $this->assign('list_nn', $list_nn);
        $this->assign('list_wg', $list_wg);
        $this->assign('list_wp', $list_wp);
        $this->assign('list_jt', $list_jt);
        return $this->fetch();
    }
    public function time_jt()
    {
        
        
        return $this->fetch();
    }
    public function cxxx()
    {
        
        $temp_gr = input('temp_xx');
        $list_gr=Db::table('integration_details')->where('card_num', '=', $temp_gr)->select();
       
      //  print_r($temp_gr);
      //    dump($list_gr);
         $this->assign('list', $list_gr);
         
        return $this->fetch();
    }
    public function time_cxxx()
    {
        
        
        return $this->fetch();
    }
}
