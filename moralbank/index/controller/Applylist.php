<?php
namespace app\index\controller;

use \think\Controller;
use \think\Db;
use \think\Request;
    
class Applylist extends Controller
{
    public function applylist()
    {
        $i=1;
        
          $result_applylist =Db::table('reward_list')->field(['id','app_user','be_app_user','app_item','description','app_time'])
          ->where('app_id', session('id'))
          ->where('reward_status', "等待")
          ->select();   // 添加姓名
        
       
      //  dump($result);
        $this->assign('applylist', $result_applylist);
        $this->assign('temp', $i);
        return $this->fetch();
    }
}
