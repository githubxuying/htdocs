<?php
namespace app\index\controller;

use \think\Controller;
use \think\Db;
use \think\Request;
use \think\Session;

class Userinfo extends Controller
{

    public function userinfo()
    {
//对象

$account=session('account');
$result =Db::table('owner_list')->where('family_account', $account)->select();
 
//dump($result);
$this->assign('owner_list', $result);

        return $this->fetch();
    }

    public function integraladd()
    {
        $linkman=$_POST['linkman'];
        $linkman_phone=$_POST['linkman_phone'];
        $id_card=$_POST['id_card'];
      //  dump($linkman);

        Db::table('owner_list')
        ->where('family_account', session('account'))
        ->update(['owner'=>$linkman,'phone'=>$linkman_phone,'id_card'=>$id_card,'account_status'=>"未核实"]);

        $this->redirect('Userinfo/userinfo');
    
    }

    public function executesort()
    {
  
    }

    public function changeobj()
    {


    }
}
