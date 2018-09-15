<?php
namespace app\index\controller;

use \think\Controller;
use \think\Db;
use \think\Request;
use \think\Session;

class Receivelist extends Controller
{

    public function receivelist()
    {
        //A类客户
        $i=1;
        $result_A =Db::table('recommend_list')->field(['id','linkman','linkman_phone','status'])
        ->where('agent', session('agent'))
        ->where('category', "A类")
        ->select();   // 查询A类
        //  dump($result);
        foreach ($result_A as $key=> $v) {
                
                $recommend_id=$v['id'];
                $list = Db::table('visit_list')->where('agent_status',"未阅")->where('recommend_id',$recommend_id)->select();
                
                $result_A[$key]['admin_say_count']=count($list);
           
                }
        //B类客户
        $result_B =Db::table('recommend_list')->field(['id','linkman','linkman_phone','status'])
        ->where('agent', session('agent'))
        ->where('category', "B类")
        ->select();   // 查询B类

        foreach ($result_B as $key=> $v) {
                
                $recommend_id=$v['id'];
                $list = Db::table('visit_list')->where('agent_status',"未阅")->where('recommend_id',$recommend_id)->select();
                
                $result_B[$key]['admin_say_count']=count($list);
           
                }
        //C类客户
        $result_C =Db::table('recommend_list')->field(['id','linkman','linkman_phone','status'])
        ->where('agent', session('agent'))
        ->where('category', "C类")
        ->select();   // 查询C类
        foreach ($result_C as $key=> $v) {
                
                $recommend_id=$v['id'];
                $list = Db::table('visit_list')->where('agent_status',"未阅")->where('recommend_id',$recommend_id)->select();
                
                $result_C[$key]['admin_say_count']=count($list);
           
                }


        $this->assign('Alist', $result_A);
        $this->assign('t_A', $i);

        $this->assign('Blist', $result_B);
        $this->assign('t_B', $i);

        $this->assign('Clist', $result_C);
        $this->assign('t_C', $i);





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
