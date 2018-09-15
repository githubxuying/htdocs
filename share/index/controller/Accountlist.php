<?php
namespace app\index\controller;

use \think\Controller;
use \think\Db;
use \think\Request;
use \think\Url;
    
class Accountlist extends Controller
{
    public function accountlist($account,$list)
    {
                                 //注意：30条记录为一页，后期修改一下
    //     $i=1;
    //     $result_myverify =Db::table('reward_list')->field(['id','app_user','be_app_user','app_item','description','score','face','review_user','review_time'])
    //     ->where('reward_status', "审核")
    //     ->select();   // 添加姓名
    // //  dump($result);
    //     $this->assign('myverify', $result_myverify);
    //     $this->assign('temp', $i);
    if($list=="yes")
    {
        $result =Db::table('recommend_list')->field(['family_account','linkman','linkman_phone','agent','status','house_status','trade_room','recommend_time','trade_time'])->where('house_status','成交')->where('family_account',$account)->select();
        $this->assign('person', "新业主");
       // dump($result);
    }
    else if($list=="no")
    {
        $result =Db::table('recommend_list')->field(['family_account','linkman','linkman_phone','agent','status','house_status','trade_room','recommend_time','trade_time'])->where('house_status','未成交')->where('family_account',$account)->select();
        $this->assign('person', "意向联系人");
    //    dump($account);
    //    dump($list);
    }

    $i=1;

    $this->assign('ownerlist', $result);
    $this->assign('temp', $i);
      


        return $this->fetch();
    }

}
