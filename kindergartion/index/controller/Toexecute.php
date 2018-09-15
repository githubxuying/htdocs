<?php
namespace app\index\controller;

use \think\Controller;
use \think\Db;
use \think\Request;
    
class Toexecute extends Controller
{
    public function toexecute()
    {

        $result_sort =Db::table('sort_list')->field(['id','sort'])->where('level', 1)->select();  //一级类别，二级分类在common.php下
        dump($result_sort);
        $this->assign('parent_sort', $result_sort);
      


        $result =Db::table('user_list')->field(['id','name'])->select();   // 添加姓名
   //  dump($result);
        $this->assign('user_info', $result);
     // echo sonsort();

    
    //获取 自定义项
    //显示加分项
        $custom_jia=Db::table('custom_list')->field(['id','reward_item'])->where('reward', "奖项")->select();
        dump($custom_jia);
        $jia=array();
        $jia[0]="<option value=''>--请选择--</option>";
        $j=1;
        foreach ($custom_jia as $v) {
            $jia[$j]="<option value='".$v['id']."'>".$v['reward_item']."</option>";
             $j++;
        }
        $this->assign('result_jia', $jia);
        $jiafen=implode("", $jia);
        dump($jiafen);
        $this->assign('custom_jiafen', $jiafen);
    //显示减分项
        $custom_jian=Db::table('custom_list')->field(['id','reward_item'])->where('reward', "扣项")->select();
        dump(count($custom_jian));
        $jian=array();
        $jian[0]="<option value=''>--请选择--</option>";
        $i=1;
        foreach ($custom_jian as $v) {
            $jian[$i]="<option value='".$v['id']."'>".$v['reward_item']."</option>";
             $i++;
        }
        $jianfen=implode("", $jian);
        dump($jian);
        dump($jianfen);
        $this->assign('custom_jianfen', $jianfen);
        return $this->fetch();
    }

    public function executesort()
    {
      //固定项  显示
        $typeid=$_GET['typeid'];
        $jiaorjian=$_GET['jiaorjian'];
        $zhiwu=$_GET['zhiwu'];
      // dump($typeid);
      // dump($jiaorjian);
      // dump($zhiwu);
        if ($jiaorjian==0) {
            $reward="奖分";
        } elseif ($jiaorjian==1) {
            $reward="扣分";
        }
        $result_sort =Db::table('de_custom_list')->field(['id','reward_item'])->where('sort_id', $typeid)->where('reward', $reward)->select();
        return $result_sort;
    }
    public function getscores()
    {
      //固定项，获取分数
        $id=$_GET['sid'];
        $result_scores =Db::table('de_custom_list')->field('score')->where('id', $id)->select();
        return $result_scores;
    }

    public function getscores_custom()
    {
      //自定义项，获取分数
        $id=$_GET['sid'];
        $result_scores =Db::table('custom_list')->field(['low_score','high_score'])->where('id', $id)->select();
        return $result_scores;

  //     $result_item =Db::table('sort_list')->field(['id','sort'])->where('level',1)->select();  //一级类别
  //     dump($result_item);
  //    $this->assign('custom_item',$result_item);
    }

    public function executeadd()
    {


        $name=$_POST['name'];   // 接收POST提交的姓名
        $com_id=$_POST['com_id'];         //固定项id
        $parkcom_id=$_POST['parkcom_id']; //自定义项id
     
        $description=$_POST['content'];       //备注
        $app_time=date('Y-m-d H:i');
        $app_user=session('name');
   //  $review_user="园长";              //根据角色 判断
        $reward_status="等待";
        $apply_release="下达";
        $scores=$_POST['scores'];           //分数
        $title=$_POST['title'];           //分数

        if (!empty($scores)&&$scores!="-1000") {
              $score=$scores;
        } elseif (!empty($title)) {
              $score=$title;
        }

        if (!empty($com_id)) {
            $app_item_1=Db::table('de_custom_list')->field(['reward','reward_item'])->where('id', $com_id)->select();
            //$app_item=implode("",$app_item_1[0]);
            $reward=$app_item_1[0]['reward'];
            $app_item=$app_item_1[0]['reward_item'];
        }
     
        if (!empty($parkcom_id)) {
            $app_item_2=Db::table('custom_list')->field(['reward','reward_item'])->where('id', $parkcom_id)->select();
            //$app_item=implode("",$app_item_2[0]);
            $reward=$app_item_2[0]['reward'];
            $app_item=$app_item_2[0]['reward_item'];
        }


        switch (true) {
            case ($score > 500 && $score <= 1000);
                $face = "fei.gif";
              break;
            case ($score > 50 && $score <= 500);
                $face = "yaobai.gif";
              break;
            case ($score > 30 && $score <= 50);
                $face = "guzhang.gif";
              break;
            case ($score > 15 && $score <= 30);
                $face = "fangentou.gif";
              break;
            case ($score > 10 && $score <= 15);
                $face = "gaoxing.gif";
              break;
            case ($score > 5 && $score <= 10);
                $face = "ye.gif";
              break;
            case ($score >= 0 && $score <= 5);
                $face = "haixiu.gif";
              break;
            case ($score >= -5 && $score <0);
                $face = "no.gif";
              break;
            case ($score >= -10 && $score < -5);
                $face = "jingya.gif";
              break;
            case ($score >= -25 && $score < -10);
                $face = "liuhan.gif";
              break;
            case ($score >= -1000 && $score < -25);
                $face = "liulei.gif";
              break;
          
            default:
                $face = "haixiu.gif";
                break;
        }
     



        dump($name);
        $temp=explode(';', $name);
        for ($i=0; $i<count($temp); $i++) {
            dump($temp[$i]);
            $be_app_id=strstr($temp[$i], ',', true);
            $be_app_user=substr($temp[$i], strpos($temp[$i], ',')+1);
            Db::table('reward_list')->insert(['reward'=>$reward,'be_app_id'=>$be_app_id,'app_user'=>$app_user,'be_app_user'=>$be_app_user,'app_item'=>$app_item,'score'=>$score,'face'=>$face,'description'=>$description,'app_time'=>$app_time,'reward_status'=>$reward_status,'apply_release'=>$apply_release]);
        }
 
        
        $this->redirect('toexecute');
    }
}
