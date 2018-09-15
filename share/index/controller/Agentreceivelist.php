<?php
namespace app\index\controller;

use \think\Controller;
use \think\Db;
use \think\Request;
use \think\Session;

class Agentreceivelist extends Controller
{

    public function agentreceivelist()
    {
        $agent=$_GET['agent'];

        //A类客户
        $i=1;
        $result_A =Db::table('recommend_list')->field(['id','linkman','linkman_phone','status'])
        ->where('agent', $agent)
        ->where('category', "A类")
        ->select();   // 查询A类
        //  dump($result);
        foreach ($result_A as $key=> $v) {
                
                $recommend_id=$v['id'];
                $list = Db::table('visit_list')->where('agent_say','<>','NULL')->where('recommend_id',$recommend_id)->select();
               
                //dump(count($list_yes));
                //dump(count($list_no));
                
                $result_A[$key]['agent_say_count']=count($list);
           

                }

        //B类客户
        $result_B =Db::table('recommend_list')->field(['id','linkman','linkman_phone','status'])
        ->where('agent', $agent)
        ->where('category', "B类")
        ->select();   // 查询B类
        foreach ($result_B as $key=> $v) {
                
                $recommend_id=$v['id'];
                $list = Db::table('visit_list')->where('agent_say','<>','NULL')->where('recommend_id',$recommend_id)->select();
               
                //dump(count($list_yes));
                //dump(count($list_no));
                
                $result_B[$key]['agent_say_count']=count($list);
           

                }

        //C类客户
        $result_C =Db::table('recommend_list')->field(['id','linkman','linkman_phone','status'])
        ->where('agent', $agent)
        ->where('category', "C类")
        ->select();   // 查询C类
        foreach ($result_C as $key=> $v) {
                
                $recommend_id=$v['id'];
                $list = Db::table('visit_list')->where('agent_say','<>','NULL')->where('recommend_id',$recommend_id)->select();
               
                //dump(count($list_yes));
                //dump(count($list_no));
                
                $result_C[$key]['agent_say_count']=count($list);
           

                }

        //成交 
        $result_deal =Db::table('recommend_list')->field(['id','linkman','linkman_phone','house_status'])
        ->where('agent', $agent)
        ->where('house_status', "成交")
        ->select();   // 查询成交
        foreach ($result_deal as $key=> $v) {
                
                $recommend_id=$v['id'];
                $list = Db::table('visit_list')->where('agent_say','<>','NULL')->where('recommend_id',$recommend_id)->select();
               
                //dump(count($list_yes));
                //dump(count($list_no));
                
                $result_deal[$key]['agent_say_count']=count($list);
           

                }




        $this->assign('Alist', $result_A);
        $this->assign('t_A', $i);

        $this->assign('Blist', $result_B);
        $this->assign('t_B', $i);

        $this->assign('Clist', $result_C);
        $this->assign('t_C', $i);

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
