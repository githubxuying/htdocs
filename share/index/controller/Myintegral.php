<?php
namespace app\index\controller;

use \think\Controller;
use \think\Db;
use \think\Request;
    
class Myintegral extends Controller
{
    public function myintegral()
    {
        $temp_i=1;
        $this->assign('temp_i', $temp_i);

       //我的积分
        $result_my =Db::name('reward_list')
        ->where('be_app_id', session('id'))
        ->where('reward_status', "审核")
        ->field(['app_item','face','description','score','review_time'])
        ->select();

        $this->assign('myintegral', $result_my);

        //总积分
        $result_total =Db::name('user_list')
          ->where('id', session('id'))
          ->field('total_score')
          ->select();

        $this->assign('total_score', $result_total[0]['total_score']);

        return $this->fetch();
    }
}
