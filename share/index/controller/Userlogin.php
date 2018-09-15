<?php
namespace app\index\controller;

use \think\Controller;
use \think\Db;
use \think\Request;
use \think\Session;

class Userlogin extends Controller
{
    public function userlogin()
    {

   
   
      //  $result=Db::execute('select * from de_custom_list  ');
        //dump($result);
        //print_r($result);
    
        
        
        return $this->fetch();
    }
    public function validate_login()
    {

        $code=$_POST['code'];

        if (!captcha_check($code)) {
            $this->error('验证码错误',"Right/right");
        } else {
            $account=$_POST['number'];
            $password=$_POST['password'];
            $result =Db::name('user_list')->field(['account','password','role'])->where('account', $account)->select();
            // if($result[0]['account']!=$account){
            //     $this->error('账号错误');
            // }else {

            // }

           
            
            if(count($result)=="1"){
               
                if($password == $result[0]['password'] )
                {
                    // dump($result[0]['account']);
                    // dump($account);
                    // dump($password);
                    // dump($result);
             if ($result[0]['role']=="0") {

                session('role', '0');
                session('post', '管理员');
                session('pwd', $password);
                session('account', $result[0]['account']);
                   //  session('name', $result[0]['name']);
                $this->redirect('Right/right');
             } elseif ($result[0]['role']=="1") {
                session('role', '1');
                session('post', '置业顾问');
                session('agent',$result[0]['account']);
                session('pwd', $password);
                session('account', $result[0]['account']);
                   //  session('name', $result[0]['name']);
                $this->redirect('Verifylist/verifylist');
             } elseif ($result[0]['role']=="2") {
                session('role', '2');
                session('post', '业主');
                session('pwd', $password);
                session('account', $result[0]['account']);
                   //  session('name', $result[0]['name']);
                $this->redirect('Right/right');
             }





                 
                }else{
                    $this->error('您输入的密码错误，请重新输入！',"Right/right");
                }

            }
            else{
                $this->error('您输入的账户错误，请重新输入！',"Right/right");
            }
            
            // if ($result[0]['post']=="园长") {

            //     session('role', '1');
            //     session('post', '园长');
            //     session('id', $result[0]['id']);
            //     session('name', $result[0]['name']);
              
            //     dump($result[0]['post']);
            //     $this->redirect('Right/right');
            // } elseif ($result[0]['post']=="班级主管") {
            //     session('role', '2');
            //     session('post', '班级主管');
            //     session('id', $result[0]['id']);
            //     session('name', $result[0]['name']);
            //     $this->redirect('Right/right');
            // } elseif ($result[0]['post']=="员工") {
            //     session('role', '3');
            //     session('post', '员工');
            //     session('id', $result[0]['id']);
            //     session('name', $result[0]['name']);
            //     $this->redirect('Right/right');
            // }

         // session('account',$result);
          //session('role','0');
          
        

         // $this->success('验证码正确');
        }
        
       // $this->redirect('Right/right');
    }
    public function test()
    {
        
        // session_start();
           session('role', '0');
        // $_SESSION['role']=0;
        // echo $_SESSION['aa'];
        //  setcookie("bb",'55');
        //  dump(123);
        // Session::set('name','thinkphp');
        // Session::set('name','thinkphp2','think2');
      //  echo session('?name');
        //echo session('name','','think');
        // echo session::has('name');
        // echo session::has('name','think');
        // echo session::get('name','think2');

       // Session::clear();
        echo "\n";
        echo session('role');
       // print_r($SESSION);
        exit;
    }
}
