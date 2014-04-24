<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once 'webbase.php';
class Avbase extends Webbase {
  public $player_config = array('width'=>960,'height'=>500,'autoplay'=>'true');
  public $seo_info = array('title' => '首页',
                   'keywords' => '',
                   'description' => ''
  );
  public $imguploadapiurl = 'http://img.hacktea8.com/imgapi/upload/?seq=';
  public $editVideoUrl = '/avadmin/avdetail/';

  public function __construct(){
    parent::__construct();
    
    $this->load->model('avmodel');
    $menuList = $this->mem->get('avtv-menuList');
    if( empty($menuList)){
      $menuList = $this->avmodel->getMenuListById();
      $menuListA = slice_array($menuList,0,3);
      $menuListB = slice_array($menuList,3);
      $menuList = array('menuListA'=>$menuListA,'menuListB'=>$menuListB);
      $this->mem->set('avtv-menuList',$menuList,$this->expirettl['1d']);
    } 
    $channel = $menuList['menuListA']+$menuList['menuListB'];
//var_dump($menuList['menuListB']);exit;
/*
    $hotTopic = $this->mem->get('emu-hotTopic');
//var_dump($hotTopic);exit;
    if(empty($hotTopic)){
      $hotTopic = $this->emulemodel->getHotTopic();
      $this->_rewrite_article_url($hotTopic);
      $this->mem->set('emu-hotTopic',$hotTopic,$this->expirettl['12h']);
    }
*/
    $this->assign(array(
    'seo_info'=>$this->seo_info
    ,'showimgapi'=>$this->showimgapi,'error_img'=>$this->showimgapi.'3958009_0000671092.jpg','menuList'=>$menuList,'channel'=>$channel
    ,'player_config'=>$this->player_config,'editeUrl' => '/edite/index/emuleTopicAdd'
    ,'siteurl'=>$this->config->item('base_url')
    ,'editVideoUrl'=>$this->editVideoUrl
    ));
//var_dump($this->viewData);exit;
    $this->load->_ci_view_path = 'av/';
  }
  protected function _get_postion($postion = array()){
    $this->assign(array('postion'=>$postion));
  }
}
