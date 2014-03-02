<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once 'usrbase.php';
class Edite extends Usrbase {
  public $_action = array('emuleTopicAdd');
  public $imguploadapiurl = 'http://img.hacktea8.com/imgapi/upload/?seq=';

  
        /**
         * Index Page for this controller.
         *
         */
  public function __construct(){
    parent::__construct();
//    $this->load->model('indexmodel');
    // check login 
    if( !$this->checkLogin()){
     redirect('/');
    }
  }
  public function index($type, $id = 0){
     if( !in_array($type, $this->_action)){
         die('1');
     }
     $this->$type($id);
  }
  public function deletes($type, $id){
    
  }
  protected function emuleTopicAdd($id = 0){
    $header = $this->input->post('header');
    if(isset($header['name'])){
         $body = $this->input->post('body');
//var_dump($body);exit;
         $this->emulemodel->setEmuleTopicByAid($this->userInfo['uid'],$data = array('header'=>$header,'body'=>$body),$this->userInfo['isadmin']);
    }
    $info = array();
    if($id){
       $info = $this->emulemodel->getEmuleTopicByAid($id,$this->userInfo['uid'], $this->userInfo['isadmin']);
       $info = $info['info'];
       if(isset($info['id'])){
          $catelist = $this->_getCateListById($info['cid'], $pid = 0);
          $pcate = array_pop($catelist);
          $pid = $pcate['pid'];
       }
    }
    $this->assign(array('subCate'=>$catelist,'pid'=>$pid,'_a'=>'emuleTopicAdd','info'=>$info,'imguploadapiurl'=>$this->imguploadapiurl
    ,'postion'=>array(array('url'=>'#','name'=>'编辑'))
    ));
    $this->view('edite_emuleTopicAdd');
  }
}
