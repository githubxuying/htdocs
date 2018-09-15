<?php
namespace app\index\controller;

use \think\Controller;
use \think\Db;
use \think\Request;
    
class Ranking extends Controller
{
    public function ranking()
    {

        // $temp_i=1;
        // $this->assign('temp_i', $temp_i);

        
        // $result =Db::name('user_list')->order('total_score', 'desc')->select();

        // $this->assign('list_user', $result);

        // $temp=count($result);

        // $this->assign('count', $temp-3);

//查询

        dump(date('Y-m'));
        $result_be_app_id =Db::name('reward_list')
        ->distinct(true)
        ->field('be_app_id')
        ->where(['DATE_FORMAT(app_time, "%Y-%m")'=>date('Y-m')])
        ->select();
        dump($result_be_app_id);
        dump($result_be_app_id[0]["be_app_id"]);
        dump(count($result_be_app_id));


        $new_array = array();
        foreach ($result_be_app_id as $k => $v) {
            $result_score =Db::name('reward_list')
            ->field('SUM(score)')
            ->where('be_app_id', $v["be_app_id"])
            ->where(['DATE_FORMAT(app_time, "%Y-%m")'=>date('Y-m')])
            ->select();
         //       dump($result_score[0]["SUM(score)"]);

                $new_array[$v["be_app_id"]]=$result_score[0]["SUM(score)"];
        }

        arsort($new_array);
       // dump($new_array);
        $new_month = array();
        $i=0;
        foreach ($new_array as $k => $v) {
                   $result_month=Db::name('user_list')
                   ->field(['name','education','qualification','post','entry_time','total_score'])
                   ->where('id', $k)
                   ->select();
                   $result_month[0]['total_score']=$v;
           //        dump($result_month);
                   $new_month[$i]=$result_month;
                   $i++;
        }
       
     //   dump($new_month);
        


        $temp_i=1;
        $this->assign('temp_i', $temp_i);

        $this->assign('list_month', $new_month);

        $temp=count($new_month);

        $this->assign('count', $temp-3);




        return $this->fetch();
    }

    public function ranking_find()
    {
        //按照时间段查询
        $member=$_POST['member'];
        $startime=$_POST['startime'];
        $endtime=$_POST['endtime'];

        dump($member);
        dump($startime);
        dump($endtime);






        dump(date('Y-m'));
        $result_be_app_id =Db::name('reward_list')
        ->distinct(true)
        ->field('be_app_id')
        ->where(['DATE_FORMAT(app_time, "%Y-%m-%d")'=>['between',[$startime,$endtime]]])
        ->select();
        //dump($result_be_app_id);
        // dump($result_be_app_id[0]["be_app_id"]);
        // dump(count($result_be_app_id));


        $new_array = array();
        foreach ($result_be_app_id as $k => $v) {
            $result_score =Db::name('reward_list')
            ->field('SUM(score)')
            ->where('be_app_id', $v["be_app_id"])
            ->where(['DATE_FORMAT(app_time, "%Y-%m-%d")'=>['between',[$startime,$endtime]]])
            ->select();
        //        dump($result_score[0]["SUM(score)"]);

                $new_array[$v["be_app_id"]]=$result_score[0]["SUM(score)"];
        }

        arsort($new_array);
        //dump($new_array);
        $new_month = array();
        $i=0;
        foreach ($new_array as $k => $v) {
                   $result_month=Db::name('user_list')
                   ->field(['name','education','qualification','post','entry_time','total_score'])
                   ->where('id', $k)
                   ->select();
                   $result_month[0]['total_score']=$v;
        //           dump($result_month);
                   $new_month[$i]=$result_month;
                   $i++;
        }
       
        //dump($new_month);

        
     

        $temp_i=1;
        $this->assign('temp_i', $temp_i);

        $this->assign('list_month', $new_month);

        $temp=count($new_month);

        $this->assign('count', $temp-3);

        return view('Ranking/ranking');
    }
}
