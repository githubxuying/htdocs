 <?php
  use \think\Db;
  use \think\Session;
  use \think\Controller;
  use \think\Jump;
  
 function sonsort($parent_id){
   //二级类别
       $result =Db::table('sort_list')->field(['id','sort'])->where('pid',$parent_id)->select();
     
       return $result;

    }
    function logout(){
        //退出
        //前端调用直接用{:logout()}    
           //   session(null);
            //  exit;
           // redirect('Userlogin/userlogin');
           //redirect('http://www.baidu.com');

          //  $url="http://www.baidu.com";
          //  header('Location:'.$url);

        //  header("http://www.thinkphp.cn/topic/49681.html");

       // header("Location:http://www.thinkphp.cn/topic/49681.html");
        
       //return "Userlogin/userlogin";
     
         }