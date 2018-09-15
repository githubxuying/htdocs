<?php
namespace app\index\controller;

use \think\Controller;
use \think\Db;
use \think\Request;
    
class Userlist extends Controller
{
    public function userlist()
    {
    
          //$uid = input('uid');
          
           //显示 个人信息
           $temp_i=1;
           $this->assign('temp_i', $temp_i);
           $temp_name =Db::name('user_list')->column('name');
           $userName =Db::name('user_list')->column('name', 'id');
           $result =Db::name('user_list')->select();
           dump($userName);
          

        foreach ($temp_name as $v) {
            $char = $this->getFirstChar($v);
            dump($char);
            $charArray[$char][0]="";              //定义并初始化下标为字母的数组，首个元素为空
        }
           
        foreach ($result as $v) {
            $sname =  $userName[$v['id']];
            $char = $this->getFirstChar($sname);
            
    
            if ($charArray[$char][0]=="") {
                 $charArray[$char][0]=$v;
            } else {
                 array_push($charArray[$char], $v);
            }
           
           
            dump(sizeof($charArray[$char]));
        }
                // echo "按首字母排序前：<br/>";
                // dump($charArray);  o
               ksort($charArray);//根据键值对排序
                echo "按首字母排序后：<br/>";
               // dump($charArray);
            
            $this->assign('list_user', $charArray);
         
         
        //$temp=input('request.temp');
    
        // $temp = input('temp');
        //  print_r($temp);


    // 	if($temp=="3"){
     
            

    //  //
    // 	dump($temp);
    // 	//$this->assign('temp',$temp);
    // 	//$this->redirect('Userlist/userlist');
    // 	}

      
    //       $temp_ajax=input('temp_ajax');            //获取方法一
    // 	if($temp_ajax=="4"){
    //  //ajax请求数据  显示
    // 	   $uid = input('request.uid');             //获取方法二
    // 	 //$uid=Request::instance()->get('uid');    //获取方法三
    // 	 //$uid=Request::instance()->param('uid');  //获取方法四
    //        $result=Db::name('user_list')
    //        ->field('id,account')
    //        ->where('id', $uid)
    //        ->select();
    //      return json($result);
    //     // dump($uid);
    //    // return $result;
                
    // 	}


        
        return $this->fetch();
    }
    public function userlist_add()
    {
        //添加 个人信息
        $name=$_GET['name'];
        $account=$_GET['username'];
        $tel=$_GET['username'];
        $sex=$_GET['sex'];
        $marriage=$_GET['marry'];
        $birthday=$_GET['birthday'];
        $education=$_GET['educational_id'];
        $qualification=$_GET['post_id'];
        $post=$_GET['position_id'];
        $leader=$_GET['pid'];
        $entry_time=$_GET['entry_time'];
        $user_status=$_GET['state'];
        $mod_time=date('Y-m-d');
        $remark=$_GET['remark'];
        print_r($birthday);
        Db::table('user_list')->insert(['name'=>$name,'account'=>$account,'tel'=>$tel,'sex'=>$sex,'marriage'=>$marriage,'birthday'=>$birthday,'education'=>$education,'qualification'=>$qualification,'post'=>$post,'leader'=>$leader,'entry_time'=>$entry_time,'user_status'=>$user_status,'mod_time'=>$mod_time,'remark'=>$remark]);


        $result_be_app_id=Db::table('user_list')->field('id')->where('account', $account)->select();

        //系统积分
        //【学历】
        if ($education!="0") {
            switch (true) {
                case ($education ==="中专及以下");
                    $edu_score = 20;
                break;
                case ($education ==="大专");
                    $edu_score = 30;
                break;
                case ($education ==="本科");
                    $edu_score = 40;
                break;
                case ($education ==="硕士");
                    $edu_score = 50;
                break;
                case ($education ==="博士");
                    $edu_score = 60;
                break;
    
                default:
                    $edu_score = 0;
                    break;
            }

            $score=$edu_score;

            switch (true) {
                case ($score > 500 && $score <= 1000);
                    $face = "fei.gif";
                    break;
                case ($score > 50 && $score <= 500);
                    $face = "yaobai.gif";
                    break;
                case ($score > 30 && $score <= 50);
                    $face = "guzhang.gif";
                    break;
                case ($score > 15 && $score <= 30);
                    $face = "fangentou.gif";
                    break;
                case ($score > 10 && $score <= 15);
                    $face = "gaoxing.gif";
                    break;
                case ($score > 5 && $score <= 10);
                    $face = "ye.gif";
                    break;
                case ($score >= 0 && $score <= 5);
                    $face = "haixiu.gif";
                    break;
                case ($score >= -5 && $score <0);
                    $face = "no.gif";
                    break;
                case ($score >= -10 && $score < -5);
                    $face = "jingya.gif";
                    break;
                case ($score >= -25 && $score < -10);
                    $face = "liuhan.gif";
                    break;
                case ($score >= -1000 && $score < -25);
                    $face = "liulei.gif";
                    break;
        
                default:
                    $face = "haixiu.gif";
                    break;
            }



             $app_item="【学历】".$education;
             $app_time=date('Y-m-d H:i');
             $review_time=date('Y-m-d H:i');
            Db::table('reward_list')->insert(['be_app_id'=>$result_be_app_id[0]['id'],'app_user'=>"系统",'score'=>$edu_score,'face'=>$face,'be_app_user'=>$name,'app_item'=>$app_item,'description'=>"固定积分",'review_user'=>"系统",'app_time'=>$app_time,'review_time'=>$review_time,'reward_status'=>"审核",'apply_release'=>"下达"]);
        }




        $this->redirect('Userlist/userlist');
    }
    public function userlist_edit()
    {
         //修改 个人信息
        
            $id=$_GET['id'];
            $name=$_GET['name'];
            $account=$_GET['username'];
            $tel=$_GET['username'];
            $password=$_GET['pwd'];
            $sex=$_GET['sex'];
            $marriage=$_GET['marry'];
            $birthday=$_GET['birthday'];
            $education=$_GET['educational_id'];
            $qualification=$_GET['post_id'];
            $post=$_GET['position_id'];
            $leader=$_GET['pid'];
            $entry_time=$_GET['entry_time'];
            $user_status=$_GET['state'];
           // $specialty=join(',',$_GET['specialty']);   //  相同name去掉"[]"自动转为数组
        //	$specialtyfen=join(',',$_GET['specialtyfen']);  //
        //   dump($specialtyfen);                           // 特长加分数组
            $mod_time=date('Y-m-d');
            $remark=$_GET['remark'];
            print_r($birthday);
        
             
            Db::table('user_list')
            ->where('id', $id)
            ->update(['name' => $name,'account'=>$account,'tel'=>$tel,'password'=>$password,'sex'=>$sex,'marriage'=>$marriage,'birthday'=>$birthday,'education'=>$education,'qualification'=>$qualification,'post'=>$post,'leader'=>$leader,'entry_time'=>$entry_time,'user_status'=>$user_status,'mod_time'=>$mod_time,'remark'=>$remark]);

             $this->redirect('Userlist/userlist');
            // $this->success('修改成功', 'userlist');
    

         //
    }
    public function product_category_ajax()
    {
        //返回ajax请求，需要修改的个人信息
           $uid = input('request.uid');
           $result=Db::name('user_list')
           ->where('id', $uid)
           ->select();
         
        //  return $result;
        //  echo json_encode(['success'=>true]);
           // return $result;
           //
        
         return json($result);

         //    echo json_encode($result);
    }



