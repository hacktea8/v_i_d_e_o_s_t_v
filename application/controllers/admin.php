<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include_once('admbase.php');

class Admin extends Admbase {

     public function __construct(){
	    parent::__construct();
		
	 }
	/**
	 * 
	 *
	 */
	public function index()
	{
            $this->load->view('index', $this->viewData);
	}
	public function index_top(){
	    $this->view('index_top');
	}
	public function index_left(){
	    $this->view('index_left');
	}
	public function index_share(){
	    $this->view('index_share');
	}
	public function index_album(){
	    $this->view('index_album');
	}
	public function index_footer(){
	    $this->view('index_footer');
	}
	public function album_cate($p=1){
		$p=intval($p);
		$p=$p>0?$p:1;
		$limit=10;
        $list=$this->imgsmodel->getCateInfoList($p,$limit);
		$total=$this->imgsmodel->getCateCount();
		$psize=ceil($total/$limit);
		$pstr=$this->getpagestr('/admin/album_cate/',$p,$psize,5);
        $this->setviewData(array('list'=>$list,'ptotal'=>$total,'psize'=>$psize,'pagestr'=>$pstr));
	    $this->load->view('album_cate',$this->viewData);
	}
	public function ablum_cate_detail($cid=0){
        $row=$this->input->post('row');
		$rootCate=$this->imgsmodel->getRootCateInfo();
		if($row['title']){
			//echo '<pre>';var_dump($row);exit;
		   $cid=$this->imgsmodel->updateCate($row);
		}
		if($cid){
		   $info=$this->imgsmodel->getCateInfoByCid($cid);
		   $this->viewData['info']=$info;
	    }
		$this->setviewData(array('rootCate'=>$rootCate));
	    $this->load->view('ablum_cate_detail',$this->viewData);
	}
	public function index_user(){
	    $this->load->view('index_user');
	}
    public function user_setting(){
	    $this->load->view('user_setting');
	}
	public function index_system(){
	    $this->load->view('index_system');
	}
	public function system_config(){
	    $this->load->view('system_config');
	}
	public function yundisk_list($p=1){
	    $p=intval($p);
		$p=$p>0?$p:1;
		$limit=10;
        $list=$this->imgsmodel->getYundiskInfoList($p,$limit);
		$total=$this->imgsmodel->getYundiskCount();
		$psize=ceil($total/$limit);
		$pstr=$this->getpagestr('/admin/yundisk_list/',$p,$psize,5);
        $this->setviewData(array('list'=>$list,'ptotal'=>$total,'psize'=>$psize,'pagestr'=>$pstr));
	    $this->load->view('yundisk_list',$this->viewData);
	}
	public function yundisk_config($key='baiduPcs_app'){
	    $row=$this->input->post('row');
		if($row){
		  $this->imgsmodel->updateConfigByKey($row);
		}
        $info=$this->imgsmodel->getConfigByKey($key);
		if($info){
			$info=unserialize($info['val']);
           $this->viewData['info']=$info;
		}
	    $this->load->view('yundisk_config',$this->viewData);
	}
	public function yundisk_detail($uid=0){
        $row=$this->input->post('row');
		if($row){
		  $uid=$this->imgsmodel->setAppDiskToken($row);
		}
        $info=$this->imgsmodel->getAppDiskToken($uid);
        $this->viewData['info']=$info;
	    $this->load->view('yundisk_detail',$this->viewData);
	}
    public function yundisk_add(){
	    //require('baidupan.inc.php');
        $this->load->library('baidupcstoken');
	$appconfig=$this->config->item('baiduPcs_app');
        $this->baidupcstoken->init($appconfig);
//var_dump($this->baidupcstoken);exit;

$code=isset($_GET['code'])?$_GET['code']:0;
//$code='1081f2a179068bf543402d290347674d';
if($code){
 /* $oseq=$_GET['seq'];
  $seq=$this->getSecode();
  if(substr($oseq,0,8)!=substr($seq,0,8)){
     die('error! seq');
  }
*/
//echo $code;
  $html=$this->baidupcstoken->getTokenByInit($code);
//echo '<pre>';var_dump($uinfo);exit;
  if($html){
     $data=array();
     $data['access_token']=$html['access_token'];
     $data['refresh_token']=$html["refresh_token"];
     $data['session_key']=$html["session_key"];
     $data['session_secret']=$html["session_secret"];
     $data['uid']=$html['uid'];
     $data['uname']=$html['uname'];
     $this->imgsmodel->setAppDiskToken($data);
     header('Location: /admin/yundisk_list');
     return true;
   }
  die('error! Token');
}else{
//	$seq=$this->getSecode();
    header('Location: '.$this->baidupcstoken->getAuthorizationCodeUrl());
}
/**/
	    echo $_GET['code'];exit;
	}
	
	public function index_change(){
	    $this->load->view('index_change');
	}
	public function index_main(){
	     $this->load->view('index_main');
	}
    public function systemcache($mod=0){
		 if($mod){
		    $mode=array($mod);
		 }else{
		    $mode=$this->input->post('mod');
			if(!$mode)
				$mode=array();

		 }
		 foreach($mode as $mod){
	         $this->clearcache($mod);
		 }
         $this->load->view('systemcache',$this->viewData);
	}
    protected function clearcache($mod){
		//系统配置文件更新
	     if($mod==1){
		    $config=$this->imgsmodel->getConfigByKey();
			$cfg=$this->config->item('custum_config');
			
			file_put_contents($cfg,"\xEF\xBB\xBF<?php \r\n");
			$data='';
			foreach($config as $val){
			   $key=$val['var'];
			   $value=unserialize($val['val']);
			   $str='array(';
			   foreach($value as $k=>$v){
			      $str.="'{$k}'=>'{$v}',";
			   }
			   $str=rtrim($str,',').')';
			   $data.="\$config['{$key}']={$str};\r\n";
			   file_put_contents($cfg,$data,FILE_APPEND);
			}
		 }elseif($mod==2){
		    
		 }elseif($mod==3){
		     
		 }
	}

	public function getpagestr($url,$p=1,$end=1,$size=5){
	  $str='';
	  $start=($p-$size)>0?($p-ceil($size/2)):1;
	  $len=$end;
	  if($start>1){
	     $len=$p+ceil($size/2);
	  }
	  $len=$len>$end?$end:$len;
      if($end>1){
		  // last page
	     if($p>1){
		    $str.="<a href='{$url}".($p-1)."'>上一页</a> &nbsp;";
		 }
         for($i=$start;$i<=$len;$i++){
			 if($i==$p){
			    $pp="<span class='current'>{$i}</span>&nbsp;";
			 }else{
			    $pp="<a href='{$url}{$i}'>&nbsp;{$i}&nbsp;</a>&nbsp;";
			 }
		     $str.=$pp;
		 }
         // next page
		 if($p<$end){
		    $str.="<a href='{$url}".($p+1)."'>下一页</a>";
		 }
	  }
	  return $str;
	}
}
