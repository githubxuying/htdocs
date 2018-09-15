<?php
namespace app\index\controller;

use \think\Controller;
use \think\Db;
use \think\Request;
use \think\Session;

class Idealist extends Controller
{

    public function idealist()
    {
//未处理
        $account=$_GET['agent'];
        $i=1;
        $result_check =Db::table('visit_list')->field(['recommend_id','id']) 
        ->where('agent',$account)
        ->where('admin_status',"未阅")
        ->select();   // 添加姓名
        //  dump($result);




        foreach ($result_check as $key=> $v) {
                
                $recommend_id=$v['recommend_id'];
                $list = Db::table('recommend_list')->field(['linkman','category']) ->where('id',$recommend_id)->select();
               
                //dump(count($list_yes));
                //dump(count($list_no));
                
                $result_check[$key]['linkman']=$list[0]['linkman'];
                $result_check[$key]['category']=$list[0]['category'];

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
