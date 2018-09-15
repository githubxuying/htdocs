<?php
namespace app\index\controller;

use \think\Controller;
use \think\Db;
use \think\Request;
    
class Delimitlist extends Controller
{
    public function delimitlist()
    {

        $temp_i=1;
        $this->assign('temp_i', $temp_i);
        $result =Db::name('custom_list')->select();
        dump($result[1]['id']);
        $this->assign('delimit_list', $result);
        return $this->fetch();
    }
    public function delimitadd()
    {

        $pid=$_POST['pid'];
        if ($pid==0) {
            $reward="奖项";
            $low_score=$_POST['scores'];
            $high_score=$_POST['max_scores'];
        } elseif ($pid==1) {
            $reward="扣项";
             $low_score=-$_POST['scores'];
             $high_score=-$_POST['max_scores'];
        }
        $reward_item=$_POST['title'];
        $direction=$_POST['explain'];
        $custom_status="使用";
        $add_time=date('Y/m/d');
        Db::table('custom_list')->insert(['reward'=>$reward,'reward_item'=>$reward_item,'direction'=>$direction,'low_score'=>$low_score,'high_score'=>$high_score,'custom_status'=>$custom_status,'add_time'=>$add_time]);
        
        print_r($low_score);
        print_r($high_score);
    }

    public function delimitedit()
    {
        $pid=$_POST['pid'];
        if ($pid==0) {
            $reward="奖项";
            $low_score=$_POST['scores'];
            $high_score=$_POST['max_scores'];
        } elseif ($pid==1) {
            $reward="扣项";
             $low_score=-$_POST['scores'];
             $high_score=-$_POST['max_scores'];
        }
        $state=$_POST['state'];
        if ($state==0) {
            $custom_status="使用";
        } elseif ($state==1) {
            $custom_status="停用";
        }
        $reward_item=$_POST['title'];
        $direction=$_POST['explain'];
        
        $add_time=date('Y/m/d');
        $id=$_POST['id'];
        Db::table('custom_list')
            ->where('id', $id)
            ->update(['reward'=>$reward,'reward_item'=>$reward_item,'direction'=>$direction,'low_score'=>$low_score,'high_score'=>$high_score,'custom_status'=>$custom_status,'add_time'=>$add_time]);
        print_r($pid);
        print_r($custom_status);
    }
}
