<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once 'webbase.php';
class Verifys extends Webbase {
  
  public function __construct(){
    parent::__construct();
  }
  public function check($aid = 0){
    $isajax = $this->input->is_ajax_request();
    if( !$isajax){
       return false;
    }
    $this->load->library('verify');
    $status = $this->verify->check();
    $status = $status ? 1 : 0;
    if($status){
       //write aid cookie
       $string = $aid."\thk8".date('H:i:s');
       $str = strcode($string, $encode = true);
       setcookie('hk8_verify_topic_dw',$str,time()+3600,'/'); 
    }
    die("$status");
  }
}
