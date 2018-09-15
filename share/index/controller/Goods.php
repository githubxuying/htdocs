<?php
namespace app\index\controller;

use \think\Controller;
use \think\Db;
use \think\Request;
    
class Goods extends Controller
{
    public function goods()
    {

        return $this->fetch();
    }
    public function product_category_ajax()
    {
           $result=Db::name('user_list')
           ->field('id,account')
           ->where('id', 7)
           ->select();
         
        //  return $result;
        //  echo json_encode(['success'=>true]);
           // return $result;
           //
        
         return json($result);

         //    echo json_encode($result);
    }
}
