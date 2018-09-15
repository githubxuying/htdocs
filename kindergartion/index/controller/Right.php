<?php
namespace app\index\controller;

use \think\Controller;
use \think\Db;
use \think\Request;
use \think\Session;

class Right extends Controller
{
    public function right()
    {
        // $result=Db::execute('select * from de_custom_list  ');
     
           dump(session('role'));
           //当session为空时，跳转到登录页面
        //    if(session('role')==''){
         
        // 	  $this->redirect('Userlogin/userlogin');
        //    }

        return $this->fetch();
    }



    public function logout()
    {
        //退出
            
              session(null);
            //  exit;
           $this->redirect('Userlogin/userlogin');
    }
}
