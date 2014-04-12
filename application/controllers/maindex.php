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
   $this->assign(array());
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
   $vid = intval($vid);
   $playnum = intval($playnum);
   //判断是否有权限观看
   $lastFreeLog = 1;
   
   $info = $this->avmodel->getVideoPlayInfoByid($vid,$playnum);
   $playerMap = array(1=>'playfile.php',2=>'outplayer.php',3=>'download.php',4=>'baidu.php',5=>'qvod.php');
   $info['player'] = $playerMap[$info['playmode']];
//var_dump($info);exit;
   $this->assign(array('info'=>$info));
   $this->view('index_play');
  }
  public function loginout(){
   $this->logout();
  }
}
