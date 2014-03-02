<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once 'webbase.php';
class Admbase extends Webbase {
   
  public function __construct(){
    parent::__construct();
    
    $this->assign(array(
                'css_url'=>$this->config->item('adm_css_url'),
                'css_url'=>$this->config->item('adm_css_url'),
                'img_url'=>$this->config->item('adm_img_url'),
                'js_url'=>$this->config->item('adm_js_url'),
                'web_title'=>$this->config->item('web_title')
                ,'version'=>20140109
    ));
    $this->load->_ci_view_path = 'admin/';
  }
}
