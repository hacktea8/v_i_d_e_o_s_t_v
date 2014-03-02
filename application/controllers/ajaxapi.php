<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
ini_set('display_errors',1);
error_reporting(E_ALL);
require_once 'webbase.php';
class Ajaxapi extends Webbase {


  public function __construct(){
    parent::__construct();
    $this->load->model('emulemodel');
  }
  
  public function getcate($cid = 0, $pid = 0){
    $return = $this->_getCateListById($id, $pid);
    die(json_encode($return));
  }
}
