<?php
namespace app\index\controller;

use \think\Controller;
use \think\Db;
use \think\Request;
    
class Myverify extends Controller
{
    public function myverify()
    {
                                 //注意：30条记录为一页，后期修改一下
        $i=1;
        $result_myverify =Db::table('reward_list')->field(['id','app_user','be_app_user','app_item','description','score','face','review_user','review_time'])
        ->where('reward_status', "审核")
        ->select();   // 添加姓名
    //  dump($result);
        $this->assign('myverify', $result_myverify);
        $this->assign('temp', $i);

        return $this->fetch();
    }
}
