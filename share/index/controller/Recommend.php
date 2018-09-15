<?php
namespace app\index\controller;

use \think\Controller;
use \think\Db;
use \think\Request;
use think\Loader;

class Recommend extends Controller
{
    public function recommend()
    {
                                 //注意：30条记录为一页，后期修改一下
        $i=1;
        $check=$_GET['check']; 

        $result_recommend =Db::table('recommend_list')
        ->order('id desc')
        ->select();   // 添加姓名
        
        foreach ($result_recommend as $key=> $v) {   //添加推荐人和电话
         
             $family_account=$v['family_account'];
             $list_owner = Db::table('owner_list')->where('family_account',$family_account)->field('owner')->select();
             $list_phone = Db::table('owner_list')->where('family_account',$family_account)->field('phone')->select();
            //dump(count($list_yes));
            //dump(count($list_no));
            if($list_owner != NULL){
                $result_recommend[$key]['owner']=$list_owner[0]['owner'];
            }else{
                $result_recommend[$key]['owner']="";
            }

            if($list_phone != NULL){
                $result_recommend[$key]['phone']=$list_phone[0]['phone'];
            }else{
                $result_recommend[$key]['phone']="";
            }
 //回访次数   
            $list = Db::table('visit_list')->where('agent_say','<>','NULL')->where('recommend_id',$result_recommend[$key]['id'])->select();
               
                //dump(count($list_yes));
                //dump(count($list_no));
                
                $result_recommend[$key]['agent_say_count']=count($list);


            
           
            }



         




//输入查询条件 查询结果
        if($check==1){

            $linkman=$_GET['linkman'];
            $family_account=$_GET['family_account'];
            $agent=$_GET['agent'];
            $result_recommend =Db::table('recommend_list')
            ->order('id desc')
            ->whereor('linkman',$linkman)
            ->whereor('family_account',$family_account)
            ->whereor('agent',$agent)
            ->select();


            foreach ($result_recommend as $key=> $v) {   //添加推荐人和电话
         
                $family_account=$v['family_account'];
                $list_owner = Db::table('owner_list')->where('family_account',$family_account)->field('owner')->select();
                $list_phone = Db::table('owner_list')->where('family_account',$family_account)->field('phone')->select();
               //dump(count($list_yes));
               //dump(count($list_no));
               if($list_owner != NULL){
                   $result_recommend[$key]['owner']=$list_owner[0]['owner'];
               }else{
                   $result_recommend[$key]['owner']="";
               }
   
               if($list_phone != NULL){
                   $result_recommend[$key]['phone']=$list_phone[0]['phone'];
               }else{
                   $result_recommend[$key]['phone']="";
               }

               if($result_recommend[$key]['category'] == NULL){
                $result_recommend[$key]['category']=""; 
               }

               

                 //回访次数   
            $list = Db::table('visit_list')->where('agent_say','<>','NULL')->where('recommend_id',$result_recommend[$key]['id'])->select();                           
            $result_recommend[$key]['agent_say_count']=count($list);
              
               }




    
          }   





        if($check=="待核实"){
                $result_recommend =Db::table('recommend_list')
                ->order('id desc')
                ->where('status',$check)
                ->select();   //待核实

                foreach ($result_recommend as $key=> $v) {   //添加推荐人和电话
         
                    $family_account=$v['family_account'];
                    $list_owner = Db::table('owner_list')->where('family_account',$family_account)->field('owner')->select();
                    $list_phone = Db::table('owner_list')->where('family_account',$family_account)->field('phone')->select();
                   //dump(count($list_yes));
                   //dump(count($list_no));
                   if($list_owner != NULL){
                       $result_recommend[$key]['owner']=$list_owner[0]['owner'];
                   }else{
                       $result_recommend[$key]['owner']="";
                   }
       
                   if($list_phone != NULL){
                       $result_recommend[$key]['phone']=$list_phone[0]['phone'];
                   }else{
                       $result_recommend[$key]['phone']="";
                   }


                     //回访次数   
            $list = Db::table('visit_list')->where('agent_say','<>','NULL')->where('recommend_id',$result_recommend[$key]['id'])->select();                           
            $result_recommend[$key]['agent_say_count']=count($list);
                   
                  
                   }

            }
        else if($check=="成交"){
                $result_recommend =Db::table('recommend_list')
                ->order('id desc')
                ->where('house_status',$check)
                ->select();   //成交

                foreach ($result_recommend as $key=> $v) {   //添加推荐人和电话
         
                    $family_account=$v['family_account'];
                    $list_owner = Db::table('owner_list')->where('family_account',$family_account)->field('owner')->select();
                    $list_phone = Db::table('owner_list')->where('family_account',$family_account)->field('phone')->select();
                   //dump(count($list_yes));
                   //dump(count($list_no));
                   if($list_owner != NULL){
                       $result_recommend[$key]['owner']=$list_owner[0]['owner'];
                   }else{
                       $result_recommend[$key]['owner']="";
                   }
       
                   if($list_phone != NULL){
                       $result_recommend[$key]['phone']=$list_phone[0]['phone'];
                   }else{
                       $result_recommend[$key]['phone']="";
                   }

                     //回访次数   
            $list = Db::table('visit_list')->where('agent_say','<>','NULL')->where('recommend_id',$result_recommend[$key]['id'])->select();                           
            $result_recommend[$key]['agent_say_count']=count($list);
                   
                  
                   }

            }
        else if($check=="推荐成功"){
            $result_recommend =Db::table('recommend_list')
            ->order('id desc')
            ->where('status',$check)
            ->select();   //推荐成功

            foreach ($result_recommend as $key=> $v) {   //添加推荐人和电话
         
                $family_account=$v['family_account'];
                $list_owner = Db::table('owner_list')->where('family_account',$family_account)->field('owner')->select();
                $list_phone = Db::table('owner_list')->where('family_account',$family_account)->field('phone')->select();
               //dump(count($list_yes));
               //dump(count($list_no));
               if($list_owner != NULL){
                   $result_recommend[$key]['owner']=$list_owner[0]['owner'];
               }else{
                   $result_recommend[$key]['owner']="";
               }
   
               if($list_phone != NULL){
                   $result_recommend[$key]['phone']=$list_phone[0]['phone'];
               }else{
                   $result_recommend[$key]['phone']="";
               }


                 //回访次数   
            $list = Db::table('visit_list')->where('agent_say','<>','NULL')->where('recommend_id',$result_recommend[$key]['id'])->select();                           
            $result_recommend[$key]['agent_say_count']=count($list);
               
              
               }



        }
        else if($check=="全部")  {
            $result_recommend =Db::table('recommend_list')
            ->order('id desc')
            ->select();   //全部    // 添加姓名
            //dump($result_owner[0]['family_account']);

            foreach ($result_recommend as $key=> $v) {   //添加推荐人和电话
         
                $family_account=$v['family_account'];
                $list_owner = Db::table('owner_list')->where('family_account',$family_account)->field('owner')->select();
                $list_phone = Db::table('owner_list')->where('family_account',$family_account)->field('phone')->select();
               //dump(count($list_yes));
               //dump(count($list_no));
               if($list_owner != NULL){
                   $result_recommend[$key]['owner']=$list_owner[0]['owner'];
               }else{
                   $result_recommend[$key]['owner']="";
               }
   
               if($list_phone != NULL){
                   $result_recommend[$key]['phone']=$list_phone[0]['phone'];
               }else{
                   $result_recommend[$key]['phone']="";
               }


               //回访次数   
            $list = Db::table('visit_list')->where('agent_say','<>','NULL')->where('recommend_id',$result_recommend[$key]['id'])->select();                           
            $result_recommend[$key]['agent_say_count']=count($list);
               
              
               }

        }








    //  dump($result);
        $this->assign('recommendlist', $result_recommend);
        $this->assign('temp', $i);

        return $this->fetch();
    
    }
    public function examine()
    {
        $account=$_GET['account'];
        $typeid=$_GET['typeid'];
        $roomid=$_GET['roomid'];
        $trade_room=$roomid;
         //dump($account);
        // dump($typeid);  
        // dump($roomid);
        //return ['name'=>'thinkphp','status'=>1];
        

        if($typeid !="0"){
            

            Db::table('recommend_list')
            ->where('id', $account)
            ->update(['agent'=>$typeid]);

        
        }
        
        if($roomid!=0)
        {
          
            //alert($roomid);
            $result=Db::table('recommend_list')->where('trade_room', $roomid)->find();
         //   alert($result);
            if ($result==null ) {
                if($roomid!=1){
                    $house_status="成交";
                    $trade_time=date('Y-m-d H:i');
                    Db::table('recommend_list')
                    ->where('id', $account)
                    ->update(['house_status'=>$house_status,'trade_room'=>$trade_room,'trade_time'=>$trade_time]);

                }

              
            }
            else{

                 //---
                if($roomid!=1){
                    $house_status="成交";
                    $trade_time=date('Y-m-d H:i');
                    Db::table('recommend_list')
                    ->where('id', $account)
                    ->update(['house_status'=>$house_status,'trade_room'=>$trade_room,'trade_time'=>$trade_time]);

                }
                // ---
            
              
               // return ['room_message'=>'NO'];     限制一房一家获得佣金  并删除 //---  中的代码

                }

        }else{

             $house_status="未成交";
             $trade_room="";
             $trade_time=null;
             Db::table('recommend_list')
             ->where('id', $account)
             ->update(['house_status'=>$house_status,'trade_room'=>$trade_room,'trade_time'=>$trade_time]);
            }
        


     
            return "ok";
      //  $this->redirect('Recommend/recommend',['check'=>0]);
         
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
        //$sql = Db::table('recommend_list')->select();
        $sql =Db::table('recommend_list')
        ->order('id desc')
        ->select();   //全部    // 添加姓名
        //dump($result_owner[0]['family_account']);

        foreach ($sql as $key=> $v) {   //添加推荐人和电话
     
            $family_account=$v['family_account'];
            $list_owner = Db::table('owner_list')->where('family_account',$family_account)->field('owner')->select();
            $list_phone = Db::table('owner_list')->where('family_account',$family_account)->field('phone')->select();
           //dump(count($list_yes));
           //dump(count($list_no));
           if($list_owner != NULL){
               $sql[$key]['owner']=$list_owner[0]['owner'];
           }else{
               $sql[$key]['owner']="";
           }

           if($list_phone != NULL){
               $sql[$key]['phone']=$list_phone[0]['phone'];
           }else{
               $sql[$key]['phone']="";
           }


           //回访次数   
        $list = Db::table('visit_list')->where('agent_say','<>','NULL')->where('recommend_id',$sql[$key]['id'])->select();                           
        $sql[$key]['agent_say_count']=count($list);
           
          
           }


        //$recommendlist=$_GET['recommendlist'];
        //dump($recommendlist);
        //$sql=$recommendlist;
        // 设置表头信息
        $objPHPExcel->setActiveSheetIndex(0)
        ->setCellValue('A1', '推荐家庭')
        ->setCellValue('B1', '推荐人')
        ->setCellValue('C1', '推荐人电话')
        ->setCellValue('D1', '推荐日期')
        ->setCellValue('E1', '意向联系人')
        ->setCellValue('F1', '意向楼号')
        ->setCellValue('G1', '意向单元')
        ->setCellValue('H1', '意向楼层')
        ->setCellValue('I1', '意向面积(平米)')
        ->setCellValue('J1', '电话')
        ->setCellValue('K1', '类别')
        ->setCellValue('L1', '状态')
        ->setCellValue('M1', '经纪人')
        ->setCellValue('N1', '置业状态')
        ->setCellValue('O1', '成交房号')
        ->setCellValue('P1', '成交日期')
        ->setCellValue('Q1', '回访');
      
        /*--------------开始从数据库提取信息插入Excel表中------------------*/
 
        $i=2;  //定义一个i变量，目的是在循环输出数据是控制行数
        $count = count($sql);  //计算有多少条数据
        for ($i = 2; $i <= $count+1; $i++) {
            $objPHPExcel->getActiveSheet()->setCellValue('A' . $i, $sql[$i-2]['family_account']);
            $objPHPExcel->getActiveSheet()->setCellValue('B' . $i, $sql[$i-2]['owner']);
            $objPHPExcel->getActiveSheet()->setCellValue('C' . $i, $sql[$i-2]['phone']);
            $objPHPExcel->getActiveSheet()->setCellValue('D' . $i, $sql[$i-2]['recommend_time']);
            $objPHPExcel->getActiveSheet()->setCellValue('E' . $i, $sql[$i-2]['linkman']);
            $objPHPExcel->getActiveSheet()->setCellValue('F' . $i, $sql[$i-2]['building']);
            $objPHPExcel->getActiveSheet()->setCellValue('G' . $i, $sql[$i-2]['unit']);
            $objPHPExcel->getActiveSheet()->setCellValue('H' . $i, $sql[$i-2]['floor']);
            $objPHPExcel->getActiveSheet()->setCellValue('I' . $i, $sql[$i-2]['area']);
            $objPHPExcel->getActiveSheet()->setCellValue('J' . $i, $sql[$i-2]['linkman_phone']);
            $objPHPExcel->getActiveSheet()->setCellValue('K' . $i, $sql[$i-2]['category']);
            $objPHPExcel->getActiveSheet()->setCellValue('L' . $i, $sql[$i-2]['status']);
            $objPHPExcel->getActiveSheet()->setCellValue('M' . $i, $sql[$i-2]['agent']);
            $objPHPExcel->getActiveSheet()->setCellValue('N' . $i, $sql[$i-2]['house_status']);
            $objPHPExcel->getActiveSheet()->setCellValue('O' . $i, $sql[$i-2]['trade_room']);
            $objPHPExcel->getActiveSheet()->setCellValue('P' . $i, $sql[$i-2]['trade_time']);
            $objPHPExcel->getActiveSheet()->setCellValue('Q' . $i, $sql[$i-2]['agent_say_count']);
        }
 
         
        /*--------------下面是设置其他信息------------------*/
 
        $objPHPExcel->getActiveSheet()->setTitle('productaccess');      //设置sheet的名称
        $objPHPExcel->setActiveSheetIndex(0);                   //设置sheet的起始位置
        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');   //通过PHPExcel_IOFactory的写函数将上面数据写出来
        
        $PHPWriter = \PHPExcel_IOFactory::createWriter( $objPHPExcel,"Excel2007");
        ob_end_clean();
        ob_start();
        header('Content-Disposition: attachment;filename="推荐信息.xlsx"');
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

        
        
        $PHPWriter->save("php://output"); //表示在$path路径下面生成demo.xlsx文件
         // vendor("PHPExcel.PHPExcel");
         // $objPHPExcel = new \PHPExcel();  
         // dump("123");

    }

    public function getagent()
    {
        $agent_name = Db::table('user_list')->field(['account']) ->where('role',"1")->select();

        return $agent_name;

    }



}
