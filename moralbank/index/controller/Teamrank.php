<?php
namespace app\index\controller;

use \think\Controller;
use \think\Db;
use \think\Request;
    
class Teamrank extends Controller
{
    public function teamrank()
    {

        return $this->fetch();
    }
}
