<?php
namespace app\index\controller;

use \think\Controller;
use \think\Db;
use \think\Request;
    
class Teamlist extends Controller
{
    
    public function teamlist()
    {
        // //默认加载
        // $result =Db::table('team_list')->field(['id','name','mark'])->select();
        // dump($result);
        // foreach ($result as $v) 
        // {
        //     //班级成员
        //     $team_user_name =Db::table('user_list')->where('team', $v['id'])->field('name')->select();
        //     $team_user_id =Db::table('user_list')->where('team', $v['id'])->field('id')->select();
          
        //     $user_id="";
        //     foreach ($team_user_id as $v_id) 
        //     {
        //         $user_id=$user_id.$v_id['id'].',';
        //     }
        //     $this->assign('team_user_id', $user_id);
           
        //     $this->assign('team_user_name', $team_user_name);
        // }
        // $this->assign('team_list', $result);

        // //当前用户选中状态
        // $this->assign('user_list', $this->user_json());
        // return $this->fetch();

      //默认加载
      $team_id =Db::name('team_list')->field(['id','name'])->select();
      foreach($team_id as $v)
      {
          $t_id=$v['id'];
          $t_name=$v['name'];


       
        //班级成员
        $team_user_name =Db::table('user_list')->where('team', $v['id'])->field('name')->select();
        $team_user_id =Db::table('user_list')->where('team', $v['id'])->field('id')->select();
        $user_id="";
        foreach ($team_user_id as $v_id) 
        {
            $user_id=$user_id.$v_id['id'].',';
        }

        $teamArray[$t_name][]=$user_id; 
        
        foreach ($team_user_name as $v_name) {

            
         array_push($teamArray[$t_name], $v_name);
        }
        


      }
      dump($teamArray);
      

      $result =Db::table('team_list')->field(['id','name','mark'])->select();
      dump($result);
      foreach ($result as $v) 
      {
          //班级成员
          $team_user_name =Db::table('user_list')->where('team', $v['id'])->field('name')->select();
          $team_user_id =Db::table('user_list')->where('team', $v['id'])->field('id')->select();
        
          $user_id="";
          foreach ($team_user_id as $v_id) 
          {
              $user_id=$user_id.$v_id['id'].',';
          }
          $this->assign('team_user_id', $user_id);
         
          $this->assign('team_user_name', $team_user_name);
      }
      $this->assign('team_list', $result);

      //当前用户选中状态
      $this->assign('user_list', $this->user_json());
      return $this->fetch();




    }


    public function addteam()
    {
        //添加团队
        $name=$_GET['teamName'];
        $mark=$_GET['remark'];
        Db::table('team_list')->insert(['name'=>$name,'mark'=>$mark]);

        $team_id =Db::table('team_list')->field('id')->where('name', $name)->select();
        return $team_id;
    }

    public function teaminfo()
    {
        //修改团队前 获取团队信息
        $id=$_GET['id'];
        $team_info =Db::table('team_list')->field(['id','name','mark'])->where('id', $id)->select();
        return $team_info;
    }

    public function upteam()
    {
        //修改团队
        $id=$_GET['tid'];
        $name=$_GET['teamname'];
        $mark=$_GET['remark'];

        Db::table('team_list')
        ->where('id', $id)
        ->update(['name' => $name,'mark'=>$mark]);

        return $id;
    }

    public function user_json()
    {
        $result_user =Db::table('user_list')->field(['id','name','check'])->select();

        return json_encode($result_user);
    }

    public function subteamuser()
    {
        //更新团队人员
        $id=$_GET['tid'];
        $olduserid=$_GET['olduserid'];
        $newuserid=$_GET['newuserid'];
        
        $arr_olduserid=explode(",", $olduserid);
        $arr_newuserid=explode(",", $newuserid);
        
        foreach ($arr_olduserid as $v) {
            Db::table('user_list')
            ->where('id', $v)
            ->update(['team' =>"",'check'=>"no"]);
        }

        foreach ($arr_newuserid as $v) {
            Db::table('user_list')
            ->where('id', $v)
            ->update(['team' =>$id,'check'=>"yes"]);
        }

        return "OK";
    }
}
