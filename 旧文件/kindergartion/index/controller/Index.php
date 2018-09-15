<?php
namespace app\index\controller;

use \think\Controller;
use \think\Db;
use \think\Request;	
class Index     extends Controller
{
    public function index(){


        
        return  $this->fetch();
    }
    public function header(){
		
		return $this->fetch('header');
	}
	 public function footer(){
		
		return $this->fetch('footer');
	}
	 public function left(){
		
		return $this->fetch('left');
	}
	public function right(){
		$result=Db::execute('select * from de_custom_list  ');
        //dump($result);
		//print_r($result);
	
		return $this->fetch();
	}
		public function userinfo(){
		
		return $this->fetch();
	}
		public function touppwd(){
		
		return $this->fetch();
	}
	
		public function waitVerify(){
		
		return $this->fetch();
	}
		public function myVerify(){
		
		return $this->fetch();
	}
		public function myBack(){
		
		return $this->fetch();
	}
		public function executeList(){
		
		return $this->fetch();
	}
		public function toexecute(){
		
		return $this->fetch();
	}
		public function ranking(){
		
		return $this->fetch();
	}
		public function totalRanking(){
		
		return $this->fetch();
	}
		public function teamRank(){
		
		return $this->fetch();
	}
		public function teamList(){
		
		return $this->fetch();
	}
	    public function userlist_ajax(){
  
		   //$uid = input('request.uid');             //获取方法二
		 $uid=Request::instance()->get('uid');    //获取方法三
		 //$uid=Request::instance()->param('uid');  //获取方法四
	       $result=Db::name('user_list')
	       ->field('id,account')
	       ->where('id', 7)
	       ->select();
		//echo json_encode($result);
         //dump($uid);
         $test = 2;
         dump($test);
          return $test;

     


          
		   
		     

	    }
		public function userlist(){
		 $temp = input('temp');
		  //$uid = input('uid');
		  
		 
		 
		//$temp=input('request.temp');
		print_r($temp);
       if($temp=="1"){
	//修改
	
	       $user_mod =Db::name('user_list')->where('id',3);
	       dump($user_mod);

       }
		if($temp=="2"){
    //显示   
           $temp_i=1;
           $this->assign('temp_i',$temp_i);	         
           $temp_name =Db::name('user_list')->column('name');
           $userName =Db::name('user_list')->column('name','id');
           $result =Db::name('user_list')->select();
		   dump($userName);
		  

		    foreach($temp_name as $v){	 
            $char = $this->getFirstChar($v); 
		    dump($char);	
		    $charArray[$char][0]="";              //定义并初始化下标为字母的数组，首个元素为空

		    
           }
           
		    foreach($result as $v){  
            $sname =  $userName[$v['id']];
            $char = $this->getFirstChar($sname);  
            
	
            if($charArray[$char][0]=="")
            {
            	 
            	 $charArray[$char][0]=$v;
            }
            else{
            	 array_push($charArray[$char],$v);
            }
           
           
            dump(sizeof($charArray[$char]));
          
             }  
                // echo "按首字母排序前：<br/>";  
                // dump($charArray);  
               ksort($charArray);//根据键值对排序                 
                echo "按首字母排序后：<br/>";  
                dump($charArray);      
            
            $this->assign('list_user',$charArray);
		}

		if($temp=="3"){
     //添加
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
 

//        
		dump($temp);
		//$this->assign('temp',$temp);
		}
      
          $temp_ajax=input('temp_ajax');            //获取方法一
		if($temp_ajax=="4"){
	//ajax请求数据  显示
		   $uid = input('request.uid');             //获取方法二
		 //$uid=Request::instance()->get('uid');    //获取方法三
		 //$uid=Request::instance()->param('uid');  //获取方法四
	       $result=Db::name('user_list')
	       ->field('id,account')
	       ->where('id', $uid)
	       ->select();
		return json_encode($result);
         dump($uid);
      //    return json($result);
          
		   
		     
		 
    
		}
		return $this->fetch();
	}

