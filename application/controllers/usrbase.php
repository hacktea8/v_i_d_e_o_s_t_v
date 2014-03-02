<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once 'webbase.php';
class Usrbase extends Webbase {
   
  public $seo_title = '首页'; 
  public $seo_keywords = '电驴资源,电驴资源网站,电驴资源下载,电驴资源搜索,电驴资源网,电驴资源网站,电驴下载,电骡资源,ed2k,eMule,电骡下载,emule 资源,电驴资源库,电驴共享';
  public $seo_description = '是一个综合的电驴资源网站，提供包含电影、电视剧、音乐、游戏、动漫、综艺、软件、资料、图书、教育等栏目电驴资源搜索、电驴下载服务。';
  public $imguploadapiurl = 'http://img.hacktea8.com/imgapi/upload/?seq=';

  public function __construct(){
    parent::__construct();
    
    $this->load->helper('rewrite');
    $this->load->model('emulemodel');
    $hotTopic = $this->mem->get('emu-hotTopic');
//var_dump($hotTopic);exit;
    if(empty($hotTopic)){
      $hotTopic = $this->emulemodel->getHotTopic();
      $this->_rewrite_article_url($hotTopic);
      $this->mem->set('emu-hotTopic',$hotTopic,$this->expirettl['12h']);
    }
    $rootCate = $this->mem->get('emu-rootCate');
    if( empty($rootCate)){
      $rootCate = $this->emulemodel->getCateByCid(0);
      $this->_rewrite_list_url($rootCate);
      $this->mem->set('emu-rootCate',$rootCate,$this->expirettl['1d']);
    } 
    $this->assign(array(
    'seo_keywords'=>$this->seo_keywords,'seo_description'=>$this->seo_description,'seo_title'=>$this->seo_title
    ,'showimgapi'=>$this->showimgapi,'error_img'=>$this->showimgapi.'3958009_0000671092.jpg','hotTopic'=>$hotTopic,'rootCate'=>$rootCate,
    'thumhost'=>'http://i.ed2kers.com','cpid'=>0,'cid'=>0
    ,'editeUrl' => '/edite/index/emuleTopicAdd'
    ));
    $this->_get_postion();
//var_dump($this->viewData);exit;
  }
  protected function _get_postion($postion = array()){
    $this->assign(array('postion'=>$postion));
  }
}
