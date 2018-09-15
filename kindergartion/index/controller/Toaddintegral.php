<?php
namespace app\index\controller;

use \think\Controller;
use \think\Db;
use \think\Request;
use \think\Session;

class Toaddintegral extends Controller
{

    public function toaddintegral()
    {
//对象
 

//类别
        $result_sort =Db::table('sort_list')->field(['id','sort'])->where('level', 1)->select();  //一级类别，二级分类在common.php下
        dump($result_sort);
        $this->assign('parent_sort', $result_sort);

     
    

        if (session('role')=='2') {
          //班级主管
            $result =Db::table('user_list')->field(['id','name'])->where('post', "员工")->select();   // 默认姓名显示员工
          //  dump($result);
            $this->assign('user_info', $result);
        } elseif (session('role')=='3') {
        //员工
            $result =Db::table('user_list')->field(['id','name'])->where('id', session('id'))->select();   // 添加姓名
        //  dump($result);
            $this->assign('user_info', $result);
        }



 //获取 申请园所项
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

    public function integraladd()
    {
     //处理加分申请单
        $be_app_id=$_POST['teacher_id'];   // 接收POST提交的老师id
        $com_id=$_POST['com_id'];         //固定项id
        $parkcom_id=$_POST['parkcom_id']; //自定义项id
        $description=$_POST['content'];       //备注
        $app_time=date('Y-m-d H:i');
        $app_user=session('name');
        $review_user=session('post');              //根据角色 判断
        $app_id=session('id');
        $reward_status="等待";
        $apply_release="申请";
     
        dump($be_app_id);
        dump($com_id);
        dump($parkcom_id);
        dump($description);

        $result =Db::table('user_list')->field('name')->where('id', $be_app_id)->select();
        $be_app_user=$result[0]['name'];
        dump($be_app_user);

        if (!empty($com_id)) {
            $app_item_1=Db::table('de_custom_list')->field(['score','reward','reward_item'])->where('id', $com_id)->select();
            //$app_item=implode("",$app_item_1[0]);
            $reward=$app_item_1[0]['reward'];
            $app_item=$app_item_1[0]['reward_item'];
            $pos=strpos($app_item_1[0]['score'], ",");
            if ($pos===false) {
                 $score=$app_item_1[0]['score'];
      
      
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
            } else {
                 $str=explode(",", $app_item_1[0]['score']);
                 $score=$str[0];
      
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
            }
        }

        if (!empty($parkcom_id)) {
            $app_item_2=Db::table('custom_list')->field(['low_score','reward','reward_item'])->where('id', $parkcom_id)->select();
            //$app_item=implode("",$app_item_2[0]);
            $reward=$app_item_2[0]['reward'];
            $app_item=$app_item_2[0]['reward_item'];
            $score=$app_item_2[0]['low_score'];

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
        }

  //  Db::table('reward_list')->insert(['reward'=>$reward,'be_app_id'=>$be_app_id,'app_user'=>$app_user,'be_app_user'=>$be_app_user,'app_item'=>$app_item,'score'=>$score,'description'=>$description,'review_time'=>$review_time,'reward_status'=>$reward_status,'review_user'=>$review_user]);
        Db::table('reward_list')->insert(['reward'=>$reward,'app_id'=>$app_id,'be_app_id'=>$be_app_id,'app_user'=>$app_user,'be_app_user'=>$be_app_user,'app_item'=>$app_item,'description'=>$description,'app_time'=>$app_time,'reward_status'=>$reward_status,'score'=>$score,'face'=>$face,'apply_release'=>$apply_release,'review_user'=>$review_user]);
  
        $this->redirect('Applylist/applylist');
    }

    public function executesort()
    {
      //申请固定项  显示
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

    public function changeobj()
    {

        $obj=$_GET['obj'];
        if ($obj=="24") {
            $result =Db::table('user_list')->field(['id','name'])->where('post', "员工")->select();   // 显示员工
            //  dump($result);
          
            return $result;
        } elseif ($obj=="23") {
            $result =Db::table('user_list')->field(['id','name'])->where('post', "班级主管")->select();   // 显示班级主管
            //  dump($result);
            return $result;
        }
    }
}
