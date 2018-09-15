<?php
namespace app\index\controller;

use \think\Controller;
use \think\Db;
use \think\Request;
    
class Waitverify extends Controller
{
    public function waitverify()
    {

        $i=1;
     
        $result_waitverify =Db::table('reward_list')->field(['id','app_user','be_app_user','app_item','description','app_time'])
        ->where('reward_status', "等待")
        ->select();   // 添加姓名
      //  dump($result);

      

      
        $this->assign('waitverify', $result_waitverify);
        $this->assign('temp', $i);

        return $this->fetch();
    }


    public function upapply_scores()
    {
//获取分数 和 被申请人id
        $id=$_GET['id'];
        $result=Db::name('reward_list')
        ->field(['score','be_app_id'])
        ->where('id', $id)
        ->select();
     
      
        return json($result);
    }

    public function review_reject()
    {
//审核记录 驳回记录
        $id=$_GET['id'];
        $check=$_GET['check'];            //yes审核 , no驳回
        $rev_score=$_GET['scores'];
        $be_app_id=urldecode($_GET['teacherid']);
   
        if ($check=="yes") {
            $review_user=session('name');
            $review_time=date('Y-m-d H:i');
            $reward_status="审核";
             Db::table('reward_list')
              ->where('id', $id)
              ->update(['review_user'=>$review_user,'review_time'=>$review_time,'reward_status' => $reward_status]);


      

              $res_score=Db::name('user_list')
              ->field('total_score')
              ->where('id', $be_app_id)
              ->select();

             $score=$res_score[0]['total_score']+$rev_score;       //加分
    
      
    
              Db::table('user_list')
              ->where('id', $be_app_id)
              ->update(['total_score'=>$score]);



              return "OK";
        } else {
            $reject_explain=$_GET['backcontent'];
            $reject_user=session('name');
            $reject_time=date('Y-m-d H:i');
            $reward_status="驳回";
            Db::table('reward_list')
            ->where('id', $id)
            ->update(['reject_user'=>$reject_user,'reject_explain'=>urldecode($reject_explain),'reject_time'=>$reject_time,'reward_status' => $reward_status]);
       

      
            return "OK";
        }
    }
}
