<?php
namespace app\index\controller;

use \think\Controller;
use \think\Db;
use \think\Request;
    
class Executelist extends Controller
{
    public function executelist()
    {
        $i=1;
        $result =Db::table('reward_list')->field(['id','be_app_user','app_item','description','score','app_user','review_time'])->select();
        $this->assign('execute_list', $result);
        $this->assign('temp', $i);
        return $this->fetch();
    }
}
