<?php
namespace app\index\controller;

use \think\Controller;
use \think\Db;
use \think\Request;
use \think\Session;

class Verifylist extends Controller
{

    public function verifylist()
    {
//待核实
        $i=1;
        $result_check =Db::table('recommend_list')->field(['id','linkman','linkman_phone','status'])
        ->where('agent', session('agent'))
        ->where('status', "待核实")
        ->select();   // 添加姓名
        //  dump($result);




        $this->assign('checklist', $result_check);
        $this->assign('t_check', $i);

       








        return $this->fetch();
    }

    public function integraladd()
    {
     //处理加分申请单
        
    }

    public function executesort()
    {
      //申请固定项  显示
    
    }

    public function changeobj()
    {

    }
}
