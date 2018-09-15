<?php
namespace app\index\controller;

use \think\Controller;
use \think\Db;
use \think\Request;
    
class Touppwd extends Controller
{
    public function touppwd()
    {

        return $this->fetch();
    }
}