    public function getFirstChar($s)
    {
    //按照字母排序
                    $s0 = mb_substr($s, 0, 1);                //获取名字的姓
                    $s = iconv('UTF-8', 'gb2312', $s0);       //将UTF-8转换成GB2312编码
        if (ord($s0)>128) {                      //汉字开头，汉字没有以U、V开头的
            $asc=ord($s{0})*256+ord($s{1})-65536;
            if ($asc>=-20319 and $asc<=-20284) {
                return "A";
            }
            if ($asc>=-20283 and $asc<=-19776) {
                return "B";
            }
            if ($asc>=-19775 and $asc<=-19219) {
                return "C";
            }
            if ($asc>=-19218 and $asc<=-18711) {
                return "D";
            }
            if ($asc>=-18710 and $asc<=-18527) {
                return "E";
            }
            if ($asc>=-18526 and $asc<=-18240) {
                return "F";
            }
            if ($asc>=-18239 and $asc<=-17760) {
                return "G";
            }
            if ($asc>=-17759 and $asc<=-17248) {
                return "H";
            }
            if ($asc>=-17247 and $asc<=-17418) {
                return "I";
            }
            if ($asc>=-17417 and $asc<=-16475) {
                return "J";
            }
            if ($asc>=-16474 and $asc<=-16213) {
                return "K";
            }
            if ($asc>=-16212 and $asc<=-15641) {
                return "L";
            }
            if ($asc>=-15640 and $asc<=-15166) {
                return "M";
            }
            if ($asc>=-15165 and $asc<=-14923) {
                return "N";
            }
            if ($asc>=-14922 and $asc<=-14915) {
                return "O";
            }
            if ($asc>=-14914 and $asc<=-14631) {
                return "P";
            }
            if ($asc>=-14630 and $asc<=-14150) {
                return "Q";
            }
            if ($asc>=-14149 and $asc<=-14091) {
                return "R";
            }
            if ($asc>=-14090 and $asc<=-13319) {
                return "S";
            }
            if ($asc>=-13318 and $asc<=-12839) {
                return "T";
            }
            if ($asc>=-12838 and $asc<=-12557) {
                return "W";
            }
            if ($asc>=-12556 and $asc<=-11848) {
                return "X";
            }
            if ($asc>=-11847 and $asc<=-11056) {
                return "Y";
            }
            if ($asc>=-11055 and $asc<=-10247) {
                return "Z";
            }
        } elseif (ord($s)>=48 and ord($s)<=57) { //数字开头
            switch (iconv_substr($s, 0, 1, 'utf-8')) {
                case 1:
                    return "Y";
                case 2:
                    return "E";
                case 3:
                    return "S";
                case 4:
                    return "S";
                case 5:
                    return "W";
                case 6:
                    return "L";
                case 7:
                    return "Q";
                case 8:
                    return "B";
                case 9:
                    return "J";
                case 0:
                    return "L";
            }
        } elseif (ord($s)>=65 and ord($s)<=90) { //大写英文开头
            return substr($s, 0, 1);
        } elseif (ord($s)>=97 and ord($s)<=122) { //小写英文开头
            return strtoupper(substr($s, 0, 1));
        } else {
            return iconv_substr($s0, 0, 1, 'utf-8');
            //中英混合的词语，不适合上面的各种情况，因此直接提取首个字符即可
        }
    }
}
