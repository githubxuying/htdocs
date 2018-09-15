<?php
namespace app\index\controller;

use \think\Controller;
use \think\Db;
use \think\Request;
use \think\Session;

class Agentlist extends Controller
{

    public function agentlist()
    {
//待核实

        $i=1;
        $result_check =Db::table('user_list')->field(['account']) 
        ->where('role', "1")
        ->select();   // 添加姓名
        //  dump($result);
        foreach ($result_check as $key=> $v) {
                
            $account=$v['account'];
            $person = Db::table('visit_list')->field(['recommend_id'])->distinct(true)->where('agent',$account)->select();
            
            //dump(count($list_yes));
            //dump(count($list_no));
            
            $result_check[$key]['count_person']=count($person);

            }


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
