<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include_once('admbase.php');

class Avadmin extends Admbase {

 public function __construct(){
   parent::__construct();		
   $this->load->model('admavmodel');
   $menuList = $this->mem->get('avtv-menuList');
   $channel = $menuList['menuListA']+$menuList['menuListB'];
   $this->assign(array('channel'=>$channel));
 }
	/**
	 * 
	 *
	 */
	public function index()
	{
            $this->load->view($this->_c.'_index', $this->viewData);
	}
	public function index_top(){
	    $this->view($this->_c.'_index_top');
	}
 public function index_left($type = 'video'){
   $this->assign(array('type'=>$type));
   $this->view($this->_c.'_index_left');
 }
 public function avchecklist($cid = 0,$page = 1){
   $limit=25;
   $lists = $this->admavmodel->getVideoListByCid($cid,$order=2,$page,$limit,$where = array(),1);
   $count = $this->admavmodel->getVideoCountByCid($cid);
   $this->load->library('pagination');
   $config['base_url'] = sprintf('/%s/%s/%d/',$this->_c,$this->_a,$cid);
   $config['total_rows'] = $count;
   $config['per_page'] = $limit;
   $config['cur_page'] = $page;
   $this->pagination->initialize($config);
   $page_string = $this->pagination->create_links();
   $this->assign(array('lists'=>$lists,'page_string'=>$page_string));
   $this->view($this->_c.'_avlist');
 }
 public function avlist($cid = 0,$page = 1){
   $limit=25;
   $lists = $this->admavmodel->getVideoListByCid($cid,$order=2,$page,$limit,$where = array());
   $count = $this->admavmodel->getVideoCountByCid($cid);
   $this->load->library('pagination');
   $config['base_url'] = sprintf('/%s/%s/%d/',$this->_c,$this->_a,$cid);
   $config['total_rows'] = $count;
   $config['per_page'] = $limit;
   $config['cur_page'] = $page;
   $this->pagination->initialize($config);
   $page_string = $this->pagination->create_links();
   $this->assign(array('lists'=>$lists,'page_string'=>$page_string));
   $this->view($this->_c.'_avlist');
 }
 public function avdetail($vid = 0){
   $data_head = $_POST['data_head'];
   if($data_head){
     $data_body = $_POST['data_body'];
     $vid = $this->admavmodel->setVideoInfoByData($data_head,$data_body);
     
   }
   if($vid){
     $info = $this->admavmodel->getVideoInfoByid($vid,1);
     if(strlen($info['atime'])>8){
       $info['atime'] = date('Ymd',strtotime($info['atime']));
     }
     $this->assign(array('info'=>$info));
   }
   $this->view($this->_c.'_avdetail');
 }
 public function avdraminfo(){
   $data_dram = $_POST['data_head'];
   $return = array('status'=>500);
   if($data_dram){
     $did = $this->admavmodel->addVideoDramByData($data_dram);
     $return['status'] = 200;
   }
   die(json_encode($return));
 }
 public function avcate(){
   $lists = $this->admavmodel->getMenuListById();
   $this->assign(array('lists'=>$lists));
   $this->view($this->_c.'_avcate');
 }
 public function avcatedetail($cid = 0){
   $data = $_POST['data'];
   if($data){
     $cid = $this->admavmodel->setVideoCateInfoByData($data);
   }
   if($cid){
     $info = $this->admavmodel->getVideoCateInfoByid($cid);
     $this->assign(array('info'=>$info));
   }
   $this->view($this->_c.'_avcatedetail');
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
