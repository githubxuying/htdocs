<?php
namespace app\index\controller;

use \think\Controller;
use \think\Db;
	
class Index     extends Controller
{
    public function index(){

    
        return  $this->fetch();
    }

    public function welcome(){

    	$result=Db::execute('select * from goods_type  ');
		//$result=Db::execute('insert into goods_type (id,name,pid,path,level) values (13,"男鞋",1,"0,1,13",1) ');
		dump($result);
		$data=Db::name('goods_type')->find();
		print_r($data);
		
	/* 	$result=Db::query('select * from goods_type');
		dump($result); */
	//Db::table('goods_type')->insert(['id'=>14,'name'=>'女鞋','pid'=>1,'path'=>'0,1,14','level'=>1]);
		
	/* 	$list=Db::table('goods_type')->select();
		
		dump($list);
		 */
		 $result=Db::name('goods_type')->where('id','like',['%2'])->select();
		 dump($result);
		 
        return  $this->fetch();
    }

  
    
    
}
