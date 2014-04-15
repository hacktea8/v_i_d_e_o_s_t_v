<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once 'avbase.php';
/**
playmode:
1:直接链接
2:外部播放器
3:下载链接
4:百度影音
5:快播影音
6:
7:
*/
class Maindex extends Avbase {
  public function __construct(){
    parent::__construct();
    //check is spilder
    $spider = check_is_spider();
    if(!isset($_COOKIE['isadult']) || !$spider){
        echo "<script>location.href='/warning/index';</script>";exit;
//      header('Location: /warning/index');
    }
//    $this->load->model('indexmodel');
//var_dump($this->viewData);exit;
  }
  public function index(){
    $this->assign(array());
    $this->view('index_index');
  }
  public function lists($cid,$order=0,$page=1){
   $cid = intval($cid);
   $order = intval($order);
   $page = intval($page);
   $channelList = $this->avmodel->getVideoListByCid($cid,$order,$page,$limit=25,$where = array('`flag`=1'));
   $this->assign(array('channelList'=>$channelList,'cid'=>$cid,'order'=>$order,'page'=>$page));
   $this->view('index_lists');
  }
  public function detail($vid){
   $vid = intval($vid);
   $info = $this->avmodel->getVideoInfoByid($vid,$this->userInfo['isadmin']);
   $this->assign(array('info'=>$info));
   $this->view('index_detail');
  }
  public function expired(){
   $this->view('index_expired');
  }
  public function play($vid,$playnum = 1){
   if(!$this->userInfo['uid']){
     $this->detail($vid);return false;
   }
   $vid = intval($vid);
   $playnum = intval($playnum);
   //判断是否有权限观看
   $lastFreeLog = 1;
   if(!$this->userInfo['isvip']){
     $log = $this->avmodel->getUserWatchLog($this->userInfo['uid'],12);
     if(count($log) <= $this->userInfo['watch'] && !in_array($vid,$log)){
       $lastFreeLog = 0;
     }
   }
   
   $info = $this->avmodel->getVideoPlayInfoByid($vid,$playnum);
   $playerMap = array(1=>'playfile.php',2=>'outplayer.php',3=>'download.php',4=>'baidu.php',5=>'qvod.php');
   $info['player'] = $playerMap[$info['playmode']];
//var_dump($info);exit;
   $this->assign(array('info'=>$info,'lastFreeLog'=>$lastFreeLog));
   if(!$lastFreeLog){
     $this->avmodel->addUserWatchLog($this->userInfo['uid'],$vid);
   }
   $this->view('index_play');
  }
  public function isUserInfo(){
    $data = array('status'=>0);
    if( isset($this->userInfo['uid']) && $this->userInfo['uid']){
       $data['status'] = 1;
    }
    die(json_encode($data));
  }
  public function loginout(){
   $this->logout();
  }
  public function login(){
   $url = $this->viewData['login_url'].urlencode($this->_r);
   redirect($url);
  }
  public function crondtab(){
   $fname = APPPATH.'../public/crondtable.txt';
   if(file_exists($fname) && (time() - fileatime($fname))> 600){
     //升级 失败的VIP
     
   }
   if(file_exists($fname) && (time() - fileatime($fname))< 12*3600){
     return false;
   }
echo 111;exit;
   //影片自动上架
   $this->avmodel->onlinevideo(3);
   
  }
}
