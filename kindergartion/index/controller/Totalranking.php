<?php
namespace app\index\controller;

use \think\Controller;
use \think\Db;
use \think\Request;
    
class Totalranking extends Controller
{
    public function totalranking()
    {
        $temp_i=1;
        $this->assign('temp_i', $temp_i);

        $result =Db::name('user_list')->order('total_score', 'desc')->select();

        $this->assign('list_user', $result);

        $temp=count($result);

        $this->assign('count', $temp-3);

        return $this->fetch();
    }
}
