<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
ini_set('display_errors',1);
error_reporting(E_ALL);
require_once 'webbase.php';
class Auth extends Webbase {
  

  public function __construct(){
    parent::__construct();
    $this->load->model('emulemodel');
  }
  
  public function email($code = ''){
    if(!$code){
      die('error');
    )
    $authKey = '';
    $data = strcode($code, $encode = false, $authKey);
    $info = explode("\t",$data);
    if(count($info) < 2){
       die('error code');
    }
    $uid = intval($info[0]);
    $timestamp = intval($info[1]);
    if(time() - $timestamp > 0){
      die('url timestamp invalid');
    }
    $url = sprintf("");
    $return = file_get_contents($url);
    if(1 == $return){
      header('Location: /');
    }
    die('error network');
  }
}
