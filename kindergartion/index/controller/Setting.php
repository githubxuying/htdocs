<?php
namespace app\index\controller;

use \think\Controller;
use \think\Db;
use \think\Request;
    
class Setting extends Controller
{
    public function setting()
    {

        return $this->fetch();
    }
}
