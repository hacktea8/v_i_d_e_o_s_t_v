<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once 'webbase.php';
class Avbase extends Webbase {
   
  public $seo_info = array('title' => '首页',
                   'keywords' => '',
                   'description' => ''
  );
  public $imguploadapiurl = 'http://img.hacktea8.com/imgapi/upload/?seq=';

  public function __construct(){
    parent::__construct();
    
    $this->load->helper('rewrite');
    $this->load->model('avmodel');
    $menuList = $this->mem->get('tv-menuList');
    if( !empty($menuList)){
      $menuListA = $this->avmodel->getMenuListById($idstr);
      $this->_rewrite_list_url($menuListA);
      $menuListB = $this->avmodel->getMenuListById($idstr);
      $this->_rewrite_list_url($menuListB);
      $menuList = array('menuListA'=>$menuListA,'menuListB'=>$menuListB);
      $this->mem->set('emu-rootCate',$menuList,$this->expirettl['1d']);
    } 
/*
    $hotTopic = $this->mem->get('emu-hotTopic');
//var_dump($hotTopic);exit;
    if(empty($hotTopic)){
      $hotTopic = $this->emulemodel->getHotTopic();
      $this->_rewrite_article_url($hotTopic);
      $this->mem->set('emu-hotTopic',$hotTopic,$this->expirettl['12h']);
    }
    $this->assign(array(
    'seo_info'=>$this->seo_info,
    ,'showimgapi'=>$this->showimgapi,'error_img'=>$this->showimgapi.'3958009_0000671092.jpg','menuList'=>$menuList,
    'thumhost'=>'http://i.ed2kers.com','cpid'=>0,'cid'=>0
    ,'editeUrl' => '/edite/index/emuleTopicAdd'
    ));
    $this->_get_postion();
*/
//var_dump($this->viewData);exit;
  }
  protected function _get_postion($postion = array()){
    $this->assign(array('postion'=>$postion));
  }
}
