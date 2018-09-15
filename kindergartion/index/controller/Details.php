<?php
namespace app\index\controller;

use \think\Controller;
use \think\Db;
use \think\Request;	
class Details     extends Controller
{
    public function details(){

      $review_user=session('post');     //获取角色
      $app_id=session('id');
if($review_user==="员工"){
  $i=1;
  $result_details =Db::table('reward_list')->field(['id','app_user','be_app_user','app_item','score','face','description','app_time','review_user','review_time'])
  ->where('be_app_id',$app_id)

  ->select();   // 

  $this->assign('details',$result_details);
  $this->assign('temp',$i);

}
else{
  $i=1;
  $result_details =Db::table('reward_list')->field(['id','app_user','be_app_user','app_item','description','app_time','review_time'])
  ->where('reward_status',"审核")
  ->where('apply_release',"申请")
  ->select();   // 添加姓名 
//  dump($result);
  $this->assign('details',$result_details);
  $this->assign('temp',$i);

}

      






      return $this->fetch();
    }

}