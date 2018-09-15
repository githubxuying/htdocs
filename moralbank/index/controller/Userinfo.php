<?php
namespace app\index\controller;

use \think\Controller;
use \think\Db;
use \think\Request;
    
class Userinfo extends Controller
{
    public function userinfo()
    {

        $result =Db::name('user_list')->where('id', session('id'))->select();
        dump($result);
        $this->assign('user_info', $result);
        return $this->fetch();
    }
}