		public function delimitList(){
		
		return $this->fetch();
	}
		public function noticeList(){
		
		return $this->fetch();
	}
		public function setting(){
		
		return $this->fetch();
	}

		public function getFirstChar($s){  
		            $s0 = mb_substr($s,0,1);                //获取名字的姓  
		            $s = iconv('UTF-8','gb2312', $s0);       //将UTF-8转换成GB2312编码  
		            if (ord($s0)>128) {                      //汉字开头，汉字没有以U、V开头的  
		            $asc=ord($s{0})*256+ord($s{1})-65536;  
		            if($asc>=-20319 and $asc<=-20284)return "A";  
		            if($asc>=-20283 and $asc<=-19776)return "B";  
		            if($asc>=-19775 and $asc<=-19219)return "C";  
		            if($asc>=-19218 and $asc<=-18711)return "D";  
		            if($asc>=-18710 and $asc<=-18527)return "E";  
		            if($asc>=-18526 and $asc<=-18240)return "F";  
			        if($asc>=-18239 and $asc<=-17760)return "G";  
			        if($asc>=-17759 and $asc<=-17248)return "H";  
			        if($asc>=-17247 and $asc<=-17418)return "I";              
		            if($asc>=-17417 and $asc<=-16475)return "J";               
		            if($asc>=-16474 and $asc<=-16213)return "K";               
		            if($asc>=-16212 and $asc<=-15641)return "L";               
		            if($asc>=-15640 and $asc<=-15166)return "M";               
		            if($asc>=-15165 and $asc<=-14923)return "N";               
		            if($asc>=-14922 and $asc<=-14915)return "O";               
		            if($asc>=-14914 and $asc<=-14631)return "P";               
		            if($asc>=-14630 and $asc<=-14150)return "Q";               
		            if($asc>=-14149 and $asc<=-14091)return "R";               
		            if($asc>=-14090 and $asc<=-13319)return "S";               
		            if($asc>=-13318 and $asc<=-12839)return "T";               
		            if($asc>=-12838 and $asc<=-12557)return "W";               
		            if($asc>=-12556 and $asc<=-11848)return "X";               
		            if($asc>=-11847 and $asc<=-11056)return "Y";               
		            if($asc>=-11055 and $asc<=-10247)return "Z";   
		        }else if(ord($s)>=48 and ord($s)<=57){ //数字开头  
		            switch(iconv_substr($s,0,1,'utf-8')){  
		                case 1:return "Y";  
		                case 2:return "E";  
		                case 3:return "S";  
		                case 4:return "S";  
		                case 5:return "W";  
		                case 6:return "L";  
		                case 7:return "Q";  
		                case 8:return "B";  
		                case 9:return "J";  
		                case 0:return "L";  
		            }                 
		        }else if(ord($s)>=65 and ord($s)<=90){ //大写英文开头  
		            return substr($s,0,1);  
		        }else if(ord($s)>=97 and ord($s)<=122){ //小写英文开头  
		            return strtoupper(substr($s,0,1));  
		        }  
		        else  
		        {  
		            return iconv_substr($s0,0,1,'utf-8');  
		            //中英混合的词语，不适合上面的各种情况，因此直接提取首个字符即可  
		        }  
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
	public function gr(){
		//$result=input('?get.louhao');
		//$louhao=Request::instance()->get('louhao');
		//$danyuan=Request::instance()->get('danyuan');
		//$menpai=Request::instance()->get('menpai');
		//$jiashu=Request::instance()->get('jiashu');
		//$temp = '011010102';
		$temp=$_GET['jiashu'];
		$this->assign('temp',$temp);	
		if($temp=="03"){
		 $temp_jt=$_GET['louhao'].$_GET['danyuan'].$_GET['menpai'];
		 $temp_hz1=$temp_jt."03";
		 $temp_hz2=$temp_jt."04";
		 $temp_hz3=$temp_jt."05";
		$count = Db::name('personal_integral')->where('card_num','=',$temp_hz1)->count();
		
		 if($count>0){
			 	
			 $list_hz1=Db::table('personal_integral')->where('card_num','=',$temp_hz1)->select();
		
		 }
		 else{
		
			 $list_hz1=array (
    'card_num' =>0,
    'integral_total' =>0
);

		 }
		$count = Db::name('personal_integral')->where('card_num','=',$temp_hz2)->count();
		 if($count>0){
			 	
			 $list_hz2=Db::table('personal_integral')->where('card_num','=',$temp_hz2)->select();
		 }
		 else{
		
			 $list_hz2=array (
    'card_num' =>0,
    'integral_total' =>0
);

		 }
		 $count = Db::name('personal_integral')->where('card_num','=',$temp_hz3)->count();
		 if($count>0){
			 	
			 $list_hz3=Db::table('personal_integral')->where('card_num','=',$temp_hz3)->select();
		 }
		 else{
		
			 $list_hz3=array (
    'card_num' =>0,
    'integral_total' =>0
);

		 }
		 
		$this->assign('list_hz1',$list_hz1);	
		$this->assign('list_hz2',$list_hz2);
		$this->assign('list_hz3',$list_hz3);

		 
			
			
		}
		else{
			
			$temp_gr=$_GET['louhao'].$_GET['danyuan'].$_GET['menpai'].$_GET['jiashu'];
		   // dump($temp_gr);
				//$list_gr=Db::table('personal_integral')->where('card_num','=',$temp_gr)->select();
		
		$count = Db::name('personal_integral')->where('card_num','=',$temp_gr)->count();
		 if($count>0){
			 
			 $list_gr=Db::table('personal_integral')->where('card_num','=',$temp_gr)->select();
		 }
		 else{
		
			 $list_gr=array (
    'card_num' =>0,
    'integral_total' =>0
);

		 }
		
		//dump($list_gr);
	     $this->assign('list_gr',$list_gr);
		 
			
		}
		
	    $temp_jt=$_GET['louhao'].$_GET['danyuan'].$_GET['menpai'];
	
		//$list_jt=Db::table('family_integral')->where('card_num','=',$temp_jt) ->field('integral_total')->select();
		
		$count = Db::name('family_integral')->where('card_num','=',$temp_jt)->count();
		 if($count>0){
			 
			 $list_jt=Db::table('family_integral')->where('card_num','=',$temp_jt)->select();
		 }
		 else{
		
			 $list_jt=array (
    'card_num' =>0,
    'integral_total' =>0
);

		 }
		 
		//$list=Db::table('personal_integral')->where('card_num','exp',"= CONCAT('"$temp"','1','0101','02')")->select();
		
		//dump($list_jt);
   
		$this->assign('list_jt',$list_jt);
		return $this->fetch();
		
	}
	public function time_gr(){
		
		
		return $this->fetch();
		
	}
	public function jt(){
		
		 $temp_jt=$_GET['louhao'].$_GET['danyuan'].$_GET['menpai'];
		 $temp_bb=$temp_jt."01";
		 $temp_mm=$temp_jt."02";
		 $temp_hz1=$temp_jt."03";
		 $temp_hz2=$temp_jt."04";
		 $temp_hz3=$temp_jt."05";
		 $temp_yy=$temp_jt."06";
		 $temp_nn=$temp_jt."07";
		 $temp_wg=$temp_jt."08";
		 $temp_wp=$temp_jt."09";
		 
		 	 $count = Db::name('personal_integral')->where('card_num','=',$temp_bb)->count();
		 if($count>0){
			 
			 $list_bb=Db::table('personal_integral')->where('card_num','=',$temp_bb)->select();
		 }
		 else{
		
			 $list_bb=array (
    'card_num' =>0,
    'integral_total' =>0
);

		 }
		 $count = Db::name('personal_integral')->where('card_num','=',$temp_mm)->count();
		 if($count>0){
			 	
			 $list_mm=Db::table('personal_integral')->where('card_num','=',$temp_mm)->select();
		 }
		 else{
		
			 $list_mm=array (
    'card_num' =>0,
    'integral_total' =>0
);

		 }
		$count = Db::name('personal_integral')->where('card_num','=',$temp_hz1)->count();
		 if($count>0){
			 	
			 $list_hz1=Db::table('personal_integral')->where('card_num','=',$temp_hz1)->select();
		 }
		 else{
		
			 $list_hz1=array (
    'card_num' =>0,
    'integral_total' =>0
);

		 }
		 $count = Db::name('personal_integral')->where('card_num','=',$temp_hz2)->count();
		 if($count>0){
			 	
			 $list_hz2=Db::table('personal_integral')->where('card_num','=',$temp_hz2)->select();
		 }
		 else{
		
			 $list_hz2=array (
    'card_num' =>0,
    'integral_total' =>0
);

		 }
		 $count = Db::name('personal_integral')->where('card_num','=',$temp_hz3)->count();
		 if($count>0){
			 	
			 $list_hz3=Db::table('personal_integral')->where('card_num','=',$temp_hz3)->select();
		 }
		 else{
		
			 $list_hz3=array (
    'card_num' =>0,
    'integral_total' =>0
);

		 }
		$count = Db::name('personal_integral')->where('card_num','=',$temp_yy)->count();
		 if($count>0){
			 	
			 $list_yy=Db::table('personal_integral')->where('card_num','=',$temp_yy)->select();
		 }
		 else{
		
			 $list_yy=array (
    'card_num' =>0,
    'integral_total' =>0
);

		 }
		 $count = Db::name('personal_integral')->where('card_num','=',$temp_nn)->count();
		 if($count>0){
			 	
			 $list_nn=Db::table('personal_integral')->where('card_num','=',$temp_nn)->select();
		 }
		 else{
		
			 $list_nn=array (
    'card_num' =>0,
    'integral_total' =>0
);

		 }
		  $count = Db::name('personal_integral')->where('card_num','=',$temp_wg)->count();
		 if($count>0){
			 	
			 $list_wg=Db::table('personal_integral')->where('card_num','=',$temp_wg)->select();
		 }
		 else{
		
			 $list_wg=array (
    'card_num' =>0,
    'integral_total' =>0
);

		 }
		 $count = Db::name('personal_integral')->where('card_num','=',$temp_wp)->count();
		 if($count>0){
			 	
			 $list_wp=Db::table('personal_integral')->where('card_num','=',$temp_wp)->select();
		 }
		 else{
		
			 $list_wp=array (
    'card_num' =>0,
    'integral_total' =>0
);

		 }
		// $list_hz1=Db::table('personal_integral')->where('card_num','=',$temp_hz1)->select();
		
		
		 		 $count = Db::name('family_integral')->where('card_num','=',$temp_jt)->count();
		 if($count>0){
			 	
			 $list_jt=Db::table('family_integral')->where('card_num','=',$temp_jt) ->field('integral_total')->select();
		 }
		 else{
		
			 $list_jt=array (
    'card_num' =>0,
    'integral_total' =>0
);

		 }
		 //dump($temp_jt);
		 //dump($temp_bb);
		 
		 
			
		$this->assign('list_bb',$list_bb);	
		$this->assign('list_mm',$list_mm);
		$this->assign('list_hz1',$list_hz1);	
		$this->assign('list_hz2',$list_hz2);
		$this->assign('list_hz3',$list_hz3);
		$this->assign('list_yy',$list_yy);
		$this->assign('list_nn',$list_nn);
		$this->assign('list_wg',$list_wg);
		$this->assign('list_wp',$list_wp);
		$this->assign('list_jt',$list_jt);
		return $this->fetch();
		
	}
	public function time_jt(){
		
		
		return $this->fetch();
		
	}
	public function cxxx(){
		
	    $temp_gr = input('temp_xx');
		$list_gr=Db::table('integration_details')->where('card_num','=',$temp_gr)->select();
       
	  //  print_r($temp_gr);
	//    dump($list_gr);
		 $this->assign('list',$list_gr);
		 
		return $this->fetch();
		
	}
	public function time_cxxx(){
		
		
		return $this->fetch();
		
	}
		
 
    
    
}
