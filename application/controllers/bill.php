<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once 'webbase.php';
class Usrbase extends Webbase {

  public $ad_type = array();

  public function __construct(){
    parent::__construct();
  }
  public function show($ad_size = '',$adult = 0){
    $onlyshow = false;
    if($this->userInfo['isvip'] || $this->userInfo['isadmin'] || $onlyshow){
       return true;
    }
    $ad_size = !in_array($ad_size, $this->ad_type)?:array_pop($this->ad_type);
    $this->load->view($ad_size);
    
  }
}
?>
