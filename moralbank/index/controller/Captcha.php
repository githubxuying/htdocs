<?php
namespace app\index\controller;

use \think\Controller;

class Captcha extends Controller
{

    // 验证码表单
    public function captcha()
    {
     //   $captcha = new Captcha($config);
     //   return $captcha->entry();
//phpinfo();exit;
        return $this->fetch();
    }


    // 验证码检测
    public function check($code = '')
    {
        $captcha = new Captcha();
        if (!$captcha->check($code)) {
            $this->error('验证码错误');
        } else {
            $this->success('验证码正确');
        }
        
        // 函数助手
//        if (!captcha_check($code)) {
//            $this->error('验证码错误');
//        } else {
//            $this->success('验证码正确');
//        }        
    }
}
