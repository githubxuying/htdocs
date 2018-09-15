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

    public function uppwd()
    {
        $code=$_POST['code'];

        if (!captcha_check($code)) {
            $this->error('验证码错误');
        } 
        else {
            $pwd=session('pwd');
            $account=session('account');
            $oldpwd=$_POST['oldpwd'];
            $newpwd=$_POST['newpwd'];
            
            if($oldpwd == session('pwd')){
               
                Db::table('user_list')
                ->where('account', $account)
                ->update(['password'=>$newpwd]);
                session('pwd', $newpwd);
                $this->redirect('Right/right');
            }
            else{

                $this->error('您输入的当前密码错误，请重新输入！');
            }


            // $result =Db::name('user_list')->field(['account','password'])->where('account', $account)->select();
           
            
            // if(count($result)=="1"){
               
            //     if($password == $result[0]['password'] )
            //     {
            //         dump($result[0]['account']);
            //         dump($account);
            //         dump($password);
            //         dump($result);

            //         session('role', '1');
            //         session('post', '业主');
            //         session('account', $result[0]['account']);
            //            //  session('name', $result[0]['name']);
            //         $this->redirect('Right/right');
            //     }else{
            //         $this->error('您输入的密码错误，请重新输入！');
            //     }

            // }
            // else{
            //     $this->error('您输入的账户错误，请重新输入！');
            // }
            
           
        }
    }
}
