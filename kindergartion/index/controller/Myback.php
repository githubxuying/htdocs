<?php
namespace app\index\controller;

use \think\Controller;
use \think\Db;
use \think\Request;
    
class Myback extends Controller
{
    public function myback()
    {

        $i=1;
        $result_myback =Db::table('reward_list')->field(['id','app_user','be_app_user','app_item','description','reject_user','reject_explain','reject_time'])
        ->where('reward_status', "驳回")
        ->select();   // 添加姓名
    //  dump($result);
        $this->assign('myback', $result_myback);
        $this->assign('temp', $i);


        return $this->fetch();
    }

    public function myback_cancel()
    {
    }
}
