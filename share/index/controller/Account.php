<?php
namespace app\index\controller;

use \think\Controller;
use \think\Db;
use \think\Request;
use think\Loader;

    
class Account extends Controller
{

    public function account()
    {
        

      
        $result_owner =Db::table('owner_list')->field(['family_account','owner','phone','id_card','account_status'])
            ->select(); 

         $check=$_GET['check']; 
//多条件查询
      if($check==1){
        

        $account=$_GET['account'];
        $owner=$_GET['owner'];
        //family_account 需要判读
        if($account != NULL && $owner==NULL ){
            $result_owner =Db::table('owner_list')->field(['family_account','owner','phone','id_card','account_status'])
            ->where('family_account',$account)
            
            ->select();
           
            

        } else{
            $result_owner =Db::table('owner_list')->field(['family_account','owner','phone','id_card','account_status'])
            ->whereor('family_account',$account)
            ->whereor('owner',$owner)
            ->select();
           

        }

      


      }   
          
         //$account=$_GET['account'];
        
        //dump($owner);
        //dump($account);
        
        //注意：30条记录为一页，后期修改一下
        $i=1;
        
    if($check=="核实"){
        $result_owner =Db::table('owner_list')->field(['family_account','owner','phone','id_card','account_status'])
        ->where('account_status',$check)
        ->select();   //核实
    }
        
        else if($check=="未核实"){
            $result_owner =Db::table('owner_list')->field(['family_account','owner','phone','id_card','account_status'])
            ->where('account_status',$check)
            ->select();   //未核实
        }
        else if($check=="信息有误"){
            $result_owner =Db::table('owner_list')->field(['family_account','owner','phone','id_card','account_status'])
            ->where('account_status',$check)
            ->select();   //信息有误
        }
        else if($check=="全部")  {
            $result_owner =Db::table('owner_list')->field(['family_account','owner','phone','id_card','account_status'])
            
            ->select();   //全部    // 添加姓名
            //dump($result_owner[0]['family_account']);

        }

        

  
        

    foreach ($result_owner as $key=> $v) {
         
        $family_account=$v['family_account'];
        $list_yes = Db::table('recommend_list')->where('family_account',$family_account)->where('house_status','成交')->select();
        $list_no = Db::table('recommend_list')->where('family_account',$family_account)->where('house_status','未成交')->select();
        //dump(count($list_yes));
        //dump(count($list_no));
        $result_owner[$key]['count_yes']=count($list_yes);
        $result_owner[$key]['count_no']=count($list_no);
        }

       
   
        



    //  dump($result_owner);
        $this->assign('ownerlist', $result_owner);
        $this->assign('temp', $i);

        return $this->fetch();
    }

    public function verify()
    {
        $i=1;
        $owner=$_GET['owner'];
        dump($owner);
      
    }

    public function examine()
    {
        $typeid=$_GET['typeid'];
        $account=$_GET['account'];
        //dump($typeid);
        //dump($account);
        if ($typeid==1) {
            $account_status="核实";
        } elseif ($typeid==2) {
            $account_status="信息有误";
        }
        else{
            $account_status="未核实";
        }
        Db::table('owner_list')
        ->where('family_account', $account)
        ->update(['account_status'=>$account_status]);
        
     //$check="3";
      // return $this->redirect('Account/account','check=6'); 
      //   return redirect('/Account/account')->with('check','hello'); 
      return "ok";
         
    }
    public function excel()
    {

        

        $path = dirname(__FILE__); //找到当前脚本所在路径
        Loader::import("PHPExcel.PHPExcel.PHPExcel");
        Loader::import("PHPExcel.PHPExcel.Writer.IWriter");
        Loader::import("PHPExcel.PHPExcel.Writer.Abstract");
        Loader::import("PHPExcel.PHPExcel.Writer.Excel5");
        Loader::import("PHPExcel.PHPExcel.Writer.Excel2007");
        Loader::import("PHPExcel.PHPExcel.IOFactory");
        $objPHPExcel = new \PHPExcel();
        $objWriter = new \PHPExcel_Writer_Excel5($objPHPExcel);
        $objWriter = new \PHPExcel_Writer_Excel2007($objPHPExcel);
 
 
        // 实例化完了之后就先把数据库里面的数据查出来
        $sql = Db::table('owner_list')->select();
        foreach ($sql as $key=> $v) {
         
            $family_account=$v['family_account'];
            $list_yes = Db::table('recommend_list')->where('family_account',$family_account)->where('house_status','成交')->select();
            $list_no = Db::table('recommend_list')->where('family_account',$family_account)->where('house_status','未成交')->select();
            //dump(count($list_yes));
            //dump(count($list_no));
            $sql[$key]['count_yes']=count($list_yes);
            $sql[$key]['count_no']=count($list_no);
            }

      //$sql=$this->$ownerlist;
      //$ownerlist=$_GET['ownerlist'];
       //$sql=$ownerlist;
        // 设置表头信息
        $objPHPExcel->setActiveSheetIndex(0)
        ->setCellValue('A1', '家庭账户')
        ->setCellValue('B1', '业主')
        ->setCellValue('C1', '电话')
        ->setCellValue('D1', '身份证')
        ->setCellValue('E1', '成交')
        ->setCellValue('F1', '未成交')
        ->setCellValue('G1', '账户状态');
        /*--------------开始从数据库提取信息插入Excel表中------------------*/
 
        $i=2;  //定义一个i变量，目的是在循环输出数据是控制行数
        $count = count($sql);  //计算有多少条数据
        for ($i = 2; $i <= $count+1; $i++) {
            $objPHPExcel->getActiveSheet()->setCellValue('A' . $i, $sql[$i-2]['family_account']);
            $objPHPExcel->getActiveSheet()->setCellValue('B' . $i, $sql[$i-2]['owner']);
            $objPHPExcel->getActiveSheet()->setCellValue('C' . $i, $sql[$i-2]['phone']);
            $objPHPExcel->getActiveSheet()->setCellValue('D' . $i, $sql[$i-2]['id_card']);
            $objPHPExcel->getActiveSheet()->setCellValue('E' . $i, $sql[$i-2]['count_yes']);
            $objPHPExcel->getActiveSheet()->setCellValue('F' . $i, $sql[$i-2]['count_no']);
            $objPHPExcel->getActiveSheet()->setCellValue('G' . $i, $sql[$i-2]['account_status']);
        }
 
         
        /*--------------下面是设置其他信息------------------*/
 
        $objPHPExcel->getActiveSheet()->setTitle('productaccess');      //设置sheet的名称
        $objPHPExcel->setActiveSheetIndex(0);                   //设置sheet的起始位置
        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');   //通过PHPExcel_IOFactory的写函数将上面数据写出来
        
        $PHPWriter = \PHPExcel_IOFactory::createWriter( $objPHPExcel,"Excel2007");
        ob_end_clean();
        ob_start();
        header('Content-Disposition: attachment;filename="业主信息.xlsx"');
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

        
        
        $PHPWriter->save("php://output"); //表示在$path路径下面生成demo.xlsx文件
         // vendor("PHPExcel.PHPExcel");
         // $objPHPExcel = new \PHPExcel();  
         // dump("123");

    }


}
