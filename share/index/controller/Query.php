<?php
namespace app\index\controller;

use \think\Controller;
use \think\Db;
use \think\Request;
use \think\Session;

class Query extends Controller
{

    public function query()
    {
//待核实
        $i=1;
        $result_check =Db::table('recommend_list')->field(['id','linkman','linkman_phone','status'])
        ->where('family_account', session('account'))
        ->where('status', "待核实")
        ->select();   // 添加姓名
        //  dump($result);
//无效信息
        $result_invalid =Db::table('recommend_list')->field(['id','linkman','linkman_phone','status'])
        ->where('family_account', session('account'))
        ->where('status', "无效信息")
        ->select();   // 添加姓名

//推荐成功
        $result_success =Db::table('recommend_list')->field(['id','linkman','linkman_phone','status'])
        ->where('family_account', session('account'))
        ->where('status', "推荐成功")
        ->select();   // 添加姓名


//成交 
        $result_deal =Db::table('recommend_list')->field(['id','linkman','linkman_phone','house_status'])
        ->where('family_account', session('account'))
        ->where('house_status', "成交")
        ->select();   // 添加姓名



        $this->assign('checklist', $result_check);
        $this->assign('t_check', $i);

        $this->assign('invalidlist', $result_invalid);
        $this->assign('t_invalid', $i);

        $this->assign('successlist', $result_success);
        $this->assign('t_success', $i);

        $this->assign('deallist', $result_deal);
        $this->assign('t_deal', $i);








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
