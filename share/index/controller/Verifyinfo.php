<?php
namespace app\index\controller;

use \think\Controller;
use \think\Db;
use \think\Request;
use \think\Session;

class Verifyinfo extends Controller
{

    public function verifyinfo()
    {
//核实详细页
      if(session('agent')!==""){
        $id=$_GET['id'];
       
        $result_verify =Db::table('recommend_list')->field(['id','linkman','linkman_phone','agent','building','unit','floor','area','status'])
        ->where('agent', session('agent'))
        ->where('id', $id)
        ->select();   // 添加姓名

      }

      $this->assign('verifylist', $result_verify);
    


        return $this->fetch();
    }

    public function integraladd()
    {
        $family_account=session('account');
        $recommend_time=date('Y-m-d H:i');
        $verifyid=$_POST['verifyid'];
        $statusid=$_POST['statusid'];
        $categoryid=$_POST['categoryid'];
       
        
       // dump($linkman);

        Db::table('recommend_list')
        ->where('id',$verifyid)
        ->update(['status'=>$statusid,'category'=>$categoryid]);
        
        $this->redirect('Visitlist/visitlist');
    
    }

    public function building()              //根据楼号 确定单元
    {
        $buildingid=$_GET['buildingid'];
       
        if($buildingid==6){
            $unit = 4;
            return $unit;


        }else if($buildingid==7){

            $unit = 2;
            return $unit;

        }else if($buildingid==8 ||$buildingid==9){
            $unit = 3;
            return $unit;
            
        }
  
    }

    public function unit()       //根据单元 确定楼层
    {
        $unitid=$_GET['unitid'];
        $buildingid=$_GET['buildingid'];

        if($unitid==4 && $buildingid==6){
            $floor = 9;
            return $floor;


        }else if($unitid==3 && $buildingid==9){

            $floor = 9;
            return $floor;

        }else if($buildingid=="" ||$buildingid==""){
            $floor = 0;
            return $floor;
            
        }
        else{
            $floor =17;
            return $floor;
        }


    }

    public function floor()       //根据楼号单元 确定楼层面积
    {
        $unitid=$_GET['unitid'];
        $buildingid=$_GET['buildingid'];

        

        if($buildingid==6){            //   6号楼
            if($unitid==1){
                $area_1=array("85","105");
                return $area_1;

            }else if($unitid==2){
                $area_2=array("116");
                return $area_2;

            }else if($unitid==3){
                $area_3=array("85","105");
                return $area_3;

            }else if($unitid==4){
                $area_4=array("121","139");
                return $area_4;

            }



        }else if($buildingid==7){      //7号楼
            if($unitid==1){
                $area_1=array("105","126");
                return $area_1;


            }else if($unitid==2){
                $area_2=array("126","105");
                return $area_2;

            }

        }else if($buildingid==8){       //8号楼
            if($unitid==1){
                $area_1=array("85","105");
                return $area_1;

            }else if($unitid==2){
                $area_2=array("116");
                return $area_2;

            }else if($unitid==3){
                $area_3=array("85","105");
                return $area_3;

            }

        }else if($buildingid==9){      //9号楼
            if($unitid==1){
                $area_1=array("105","126");
                return $area_1;

            }else if($unitid==2){
                $area_2=array("126","105");
                return $area_2;

            }else if($unitid==3){
                $area_3=array("121","139");
                return $area_3;

            }

        }








    }



}
