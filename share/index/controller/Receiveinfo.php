<?php
namespace app\index\controller;

use \think\Controller;
use \think\Db;
use \think\Request;
use \think\Session;

class Receiveinfo extends Controller
{

    public function receiveinfo()
    {
        //查阅或者决策
        $i=1;
        $recommend_id=$_GET['recommend_id'];
       // $id=$_GET['id'];
        $recommend_info = Db::table('recommend_list')->field(['id','linkman','linkman_phone','building','unit','floor','area','agent','category']) ->where('id',$recommend_id)->select();
        $agent_say = Db::table('visit_list')->field(['agent_say']) ->where('recommend_id',$recommend_id)->where('agent_say','<>','NULL')->select();
        $admin_say = Db::table('visit_list')->field(['admin_say']) ->where('recommend_id',$recommend_id)->where('admin_say','<>','NULL')->select();

        //$recommend_info[0]['id']=$id;


        $this->assign('recommendlist', $recommend_info);
        $this->assign('agent_info', $agent_say);
        $this->assign('admin_info', $admin_say);
        $this->assign('info_i', $i);
 




        return $this->fetch();
    }

    public function integraladd()
    {
        $id=$_GET['id'];
      
        Db::table('visit_list')
        ->where('recommend_id', $id)
        ->where('suggest_status','=','评论')
        ->update(['agent_status'=>"已阅"]);

        $this->redirect('Receivelist/receivelist');
    
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
