<?php
namespace app\index\controller;

use \think\Controller;
use \think\Db;
use \think\Request;
    
class Backmyintegral extends Controller
{
    public function backmyintegral()
    {

        $i=1;
        $result_backmyintegral =Db::table('reward_list')->field(['id','app_user','be_app_user','app_item','description','reject_user','reject_explain','reject_time'])
        ->where('app_id', session('id'))
        ->where('reward_status', "驳回")
        ->select();   // 添加姓名
    //  dump($result);



        $this->assign('backmyintegral', $result_backmyintegral);
        $this->assign('temp', $i);

        return $this->fetch();
    }
}
